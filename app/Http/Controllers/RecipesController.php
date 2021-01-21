<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class RecipesController extends Controller
{
    /**
     * Show the step 1 Form for creating a new product.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function createStep1(Request $request)
    {
        $recipe = $request->session()->get('recipe');

        return view('recipes.create.create-step1',compact('recipe', $recipe));    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreateStep1(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        if(empty($request->session()->get('recipe'))){
            $recipe = new Recipe();
            $recipe->fill($validatedData);
            $request->session()->put('recipe', $recipe);
        }else{
            $recipe = $request->session()->get('recipe');
            $recipe->fill($validatedData);
            $request->session()->put('recipe', $recipe);
        }

        return redirect('/recipes/create-step2');

    }

    /**
     * Show the step 2 Form for creating a new recipe.
     *
     * @return Application|Factory|Response|View
     */
    public function createStep2(Request $request)
    {
        $recipe = $request->session()->get('recipe');
        return view('recipes.create.create-step2',compact('recipe', $recipe));
    }

    /**
     * Post Request to store step2 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreateStep2(Request $request)
    {
        $recipe = $request->session()->get('recipe');
        if(!isset($recipe->recipeImg)) {
            $request->validate([
                'recipeimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $fileName = "recipeImage-" . time() . '.' . request()->recipeimg->getClientOriginalExtension();

            $request->recipeImg->storeAs('recipeImg', $fileName);

            $recipe = $request->session()->get('recipe');

            $recipe->recipeImg = $fileName;
            $request->session()->put('recipe', $recipe);
        }
        return redirect('/recipes/create-step3');

    }

    /**
     * Shows the step 3 Form for adding ingredients.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function createStep3(Request $request)
    {
        $recipe = $request->session()->get('recipe');

        return view('recipes.create.create-step3',compact('recipe', $recipe));
    }

    /**
     * Post Request to store step3 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreateStep3(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        if(empty($request->session()->get('recipe'))){
            $recipe = new Recipe();
            $recipe->fill($validatedData);
            $request->session()->put('recipe', $recipe);
        }else{
            $recipe = $request->session()->get('recipe');
            $recipe->fill($validatedData);
            $request->session()->put('recipe', $recipe);
        }

        return redirect('/recipes/create-step4');

    }
}

