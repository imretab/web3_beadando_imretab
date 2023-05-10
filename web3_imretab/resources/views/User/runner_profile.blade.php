@extends('navbar')
@section('title')
    <title>Profile</title>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">
            @foreach ($user as $u)
            <h1 class="mb-3">Profile of {{$u->name}}</h1>
            <div class="form-outline mb-4">
            <img src="{{ $u->picture }}" style="width:100px;heigth:100px">
            </div>
            @if(!is_null($u->twitch_link))
            <h4>Twitch: <a href="https://{{$u->twitch_link}}" target="_blank"><i class="fa fa-twitch"></i></a></h4>
            @else
            <h4>No Twitch link found for this user</h4>
            @endif
            @if(!is_null($u->steam_link))
            <h4>Steam: <a href="https://{{$u->steam_link}}" target="_blank"><i class="fa fa-steam"></i></a></h4>
            @else
            <h4>No Steam link found for this user</h4>
            @endif
            @endforeach
            <h4>His/her runs:</h4>
            @if(count($userRuns)<=0)
            <h4>They haven't uploaded any runs yet</h4>
            @else
            <div class="row border border-dark">
                <div class="col border-end border-dark"><h4>Game</h4></div> 
                <div class="col border-end border-dark"><h4>Title</h4></div> 
                <div class="col border-end border-dark"><h4>Time</h4></div>
                <div class="col border-end border-dark"><h4>Youtube link</h4></div> 
            </div>
            @foreach($userRuns as $r)
            <div class="row border border-primary">
            <div class="col border-end border-primary">{{$r->runCategory->categories}}</div>
            <div class="col border-end border-primary">{{$r->run_title}}</div>
            <div class="col border-end border-primary">{{$r->time}}</div>
            <div class="col border-end border-primary"><a href="https://{{$r->youtube_link}}" target="_blank">Link for the run</a></div>
            </div>
            @endforeach
            @endif
        </div>
        
</div>

@endsection