@extends('layouts.app')

@section('content')

    <h1 class="text-center">Step 2- Add Recipe Image</h1>
    <hr>
    @if(isset($recipe->productImg))
        Product Image:
        <img alt="Product Image" src="/storage/productimg/{{$product->productImg}}"/>
    @endif
    <form action="/recipes/create-step2" method="post">

        {{ csrf_field() }}

    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add Image of dish</h1>
                </div>

                <hr>

                <section class="class">

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>

                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
                </section>

                <hr>

                <button type="submit" class="btn btn-primary">Add Ingredients</button>


            </div>
        </div>
    </div>
    </form>
@endsection
