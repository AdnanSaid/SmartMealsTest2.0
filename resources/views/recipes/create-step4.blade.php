@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
<head>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container"style="max-width: 700px;">

    <h1 class="text-center">Step 3- Add Recipe Ingredients</h1>
    <hr>
    <form action="/recipes/create-step3" method="post">

        {{ csrf_field() }}

        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">


                <form method="post" action="">
        <div class="row">
            <div class="col-lg-12">
                <div id="inputFormRow">
                    <div class="input-group mb-3">
                        <input type="text" name="title[]" class="form-control m-input" placeholder="Enter ingredient 1" autocomplete="off">
                        <div class="input-group-append">
                            <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>

                <div id="newRow"></div>
                <button id="addRow" type="button" class="btn btn-info">Add Ingredient</button>

                <hr>

                <button type="submit" class="btn btn-primary">Add Cooking Method</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    // add row
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
</body>
</html>

@endsection
