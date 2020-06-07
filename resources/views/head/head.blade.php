<!--
=========================================================
* BLK Design System- v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/blk-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

{{--        Cannonical Link--}}
        <link rel="canonical" href="http://travel.bogordev.online" />
{{--        Social Tags--}}
        <meta name="keywords" content="TAGSHERE">
        <meta name="description" content="DESCRIPTION HERE">

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Basmallah Tour">
        <meta itemprop="description" content="Description HERE">

        <title>{{ config('app.name', 'Basmallah Tour and Travel') }}</title>

        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="{{asset('blk/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{ asset('img/fav.png') }}" rel="icon" type="image/png">
        <link href="{{ asset('icons/all.css') }}" rel="stylesheet">
        <!-- CSS Files -->
        <link href="{{asset('blk/assets/css/blk-design-system.css?v=1.0.0')}}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{asset('css/owl/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl/owl.theme.default.min.css')}}">
    </head>
    <body class="{{ $class ?? '' }}">
    <main>
        @yield('content')
    </main>
    </body>
</html>

