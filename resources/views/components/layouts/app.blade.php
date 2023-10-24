<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="subject" content="e-survey Badan Litbang dan Diklat - Kementerian Agama">
        <meta name="description" content="e-survey Badan Litbang dan Diklat - Kementerian Agama">
        <meta name="keywords" content="esurvey,esurvey kemenag, e-survey, e-survey kemenag,kemenag, kementerian agama, puslitbang balk, kerukunan umat beragama, moderasi beragama">
        <meta name="author" content="Puslitbang BALK <puslitbangbimasagama@kemenag.go.id>">

        @yield('metadata')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>{{ config('app.name') }}</title>
        <link href="{{asset('favicon.png')}}" rel="icon" type="image/png">

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        @filamentStyles
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        {{ $slot }}
        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
