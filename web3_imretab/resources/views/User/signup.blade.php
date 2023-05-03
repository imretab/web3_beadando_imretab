@extends('navbar')
@section('title')
    <title>Edit profile</title>
@endsection

@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">Sign up</h1>
        <h5 class="mb-4">Page for signing up</h5>

        <form action={{ url('/sign-up') }} method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4">

                <label class="pe-3 fw-bold form-label" for="profilePic">
                    Your profile image
                </label>
                <img
                    name="displayIMG"
                    id="displayIMG"
                    src="{{asset('default_profilepic.png')}}"
                    style="width: 250px; height: 250px; display: block; margin-left: auto; margin-right: auto;"
                    alt="Not Found"
                    title="Profile Image"
                />
              </div>


            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="profilePic">
                    Profile image
                </label>

                <input
                    type="file"
                    name="picture"
                    id="profilePic"
                    accept="image/*"
                    class="form-control form-control-lg"
                    placeholder="Choose your profile picture"
                />
            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="fullName">
                    Nickname
                </label>
                <input
                    name="name"
                    type="text"
                    id="fullName"
                    class="form-control form-control-lg"
                    placeholder="Enter your full name"  
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">
                    Email address
                </label>
                <input
                    name="email"
                    type="email"
                    id="email"
                    class="form-control form-control-lg"
                    placeholder="Give a valid email address"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="password">
                    Password
                </label>

                <input
                    name="password"
                    type="password"
                    id="password"
                    class="form-control form-control-lg"
                    placeholder="Enter password"
                    
                />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="passwordConfirm">
                    Confirm password
                </label>

                <input
                    name="password_confirmation"
                    type="password"
                    id="password_confirmation"
                    class="form-control form-control-lg"
                    placeholder="Confirm your password"
                    
                />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>
            
            <div class="form-outline mb-4">
                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="t_link">
                    Twitch link (optional)
                </label>

                <input
                    name="t_link"
                    type="text"
                    id="password_confirmation"
                    class="form-control form-control-lg"
                    placeholder="Twitch link (optional)"
                    
                />
            </div>

            <div class="form-outline mb-4">
                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="s_link">
                    Steam link (optional)
                </label>

                <input
                    name="s_link"
                    type="text"
                    id="password_confirmation"
                    class="form-control form-control-lg"
                    placeholder="Steam link (optional)"
                    
                />
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-light btn-lg m-2">
                        Sign Up
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection