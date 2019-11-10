@extends('layouts.main-layout')
@section('content')

<div id="main-inside" class="main-inside fullheight active">
    <div id="notFound" class="overlay active">
    	<div class="centeralign">
            <div class="centeralign-middle">
                <div class="container">
                	<div class="col-10 mx-auto">
                		<div class="row">
                			<div class="col-6 my-auto" style="border-right: 2px solid #FFFFFF" >
			                	<div class="text-white text-404 text-right my-auto">
			                		<h1 class="red" style="">404</h1>
			                	</div>
			                </div>
			                <div class="col-6 my-auto">
			                	<img class="img-404 img-fluid" src="{{ asset('./uploads/images/logo-flat-black.png') }}" style="">
			                	<h4>We Couldn't Find This Page</h4>
			                </div>
		                </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
