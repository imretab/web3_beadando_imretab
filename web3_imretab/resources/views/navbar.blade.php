<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/template.css')}}">
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/registration.profilepic.js') }}"></script>
    @yield('title')
</head>
<body>
      <nav class="navbar navbar-expand-md bg-body-tertiary bg-secondary navbar-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('logo.png')}}" alt="Logo image" id="navbar-logo" class="d-inline-block align-text-top">{{env('COMPANY')}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

              @if(Auth::check())

              <li class="nav-item me-3 mb-3 mb-md-0 mt-3 mt-md-0">
                <a class="btn {{Request::is('my-meetings/*') ? 'btn-success' : 'btn-secondary'}} w-100" href="{{ url("/my-runs")}}">My runs</a>
              </li>
              @endif

              @if(Auth::check())

              <li class="nav-item dropdown me-3 mb-3 mb-md-0">
                  <a class="btn btn-secondary dropdown-toggle w-100 {{Request::is('manage-meetings') || Request::is('meeting/create') ? 'btn-success' : 'btn-secondary'}}" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Runs
                  </a>
                  <ul class="dropdown-menu">
                    @if(Auth::user()->privilage>0)
                    <li><a class="dropdown-item" href="{{ url('/manage-runs') }}">Moderate runs</a></li>
                    @endif
                    <li><a class="dropdown-item" href="{{ url('/create-run')}}">Create new run</a></li>
                  </ul>
              </li>

              @endif

              @if(Auth::check() && Auth::User()->privilage == 2)

              <li class="nav-item me-3 mb-3 mb-md-0">
                <a class="btn {{Request::is('users') ? 'btn-success' : 'btn-secondary'}} w-100" href="/users">Users</a>
              </li>

              @endif

              @if(Auth::check())

              <li class="nav-item dropdown  me-3 mb-3 mb-md-0">
                <a class="btn {{Request::is('edit-profile') ? 'btn-success' : 'btn-secondary'}} w-100 btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img
                    id = "displayIMG"
                    src="{{Auth::user()->picture}}"
                    width="20"
                    height="20"
                    style="border-radius: 50%;"
                  />
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{ url('/edit-profile') }}">Edit profile</a></li>
                  <li><a class="dropdown-item text-danger" href="{{url('/sign-out')}}">Logout</a></li>
                </ul>
              </li>

              @else

              <li class="nav-item me-3 mb-3 mb-md-0 mt-3 mt-md-0">
                <a class="btn {{Request::is('sign-in') ? 'btn-success' : 'btn-secondary'}} w-100" href="{{url('/sign-in')}}">Sign In</a>
              </li>
              <li class="nav-item me-3 mb-3 mb-md-0">
                <a class="btn {{Request::is('sign-up') ? 'btn-success' : 'btn-secondary'}} w-100" href="{{ url('/sign-up') }}">Sign Up</a>
              </li>

              @endif

            </ul>
          </div>
        </div>
      </nav>

      @yield('content')

</body>
</html>