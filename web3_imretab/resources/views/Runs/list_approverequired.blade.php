@extends('navbar')
@section('content')
<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white bg-dark p-5 border border-3 border-secondary rounded-lg">

        <h1 class="mb-3">Moderate speedruns</h1>
        <h5 class="mb-4">Site where you can moderate everyone's speedruns</h5>
            @foreach ($allRuns as $runs)
            <div>
                <br>
                {{$runs->run_title}}
                {{$runs->uploaderName->name}}
                {{$runs->runCategory->categories}}
                <br>
                @if($runs->isAccepted == 0)
                    Needs approval
                    <a href="/manage-runs/{{$runs->id}}" class="btn btn-success">Accept run</a>
                @else
                    Approved
                    <a href="/manage-runs/{{$runs->id}}" class="btn btn-danger">It was a misinput MISINPUT</a>
                @endif
            </div>
            @endforeach
        <div class="row p-5">
            <div class="col-12">
                {{ $allRuns->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>

@endsection