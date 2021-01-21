@extends('layouts.app')

@section('content')

    @include('master.navbar')

    <hr>
    <h1 class="text-center">Step 1- Add New Recipe</h1>
    <hr>
    <form action="/recipes/create-step1" method="post">

        {{ csrf_field() }}

    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Recipe</h1>
                </div>

                <div class="form-group row">

                    <label for="title" class="col-md-4 col-form-label">Recipe Title</label>

                    <input id="title"
                           type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title"
                           value="{{ old('title') }}"
                           autocomplete="title" autofocus>



                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <hr>

                <section class="Description">
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Recipe Description</label>

                        <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                  name="body"
                                  id="description"
                                  rows="5"
                                  placeholder="Your Post Here"
                                  value="{{ old('description') }}"
                                  autocomplete="description" autofocus>
                        </textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif

                    </div>
                </section>

                <hr>

                <button type="submit" class="btn btn-primary">Add Product Image</button>

            </div>
        </div>
    </div>
    </form>

@endsection
