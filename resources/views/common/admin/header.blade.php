<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-outlines">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

        <!-- CSRF Token -->
        @php
        //   dd(csrf_token());  
        @endphp

        @if(csrf_token())
            <meta name="csrf-token" content="{{ csrf_token() }}">
        @endif

        <title>{{ isset($name) ? $name : 'Akrosoft CMS'}}</title>

        <meta name="author" content=""> 
        <meta name="description" content=""> 
        <meta name="keywords" content=""> 

        <link rel="icon" href="{{ isset($logo) ? $logo : "" }}" type="image/png"> 
        <link rel="stylesheet" href="{{ asset('admin/css/css.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/fontawesome-all.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/jquery-ui.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/perfect-scrollbar.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/morris.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/jquery-jvectormap.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/horizontal-timeline.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/weather-icons.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/dropzone.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/ion.rangeSlider.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/ion.rangeSlider.skinFlat.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/datatables.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/fullcalendar.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}"> 

        <style type="text/css">
            .jqstooltip { 
            position: absolute;
            left: 0px;top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0,0,0,0.6);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
            }

            .jqsfield { 
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            }
        </style>

        <style type="text/css">
            @font-face {
            font-weight: 400;
            font-style:  normal;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-Regular.woff2') format('woff2');
            }
            @font-face {
            font-weight: 400;
            font-style:  italic;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-Italic.woff2') format('woff2');
            }

            @font-face {
            font-weight: 500;
            font-style:  normal;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-Medium.woff2') format('woff2');
            }
            @font-face {
            font-weight: 500;
            font-style:  italic;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-MediumItalic.woff2') format('woff2');
            }

            @font-face {
            font-weight: 700;
            font-style:  normal;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-Bold.woff2') format('woff2');
            }
            @font-face {
            font-weight: 700;
            font-style:  italic;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-BoldItalic.woff2') format('woff2');
            }

            @font-face {
            font-weight: 900;
            font-style:  normal;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-Black.woff2') format('woff2');
            }
            @font-face {
            font-weight: 900;
            font-style:  italic;
            font-family: 'Inter-Loom';

            src: url('https://cdn.useloom.com/assets/fonts/inter/Inter-UI-BlackItalic.woff2') format('woff2');
            }
        </style>

        <style>
            .mailing-list-item{
                display: inline;
                background: #f1f1f1; 
                border-radius: 4px;
                margin-right: 3px; 
            }
        </style>
        </head>
        <body style="">
        <div class="wrapper">
            <header class="navbar navbar-fixed"> 
            <div class="navbar--header" style="text-align: center;"> 
                <a href="#" class="logo"> 
                    <img id="client_logo" src="{{ isset($logo) ? $logo : "" }}" alt="Client Logo" style="width: 60px; height: 60px;"> 
                    <strong style="font-weight: bolder; font-size: 15px; vertical-align: bottom;">{{isset($shortName) ? $shortName : ""}}</strong>
                </a> 
                <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar"> 
                    <i class="fa fa-bars"></i> 
                </a> 
            </div>

            <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar"> 
                <i class="fa fa-bars"></i>
            </a> 

            <div class="navbar--search"> 
                <form action="#"> 
                <input type="search" name="search" class="form-control" placeholder="Search Something..." required=""> 
                <button class="btn-link"><i class="fa fa-search"></i></button> 
                </form> 
            </div>

            <div class="navbar--nav ml-auto"> 
                <ul class="nav"> 
                <li class="nav-item"> 
                    <a href="#" class="nav-link"> 
                    <i class="fa fa-bell"></i> 
                    <span class="badge text-white bg-blue">7</span> 
                    </a> 
                </li>

                <li class="nav-item"> 
                    <a href="#" class="nav-link"> 
                    <i class="fa fa-envelope"></i> 
                    <span class="badge text-white bg-blue">4</span> 
                    </a> 
                </li>

                <li class="nav-item dropdown nav-language"> 
                    <a href="#" class="nav-link" data-toggle="dropdown"> 
                    <img src="{{ asset('admin/images/flags/us.png') }}" alt=""> 
                    <span>English</span> 
                    <i class="fa fa-angle-down"></i> 
                    </a> 
                    <ul class="dropdown-menu"> 
                    <li> 
                        <a href="#"> 
                        <img src="{{ asset('admin/images/flags/de.png') }}" alt=""> 
                        <span>German</span> 
                        </a> 
                    </li>
                    <li> 
                        <a href="#"> 
                        <img src="{{ asset('admin/images/flags/fr.png') }}" alt=""> 
                        <span>French</span> 
                        </a> 
                    </li>
                    <li> 
                        <a href="#"> 
                        <img src="{{ asset('admin/images/flags/us.png') }}" alt=""> 
                        <span>English</span> 
                        </a> 
                    </li>
                    </ul> 
                </li>
                <li class="nav-item dropdown nav--user online"> 
                    <a href="#" class="nav-link" data-toggle="dropdown"> 
                        <img src="{{ auth()->user()->profile_image }}" alt="" class="rounded-circle"> 
                        <span>{{ strtoupper(auth()->user()->name) }}</span>
                        <i class="fa fa-angle-down"></i> 
                    </a> 
                    <ul class="dropdown-menu"> 
                    <li>
                        <a href="{{ route('manager.profile') }}">
                        <i class="far fa-user"></i>
                        Profile
                        </a>
                    </li>
                    <li class="dropdown-divider">
                    </li>
                    {{-- <li>
                        <a href="#">
                        <i class="fa fa-lock"></i>
                        Lock Screen
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                        Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </ul> 
                </li>
                </ul> 
            </div>
        </header> 
        