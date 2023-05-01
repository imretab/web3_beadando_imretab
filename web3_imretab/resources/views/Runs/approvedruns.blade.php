@extends('navbar')
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">All the speedruns</h1>
            @foreach ($acceptedRuns as $runs)
            <div>
                <br>
                {{$runs->run_title}}
                {{$runs->uploaderName->name}}
                {{$runs->runCategory->categories}}
                <br>
                {{$runs->time}}
            </div>
            @endforeach

</div>

@endsection