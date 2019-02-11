<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-outlines">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="author" content=""> 
        <meta name="description" content=""> 
        <meta name="keywords" content=""> 

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="{{ asset('configuration/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">
        <link rel="stylesheet" href="{{ asset('configuration/css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('configuration/css/fontawesome-all.min.css') }}"> 

		<!-- STYLE CSS -->
        <link rel="stylesheet" href="{{ asset('configuration/css/style.css') }}">
        
        <link rel="stylesheet" href="{{ asset('common/css/jquery-confirm.min.css') }}">
    
        <style>
            .summary--table{
                display: table;     
            }

            .summary--table-row{
                display: table-row;     
            }

            .summary--table-cell{
                display: table-cell;     
            }

            .bold {
                font-weight: 900;
            }

            .summary-table td{
                padding: 15px 0 0 25px;
            }

            .form-control {
                margin-bottom: 7px !important;
            }
        </style>
    </head>
	<body>
		<div class="wrapper">
            <div class="image-holder" style="width: 30%;">
                <h1 style="text-align: center;">Akrosoft CMS Configuration</h1>
            </div>
    
            <form action="" method="POST" id="akrosoft-cms-configure" style="width: 70%;">