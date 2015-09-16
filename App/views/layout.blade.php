<?php
if($lang == ''){
	$lang = 'en';
}
?>
@yield('top')
<?php
    if(Auth::check() && !isset($user)){
        $user = (object) DB::table('users')->where('id', Auth::user()->id)->first();   
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ConnectNow</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ URL::asset('css/bootstrap.min.css'); }}" rel="stylesheet">
        <link href="{{ URL::asset('css/elusive-webfont.css'); }}" rel="stylesheet">
        <link href="{{ URL::asset('css/semantic.min.css'); }}" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,600|Open+Sans:300,400,500,600" rel="stylesheet" type="text/css">
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
    <body ng-app="helper">
        <div class="navbar navbar-fixed-top" role="navigation" id="navbar">
            <div id="navbar-top">
                <div class="container" style="position:relative">
                    <ul class="nav navbar-nav">
                        <li><a href="http://facebook.com/connectnowcn"><i class="facebook icon">&nbsp;</i></a></li>
                        <li><a href="http://twitter.com/connectnow"><i class="twitter icon">&nbsp;</i></a></li>
                        <li><a href="http://plus.google.com/connectnow"><i class="google plus icon">&nbsp;</i></a></li>
                    </ul>
                    <ul class="nav navbar-nav" style="position:absolute;right:0px;top:0px;">
                        <?php 
                            if(Auth::check()){ ?>
                                <li><a href="{{PageController::getUrlPath($lang, 'dashboard');}}">{{{$user->firstname.' '.$user->lastname}}}</a></li>
                                <li><a href="{{PageController::getUrlPath($lang, 'account');}}">Account</a></li>
                                <li><a href="{{PageController::getUrlPath($lang, 'logout');}}">Logout</a></li>
                        <?php }else{
                        ?>
                        <li><a id="login-link" href="{{PageController::getUrlPath($lang, 'login');}}">{{Lang::get('navigation.login');}}</a></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'signup');}}">Signup</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div id="navbar-inner" style="position:relative;">
                <div class="container" style="position:relative;">
                    <ul class="nav navbar-nav">
                        <li><a href="{{PageController::getUrlPath($lang, 'home');}}" id="home"><img src="{{URL::asset('img/navlogo.png');}}">&nbsp;&nbsp;&nbsp;<span>ConnectNow</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav" style="position:absolute;right:0px;top:0px;">
                        <li><a href="{{PageController::getUrlPath($lang, 'home');}}">Home</a></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'explore');}}">{{Lang::get('navigation.explore');}}</a></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'start');}}">{{Lang::get('navigation.start');}}</a></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'about');}}">{{Lang::get('navigation.about');}}</a></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'contact');}}">{{Lang::get('navigation.contact');}}</a></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'support');}}">Support</a></li>
                        <li><span class="seperator">&nbsp;</span></li>
                        <li><a href="{{PageController::getUrlPath($lang, 'search');}}" id="search-link"><span style="display:inline-block;" class="glyphicon glyphicon-search"></span></a></li>
                    </ul>
                </div>
                <div id="search-container">
                    <div class="container" style="height:100%;position:relative;">
                        <form id="search-form" action="{{PageController::getUrlPath($lang, 'search');}}" method="get">
                            <div class="row">
                            <span id="search-span">Search: </span><input type="text" id="search-input" autocomplete="off" name="q">
                            </div>
                        </form>
                        <a class="glyphicon glyphicon-remove" id="search-close" href="javascript:void(0);" onclick="$('#search-container').trigger('click');"></a>
                        <div id="search-suggestions-outer" style="display:none !important;">
                            <ul id="search-suggestions" class="list-inline container">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="navbar navbar-fixed-top navbar-default" id="navbar" role="navigation">
            <div id="nav-ext-wrap">
                <div class="container">
                <div class="row">
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'explore');}}">{{Lang::get('navigation.explore');}}</a></div>
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'start');}}">{{Lang::get('navigation.start');}}</a></div>
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'about');}}">{{Lang::get('navigation.about');}}</a></div>
                    <div class="col-sm-3"><a href="{{PageController::getUrlPath($lang, 'search');}}" id="search-link">{{Lang::get('navigation.search');}}</a></div>
                </div>
                    <a href="{{PageController::getUrlPath($lang, 'home');}}" id="home">
                        <img src="{{ URL::asset('img/logo.png'); }}">
                    </a>
                    <div id="login" class="row">
                        <div><a href="{{PageController::getUrlPath($lang, 'login');}}">{{Lang::get('navigation.login');}}</a></div>
                    </div>
                </div> 
            </div>
        </div>-->
        <div id="wrapper">
        @yield('content')
            <div id="push"></div>
        </div>
        <div id="footerWrapper">
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-col footer-col-margin footer-col-light col-sm-3" style="border-color:#B52435;">
                            <div class="footer-col-inner">
                                <a href="{{PageController::getUrlPath($lang, 'home');}}" class="footer-col-title">{{Lang::get('footer.home.title');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'explore');}}">{{Lang::get('footer.home.explore');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'start');}}">{{Lang::get('footer.home.start');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'about');}}">{{Lang::get('footer.home.about');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'signup');}}">{{Lang::get('footer.home.signup');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'login');}}">{{Lang::get('footer.home.login');}}</a>
                            </div>
                        </div>
                        <div class="footer-col footer-col-margin col-sm-3" style="border-color:#911A28;">
                            <div class="footer-col-inner">
                                <div class="footer-col-title">{{Lang::get('footer.policies.title');}}</div>
                                <a href="{{PageController::getUrlPath($lang, 'privacy');}}">{{Lang::get('footer.policies.privacy');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'terms');}}">{{Lang::get('footer.policies.terms');}}</a>
                            </div>
                        </div>
                        <div class="footer-col footer-col-margin col-sm-3" style="border-color:#B84451;">
                            <div class="footer-col-inner">
                                <a class="footer-col-title" href="{{PageController::getUrlPath($lang, 'support');}}">{{Lang::get('footer.support.title');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'help');}}">{{Lang::get('footer.support.helpfaq');}}</a>
                                <a href="{{PageController::getUrlPath($lang, 'contact');}}">{{Lang::get('footer.support.contact');}}</a>
                            </div>
                        </div>
                        <div class="footer-col footer-col-margin footer-col-light col-sm-3" style="border-color:#B52435;">
                            <div class="footer-col-inner">
                                <div class="footer-col-title">About ConnectNow</div>
                                <p>We at ConnectNow love events, parties, and other stuff. We hope you enjoy the site as much as we do :) <a href="{{PageController::getUrlPath($lang, 'about');}}">More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div id="footer-bottom"><div class="container">{{Lang::get('footer.copyright');}}
                <span class="pull-right" id="footer-social">
                    <a href="http://facebook.com/connectnowcn"><i class="facebook icon">&nbsp;</i></a>
                    <a href="http://twitter.com/connectnow"><i class="twitter icon">&nbsp;</i></a>
                    <a href="http://plus.google.com/connectnow"><i class="icon google plus">&nbsp;</i></a>
                </span>
            </div></div>
        </div>
        <div id="login-modal">
            <form class="ui modal" action="{{PageController::getUrlPath($lang, 'login');}}" method="POST">
                <i class="close icon"></i>
                <div class="header">Login to ConnectNow</div>
                <div class="content">
                    <div class="ui form">
                        <div class="field">
                            <label>Email</label>
                            <div class="ui left labeled icon input">
                                <input type="text" name="email" placeholder="Email" id="login-email">
                                <i class="mail icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <div class="ui left labeled icon input">
                                <input type="password" name="password" placeholder="Password" id="login-password">
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token();}}">
                    </div>
                </div>
                <div class="actions">
                    <div class="ui button">Cancel</div>
                    <input class="ui button positive" type="submit" value="Login">
                </div>
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
        <script src="{{ URL::asset('js/jquery.min.js'); }}"></script>
        <script src="{{ URL::asset('js/transit.js'); }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js'); }}"></script>
        <script src="{{ URL::asset('js/semantic.min.js'); }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-hashchange/v1.3/jquery.ba-hashchange.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-resource.js"></script>
        <script src="{{ URL::asset('js/ui-utils.min.js'); }}"></script>
        <script type="text/javascript">
        var helperAngular = angular.module('helper',['ngResource','ui.utils','monospaced.elastic']).run(function($rootScope) {
            $rootScope.csrf = '{{csrf_token();}}';
        });
        helperAngular.config(function($interpolateProvider) {
          $interpolateProvider.startSymbol('[[');
          $interpolateProvider.endSymbol(']]');
        });
        @yield('scripts')
        $(window).scroll(function(){
            $('#navbar,#search-container').css('left',-$(window).scrollLeft());
            if($(window).scrollTop() > 0){
                $('#navbar').addClass('scrolled');
            }else{
                $('#navbar').removeClass('scrolled');
            }
        }).resize(function(){
            $('body, #wrapper').css('min-height',$(window).height());  
            $('#search-container').width($(document).width());
            $('#search-input').width($('#search-form').width() - $('#search-span').width());
            $('#footerWrapper').css('margin-top', -$('#footerWrapper').height());
            $('#push').height($('#footerWrapper').height());
        }).trigger('resize').load(function(){
            if(location.hash != ""){
                $(window).scrollTop($(location.hash).offset().top-100);   
            }
        });
        $(function(){
            $('#login-link').click(function(e){
                e.preventDefault();
                $($('#login-modal').html()).modal('setting', {
                    onApprove : function(e) {
                        e.preventDefault();
                    }
                  }).modal('show');
            }); 
            $(window).trigger('resize');
            $('#search-link').click(function(e){
                e.preventDefault();
                if(!$('#search-container').hasClass('active')){
                    $('#search-container').addClass('active');
                }
                $('#search-input').width($('#search-form').width() - $('#search-span').width());
                $('#search-input').focus();
            });
            $('#search-container').click(function(e){
                $('#search-input').width($('#search-form').width() - $('#search-span').width());
                if(e.target == this){
                    $('#search-input').blur().val('');
                    $(this).removeClass('active');
                }
            });
            $('#search-input').keyup(function(){
                if($.trim($('#search-input').val()) != ""){
                    $('#start-searching').css('visibility','hidden');   
                }else{
                    $('#start-searching').css('visibility','visible');   
                }
            }).keydown(function(e){
                setTimeout(function(){
                    if($.trim($('#search-input').val()) != ""){
                        $('#start-searching').css('visibility','hidden');   
                    }
                },10);
                var searchSuggestions = $('#search-suggestions');
				var searchSuggestionsOuter = $('#search-suggestions-outer');
				if(searchSuggestionsOuter.hasClass('shown')){
					var selected = searchSuggestions.find('li.active').eq(0);
					var searchInput = $('#search-input');
					if(e.keyCode == 38 || e.keyCode == 40){
						e.preventDefault();
					}
					if(e.keyCode == 38 && !selected.is(':first-child')){
						selected.removeClass('active');
						selected = selected.prev();
						selected.addClass('active');
						searchSuggestionsOuter.stop(false,true).animate({scrollTop:selected.position().top},200);
						searchInput.val(selected.text());
					}
					if(e.keyCode == 40 && !selected.is(':last-child')){
						selected.removeClass('active');
						selected = selected.next();
						selected.addClass('active');
						searchInput.val(selected.text());
                        console.log(selected.position().top);
						searchSuggestionsOuter.stop(false,true).animate({scrollTop:selected.position().top},200);
					}
				}
            }).keyup(function(){
                var searchSuggestions = $('#search-suggestions-outer');
                var searchSuggestionsInner = $('#search-suggestions');
                var searchInputValue = $.trim($('#search-input').val());
                if(!(searchSuggestions.hasClass('shown')&&searchSuggestionsInner.find('li.active').is(':first-child')==false&&searchInputValue==searchSuggestionsInner.find('li.active a').text())){
                    previousInput = searchInputValue;
                    if(searchInputValue == ""){
                        searchSuggestions.stop(false,true).removeClass('shown').hide();
                    }else{
                        if(!searchSuggestions.hasClass('shown')){
                            searchSuggestions.stop(false,true).addClass('shown').show();
                        }
                        searchSuggestionsInner.html('');
                        var first = true;
                        for(var i = 0; i < countries.length; i++){
                            if(countries[i].toLowerCase().indexOf(searchInputValue.toLowerCase()) == 0){
                                searchSuggestionsInner.append('<li><a href="javascript:void(0);" class="top-full">'+countries[i]+'</a></li>')
                            }
                            if(countries[i].toLowerCase() == searchInputValue.toLowerCase()){
                                first = false;
                            }
                        }
                        if(first){
                            searchSuggestionsInner.prepend('<li><a href="javascript:void(0);" class="top-full">'+searchInputValue+'</a></li>');
                        }
                        searchSuggestionsInner.children("li:first").addClass('active');  
                    }
                }
            });
        });
        var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlanhds", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
        $(document).keypress(function(e){
            var c= String.fromCharCode(e.which);
            var isWordcharacter = c.match(/\w/);
            if(!$(e.target).is('input') && !$(e.target).is('textarea') && isWordcharacter ){
                if(!$('#search-container').hasClass('active')){
                    $('#search-container').addClass('active');
                }
                $('#search-input').focus();
                $('#search-input').width($('#search-form').width() - $('#search-span').width());
                setTimeout(function(){
                    if($('#search-input').val() == "" || $('#search-input').val().slice(-1) != String.fromCharCode(e.which)){
                        $('#search-input').val($('#search-input').val()+String.fromCharCode(e.which));
                    }
                    $('#search-input').trigger('keydown');
                },50);
            }
        }).keydown(function(e){
            if(e.which == 27 && $('#search-container').hasClass('active')){
                $('#search-container').trigger('click');
            }
        });
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