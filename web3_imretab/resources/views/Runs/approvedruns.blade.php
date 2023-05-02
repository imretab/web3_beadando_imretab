@extends('navbar')
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">All the speedruns</h1>
        <div class="row border border-primary">
            <div class="col border border-primary"><h4>Game</h4></div> 
            <div class="col border border-primary"><h4>Runner</h4></div> 
            <div class="col border border-primary"><h4>Title</h4></div> 
            <div class="col border border-primary"><h4>Time</h4></div> 
        </div>
            @foreach ($acceptedRuns as $runs)
            <div class="row border border-warning">
                <div class="col border border-warning">{{$runs->runCategory->categories}}</div>
                <div class="col border border-warning">{{$runs->uploaderName->name}}</div>
                <div class="col border border-warning">{{$runs->run_title}}</div>
                <div class="col border border-warning">{{$runs->time}}</div>
            </div>
            @endforeach
        
</div>

@endsection