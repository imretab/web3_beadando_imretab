@extends('navbar')
@section('title')
    <title>My Runs</title>
@endsection
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">My Runs</h1>
        <h5 class="mb-4">Site where you can modify your runs if it is rejected</h5>
            @foreach ($myRuns as $runs)
            <div class="row border border-2 border-secondary">
                <div class="col border-end border-secondary"><b>Game</b>: {{$runs->runCategory->categories}}<hr>
                <b>Name of runner</b>:{{$runs->uploaderName->name}}
                <hr>
                <b>Time</b>: {{$runs->time}}
                </div>
                <div class="col border-end border-secondary"><iframe src="{{$runs->youtube_link}}" frameborder="0"></iframe></div>
                <div class="col border-end border-secondary"><a href="/edit-my-run/{{$runs->id}}" class="btn btn-success">Hey</a></div>
            </div>
            <br>
            @endforeach
        <!--<div class="row p-5">
            <div class="col-12">
                 //$myRuns->links('pagination::bootstrap-5') }}
            </div>
        </div>-->
    </div>

</div>

@endsection