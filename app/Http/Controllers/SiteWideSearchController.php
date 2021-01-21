<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class SiteWideSearchController extends Controller
{

    /** 10 characters:
     * to show 10 neighbouring characters around the searched word
     * */

    const BUFFER = 10;

    /** A helper function to generate the model namespace
     * @return string
     */
    private function modelNamespacePrefix()
    {
        return app()->getNamespace() . 'Models\\';
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        // just for demonstration, you can exclude models from the searches here
        // $toExclude = [Category::class];
        $toExlude = [];

        // load all the models in the Models Directory

        $Files = File::allFiles(app()->basePath() . '/app/Models');

        $results = collect($Files)->map(function (SplFileInfo $file) {
            $filename = $file->getRelativePathname();
            if (substr($filename, -4) !== '.php') {
                return null;
            }
            return substr($filename, 0, -4);

        })->filter(function (?string $classname) use ($toExlude) {
            // filter each model that makes use of the searchable trait
            if ($classname === null) {
                return false;
            }

            $reflection = new \ReflectionClass(
                $this->modelNamespacePrefix() . $classname);

            // check if class extends eloquent model
            $isModel = $reflection->isSubclassOf(Model::class);

            $searchable = $reflection->hasMethod('search');

            return $isModel && $searchable &&
                !in_array($reflection->getName(), $toExlude, true);

        })->map(function ($classname) use ($keyword) {

            $model = app($this->modelNamespacePrefix() . $classname);

            $fields = array_filter($model::SEARCHABLE_FIELDS,
                fn($field) => $field !== 'id');


            // within each model, we would then call the search() scout function
            // against the search keyword given in the Http request query
            return $model::search($keyword)->get()->map(function ($modelRecord)
            use ($fields, $keyword, $classname) {
                // for each search result, we want to use/include
                // 1. match -- matching text and surrounding text
                $fieldsData = $modelRecord->only($fields);

                $serializedValues = collect($fieldsData)->join('');

                $searchPos = strpos(strtolower($serializedValues),
                    strtolower($keyword));

                if ($searchPos !== false) {

                    $start = $searchPos - self::BUFFER;

                    $start = $start < 0 ? 0 : $start;

                    $length = strlen($keyword) + 2 * self::BUFFER;

                    $sliced = substr($serializedValues, $start, $length);

                    // adding prefix and postfix dots

                    // if start position is 0, there is no need to prepend `...`
                    $shouldAddPrefix = $start > 0;

                    // if end position went over the total length, there is no need to append `...`
                    $shouldAddPostfix = ($start + $length) < strlen($serializedValues);

                    $sliced = $shouldAddPrefix ? '...' . $sliced : $sliced;
                    $sliced = $shouldAddPostfix ? $sliced . '...' : $sliced;
                }

                $modelRecord->setAttribute('match', $sliced ?? substr
                    ($serializedValues, 0, 20) . '...');
                // 2. model -- the model name
                $modelRecord->setAttribute('model', $classname);
                // 3. view-link -- url to visit the resource being searched
                $modelRecord->setAttribute('view_link',
                    $this->resolveModelViewLink($modelRecord));

                return $modelRecord;
            });
        })->flatten(1);

       // dd($results);


        // combine the search results together and send back as a response
        // using a standardised site search resource
        return SiteSearchResource::collection($results);
    }

    private function resolveModelViewLink(Model $model)
    {
        //to return a url similar to: /{model-name}/{model-id}
        //example for categories : /categories/1
        $mapping = [
            Category::class => '/categories/view/{id}'
        ];
        //get fully qualified class name of model
        $modelClass = get_class($model);

        //check if the class has a $mapping entry.
        //if it does we can use the url pattern
        if (Arr::has($mapping, $modelClass)) {
            return URL::to(str_replace('{id}', $model->id,
                $mapping($modelClass)));
        }

        //if it doesnt, use the default convention

        //we need to convert the class name to a kebab casing
        // then return the url
        $modelName = Str::plural(Arr::last(explode('\\', $modelClass)));
        $modelName = Str::kebab(Str::camel($modelName));

        return URL::to('/' . $modelName . '/' . $model->id);
    }
}

