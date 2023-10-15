<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="subject" content="e-survey Badan Litbang dan Diklat - Kementerian Agama">
        <meta name="description" content="e-survey Badan Litbang dan Diklat - Kementerian Agama">
        <meta name="keywords" content="esurvey,esurvey kemenag, e-survey, e-survey kemenag,kemenag, kementerian agama, puslitbang balk, kerukunan umat beragama, moderasi beragama">
        <meta name="author" content="Puslitbang BALK <puslitbangbimasagama@kemenag.go.id>">

        <meta property="og:title" content="e-survey Badan Litbang dan Diklat - Kementerian Agama"/>
        <meta property="og:site_name" content="e-survey Badan Litbang dan Diklat - Kementerian Agama"/>
        <meta property="og:description" content="e-survey Badan Litbang dan Diklat - Kementerian Agama"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="{{route('home')}}"/>
        <meta property="og:image" content="{{ asset('favicon.png') }}"/>
{{--        <script src="https://cdn.tailwindcss.com"></script>--}}
        <!--Font-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>@yield('title')</title>
        <link href="{{asset('favicon.png')}}" rel="icon" type="image/png">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white">
        <!-- Navbar -->
        <x-home.navbar />
        @yield('content')
        <!-- Footer -->
        <x-home.footer />
        @vite('resources/js/app.js')
    </body>
</html>
