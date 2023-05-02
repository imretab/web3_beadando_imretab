@extends('navbar')
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">
        <p>Looks like that you're trying to visit a site where you don't have the required permission for</p>
        <h5 class="card-text">Go back to the last visited site!</h5>
        <button onclick="window.history.back(1);" class="btn btn-danger">Go back</button>
    </div>
</div>
@endsection