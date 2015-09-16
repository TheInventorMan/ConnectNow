@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Error 404 - Page not Found</div></h1>
<div id="page-subheading"><div class="container">Seems like you've fallen into a never-ending abyss</div></div>
<video id="errorVideo" loop autoplay>
    <source src="{{URL::asset('img/space.mp4');}}" type="video/mp4">
    <source src="{{URL::asset('img/space.webm');}}" type="video/webm">
</video>
<div class="ui active dimmer" id="dimLoader">
    <div class="ui loader"></div>
</div>
@stop
@section('scripts')
$(window).resize(function(){
    if($(window).width() * 360 > $(window).height() * 640){
        $('#errorVideo').width($(window).width()).height($(window).width()/640*360);
    }else{
        $('#errorVideo').width($(window).height()/360*640).height($(window).height());
    }
    if($('#dimLoader').length > 0){
        $('#dimLoader').height($(window).height()-$('#dimLoader').offset().top - $('#footer').outerHeight(true) - $('#footer-bottom').outerHeight(true));
    }
}).load(function(){
    $('#dimLoader').fadeOut(300, function(){
        $('#dimLoader').remove();
        $(window).trigger('resize');
    });
}).trigger('resize');
var isHTML5Video = (typeof(document.createElement('video').canPlayType) != 'undefined');
if(isHTML5Video){
    $('#errorVideo').get(0).oncanplay = function(){
        $('#dimLoader').fadeOut(300, function(){
            $('#dimLoader').remove();
            $(window).trigger('resize');
        });
    };
}else{
    $('#dimLoader').remove();
            $(window).trigger('resize');
}
@stop