@extends('layouts.app')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi Step Form | Recipes smartMeals</title>
</head>
<body>

<div class="container">
    <header>Create Your First Recipe</header>


    <div class="form-outer">
        <form action="#">
            <div class="page slide-page">
                <div class="title">What's your recipe:</div>
                <div class="field pt-1">
                    <div class="label pt-3">Title</div>
                    <input type="text" placeholder="Name the recipe">
                </div>

                <div class="field">
                    <label class="label pt-3">Description</label>
                    <div class="control pb-1">
                        <textarea class="textarea" placeholder="Lets cut to the cheese"></textarea>
                    </div>

                    <div class="field">
                        <button class="firstNext next">Next</button>
                    </div>
                </div>
            </div>

            <div class="page">

                <div class="title pt-3">Recipe tags:</div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Selections</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name = "categories">
                                        <option value="">--Select Selections--</option>
                                        @foreach($categories as $category  => $value)
                                            <option value="{{ $category }}"> {{ $value -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Holidays & Events</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name = "Subcategories">
                                        <option value="">--Select Holidays & Events--</option>
                                        @foreach($categories as $category  => $value)
                                            <option value="{{ $category }}"> {{ $value -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Seasons</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name = "Subcategories">
                                        <option value="">--Select Seasons--</option>
                                        @foreach($categories as $category  => $value)
                                            <option value="{{ $category }}"> {{ $value -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">World Foods</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name = "Subcategories">
                                        <option value="">--Select World Foods--</option>
                                        @foreach($categories as $category  => $value)
                                            <option value="{{ $category }}"> {{ $value -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Diets & Healthy Foods</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name = "Subcategories">
                                        <option value="">--Select Diets & Healthy Foods--</option>
                                        @foreach($categories as $category  => $value)
                                            <option value="{{ $category }}"> {{ $value -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Styles</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name = "Subcategories">
                                        <option value="">--Select Cooking Style--</option>
                                        @foreach($categories as $category  => $value)
                                            <option value="{{ $category }}"> {{ $value -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field btns pt-2">
                    <button class="prev-1 prev">Previous</button>
                    <button class="next-1 next">Next</button>
                </div>

            </div>

            <div class="page">

                <div class="title pt-3">Recipe information:</div>

                <div class="field pt-1">
                    <div class="label pt-3">Prep Time</div>
                    <input type="text" placeholder="e.g. 30 minutes">
                </div>

                <div class="field pt-1">
                    <div class="label pt-3">Cook Time</div>
                    <input type="text" placeholder="e.g. 1 hour 30 minutes">
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Servings</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-multiple">
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal pt-3">
                    <div class="field-label is-normal">
                        <label class="label">Difficulty</label>
                    </div>

                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <div class="select is-multiple">
                                    <select name = "Difficulty">
                                        <option value="">--Difficulty--</option>
                                        <option value="">Easy</option>
                                        <option value="">Normal</option>
                                        <option value="">Hard</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Kcal</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Fat</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Saturates</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Carbs</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Sugars</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Fibre</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Protein</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>

                    <div class="field pt-1">
                        <div class="label pt-3">Salt</div>
                        <input type="text" placeholder="e.g. 30 minutes">
                    </div>


                    <div class="field btns pt-2">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                    </div>
                </div>
            </div>

            <div class="page">

                <div class="title pt-3">Ingredients & Methodology</div>

                <div class="field-body">

                        <div id="inputFormSection">
                            <div class="label pt-3">Recipe Section Title:</div>
                            <div class="select is-fullwidth">
                                <input type="text" name="titleFull[]" class="form-control m-input" placeholder="Enter Section Title" autocomplete="off">
                                <div class="input-group-append pb-3">
                                    <button id="removeSection" type="button" class="btn btn-danger">Remove Section</button>
                                </div>


                                <div class="field is-horizontal pt-3">
                                    <div class="field-label is-normal">
                                        <label class="label"></label>
                                    </div>
                                </div>

                                <div class="field-body">
                                    <div class="field-body">
                                        <div class="field is-narrow">
                                            <div id="inputFormRow">
                                                <div class="select is-fullwidth">
                                                    <input type="text" name="title[]" class="form-control m-input" placeholder="Enter ingredient 1" autocomplete="off">
                                                    <div class="input-group-append pb-3">
                                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Ingredient</button>
                                </div>

                            </div>
                        </div>


                    <div id="newSection"></div>
                    <button id="addSection" type="button" class="btn btn-info">Add Section</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
    // add recipe row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter ingredient" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>

<script type="text/javascript">
    // add recipe section
    $("#addSection").click(function () {
        var html = '';
        html += '<div id="inputFormSection">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="titleFull[]" class="form-control m-input" placeholder="Enter Section Title" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeSection" type="button" class="btn btn-danger">Remove Section</button>';
        html += '</div>';
        html += '</div>';

        $('#newSection').append(html);
    });

    // remove row
    $(document).on('click', '#removeSection', function () {
        $(this).closest('#inputFormSection').remove();
    });
</script>

</body>
</html>

@endsection
