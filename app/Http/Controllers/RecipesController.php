<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RecipesController extends Controller
{
    public function index()
    {

        return view('recipes.index');
    }

    public function create()
    {

        $categories = DB::table('categories')->pluck("name","id");
        return view ('recipes.create', compact($categories));
    }

    public function getStates($id)
    {

        $subcategories = DB::table("subcategories")->where("category_id", $id)->pluck("name", "id");

        return json_encode($subcategories);
    }

}

