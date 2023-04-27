@extends('navbar')
@section('title')
    <title>Edit profile</title>
@endsection

@section('content')

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">Edit Profile</h1>
        <h5 class="mb-4">Site for editing your profile</h5>

        <form action={{ url('/edit_profile') }} method="POST">
        @csrf

        <div class="form-outline mb-4">

            <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">
                Email address
            </label>

            <input
                name="email"
                type="email"
                id="email"
                class="form-control form-control-lg"
                placeholder="Enter a valid email address"
                required
            />

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        <div class="form-outline mb-3">

            <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="password">
                Password
            </label>

            <input
                name="password"
                type="password"
                id="password"
                class="form-control form-control-lg"
                placeholder="Enter password"
                required
            />

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        <div class="text-center text-lg-start mt-4 pt-2">

            <div class="text-center">
                <button type="submit" class="btn btn-outline-light btn-lg m-2">
                    Edit Profile
                </button>
            </div>

        </div>
        </form>

    </div>
</div>

@endsection