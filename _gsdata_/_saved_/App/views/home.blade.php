@extends('layout')
@section('content')
<div id="banner-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#banner-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#banner-carousel" data-slide-to="1"></li>
        <li data-target="#banner-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active" style="background-image:url('{{URL::asset('img/banner/banner1.jpg');}}');">
        </div>
        <div class="item" style="background-image:url('{{URL::asset('img/banner/banner2.jpg');}}');">
        </div>
        <div class="item" style="background-image:url('{{URL::asset('img/banner/banner3.jpg');}}');">
        </div>
    </div>
    <div id="banner-text">
        <img src="{{URL::asset('img/banner/gcn.png');}}" id="banner-gcn">
        <div id="banner-text-group">
            <h1 class="text-item active">{{Lang::get('content.home.banner.0');}}</h1>
            <h1 class="text-item">{{Lang::get('content.home.banner.1');}}</h1>
            <h1 class="text-item">{{Lang::get('content.home.banner.2');}}</h1>
        </div>
        <div id="banner-white-bar"></div>
        <div><a href="{{PageController::getUrlPath($lang, 'signup');}}" id="banner-signup" class="display-btn"> {{Lang::get('content.home.signupnow');}}</a></div>
    </div>
    <a class="left carousel-control" href="#banner-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#banner-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<div class="container">
    <h1 class="text-center" style="margin-top:50px;">{{Lang::get('content.home.howitworks');}}</h1>
    <div class="row">
        <div class="col-sm-3 how-it-works">
            <img src="{{URL::asset('img/home/bubbles/keyboard.png');}}">
            <div class="step">1. {{Lang::get('content.home.steps.0');}}</div>
        </div>
        <div class="col-sm-3 how-it-works">
            <img src="{{URL::asset('img/home/bubbles/hiking.png');}}">
            <div class="step">2. {{Lang::get('content.home.steps.1');}}</div>
        </div>
        <div class="col-sm-3 how-it-works">
            <img src="{{URL::asset('img/home/bubbles/handshake.png');}}">
            <div class="step">3. {{Lang::get('content.home.steps.2');}}</div>
        </div>
        <div class="col-sm-3 how-it-works">
            <img src="{{URL::asset('img/home/bubbles/jump.png');}}">
            <div class="step">4. {{Lang::get('content.home.steps.3');}}</div>
        </div>
    </div>
</div>
@stop
@section('scripts')
$('#banner-carousel').carousel({interval:8000}).on('slide.bs.carousel', function (e) {
    var banner_text_index = $('#banner-carousel .carousel-inner .item').index(e.relatedTarget);
    if(banner_text_index > 2){
        banner_text_index = 0;   
    }
    $('#banner-text-group .text-item.active').stop(false,true).fadeOut(200, function(){
        $('#banner-text-group .text-item.active').removeClass('active');   
        $('#banner-text-group .text-item').eq(banner_text_index).fadeIn(200, function(){
            $(this).addClass('active');  
        });
    });
});
@stop