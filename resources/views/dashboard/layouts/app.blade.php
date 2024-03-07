<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <link href="{{ asset('dashboard/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('dashboard/dest/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    <script src="{{ asset('noty/noty.min.js') }}" defer></script>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

    <!-- Include ajaxForm library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" defer></script>

    {{-- select2 --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

    @yield('styles')
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>

            </ul>
            <ul class="nav navbar-nav pull-left hidden-md-down">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>Account</strong>
                        </div>
                        <a class="dropdown-item" href=""><i class="fa fa-bell-o"></i>
                            الملف الشخصي</a>
                        <div class="dropdown-header text-xs-center">
                            <strong>Settings</strong>
                        </div><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i>تسجيل خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                </li>

            </ul>
        </div>
    </header>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link @yield('homeActive')" aria-current="page" href="{{ route('dashboard.home') }}">
                        لوحة التحكم
                    </a>
                </li>
                @if (auth()->user()->hasRole('superadministrator'))
                    <li class="nav-item">
                        <a class="nav-link @yield('homeinfoActive')" href="{{ route('dashboard.homeinfo.create') }}">
                            الصفحة الرئيسية
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('aboutActive')" href="{{ route('dashboard.about.create') }}">
                            حول الموقع
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('aboutimagesActive')" href="{{ route('dashboard.aboutimages.index') }}">
                            صور حول الموقع
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('servicesActive')" href="{{ route('dashboard.services.index') }}">
                            الخدمات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('orderservicesActive')" href="{{ route('dashboard.orderservices.index') }}">
                            طلبات الخدمات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('contactusActive')" href="{{ route('dashboard.contact-us.index') }}">
                            اتصل بنا
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('socialmediaActive')" href="{{ route('dashboard.socialmedia.index') }}">
                            منصات التواصل الاجتماعي
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('partnerActive')" href="{{ route('dashboard.partnerSlider.index') }}">
                            شركائنا
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('teamActive')" href="{{ route('dashboard.team.index') }}">
                            فريق العمل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('experinceActive')" href="{{ route('dashboard.experinceSlider.index') }}">
                            خبرات فريق العمل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('contactinfoActive')" href="{{ route('dashboard.contactinfo.create') }}">
                            معلومات التواصل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('aboutfieldsActive')" href="{{ route('dashboard.aboutfields.index') }}">
                            About حقول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('privacyActive')" href="{{ route('dashboard.privacy.create') }}">
                            سياسة الخصوصية
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                    <a class="nav-link @yield('workcategoriesActive')" href="{{route('dashboard.workcategories.index')}}">
                        Work Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('worksActive')" href="{{route('dashboard.works.index')}}">
                        Works
                    </a>
                </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link @yield('clientsActive')" href="{{ route('dashboard.clients.index') }}">
                            Clients
                        </a>
                    </li> --}}
                @endif
                <li class="nav-item">
                    <a class="nav-link @yield('blogcategoriesActive')" href="{{ route('dashboard.blogcategories.index') }}">
                        التصنيفات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('blogsActive')" href="{{ route('dashboard.blogs.index') }}">
                        المدونة
                    </a>
                </li>
                @if (auth()->user()->hasRole('superadministrator'))
                    <li class="nav-item">
                        <a class="nav-link @yield('blogPDFActive')" href="{{ route('dashboard.blogPDF.create') }}">
                            غلاف المدونة
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('passwordEditActive')" href="{{ route('dashboard.password.edit') }}">
                            تغيير كلمة السر
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                    <a class="nav-link @yield('customersActive')" href="{{route('dashboard.customers.index')}}">
                        Customers
                    </a>
                </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link @yield('colorActive')" href="{{ route('dashboard.color.create') }}">
                            ألوان الموقع
                        </a>
                    </li> --}}


                    {{-- <li class="nav-item">
                    <a class="nav-link @yield('smsContactActive')" href="{{route('dashboard.sms.contact.create')}}">
                        SMS Contact Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('smsServiceActive')" href="{{route('dashboard.sms.service.create')}}">
                        SMS Order Service
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('smsLaridActive')" href="{{route('dashboard.sms.larid.create')}}">
                        SMS Larid ERP
                    </a>
                </li> --}}
                @endif
            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>


    <footer class="footer">
        <span class="text-left"> &copy; {{ now()->year }} .
        </span>
    </footer>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('dashboard/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/libs/pace.min.js') }}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('dashboard/js/libs/Chart.min.js') }}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('dashboard/js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    {{-- <script src="{{ asset('dashboard/js/views/main.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/js/views/charts.js') }}"></script> --}}

    @extends('layouts._noty')
    @yield('scripts')
    @stack('scripts')
</body>

</html>
