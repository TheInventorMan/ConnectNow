@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Explore</div></h1>
<div id="page-subheading"><div class="container">No airline tickets here</div></div>
<div id="page-heading-text" style="background-image:url('{{URL::asset('img/about.jpg');}}');">
    <div id="page-heading-text-inner">
        <div class="container">
            <p>Not ready to start your own awesome yet? Join someone else's awesome team, and do even more awesome.</p>
        </div>
    </div>
</div>
<div id="page-spacer"></div>
<div class="container">
    <div class="ui secondary pointing menu">
        <a class="active item pull-left">Recent</a>
        <div class="right menu">
            <a class="ui item">Popular</a>
            <a class="ui item">Promoted</a>
            <a class="ui item">All</a>
        </div>
    </div>
    <div class="row" id="resultsContainer">
        <div class="col-sm-3 col-md-3">
            <div class="ui vertical menu" id="resultsMenu">
                <div class="item">
                <div class="ui input fluid"><input type="text" placeholder="Filter..."></div>
                </div>
                <div class="active item ui fluid input"><h4 style="margin-top:0px;">Start Time</h4>
                            <input type="time">
                </div>
                <a class="item">Date</a>
                <a class="item">Location</a>
            </div>
        </div>
        <div class="col-sm-9 col-md-9">
            <div class="ui yellow message">
                <div class="header">
                    Promoted Posts
                </div>
                <div class="ui four connected items">
                    <div class="row">
                        <div class="item">
                            <div class="content">
                                <div class="name">Cute Dog</div>
                                <p class="description">This dog has some things going for it. Its pretty cute and looks like it'd be fun to cuddle up with.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="name">Faithful Dog</div>
                                <p class="description">Sometimes its more important to have a dog you know you can trust. But not every dog is trustworthy, you can tell by looking at its smile.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="name">Silly Dog</div>
                                <p class="description">Silly dogs can be quite fun to have as companions. You never know what kind of ridiculous thing they will do.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="name">Cute Dog</div>
                                <p class="description">This dog has some things going for it. Its pretty cute and looks like it'd be fun to cuddle up with.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui three items">
                <?php for($i = 0; $i < 20; $i++){ ?>
                <div class="item">
                    <div class="image">
                        <img src="//placehold.it/150x100">
                    </div>
                    <div class="content">
                        <div class="name">My Test Event</div>
                        <p class="description">
                            <strong>Date: </strong> Feb. 4th, 2014<br/>
                            <strong>Time: </strong> 6:30AM - 5:30PM<br/>
                            <strong>Location: </strong> Centennial Community Centre
                            <p>Here at my test event, we'll be throwing parties for people to eat in so cars can explode in my face!</p>
                        </p>
                        <div class="extra">
                            Posted on Nov 3rd, 2014
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="spacer"></div>
@stop
@section('scripts')
$('#resultsMenu').affix({
    offset: {
      top: function () {
        return (this.top = $('#resultsContainer').offset().top - 120)
        }
    , bottom: function () {
        return ($('#footer').outerHeight(true)+200)
      }
    }
});
$(window).resize(function(){
    $('#resultsMenu').width('auto');
    if($('#resultsMenu').hasClass('affix')){
        $('#resultsMenu').removeClass('affix').width($('#resultsMenu').width()).addClass('affix');

    }else{
        $('#resultsMenu').width($('#resultsMenu').width());
    }
});
@stop