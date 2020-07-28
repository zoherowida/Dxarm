<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Dxarm</title>
    <link href="{{asset('dashboard/css/app.css')}}" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="#">
                <span class="align-middle">Dxarm</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item {{ (Request::is('dashboard/home') || Request::is('dashboard/home/*') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/dashboard/home') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (Request::is('dashboard/user') || Request::is('dashboard/user/*') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/dashboard/user') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (Request::is('dashboard/step') || Request::is('dashboard/step/*') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/dashboard/step') }}">
                        <i class="align-middle" data-feather="repeat"></i> <span class="align-middle">Steps</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (Request::is('dashboard/requestType') || Request::is('dashboard/requestType/*') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/dashboard/requestType') }}">
                        <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Request Types</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (Request::is('dashboard/requests') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/dashboard/requests') }}">
                        <i class="align-middle" data-feather="git-pull-request"></i> <span class="align-middle">Requests</span>
                    </a>
                </li>
                @if(\App\Step::where('userId',\Illuminate\Support\Facades\Auth::user()->id)->count() > 0)
                    <li class="sidebar-item {{ (Request::is('dashboard/myRequest') ? 'active' : '') }}">
                        <a class="sidebar-link" href="{{ url('/dashboard/myRequest') }}">
                            <i class="align-middle" data-feather="git-pull-request"></i> <span class="align-middle">Approve Request</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>


    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle d-flex">
                <i class="hamburger align-self-center"></i>
            </a>


            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <span class="text-dark">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')


        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-left">
                        <p class="mb-0">
                            <a href="#" class="text-muted"><strong>Dxarm</strong></a> &copy;
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{asset('dashboard/js/vendor.js')}}"></script>
<script src="{{asset('dashboard/js/app.js')}}"></script>

</body>
</html>
