@extends('navbar')
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">Moderate speedruns</h1>
        <h5 class="mb-4">Site where you can moderate everyone's speedruns</h5>

        <form action={{ url('/manage-runs') }} method="POST" enctype="multipart/form-data">
        @csrf
            @foreach ($allRuns as $runs)
            <div>
                <br>
                {{$runs->run_title}}
                <br>
                @if($runs->isApproved == 0)
                    Needs approval
                @else
                    Approved
                @endif
            </div>
            @endforeach

        </form>

    </div>
</div>

@endsection