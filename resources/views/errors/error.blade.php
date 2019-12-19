@extends('layouts.main-layout')
@section('content')

<div id="main-inside" class="main-inside fullheight active">
    <div class="bgimg bg-fixed bg-desktop bg-animate-slide opacity-85 bg-promo active"></div>
    <div class="bgimg bg-fixed bg-mobile bg-animate-slide opacity-85 bg-promo-mobile parallax"></div>
    <div id="errorPromo" class="overlay active">
        <div class="">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-sm-3 col-md-4 mx-auto">
                        <div class="logo promo my-sm-1">
                            <img class="img-fluid" src="{{ asset('./uploads/images/logo-black.png') }}">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-4 mx-auto">
                        <p class="text-center bold">21 - 29 December 2019<p>
                        <p class="text-center bold">The Tribrata<p>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container flexbox-container">
    		<div class="col-8 mx-auto">
            	<div class="text-white text-404 text-center my-auto">
            		<h1 style="">Stock reward telah habis,<br />yuk coba kesempatan lo lagi besok!</h1>
            	</div>
            </div>
        </div>
           
    </div>
</div>
@endsection
