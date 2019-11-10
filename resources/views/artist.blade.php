@extends('layouts.main-layout')
@section('content')
<div class="bgimg bg-fixed bg-desktop bg-animate-slide opacity-85 bg-artist-detail"></div>
<div class="bgimg bg-fixed bg-mobile bg-animate-slide opacity-85 bg-artist-detail-mobile parallax"></div>
<div id="artistDetail" class="wrapper">
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
    <div class="container">
        <div class=" bgimg overlay-img fullheight x-3 margin-top-30 specials-top" style="background-image: url('{{asset('uploads/'.$dets->image) }} ')"></div>
        <div class="row no-gutters my-md-5">
            <div class="col-sm-12 col-md-8">
                <h2 class="mt-2 bold">{{ $dets->name }}</h2>
                <h5 class="font-color-grey">{{ $dets->installation_name }}</h5>
            </div>
            <div class="col-5 col-sm-12 col-md-4 mt-md-3">
                <div class="text-white text-right date-perform">
                    <ul class="my-sm-2 my-md-0">
                        @forelse($getSchedule as $get)
                        <li class="mb-2 font-color-red">
                            {{ date('d F Y', strtotime($get->dateperform)) }}
                        </li>
                        <li class="">
                            {{ date('H:i', strtotime($get->timeperform)) }}
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-8">
                        <div class="mb-2 detail-bio justify">{!! $dets->bio !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="row no-gutters">
                    <div class="mb-2 detail-bio justify">{!! $dets->detail !!}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="container">
            <div class="col-md-12 mb-2">
                <div class="row">
                    @foreach($detImages as $img)
                    <div class="col-12 col-sm-12 col-md-12 fullheight x-3 item-boxgrid">
                        <div class="bgimg" style="background-image: url('{{asset('uploads/'.$img->media) }} ')">
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <div class="row no-gutters my-sm-2 my-md-3">
                <div class="col-md-12">
                   {!! $dets->description !!}
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-8 col-sm-8 col-md-4">
                    <a id="btn-ticket" class="btn" href='../#homepageTicket'>
                        <img class="img-fluid btn-img" src="{{ asset('./uploads/images/ticket/secure-ticket-shadow.png') }}">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="slugger" class="col-md-4 my-2">
                <div class="main-title ">
                    <h2 class="my-3">More</h2>
                </div>
            </div>
        </div>
        <div class="row no-gutters item-slick-lineups mb-3 px-sm-0">
            @foreach($stage as $lineups)
            <a href="{{ $lineups->slug }}" class="col-6 col-sm-6 col-md-4 fullheight thirdheight item-boxgrid">
                <div class="bgimg small-padds border-grey" style="background-image: url('{{asset('uploads/'.substr_replace( $lineups->image , '-medium' , strrpos($lineups->image, '.'), 0 )) }} ')" >
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
    </div>
    @include('footer')
</div>

@endsection