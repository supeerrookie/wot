@extends('layouts.main-layout')
@section('content')
<div id="main-inside" class="main-inside fullheight active">
    <div class="bgimg bg-fixed bg-desktop bg-animate-slide bg-about opacity-85"></div>
    <div class="bgimg bg-fixed bg-mobile bg-animate-slide bg-about-mobile opacity-85 parallax"></div>
    <div id="about" class="main-slider overlay active">
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
        <div class="container mt-sm-3 mt-md-5">
            <div class="content px-sm-0 px-md-0">
                <div class="row">
                    <div class="col-sm-12 col-md-10 my-sm-2 mb-md-3 mx-auto">
                        <div class="text-center">
                            <div class="main-title col-4 col-md-2 mx-auto my-4">
                                <div class="bgimg contain bg-batik batik-position fadeInLeftMini animated delay-1s"></div>
                                <h1 class="my-3 fadeInRightMini animated delay-1s bold">ABOUT</h1>
                            </div>
                            <p class="mb-3 text-center">It's a changing world we live in, but our transformation & adaptability is our key to unlock myraid of possibilities. Wave of Tomorrow is a unison of art, technology & music experience ahead of is time. Tomorrow won't exist without today and we're here to re-imagine the future for you.</p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row text-white mb-3">
                                    <ul class="my-2">
                                        <li class="col-12 col-md-12 mb-2">
                                            <div class="row no-gutters">
                                                <p class="col-1 col-md-1">Date</p>
                                                <svg class="col-3 col-md-3 mx-auto red-line" height="3" width="150">
                                                    <line x1="0" y1="0" x2="100%" y2="0" style="stroke:#F90A08;stroke-width:4;" />
                                                </svg>
                                                <p class="col-7 col-md-7 bold">20-29 DECEMBER 2019</p>
                                            </div>
                                        </li>
                                        <li class="col-12 col-md-12 ">
                                            <div class="row no-gutters">
                                                <p class="col-1 col-md-1">Place</p>
                                                <svg class="col-3 col-md-3 mx-auto red-line" height="3" width="150">
                                                    <line x1="0" y1="0" x2="100%" y2="0" style="stroke:#F90A08;stroke-width:4;" />
                                                </svg>
                                                <p class="col-7 col-md-7 bold">The Tribrata<br>Jl. Darmawangsa III No.2, Pulo, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-8 no-padding booklet">
                                    @foreach($content as $tix)
                                     <a target="_blank" href="{{$tix->url}}" id="{{$tix->slug}}" class="btn btn-ticket {{$tix->class_add}}" rel="noopener">
                                        <img class="img-fluid" src="{{ asset('./uploads/'.$tix->image) }}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="gmap_canvas box-shadow" style="width: 100%; height: 100%; display: block;">
                                    <iframe id="gmaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0761317735646!2d106.79726431476928!3d-6.253699995473358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1182c9c42df%3A0x15973de4b1c09abd!2sThe%20Tribrata!5e0!3m2!1sen!2sid!4v1567328976184!5m2!1sen!2sid" width="100%" height="180px" frameborder="0" style="border:0;" allowfullscreen=""> 
                                    </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 mt-3">
                        <div class="row">
                            @foreach($kurator as $kurs)
                            <div id="img-curator" class="img-content col-sm-6 col-md-5 fullheight thirdheight mt-3">
                                <div class="bgimg pd-15 box-shadow" style="background-image:url({{asset('uploads/'.$kurs->image) }}); background-position: top;">
                                </div>
                            </div>
                            <div id="text-curator" class="d-none d-sm-none d-md-block d-lg-block col-md-7">
                                <div class="row">
                                    <div id="title-curator" class="col-sm-6 col-md-12 text-white my-3">
                                        <h2 class="mt-3">{{ $kurs->name }}</h2>
                                        <p class="uppercase font-color-grey">{{ $kurs->lineups_type }}</p>
                                    </div>
                                    <div class="col-md-12 text-white">
                                        <div class="mt-3 justify">{!! $kurs->bio !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div id="text-curator" class="d-sm-block d-md-none d-lg-none d-flex">
                                <div class="row no-gutters align-items-end">
                                    <div id="title-curator" class="col-sm-6 text-white align-text-bottom">
                                        <h2>{{ $kurs->name }}</h2>
                                        <p class="uppercase font-color-grey">{{ $kurs->lineups_type }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 plain">
                                <div class="d-sm-block d-md-none d-lg-none text-white">
                                    <div class="mt-4 justify">{!! $kurs->bio !!}</div>
                                </div>
                                <div class="text-white my-3">
                                    <div class="my-3 justify">{!! $kurs->description !!}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-10">
                        <div class="text-left my-3">
                            <h1>FAQS</h1>
                        </div>
                        
                        <div class="accordion text-white" id="faq">
                            @foreach($faq as $faqs)
                            <div class="card">
                                <div class="card-header" id="{{ $faqs->id }}" data-toggle="collapse" data-target="#colapse{{ $faqs->id }}" aria-expanded="true" aria-controls="{{ $faqs->id }}">
                                    <h6 class="mb-0 faq-head" >
                                        <i class="icon-plus"></i> {{ $faqs->title }} 
                                    </h6>
                                    <img class="icon icon-mini float-right" src="{{ asset('./uploads/images/icon/icn-down.png') }}">
                                </div>
                                <div id="colapse{{ $faqs->id }}" class="collapse" aria-labelledby="{{ $faqs->id }}" data-parent="#faq">
                                    <div class="card-body">
                                       {!! $faqs->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="partners" class="section">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-md-12 mx-auto">
                            <ul class="partners">
                                <li>
                                    <p>WAVE OF TOMORROW<br/>ORGANIZER</p>
                                    <a><img class="img-fluid" src="{{ asset('./uploads/images/icon/icn-level-7.png') }}"></a>
                                </li>
                                <li>
                                    <p>WAVE OF TOMORROW<br/>OFFICIAL TICKETING PARTNER</p>
                                    <a><img class="img-fluid" src="{{ asset('./uploads/images/icon/icn-kiostix.png') }}"></a>
                                </li>
                                <li>
                                    <p>WAVE OF TOMORROW<br/>OFFICIAL PROJECTION PARTNER</p>
                                    <a><img class="img-fluid" src="{{ asset('./uploads/images/icon/icn-epson.png') }}"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')    
</div>
@endsection