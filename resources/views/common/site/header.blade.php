<!DOCTYPE html>
<html lang="en">
	
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
@if($template_setting->value == 2)
{{--
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
--}}
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/canvas/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/canvas/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/canvas/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/canvas/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/canvas/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/canvas/css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('site/canvas/css/responsive.css') }}" type="text/css" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1" /> --}}

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('site/canvas/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('site/canvas/js/plugins.js') }}"></script>
{{--
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
--}}
@elseif($template_setting->value == 1)
{{--
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
--}}

<!-- CSS -->
    <link href="{{ asset('site/mono/assets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/mono/assets/plugins/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/mono/assets/plugins/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/mono/assets/plugins/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/mono/assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/mono/assets/css/splash.min.css') }}" rel="stylesheet">
    <!-- Fonts/Icons -->
    <link href="{{ asset('site/mono/assets/plugins/font-awesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('site/mono/assets/plugins/themify/themify-icons.min.css') }}" rel="stylesheet">

{{--
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
--}}
@endif
		
    <link href="{{$logo}}" rel="shortcut icon" type="image/png">   
    <title>{{$name}}</title>
</head>





