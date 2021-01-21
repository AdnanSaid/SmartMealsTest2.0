@extends('layouts.app')

@section('content')

    @include('master.navbar')

    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
            </div>

            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-3">

                        <div class="h4">{{ $user->username }}</div>

                        <follow-button user-id="{{ $user->id }}" follows="{{$follows ?? ''}}"></follow-button>

                    </div>

                   @can('update', $user->profile)
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <style>
                                .dropbtn {
                                    background-color: #fff;
                                    color: Black;
                                    padding: 16px;
                                    font-size: 16px;
                                    border: none;
                                    cursor: pointer;
                                }

                                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }

                                .dropdown-content {
                                    display: none;
                                    position: absolute;
                                    right: 0;
                                    background-color: #fff;
                                    min-width: 160px;
                                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                    z-index: 1;
                                }

                                .dropdown-content a {
                                    color: black;
                                    padding: 12px 16px;
                                    text-decoration: none;
                                    display: block;
                                }

                                .dropdown-content a:hover {background-color: #fff;}

                                .dropdown:hover .dropdown-content {
                                    display: block;
                                }

                                .dropdown:hover .dropbtn {
                                    background-color: #fff;
                                }
                            </style>
                        </head>
                        <body>

                        <div class="dropdown" style="float:right;">
                            <button class="dropbtn">Post</button>
                            <div class="dropdown-content">
                                <a href="/p/create">Add New Image</a>
                                <a href="/recipes/create">Add New Recipe</a>
                                <a href="#">Add New MealPlan</a>
                                <a href="#">Add New Blog</a>
                            </div>
                        </div>

                        </body>
                    @endcan

            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                    <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                    <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
                </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">Aston.ac.uk</a></div>
        </div>
    </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
</div>
@endsection

