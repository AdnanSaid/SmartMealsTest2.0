 <!doctype html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi Step Form | Recipes smartMeals</title>

    @include('recipes.style')

</head>

<body>

<div class="container">


    <header>Create Your First Recipe</header>


    <div class="form-outer">

        <form action="/r" enctype="multipart/form-data" method="recipe">
            @csrf

            <div class="page slide-page">
                <div class="title">What's your recipe:</div>
                <div class="field">
                    <div class="label">Title</div>
                    <input type="text" placeholder="Name the recipe">
                </div>

                <div class="field">

                    <div class="label">Description</div>
                    <div class="control">
                        <textarea name="message" rows="10" cols="30" placeholder="Lets cut to the cheese"></textarea>
                    </div>

                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                    <div class="field">
                        <button class="firstNext next">Next</button>
                    </div>

            </div>

            <div class="page">

                <div class="title pt-3">Recipe tags:</div>

                <div class="field">
                    <div class="label">Selections</div>
                    <select>
                        <option value="">--Select Selections--</option>
                        @foreach($subcategories as $subcategory  => $value)
                            <option value="{{ $subcategory}}"> {{ $value -> name }}</option>
                        @endforeach
                    </select>
                </div>

{{--                <div class="field">--}}
{{--                    <div class="label">Holidays & Events</div>--}}
{{--                    <select name = "Subcategories">--}}
{{--                        <option value="">--Select Holidays & Events--</option>--}}
{{--                        @foreach($categories as $category  => $value)--}}
{{--                            <option value="{{ $category }}"> {{ $value -> name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="field">--}}
{{--                    <div class="label">Seasons</div>--}}
{{--                    <select name = "Subcategories">--}}
{{--                        <option value="">--Select Seasons--</option>--}}
{{--                        @foreach($categories as $category  => $value)--}}
{{--                            <option value="{{ $category }}"> {{ $value -> name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="field">--}}
{{--                    <label class="label">World Foods</label>--}}
{{--                    <select name = "Subcategories">--}}
{{--                        <option value="">--Select World Foods--</option>--}}
{{--                        @foreach($categories as $category  => $value)--}}
{{--                            <option value="{{ $category }}"> {{ $value -> name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="field">--}}
{{--                    <label class="label">Diets & Healthy Foods</label>--}}
{{--                    <select name = "Subcategories">--}}
{{--                        <option value="">--Select Diets & Healthy Foods--</option>--}}
{{--                        @foreach($categories as $category  => $value)--}}
{{--                            <option value="{{ $category }}"> {{ $value -> name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="field">--}}
{{--                    <label class="label">Styles</label>--}}
{{--                    <select name = "Subcategories">--}}
{{--                        <option value="">--Select Cooking Style--</option>--}}
{{--                        @foreach($categories as $category  => $value)--}}
{{--                            <option value="{{ $category }}"> {{ $value -> name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

                <div class="field btns pt-2">
                    <button class="prev-1 prev">Previous</button>
                    <button class="next-1 next">Next</button>
                </div>

            </div>

            <div class="page">

                <div class="title">Recipe information:</div>

                <div class="field">
                    <div class="label">Prep Time hh:mm</div>
                    <input type="text" placeholder="e.g. 00:30">
                </div>

                <div class="field">
                    <div class="label">Cook Time hh:mm</div>
                    <input type="text" placeholder="e.g. 01:30">
                </div>

                <div class="field">
                    <div class="label">Servings</div>
                    <select name = "Servings">
                        <option value="">--How many servings--</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4-8</option>
                        <option value="">8-10</option>
                        <option value="">10-12</option>
                        <option value="">12-16</option>
                        <option value="">16-20</option>
                        <option value="">20+</option>
                    </select>
                </div>

                <div class="field">
                    <div class="label">Difficulty</div>
                    <select name = "Difficulty">
                        <option value="">--Difficulty--</option>
                        <option value="">Easy</option>
                        <option value="">Normal</option>
                        <option value="">Hard</option>
                    </select>
                    </div>


                <div class="field btns pt-2">
                    <button class="prev-2 prev">Previous</button>
                    <button class="next-2 next">Next</button>
                </div>

            </div>

            <div class="page">

                    <div class="title">Recipe information:</div>

                    <div class="field pt-1">
                        <div class="label pt-3">Calorie (Kcal)</div>
                        <input type="text" placeholder="e.g. 100">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Fat (g)</div>
                        <input type="text" placeholder="e.g. 10">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Saturates (g)</div>
                        <input type="text" placeholder="e.g. 10">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Carbs (g)</div>
                        <input type="text" placeholder="e.g. 10">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Sugars (g)</div>
                        <input type="text" placeholder="e.g. 0.1">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Fibre (g)</div>
                        <input type="text" placeholder="e.g. 1.0">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Protein (g)</div>
                        <input type="text" placeholder="e.g. 10">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Salt (g)</div>
                        <input type="text" placeholder="e.g. 0.01">
                    </div>


                    <div class="field btns pt-2">
                        <button class="prev-3 prev">Previous</button>
                        <button class="next-3 next">Next</button>
                    </div>

            </div>

            <div class="page">

                <div class="title">Recipe information:</div>

                <div class="field">
                    <div class="label">Ingredients</div>
                    <div id="inputFormRow">
                    <input type="text" placeholder="3 onions">
                        </div>
                    </div>

                <div id="newRow"></div>
                <button id="addRow" type="button">Add Ingredient</button>


                        <div class="field">
                            <div class="label">Steps</div>
                                <div id="inputFormMethod">
                                        <input type="text" name="title[]"
                                               placeholder="Chop 2 onions and place in ...">
                            </div>
                        </div>

                <div id="newMethod"></div>
                <button id="addMethod" type="button">Add Step</button>

                <div class="field btns">
                    <button class="prev-4 prev">Previous</button>
                    <button class="next-1 next">Submit</button>
                </div>
            </div>

        </form>
    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@include('recipes.Script')

</body>

</html>


