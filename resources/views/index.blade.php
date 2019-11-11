@extends('layouts.main-layout')
@section('content')
<?php  setcookie("wot2019_BoxCookies", "xLnK79L9uiEn1cVmxjDG" , time() + (365 * 10), "/");  ?>
<div id="homepage" class="overlay active">
    <div class="bgimg lazy bg-fixed bg-desktop opacity-85 bg-homepageVideo bg-animate-homepage parallax"></div>
    <div class="bgimg lazy bg-fixed bg-mobile opacity-85 bg-homepageVideo-mobile bg-animate-homepage parallax"></div>
    <div class="header homepage">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-3 col-md-4">
                    <div class="logo my-sm-1">
                        <img id="logoHome" class="img-fluid" src="{{ asset('./uploads/images/logo-black.png') }}">
                        <img id="logoHome2" class="img-fluid" src="{{ asset('./uploads/images/logo-flat-black.png') }}" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="homepageVideo" class="section margin-top-30">     
        <div class="container">
            <div class="row no-gutters my-sm-1 my-md-0">
                <div class="col-sm-12 col-md-6 mt-sm-0 mt-md-0">
                    <video preload='none' id='videoTeaserHomepage' class='video-js bg-video vjs-default-skin vjs-big-play-centered box-shadow' controls width='100%' height='100%' poster="{{ asset('uploads/video/intro.jpg') }}" data-setup='{"fluid": true}'>
                        <source src="{{ asset('uploads/video/teaser.mp4') }}" type='video/mp4'>
                        <source src="{{ asset('uploads/video/teaser.webm') }}" type='video/webm'>
                        <p class='vjs-no-js'>
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                        </p>
                    </video>
                </div>
                <div class="col-sm-12 col-md-6 mt-sm-0 mt-md-0 text">
                    <div class="main-title px-sm-0 px-md-3">
                        <h1 class="mb-sm-1 mb-md-0 specials-left">
                            ART, TECHNOLOGY & MUSIC EXPERIENCE <span class="red">AHEAD</span> OF ITS TIME
                        </h1>
                        <div class="text-white">
                            <ul class="row no-gutters my-sm-2 my-md-4">
                                <li class="col-12 col-md-12 mb-2">
                                    <div class="row no-gutters">
                                        <p class="col-1 col-md-1">Date</p>
                                        <svg class="col-2 col-xs-2 col-md-3 mx-auto red-line" height="3" width="150">
                                            <line x1="0" y1="0" x2="100%" y2="0" style="stroke:#F90A08;stroke-width:4;" />
                                        </svg>
                                        <p class="col-7 col-md-7 bold">20-29 DECEMBER 2019</p>
                                    </div>
                                </li>
                                <li class="col-12 col-md-12 ">
                                    <div class="row no-gutters">
                                        <p class="col-1 col-md-1">Place</p>
                                        <svg class="col-2 col-xs-2 col-md-3 mx-auto red-line" height="3" width="150">
                                            <line x1="0" y1="0" x2="100%" y2="0" style="stroke:#F90A08;stroke-width:4;" />
                                        </svg>
                                        <p class="col-7 col-md-7 bold">The Tribrata, Darmawangsa, South Jakarta</p>
                                    </div>
                                </li>
                            </ul>
                            <p class="my-sm-2 my-md-4">
                                Wave of Tomorrow is an art, technology & music experiece <span class="red span">ahead</span> of its time. Re-imagine the future with us for you to discover.
                            </p>
                        </div>
                    </div>
                    <div class="col-9 col-xs-10 col-sm-9 col-md-8">
                        <a id="btn-ticket" class="btn">
                            <img class="img-fluid btn-img" src="{{ asset('./uploads/images/ticket/secure-ticket-shadow.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <div id="homepageLineUp" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="main-title">
                        <h1 class="specials-left bold">
                            LINE UP
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                @foreach($lineup as $lineups)
                <a href="artist-detail/{{ $lineups->slug }}" class="col-6 col-sm-6 col-md-4 fullheight x-45 item-boxgrid mx-auto">
                    <div class="bgimg small-padds border-grey lazy" style="background-image:url('{{asset('uploads/'.substr_replace( $lineups->image , '-large' , strrpos($lineups->image, '.'), 0 )) }} ');" >
                        <div class="overlay soft">
                            <div class="centeralign">
                                <div class="centeralign-bottom">
                                    <h3 class="title-lineup p-3">{{ $lineups->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4 mx-auto mb-md-3">
                <a id="btn-see-more" data-id="lineups" class="btn btn-transparent btn-lg btn-block text-center" >SEE MORE</a>
            </div>
        </div>
    </div>
    <div id="homepageTicket" class="section">
        <div class="container">
            <div class="main-title">
                <h1 id="mark" class="specials-left bold">TICKET</h1>
            </div>
            <div class="row">
                @foreach($ticket as $tix)
                <div id="img-ticket" class="col-6 col-md-3 fullheight halfheight mb-sm-1">
                    <a target="_blank" href="{{$tix->url}}" id="{{$tix->slug}}" class="btn btn-ticket" rel="noopener noreferrer">
                        <div class="bgimg left contain btn-img btn-ticket-block" style="background-image:url({{ asset('./uploads/'.$tix->image) }})">
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-md-12 my-3">
                    <p class="text-left text-white mb-2">*All ticket purchase will go through official ticket sales partner</p>
                    <p class="text-left text-white">*VIP ticket valid for 10 days re-entry & more surprises</p>
                </div>
            </div>
        </div>
    </div>
    <div id="homepageGal2018" class="section">
        <div class="container">
            <div class="main-title">
                <h1>WAVE OF TOMORROW GALLERY</h1>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div id="gallery-list" class="row no-gutters">
                        @foreach($gals as $galz)
                        <a data-fancybox="{{$galz->year}}" href="{{asset('uploads/'.$galz->image) }}" class="col-6 col-md-4 lazy">
                            <img src="{{asset('uploads/'.substr_replace( $galz->image , '-large' , strrpos($galz->image, '.'), 0 )) }}" alt-text="{{$galz->title}}" class="img-fluid lazy border-grey" data-src="{{asset('uploads/'.substr_replace( $galz->image , '-large' , strrpos($galz->image, '.'), 0 )) }}">
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 mx-auto mb-md-3">
                    <a id="btn-gallery" data-id="gallery" class="btn btn-transparent btn-lg btn-block text-center" >SEE MORE</a>
                </div>
            </div>
        </div>
    </div>
    <div id="partners" class="section">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-8 col-md-6 mx-auto">
                    <ul class="partners">
                        <li><p>OFFICIAL TICKETING PARTNER:</p></li>
                        <li><a target="_blank" href="https://kiostix.com/id/event/731/wave-of-tomorrow"><img class="img-fluid" src="{{ asset('./uploads/images/icon/icn-kiostix.png') }}"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>
@if(!isset($_COOKIE['wot2019_BoxCookies']))
<div class="js-cookie-consent cookie-consent">
    <span class="cookie-consent__message">
        We use cookies to provide the best experience.<br>By accessing this site, you have agreed to our <a href="https://www.pmi.com/legal/cookie-notice" target="_blank"> use of cookies </a>
    </span>
    <button class="js-cookie-consent-agree cookie-consent__agree">
        GOT IT
    </button>
</div>
@endif
@endsection