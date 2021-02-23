<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class RecipesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $recipes = Recipe::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('recipes.index', compact($recipes));
    }

    public function create()
    {

        return view ('recipes.create');
    }

    public function getSubCat($id)
    {

        $subcategories = DB::table("subcategories")->where("category_id", $id)->pluck("name", "id");

        return json_encode($subcategories);
    }

    public function store()
    {

            $data = request()->validate([
                'Title' => 'required',
                'Description' => 'required',
                'image' => ['required', 'image'],
                'selections' => ['required'],
                'Prep Time hh:mm' => ['required', 'date_format:H:i'],
                'Cook Time hh:mm' => ['required', 'date_format:H:i'],
                'Servings' => 'required',
                'Difficulty' => 'required',
                'Calorie (Kcal)' => 'numeric',
                'Fat (g)' => 'numeric',
                'Saturates (g)' => 'numeric',
                'Carbs (g)' => 'numeric',
                'Sugars (g)' => 'numeric',
                'Fibre (g)' => 'numeric',
                'Protein (g)' => 'numeric',
                'Salt (g)' => 'numeric',
                'Ingredients' => 'required',
                'Steps' => 'required',

            ]);


            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            auth()->user()->recipes()->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $imagePath,
                'selections' => $data['subcategories_id'],
                'prep time hh:mm' => $data['prep_time'],
                'cook Time hh:mm' => $data['cook_time'],
                'servings' => $data['servings'],
                'difficulty' => $data['difficulty'],
                'calorie (kcal)' => $data['calorie'],
                'Fat (g)' => $data['Fat'],
                'Saturates (g)' => $data['Saturates'],
                'Carbs (g)' => $data['Carbs'],
                'Sugars (g)' => $data['Sugars'],
                'Fibre (g)' => $data['Fibre'],
                'Protein (g)' => $data['Protein'],
                'Salt (g)' => $data['Salt'],
                'Ingredients' => $data['Ingredients'],
                'Steps' => $data['Steps'],

            ]);

            return redirect('/profile/' . auth()->user()->id);
        }

        public function show(\App\Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }



}

