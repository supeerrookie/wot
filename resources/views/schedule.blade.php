@extends('layouts.main-layout')
@section('content')
<div id="main-inside" class="main-inside fullheight active">
    <div id="schedule" class="overlay active">
        <div class="bgimg bg-desktop opacity-85 bg-animate-slide bg-schedule"></div>
        <div class="bgimg bg-mobile opacity-85 bg-animate-slide bg-schedule-mobile"></div>
        <div id="headerChild" class="header">
           <div class="container">
                <div class="row no-gutters">
                    <div class="col-sm-3 col-md-4">
                        <div class="logo my-sm-1 my-md-3">
                            <img id="logoHome" class="img-fluid" src="{{ asset('./uploads/images/logo-black.png') }}">
                            <img id="logoHome2" class="img-fluid" src="{{ asset('./uploads/images/logo-flat-black.png') }}" style="display: none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content px-sm-0 px-md-5">
            <div class="container mt-8">
                <div class="main-title col-md-12 my-2">
                    <div class="col-6 col-sm-6 col-md-5 mx-auto mb-3">
                        <div class="text-center">
                            <div class="main-title col-sm-2 col-md-4 mx-auto my-4">
                                <div class="bgimg contain bg-batik batik-position fadeInLeftMini animated delay-1s"></div>
                                <h1 class="my-3 fadeInRightMini animated delay-1s">SCHEDULE</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto my-4">
                        <p class="mb-2 text-center">20-29 DECEMBER 2019</p>
                    </div>
                    <div class="col-md-4 mx-auto my-4">
                        <ul id="artSche" class='nav-lineups d-flex '>
                            @foreach($list as $li)
                            <li data-id="{{ $li->slug }}" class="btn btn-lineup btn-transparent d-flex justify-content-center {{ $li->class_add }}" >{{ $li->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="schedule-wrapper" class="">
                            <ul id="schedule-container" class=""></ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-3">
                        @foreach($btn as $button)
                        <a href="{{ $button->url }}" id="btn-download" class="col-4 col-sm-4 col-md-2 btn btn-red px-2" download="schedule">{{ $button->title }} <img class="icon icon-btn icon-download" src="{{asset('uploads/images/icon/icn-right-top.png') }}" height="15" width="15"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('footer')  
    </div>
</div>
@endsection