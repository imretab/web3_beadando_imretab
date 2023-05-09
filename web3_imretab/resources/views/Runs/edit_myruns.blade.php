@extends('navbar')
@section('title')
    <title>My Runs</title>
@endsection
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">Modify speedrun</h1>
        <h5 class="mb-4">Site where you can modify your selected speedrun</h5>
        @foreach($myRuns as $r)
        <form action="/edit-my-run/{{$r->id}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4">
                
                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="profilePic">
                    Run category*
                </label>

                <select class="form-select" aria-label="Default select example" name="category">
                    @foreach ($category_options as $c)
                        <option value={{$c->id}} {{$r->run_category == $c->id ? 'selected':''}}>{{$c->categories}}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-outline mb-4">
                
                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="fullName">
                    Run title*
                </label>
                <input
                    name="runTitle"
                    type="text"
                    id="fullName"
                    class="form-control form-control-lg"
                    placeholder="Enter the title of the run"
                    value="{{$r->run_title}}"
                />
                @error('runTitle')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">
                    Time*
                </label>
                <input
                    name="time"
                    type="text"
                    id="email"
                    class="form-control form-control-lg"
                    placeholder="Accepted format: h:m:s.ms"
                    value="{{$r->time}}"
                />
                @error('time')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="password">
                    Youtube link for the run*
                </label>

                <input
                    name="ylink"
                    type="text"
                    id="password"
                    class="form-control form-control-lg"
                    placeholder="Youtube link for the run"
                    value="{{$r->youtube_link}}"
                    
                />

                @error('ylink')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="passwordConfirm">
                    Comment (optional)
                </label>

                <input
                    name="commentonrun"
                    type="textarea"
                    id="password_confirmation"
                    class="form-control form-control-lg"
                    placeholder="Comment or run"
                    value="{{$r->comment_onrun}}"
                />

                @error('commentonrun')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>
            @endforeach
            <div class="text-center text-lg-start mt-4 pt-2">

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-light btn-lg m-2">
                        Edit run
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>

@endsection