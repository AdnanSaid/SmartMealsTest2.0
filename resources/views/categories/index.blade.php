@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row pt-5">
            @foreach($categories as $category)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="{{ asset(Storage::url($post->image)) }}" class="w-100">
                    </a>
                </div>
    @endforeach

@endsection
