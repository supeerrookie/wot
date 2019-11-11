@extends('layouts.main-layout')
@section('content')
<div id="main-inside" class="main-inside fullheight active">
    <div id="gallery" class="overlay active">
        <div class="bgimg bg-fixed bg-desktop bg-animate-slide opacity-85 bg-gallery"></div>
        <div class="bgimg bg-fixed bg-mobile bg-animate-slide opacity-85 bg-gallery-mobile parallax"></div>
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
        <div class="content px-sm-0 px-md-5">
            <div class="container">
             
                <div class="col-md-5 mx-auto mb-3">
                    <div class="text-center">
                        <div class="main-title col-6 col-sm-6 col-md-4 mx-auto my-4">
                            <div class="bgimg contain bg-batik batik-position fadeInLeftMini animated delay-1s"></div>
                            <h1 class="my-3 fadeInRightMini animated delay-1s bold">GALLERY</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto my-4">
                    <p class="mb-2 text-center">See it here if you missed the fun of Wave of Tomorrow.</p>
                </div>
                
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="col-8 col-sm-8 col-md-6 mx-auto">
                        @foreach($exprev as $ex)
                        <ul id="exPrev" class="{{ $ex->class_add }} my-3">
                            @foreach($exclusive as $galyz)
                            <li>
                                <a rel="{{ $galyz->year }}" href="{{asset('uploads/'.$galyz->image) }}" class="">
                                     <img src="{{asset('uploads/'.substr_replace( $galyz->image , '-medium' , strrpos($galyz->image, '.'), 0 )) }}" alt-text="{{$galyz->title}}" class="img-fluid lazy border-grey" data-src="{{asset('uploads/'.substr_replace( $galyz->image , '-medium' , strrpos($galyz->image, '.'), 0 )) }}">
                                        <script>
                                            dataLayer.push({'event': 'gallery', 'event_category': '/gallery',
                                                'event_action': 'Gallery', 'event_label': '{{ $galyz->title }}'
                                            });
                                        </script>
                                </a>
                                <div class="card text-black p-2 text-left">
                                    <h3>{{ $galyz->title }}</h3>
                                    <p>Magna laborum in velit.</p>
                                </div>
                            </li>  ​
                            @endforeach
                        </ul>
                        @endforeach
                    </div>
                    <div class="col-md-12 mt-4">
                        <div id="gallery-list" class="row no-gutters">
                            @foreach($galy as $galyz)
                            <a data-fancybox="{{$galyz->year}}" href="{{asset('uploads/'.$galyz->image) }}" class="col-6 col-md-4 p-2">
                                 <img src="{{asset('uploads/'.substr_replace( $galyz->image , '-large' , strrpos($galyz->image, '.'), 0 )) }}" alt-text="{{$galyz->title}}" class="img-fluid lazy border-grey" data-src="{{asset('uploads/'.substr_replace( $galyz->image , '-large' , strrpos($galyz->image, '.'), 0 )) }}">
                                 <script>
                                    dataLayer.push({'event': 'gallery', 'event_category': '/gallery',
                                        'event_action': 'Gallery', 'event_label': '{{ $galyz->title }}'
                                    });
                                </script>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
        <div id="floatTicket" class="fixed-bottom opacity-0">
            <div class="col-8 col-md-3 float-right">
                <a id="btn-ticket-float" class="top-min-20">
                    <img class="img-fluid btn-img" src="{{ asset('./uploads/images/ticket/secure-ticket-shadow.png') }}">
                </a>
            </div>
        </div>                 
    </div>
</div>
@endsection