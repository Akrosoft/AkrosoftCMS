<!DOCTYPE html>
<!-- saved from url=(0049)http://themelooks.net/demo/dadmin/html/login.html -->
<html dir="ltr" lang="en" class="no-outlines">
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
				left: 0px;
				top: 0px;
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
	</head>

<body style=""> 