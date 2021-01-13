<?php

Route::get('/', function ()
{
    $categories = Category::all();
    return view::make('Master.nav2', compact('categories'));

});

