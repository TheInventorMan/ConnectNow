<?php
if($lang == ''){
	$lang = 'en';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ConnectNow</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ URL::asset('css/bootstrap.min.css'); }}" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/main.css'); }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ URL::asset('favicon-128.png'); }}" sizes="128x128">
        <link rel="icon" type="image/png" href="{{ URL::asset('favicon-64.png'); }}" sizes="64x64">
        <link rel="icon" type="image/png" href="{{ URL::asset('favicon-32.png'); }}" sizes="32x32">
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico'); }}">
        <link href="<?php echo URL::asset('css/'.$currentPage.'.css'); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!--[if lte IE 7]>
        <link href="{{ URL::asset('css/glyphicons-ie7.css'); }}" rel="stylesheet">
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top" id="navbar" role="navigation">
            <div id="nav-ext-wrap">
                <div class="container">
                <div class="row">
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'explore');}}">{{Lang::get('navigation.explore');}}</a></div>
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'start');}}">{{Lang::get('navigation.start');}}</a></div>
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'about');}}">{{Lang::get('navigation.about');}}</a></div>
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'login');}}">{{Lang::get('navigation.login');}}</a></div>
                </div>
                    <a href="{{PageController::getUrlPath($lang, 'home');}}" id="home">
                        <img src="{{ URL::asset('img/logo.png'); }}">
                    </a>
                    <div id="search">
                        <form method="get" action="{{PageController::getUrlPath($lang, 'search');}}">
                            <input type="text" name="q"><button><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div id="footer">
            <div class="container">
                <div>
                    <div class="footer-col footer-col-margin col-sm-1" style="border-style:none;"></div>
                    <div class="footer-col footer-col-margin footer-col-light col-sm-2" style="border-color:#555;">
                        <div class="footer-col-inner">
                            <a href="{{PageController::getUrlPath($lang, 'home');}}" class="footer-col-title">{{Lang::get('footer.home.title');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'explore');}}">{{Lang::get('footer.home.explore');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'start');}}">{{Lang::get('footer.home.start');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'about');}}">{{Lang::get('footer.home.about');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'signup');}}">{{Lang::get('footer.home.signup');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'login');}}">{{Lang::get('footer.home.login');}}</a>
                        </div>
                    </div>
                    <div class="footer-col footer-col-margin col-sm-2" style="border-color:#666;">
                        <div class="footer-col-inner">
                            <div class="footer-col-title">{{Lang::get('footer.policies.title');}}</div>
                            <a href="{{PageController::getUrlPath($lang, 'privacy');}}">{{Lang::get('footer.policies.privacy');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'terms');}}">{{Lang::get('footer.policies.terms');}}</a>
                        </div>
                    </div>
                    <div class="footer-col footer-col-margin footer-col-light col-sm-2" style="border-color:#777;">
                        <div class="footer-col-inner text-center">
                            <a href="{{PageController::getUrlPath($lang, 'home');}}" id="footer-logo"><img src="{{URL::asset('img/footer/logo.png');}}"></a>
                            <br>
                            <a href="{{PageController::getUrlPath('en', $currentPage)}}">ENGLISH</a>
                            <a href="{{PageController::getUrlPath('fr', $currentPage)}}">FRANÇAIS</a>
                        </div>
                    </div>
                    <div class="footer-col footer-col-margin col-sm-2" style="border-color:#666;">
                        <div class="footer-col-inner">
                            <div class="footer-col-title">{{Lang::get('footer.support.title');}}</div>
                            <a href="{{PageController::getUrlPath($lang, 'help');}}">{{Lang::get('footer.support.helpfaq');}}</a>
                            <a href="{{PageController::getUrlPath($lang, 'contact');}}">{{Lang::get('footer.support.contact');}}</a>
                        </div>
                    </div>
                    <div class="footer-col footer-col-margin footer-col-light col-sm-2" style="border-color:#555;">
                        <div class="footer-col-inner">
                            <div class="footer-col-title">{{Lang::get('footer.addus');}}</div>
                            <a class="media" href="http://facebook.com/connectnowcn" target="_blank"><div class="pull-left hidden-sm"><img class="media-object" src="{{URL::asset('img/footer/social/fb.png');}}"></div><div class="media-body">FACEBOOK<div class="small">/CONNECTNOWCN</div></div></a>
                            <a class="media" href="http://twitter.com/connectnow" target="_blank"><div class="pull-left hidden-sm"><img class="media-object" src="{{URL::asset('img/footer/social/twitter.png');}}"></div><div class="media-body">TWITTER<div class="small">@CONNECTNOW</div></div></a>
                        </div>
                    </div>
                    <div class="footer-col footer-col-margin col-sm-1" style="border-style:none;"></div>
                </div>
                <div class="clearfix"></div>
                <div class="footer-bottom text-center">{{Lang::get('footer.copyright');}}</div>
            </div>
        </div>
        <!--[if lte IE 7]>
        <div style="height:50px;display:block;">&nbsp;</div>
        <div class="alert alert-warning" style="position:fixed;bottom:0px;left:0px;width:100%;z-index:400;margin:0px;padding:10px;">
            <img id="catcompat" src="{{ URL::asset('img/cat.png'); }}">
            <a id="catcompat-link" href="http://browsehappy.com/?locale=en" target="_blank"><strong>Hey There!</strong> You're using an outdated browser, would you please consider upgrading or using another browser like Firefox? Pretty please?</a>
        </div>
        <![endif]-->
        <script src="{{ URL::asset('webfonts.js'); }}"></script>
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js'); }}"></script>
        <script type="text/javascript">
        @yield('scripts')
        $(window).scroll(function(){
            $('#navbar').css('left',-$(window).scrollLeft());
            if($(window).scrollTop() > 0){
                $('#navbar').addClass('scrolled');
            }else{
                $('#navbar').removeClass('scrolled');
            }
        }).resize(function(){
            $('body').css('min-height',$(window).height());  
        }).trigger('resize');
        </script>
        <!--[if lte IE 7]>
            <script type="text/javascript">
            $(function(){
                $('#catcompat-link').hover(function(){
                    var catleft = 10;
                    $('#catcompat').show().css({left:catleft});
                },function(){
                    $('#catcompat').hide();
                });
            });
            </script>
        <![endif]-->
    </body>
</html>