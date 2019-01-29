<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if(csrf_token())
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('admin/css/fontawesome-all.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('admin/css/jquery-ui.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('common/css/jquery-confirm.min.css') }}"> 

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('site/css/clean-blog.min.css') }}">

    <title>{{ isset($page_title) ? $page_title : "Page Title has not been set!"}}</title>

    <style>
        body {
            width: 100% !important;
            height: 100vh !important;
            overflow-y: hidden !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        footer {
            width: 100%;
            background: rgba(0, 0, 0, 0.9);
        }

        main {
            width: 100%; 
            height: calc(100vh - 218px) !important;
            background: rgba(0, 0, 0, 0.9);
        }

        #page-content-container {
            width: 100%;
            height: 100%;
            overflow-y: scroll !important;
        }
    </style>
</head>
<body>
    @yield('content')

    {{-- SCRIPT SECTION GOES HERE --}}
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script> 
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script> 
    <script src="{{ asset('admin/js/all.js') }}"></script> 
    <script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script> 
    <script src="{{ asset('common/js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('common/js/variables.js') }}"></script> 
    <script src="{{ asset('common/js/helpers.js') }}"></script> 
    <script src="{{ asset('common/js/functions.js') }}"></script>
</body>
</html>