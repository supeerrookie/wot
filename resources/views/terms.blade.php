@extends('layouts.main-layout')
@section('content')
<div class="bgimg bg-fixed bg-desktop bg-animate-slide opacity-85 bg-schedule"></div>
<div class="bgimg bg-fixed bg-mobile bg-animate-slide opacity-85 bg-schedule-mobile parallax"></div>
<div id="terms" class="wrapper">
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
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach($terms as $term)
                    {!! $term->content !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>

@endsection