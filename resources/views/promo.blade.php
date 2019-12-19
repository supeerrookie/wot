@extends('layouts.main-layout')
@section('content')
<div id="promo" class="wrapper">
    <div class="bgimg bg-fixed bg-desktop bg-animate-slide opacity-85 bg-promo active"></div>
    <div class="bgimg bg-fixed bg-mobile bg-animate-slide opacity-85 bg-promo-mobile parallax"></div>
    <div class="">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-3 col-md-4 mx-auto">
                    <div class="logo promo my-sm-1">
                        <img class="img-fluid" src="{{ asset('./uploads/images/logo-black.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content px-sm-0 px-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <p class="text-center bold">21 - 29 December 2019<p>
                    <p class="text-center bold">The Tribrata<p>
                </div>
            </div>
            <div class="row mt-2">
               <div class="col-sm-12 col-md-6 mx-auto">
                    <video preload='none' id='videoPromo' class='video-js bg-video vjs-default-skin vjs-big-play-centered box-shadow' controls width='50%' height='50%' poster="{{ asset('uploads/video/intro.jpg') }}" data-setup='{"fluid": true}' playsinline>
                        <source src="{{ asset('uploads/video/promo.mp4') }}" type='video/mp4'>
                        <source src="{{ asset('uploads/video/promo.webm') }}" type='video/webm'>
                        <p class='vjs-no-js'>
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                        </p>
                    </video>
                    <div id="video-promo-title" class="overlay active">
                        <div class="centeralign">
                            <div class="centeralign-bottom">
                                <div class="main-title ">
                                    <h1 class="bold video-promo-big">PLAY ME</h1>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="col-sm-12 col-md-9 mx-auto my-3">
                    <div class="main-title mb-3">
                       <h1 class="text-title text-center bold">WATCH THE<br />WHOLE VIDEO TO GET A<br/>SPECIAL <span class="bold underline-red">PRICE FOR 2 TICKETS</span></h1>
                    </div>
                    <div class="col-sm-12 col-md-8 mx-auto">
                        <p class="text-center">Syarat & Ketentuan : </p>
                        <ul>
                            <li><p class="text-center">* Promo ini hanya berlaku untuk 2 orang</p></li>
                            <li><p class="text-center">* Masing - masing harus berusia 18+ dan wajib membawa KTP</p></li>
                        </ul>
                    </div>
               </div>
            </div>
            <div id="detectDevices"></div>
        </div>
    </div>
</div>
<div id="popupQrcode" class="popup">
    <div class="popup-container">
        <div class="popup-content opacity-0 bg-qrcode desktop">
            <div class="popup-close"><div class="close"></div></div>
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="col-sm-4 col-md-5 mx-auto">
                            <div class="logo promo my-sm-1">
                                <img id="" class="img-fluid" src="{{ asset('./uploads/images/logo-black.png') }}">
                            </div>
                            <div class="my-3">
                                <p class="text-center bold">21 - 29 December 2019</p>
                                <p class="text-center bold">The Tribrata</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <img class="img-fluid" src="{{ asset('./uploads/images/icon/icn-qrcode-say.png') }}">
                            </div>
                            <div class="col-md-12">
                                <div class="bg-behind-qrcode">
                                    <canvas id="qrcode_canvas"></canvas>        
                                    <div id="codeShow"><h3 class="text-title text-center"></h3></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-12 mx-md-2 my-3">
                            <p class="mb-3 text-center">Catat atau simpan kode ini untuk ditukarkan dengan dua tiket seharga Rp 120.000*</p>
                            <div class="main-title block-black redeem mb-3">
                                <h5 class="">HOW TO<br />REDEEM YOUR CODE</h5>
                            </div>
                            <ul class="my-md-2">
                                <li class="my-2"><p>* Bawa kode ini ke ticket booth Wave Of Tomorrow</p></li>
                                <li class="my-2"><p>* Program ini berlaku hanya untuk 2 orang saja, tidak berlaku kelipatan</p></li>
                                <li class="my-2"><p>* Masing - masing harus berusia 18+ dan wajib membawa KTP</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection