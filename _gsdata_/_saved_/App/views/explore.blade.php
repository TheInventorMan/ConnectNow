@extends('layout')
@section('content')
<div class="spacer"></div>
<div class="container">
    <div class="text-center" id="heading-wrap">
        <h1 id="heading">{{Lang::get('content.explore.title');}}</h1>
        <h3 class="georgia em">{{Lang::get('content.explore.subtitle');}}</h3>
    </div>
    <div class="row" id="ribbon-container">
        <div class="col-sm-4 ribbon-col">
            <div class="ribbon">
                <div class="ribbon-inner" style="background-image:url({{URL::asset('img/explore/red70.png');}});">
                    <h1 class="ribbon-title">{{Lang::get('content.explore.flags.volunteering.title');}}</h1>
                    <p class="georgia em ribbon-description">{{Lang::get('content.explore.flags.volunteering.descript');}}</p>
                    <img class="icon" src="{{URL::asset('img/explore/icons/volunteering.png');}}">
                    <div><a href="#" id="banner-signup" class="display-btn">{{Lang::get('content.explore.getstarted.large');}} <span class="display-btn-secondary">{{Lang::get('content.explore.getstarted.small');}}</span></a></div>
                </div>
                <div class="ribbon-bottom">
                    <img class="ribbon-bottom-img" src="{{URL::asset('img/explore/redbottom.png');}}">
                    <img class="ribbon-bottom-stripe" src="{{URL::asset('img/explore/stripe.png');}}">
                </div>
            </div>
        </div>
        <div class="col-sm-4 ribbon-col">
            <div class="ribbon">
                <div class="ribbon-inner" style="background-image:url({{URL::asset('img/explore/yellow70.png');}});">
                    <h1 class="ribbon-title">{{Lang::get('content.explore.flags.organizations.title');}}</h1>
                    <p class="georgia em ribbon-description">{{Lang::get('content.explore.flags.organizations.descript');}}</p>
                    <img class="icon" src="{{URL::asset('img/explore/icons/organization.png');}}">
                    <div><a href="#" id="banner-signup" class="display-btn">{{Lang::get('content.explore.getstarted.large');}} <span class="display-btn-secondary">{{Lang::get('content.explore.getstarted.small');}}</span></a></div>
                </div>
                <div class="ribbon-bottom">
                    <img class="ribbon-bottom-img" src="{{URL::asset('img/explore/yellowbottom.png');}}">
                    <img class="ribbon-bottom-stripe" src="{{URL::asset('img/explore/stripe.png');}}">
                </div>
            </div>
        </div>
        <div class="col-sm-4 ribbon-col">
            <div class="ribbon">
                <div class="ribbon-inner" style="background-image:url({{URL::asset('img/explore/blue70.png');}});">
                    <h1 class="ribbon-title">{{Lang::get('content.explore.flags.contests.title');}}</h1>
                    <p class="georgia em ribbon-description">{{Lang::get('content.explore.flags.contests.descript');}}</p>
                    <img class="icon" src="{{URL::asset('img/explore/icons/contest.png');}}">
                    <div><a href="#" id="banner-signup" class="display-btn">{{Lang::get('content.explore.getstarted.large');}} <span class="display-btn-secondary">{{Lang::get('content.explore.getstarted.small');}}</span></a></div>
                </div>
                <div class="ribbon-bottom">
                    <img class="ribbon-bottom-img" src="{{URL::asset('img/explore/bluebottom.png');}}">
                    <img class="ribbon-bottom-stripe" src="{{URL::asset('img/explore/stripe.png');}}">
                </div>
            </div>
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