<?php
    use App\Http\Controllers\Controller;
    $mainCategories = Controller::mainCategories();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wave of Tomorrow 2019 | Art, Techology & Music Experience AHEAD of its Time</title>
    <meta name="title" content="Wave of Tomorrow Indonesia  | Art, Techology & Music Experience AHEAD of its Time" >
    <meta name="description" content="Art, Techology & Music Experience AHEAD of its Time. 20-29 December 2019 at The Tribrata Darmawangsa, South Jakarta.">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta name="robots" content="index, follow" >
    <meta name="language" content="English" >
    <meta name="apple-mobile-web-app-capable" content="yes" >
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="keywords" content="Art, Techology, Music Experience, acara musik, acara musik desember 2019, acara musik tribata darmawangsa 2019, wot 2019, wave of tomorrow.id, wave of tomorrow, wave of tomorrow indonesia, wot indonesia, waveoftomorrow, wave of tomorrow id">
    <link href="{{ asset('apple-icon-57x57.png') }}" rel="apple-touch-icon" sizes="57x57">
    <link href="{{ asset('apple-icon-60x60.png') }}" rel="apple-touch-icon" sizes="60x60">
    <link href="{{ asset('apple-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset('apple-icon-76x76.png') }}" rel="apple-touch-icon" sizes="76x76">
    <link href="{{ asset('apple-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset('apple-icon-120x120.png') }}" rel="apple-touch-icon" sizes="120x120">
    <link href="{{ asset('apple-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">
    <link href="{{ asset('apple-icon-152x152.png') }}" rel="apple-touch-icon" sizes="152x152">
    <link href="{{ asset('apple-icon-180x180.png') }}" rel="apple-touch-icon" sizes="180x180">
    <link href="{{ asset('android-icon-192x192.png') }}" rel="icon" sizes="192x192" type="image/png">
    <link href="{{ asset('favicon-32x32.png') }}" rel="icon" sizes="32x32" type="image/png">
    <link href="{{ asset('favicon-96x96.png') }}" rel="icon" sizes="96x96" type="image/png">
    <link href="{{ asset('favicon-16x16.png') }}" rel="icon" sizes="16x16" type="image/png">
    <link href="{{ asset('manifest.json') }}" rel="manifest">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
    <link rel="stylesheet" href="{{ asset('css/addon.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="all">
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NVV6K6Q');ga('create', 'UA-145160224-1', 'auto', {userId: 'User_ID_WaveofTomorrow'});window.dataLayer=window.dataLayer||[],window.dataLayer.push({userId:'User_ID_WaveofTomorrow'});
    </script>
</head>

<body class="hidden">
    <div id="loading" class="loading active">
        <div class="loading-container">
            <div class="centeralign">
                <div class="centeralign-middle">
                    <center>
                        <div class="lds-ripple"><div></div><div></div></div>
                        <div class="load-text">Loading</div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div id="btnNav" class="btn-mobile">
        <div id="hamburger" class="navbar-collapse pull-right">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="mainNav" class="main-nav fullheight active">
        <div data-id="about" class="breadcrumbs left left-top">
            <label>ABOUT</label>
            <div class="icon icon-label-nav left-top"></div>
        </div>
        <div data-id="gallery" class="breadcrumbs left left-bottom">
            <label>GALLERY</label>
            <div class="icon icon-label-nav left-bottom"></div>
        </div>
        <div data-id="lineups" class="breadcrumbs right right-top">
            <label>LINE UP</label>
            <div class="icon icon-label-nav right-top"></div>
        </div>
        @foreach($mainCategories as $category)
        <div data-id="{{ $category->slug }}" class="breadcrumbs right right-bottom {{ $category->class_add }}" >
            <label class="{{ $category->content }}">{{ $category->title }}</label>
            <div class="icon icon-label-nav right-bottom"></div>
        </div>
        @endforeach
    </div>
    <div data-scroll class="main">
        @yield('content')
    </div>
     <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVV6K6Q" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mix.js') }}"></script>
</body>
</html>