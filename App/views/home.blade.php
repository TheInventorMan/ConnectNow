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
<div class="section" id="scroll-section">
    <div class="container">
        <h3>THE STUDENT CENTRE FOR SUCCESS <strong>OUTSIDE</strong> THE CLASSROOM</h3>
    </div>
</div>
<div class="section white">
    <div class="container">
        <div class="row center" id="mission-circles">
            <div class="col-sm-3">
                <img class="img-circle" src="{{URL::asset('img/home/bubbles/browse.png');}}">
                <h4>Browse</h4>
                <p>through a variety of opportunities based on ConnectNow’s three pillars of success: Volunteering, joining and creating Organizations, and Contest involvement.</p>
            </div>
            <div class="col-sm-3">
                <img class="img-circle" src="{{URL::asset('img/home/bubbles/commit.png');}}">
                <h4>Commit</h4>
                <p>to a project and instantly be connected to a community of like-minded individuals that will meet your personal success and goals.</p>
            </div>
            <div class="col-sm-3">
                <img class="img-circle" src="{{URL::asset('img/home/bubbles/track.png');}}">
                <h4>Track</h4>
                <p>your progress; whether it may be counting down the 40 volunteer hours needed to graduate, or getting together a team for the science fair, ConnectNow’s user-friendly system offers a quantitative approach to all activities</p>
            </div>
            <div class="col-sm-3">
                <img class="img-circle" src="{{URL::asset('img/home/bubbles/share.png');}}">
                <h4>Share</h4>
                <p>your achievements; once you’ve achieved your goals there’s no better way to celebrate than with your friends - receive rewards, and recognition for your activities, and pave the way for future students to do the same.</p>
            </div>
        </div>
    </div>
</div>
<div class="section black" id="start-section" style="background-image:url('{{URL::asset('img/home/ready.jpg');}}');">
    <div class="container center">
        <h1 id="start-header">READY TO GET STARTED SOLDIER?</h1>
        <a class="ui button massive linkedin" href="{{PageController::getUrlPath($lang, 'explore');}}">EXPLORE UPCOMING EVENTS</a>
    </div>
</div>
<div class="section" id="success-section">
    <div class="container">
        <h3>SEE? THESE PEOPLE SURVIVED THEIR EVENTS!</h3>
    </div>
</div>
<div class="section" id="events-section">
    <div class="row">
        <a class="col-sm-3 event-promo" href="#" style="background-image:url('{{URL::asset('img/home/sample/1.jpg');}}');">
            <div class="inner">
                <h3>I LIKE PIE</h3>
                <div class="muted">Dec 23, 2014</div>
            </div>
        </a>
        <a class="col-sm-3 event-promo" href="#" style="background-image:url('{{URL::asset('img/home/sample/2.jpg');}}');">
            <div class="inner">
                <h3>I LIKE PIE</h3>
                <div class="muted">Dec 23, 2014</div>
            </div>
        </a>
        <a class="col-sm-3 event-promo" href="#" style="background-image:url('{{URL::asset('img/home/sample/3.jpg');}}');">
            <div class="inner">
                <h3>I LIKE PIE</h3>
                <div class="muted">Dec 23, 2014</div>
            </div>
        </a>
        <a class="col-sm-3 event-promo" href="#" style="background-image:url('{{URL::asset('img/home/sample/4.jpg');}}');">
            <div class="inner">
                <h3>I LIKE PIE</h3>
                <div class="muted">Dec 23, 2014</div>
            </div>
        </a>
    </div>
</div>
<div class="section" id="testimonial-seperator">
    <div class="container">
        <h2>Some testimonials from somewhat-famous people!</h2>
    </div>
</div>
<div class="section" id="testimonial-section">
    <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#testimonial-carousel" data-slide-to="1"></li>
            <li data-target="#testimonial-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <h3>"Connectnow is so awesome, as it allows our organization to successfully promote and host crossdressing competitions!"</h3>
                    <div class="testimonial-light"> - William Yang</div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <h3>"With the help of Connect Now, Markville successfully managed to Sell-out all the tickets to our annual school dance, setting a school record.
Thank you Connect Now"</h3>
                    <div class="testimonial-light"> - Abhishek Wagle (president of student council)</div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <h3>"Our organization uses Connectnow to increase engagement and event success throughout the entire region with all of our partners including the famous band Lonely Island."</h3>
                    <div class="testimonial-light"> - Mario</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!--<h1 class="text-center" style="margin-top:50px;">{{Lang::get('content.home.howitworks');}}</h1>
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
    </div>-->
    <!--<img src="{{URL::asset('img/homepage.png');}}" style="width:100%;display:block;margin-top:20px;">-->
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