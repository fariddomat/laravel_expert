<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('noty/noty.css')}}">
    <script src="{{asset('noty/noty.min.js')}}"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('dashboard/css/dashboard.css')}}" rel="stylesheet">
    @yield('styles')

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{route('customers.dashboard.home')}}">Digitsmark</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav pe-5 pe-md-0 me-5 me-md-0">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('homeActive')" aria-current="page"
                                href="{{route('customers.dashboard.home')}}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('basicinfoActive')" aria-current="page"
                                href="{{route('customers.dashboard.basicinfo.create')}}">
                                Basic Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('socialmediaActive')" aria-current="page"
                                href="{{route('customers.dashboard.socialmedia.index')}}">
                                Social Media
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('galleryActive')" aria-current="page"
                                href="{{route('customers.dashboard.gallery.index')}}">
                                Gallery
                            </a>
                        </li>
                        @if(auth()->user()->customer->contact_us_form)
                        <li class="nav-item">
                            <a class="nav-link @yield('contactusActive')" aria-current="page"
                                href="{{route('customers.dashboard.contactUs.index')}}">
                                Contact Us
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->customer->blogs)
                        <li class="nav-item">
                            <a class="nav-link @yield('blogcategoriesActive')" aria-current="page"
                                href="{{route('customers.dashboard.blogcategories.index')}}">
                                Blog Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('blogsActive')" aria-current="page"
                                href="{{route('customers.dashboard.blogs.index')}}">
                                Blogs
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('customers/js/main.js')}}"></script>
    @include('partials._session')
    @yield('scripts')
</body>

</html>