@extends('navbar')
@section('title')
    <title>Runs</title>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container-fluid align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">
        @if(count($acceptedRuns)<=0)
        <h1>No speedruns are posted in this category</h1>
        @else
        <h1 class="mb-3">All the speedruns</h1>
        <div class="row border border-dark">
            <div class="col-1 border-end border-dark"><h4>#</h4></div>
            <div class="col border-end border-dark"><h4>Game</h4></div> 
            <div class="col border-end border-dark"><h4>Runner</h4></div> 
            <div class="col border-end border-dark"><h4>Title</h4></div> 
            <div class="col border-end border-dark"><h4>Time</h4></div> 
        </div>
            @foreach ($acceptedRuns as $runs)
            <div class="place">
            <div class="row border border-primary">
                <div class="col-1 border-end border-primary">
                    <div id="placement">
                        {{$place+=1}}
                    </div>
                </div>
                <div class="col border-end border-primary">{{$runs->runCategory->categories}}</div>
                <div class="col border-end border-primary"><a href="/profile/{{$runs->uploaderName->id}}">{{$runs->uploaderName->name}}</a></div>
                <div class="col border-end border-primary">{{$runs->run_title}}</div>
                <div class="col border-end border-primary">{{$runs->time}}</div>
            </div>
        </div>
        @endforeach
        @endif
        
</div>

@endsection