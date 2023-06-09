@extends('navbar')

@section('title')
<title>Users List</title>
@endsection


@section('content')
<div class="container p-5 text-white mb-5">
    <div class="row justify-content-center gap-3">

        @foreach ($Users as $user)
            <div class="card bg-dark" style="max-width: 20rem;">

                <div class="card-header">
                    <span class='badge {{$user->status == 0 ? "bg-primary":"bg-warning"}}'>{{$user->status == 0?"Active":"Suspended"}}</span>
                </div>

                <img class="card-img-top" src="{{ asset($user->picture) }}" alt="" style="max-width: 20rem">

                <div class="card-body">

                    <h5 class="card-title text-center">
                        {{ $user->name }}
                    </h5>

                    <p class="card-text font-weight-bold text-center">
                        {{ $user->email }}
                    </p>

                    <p class="card-text font-weight-bold text-center">
                        <span class="badge bg-secondary">
                            @if ($user->privilage == 0)
                                Simple User
                            @elseif ($user->privilage == 1)
                                Scrum Master
                            @else
                                Admin
                            @endif
                        </span>
                    </p>

                    <p class="card-text font-weight-bold text-center">
                        <span class="badge bg-info">{{ $user->created_at }}</span>
                    </p>

                    <div class="card-footer d-flex">
                        @if ($user->status == 0)
                            <a href="/users/change-status/{{ $user->id }}" class="btn btn-warning">Suspend</a>
                        @else
                            <a href="/users/change-status/{{ $user->id }}" class="btn btn-primary">Activate</a>
                        @endif
                        
                    </div>

                </div>
            </div>
        @endforeach
            
    </div>
    



    <div class="row p-5">
        <div class="col-12">
            {{ $Users->links('pagination::bootstrap-5') }}
        </div>
    </div>

    
</div>

@endsection


