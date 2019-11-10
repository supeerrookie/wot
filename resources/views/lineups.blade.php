@extends('layouts.main-layout')
@section('content')
<div id="main-inside" class="main-inside fullheight active">
    <div id="lineups" class="main-slider overlay active">
        <div class="bgimg bg-fixed bg-desktop bg-animate-slide opacity-85 bg-lineups"></div>
        <div class="bgimg bg-fixed bg-mobile bg-animate-slide opacity-85 bg-lineups-mobile parallax"></div>
        <div id="headerChild" class="header">
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
        <div class="container mt-8">
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="col-md-5 mx-auto mb-2">
                        <div class="text-center">
                            <div class="main-title col-5 col-sm-2 col-md-5 mx-auto my-4">
                                <div class="bgimg contain bg-batik batik-position fadeInLeftMini animated delay-1s"></div>
                                <h1 class="my-3 fadeInRightMini animated delay-1s specials-center bold">LINE UPS</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mx-auto my-2">
                        <div class="col-md-12">
                            <ul id="navLineups" class='nav-lineups d-flex '>
                                @foreach($list as $li)
                                 <li data-id="{{ $li->slug }}" class="btn btn-lineup btn-transparent load d-flex justify-content-center {{ $li->class_add }}" >{{ $li->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tagline">
                            <p data-id="sight" class="mt-sm-2 mt-md-5 mb-2 text-center">Immersive work of art and technology, made to entice your senses and mind. </p>
                            <p data-id="show" class="mt-sm-2 mt-md-5 mb-2 text-center d-none">Performance that marries music with immersive installation to be experienced with all your senses.</p>
                            <p data-id="talk" class="mt-sm-2 mt-md-5 mb-2 text-center d-none">Insightful discussion about the future trend of art & technology with prominent figures in the industry.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content col-12">
            <div class="container">
                <div class="row no-gutters px-sm-0">
                </div>
            </div>
        </div>
        
        <div id="floatTicket" class="fixed-bottom opacity-0">
            <div class="col-8 col-md-3 float-right">
                <a id="btn-ticket-float" class="top-min-20">
                    <img class="img-fluid btn-img" src="{{ asset('./uploads/images/ticket/secure-ticket-shadow.png') }}">
                </a>
            </div>
        </div>
        @include('footer')     
    </div>
</div>

@endsection