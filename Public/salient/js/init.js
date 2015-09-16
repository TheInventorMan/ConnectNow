jQuery(document).ready(function($){
	
/*-------------------------------------------------------------------------

	1.	Plugin Init
	2.	Helper Functions
	3.	Shortcode Stuff
	4.	Header + Search
	5.	Page Specific
	6.  Scroll to top
	7.	Cross Browser Fixes


-------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------*/
/*	1.	Plugin Init
/*-------------------------------------------------------------------------*/

/***************** Pretty Photo ******************/
	
	function prettyPhotoInit(){
		
		//add galleries to portfolios
		$('.portfolio-items').each(function(){
			var $unique_id = Math.floor(Math.random()*10000);
			$(this).find('.pretty_photo').attr('rel','prettyPhoto['+$unique_id+'_gal]').removeClass('pretty_photo');
		});
		
		$("a[data-rel='prettyPhoto[product-gallery]'], a[data-rel='prettyPhoto']").each(function(){
			$(this).attr('rel',$(this).attr('data-rel'));
			$(this).removeAttr('data-rel');
		});
		
		//convert class usage into rel
		$('a.pp').removeClass('pp').attr('rel','prettyPhoto');
		
		$("a[rel^='prettyPhoto']").prettyPhoto({
			theme: 'dark_rounded',
			allow_resize: true,
			default_width: 690,
			opacity: 0.85, 
			animation_speed: 'normal',
			deeplinking: false,
			default_height: 388,
			social_tools: '',
			markup: '<div class="pp_pic_holder"> \
						   <div class="ppt">&nbsp;</div> \
							<div class="pp_details"> \
								<div class="pp_nav"> \
								    <a href="#" class="pp_arrow_previous"> <i class="icon-salient-left-arrow-thin icon-default-style"></i> </a> \
									<a href="#" class="pp_arrow_next"> <i class="icon-salient-right-arrow-thin icon-default-style"></i> </a> \
									<p class="currentTextHolder">0/0</p> \
								</div> \
								<a class="pp_close" href="#">Close</a> \
							</div> \
							<div class="pp_content_container"> \
								<div class="pp_left"> \
								<div class="pp_right"> \
									<div class="pp_content"> \
										<div class="pp_fade"> \
											<div class="pp_hoverContainer"> \
											</div> \
											<div id="pp_full_res"></div> \
										</div> \
									</div> \
								</div> \
								</div> \
							</div> \
						</div> \
						<div class="pp_loaderIcon"></div> \
						<div class="pp_overlay"></div>'
		});
		
	}

	prettyPhotoInit();
	
/*!
 * jQuery Transit - CSS3 transitions and transformations
 * (c) 2011-2012 Rico Sta. Cruz <rico@ricostacruz.com>
 * MIT Licensed.
 *
 * http://ricostacruz.com/jquery.transit
 * http://github.com/rstacruz/jquery.transit
 */
(function(k){k.transit={version:"0.9.9",propertyMap:{marginLeft:"margin",marginRight:"margin",marginBottom:"margin",marginTop:"margin",paddingLeft:"padding",paddingRight:"padding",paddingBottom:"padding",paddingTop:"padding"},enabled:true,useTransitionEnd:false};var d=document.createElement("div");var q={};function b(v){if(v in d.style){return v}var u=["Moz","Webkit","O","ms"];var r=v.charAt(0).toUpperCase()+v.substr(1);if(v in d.style){return v}for(var t=0;t<u.length;++t){var s=u[t]+r;if(s in d.style){return s}}}function e(){d.style[q.transform]="";d.style[q.transform]="rotateY(90deg)";return d.style[q.transform]!==""}var a=navigator.userAgent.toLowerCase().indexOf("chrome")>-1;q.transition=b("transition");q.transitionDelay=b("transitionDelay");q.transform=b("transform");q.transformOrigin=b("transformOrigin");q.transform3d=e();var i={transition:"transitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",WebkitTransition:"webkitTransitionEnd",msTransition:"MSTransitionEnd"};var f=q.transitionEnd=i[q.transition]||null;for(var p in q){if(q.hasOwnProperty(p)&&typeof k.support[p]==="undefined"){k.support[p]=q[p]}}d=null;k.cssEase={_default:"ease","in":"ease-in",out:"ease-out","in-out":"ease-in-out",snap:"cubic-bezier(0,1,.5,1)",easeOutCubic:"cubic-bezier(.215,.61,.355,1)",easeInOutCubic:"cubic-bezier(.645,.045,.355,1)",easeInCirc:"cubic-bezier(.6,.04,.98,.335)",easeOutCirc:"cubic-bezier(.075,.82,.165,1)",easeInOutCirc:"cubic-bezier(.785,.135,.15,.86)",easeInExpo:"cubic-bezier(.95,.05,.795,.035)",easeOutExpo:"cubic-bezier(.19,1,.22,1)",easeInOutExpo:"cubic-bezier(1,0,0,1)",easeInQuad:"cubic-bezier(.55,.085,.68,.53)",easeOutQuad:"cubic-bezier(.25,.46,.45,.94)",easeInOutQuad:"cubic-bezier(.455,.03,.515,.955)",easeInQuart:"cubic-bezier(.895,.03,.685,.22)",easeOutQuart:"cubic-bezier(.165,.84,.44,1)",easeInOutQuart:"cubic-bezier(.77,0,.175,1)",easeInQuint:"cubic-bezier(.755,.05,.855,.06)",easeOutQuint:"cubic-bezier(.23,1,.32,1)",easeInOutQuint:"cubic-bezier(.86,0,.07,1)",easeInSine:"cubic-bezier(.47,0,.745,.715)",easeOutSine:"cubic-bezier(.39,.575,.565,1)",easeInOutSine:"cubic-bezier(.445,.05,.55,.95)",easeInBack:"cubic-bezier(.6,-.28,.735,.045)",easeOutBack:"cubic-bezier(.175, .885,.32,1.275)",easeInOutBack:"cubic-bezier(.68,-.55,.265,1.55)"};k.cssHooks["transit:transform"]={get:function(r){return k(r).data("transform")||new j()},set:function(s,r){var t=r;if(!(t instanceof j)){t=new j(t)}if(q.transform==="WebkitTransform"&&!a){s.style[q.transform]=t.toString(true)}else{s.style[q.transform]=t.toString()}k(s).data("transform",t)}};k.cssHooks.transform={set:k.cssHooks["transit:transform"].set};if(k.fn.jquery<"1.8"){k.cssHooks.transformOrigin={get:function(r){return r.style[q.transformOrigin]},set:function(r,s){r.style[q.transformOrigin]=s}};k.cssHooks.transition={get:function(r){return r.style[q.transition]},set:function(r,s){r.style[q.transition]=s}}}n("scale");n("translate");n("rotate");n("rotateX");n("rotateY");n("rotate3d");n("perspective");n("skewX");n("skewY");n("x",true);n("y",true);function j(r){if(typeof r==="string"){this.parse(r)}return this}j.prototype={setFromString:function(t,s){var r=(typeof s==="string")?s.split(","):(s.constructor===Array)?s:[s];r.unshift(t);j.prototype.set.apply(this,r)},set:function(s){var r=Array.prototype.slice.apply(arguments,[1]);if(this.setter[s]){this.setter[s].apply(this,r)}else{this[s]=r.join(",")}},get:function(r){if(this.getter[r]){return this.getter[r].apply(this)}else{return this[r]||0}},setter:{rotate:function(r){this.rotate=o(r,"deg")},rotateX:function(r){this.rotateX=o(r,"deg")},rotateY:function(r){this.rotateY=o(r,"deg")},scale:function(r,s){if(s===undefined){s=r}this.scale=r+","+s},skewX:function(r){this.skewX=o(r,"deg")},skewY:function(r){this.skewY=o(r,"deg")},perspective:function(r){this.perspective=o(r,"px")},x:function(r){this.set("translate",r,null)},y:function(r){this.set("translate",null,r)},translate:function(r,s){if(this._translateX===undefined){this._translateX=0}if(this._translateY===undefined){this._translateY=0}if(r!==null&&r!==undefined){this._translateX=o(r,"px")}if(s!==null&&s!==undefined){this._translateY=o(s,"px")}this.translate=this._translateX+","+this._translateY}},getter:{x:function(){return this._translateX||0},y:function(){return this._translateY||0},scale:function(){var r=(this.scale||"1,1").split(",");if(r[0]){r[0]=parseFloat(r[0])}if(r[1]){r[1]=parseFloat(r[1])}return(r[0]===r[1])?r[0]:r},rotate3d:function(){var t=(this.rotate3d||"0,0,0,0deg").split(",");for(var r=0;r<=3;++r){if(t[r]){t[r]=parseFloat(t[r])}}if(t[3]){t[3]=o(t[3],"deg")}return t}},parse:function(s){var r=this;s.replace(/([a-zA-Z0-9]+)\((.*?)\)/g,function(t,v,u){r.setFromString(v,u)})},toString:function(t){var s=[];for(var r in this){if(this.hasOwnProperty(r)){if((!q.transform3d)&&((r==="rotateX")||(r==="rotateY")||(r==="perspective")||(r==="transformOrigin"))){continue}if(r[0]!=="_"){if(t&&(r==="scale")){s.push(r+"3d("+this[r]+",1)")}else{if(t&&(r==="translate")){s.push(r+"3d("+this[r]+",0)")}else{s.push(r+"("+this[r]+")")}}}}}return s.join(" ")}};function m(s,r,t){if(r===true){s.queue(t)}else{if(r){s.queue(r,t)}else{t()}}}function h(s){var r=[];k.each(s,function(t){t=k.camelCase(t);t=k.transit.propertyMap[t]||k.cssProps[t]||t;t=c(t);if(k.inArray(t,r)===-1){r.push(t)}});return r}function g(s,v,x,r){var t=h(s);if(k.cssEase[x]){x=k.cssEase[x]}var w=""+l(v)+" "+x;if(parseInt(r,10)>0){w+=" "+l(r)}var u=[];k.each(t,function(z,y){u.push(y+" "+w)});return u.join(", ")}k.fn.transition=k.fn.transit=function(z,s,y,C){var D=this;var u=0;var w=true;if(typeof s==="function"){C=s;s=undefined}if(typeof y==="function"){C=y;y=undefined}if(typeof z.easing!=="undefined"){y=z.easing;delete z.easing}if(typeof z.duration!=="undefined"){s=z.duration;delete z.duration}if(typeof z.complete!=="undefined"){C=z.complete;delete z.complete}if(typeof z.queue!=="undefined"){w=z.queue;delete z.queue}if(typeof z.delay!=="undefined"){u=z.delay;delete z.delay}if(typeof s==="undefined"){s=k.fx.speeds._default}if(typeof y==="undefined"){y=k.cssEase._default}s=l(s);var E=g(z,s,y,u);var B=k.transit.enabled&&q.transition;var t=B?(parseInt(s,10)+parseInt(u,10)):0;if(t===0){var A=function(F){D.css(z);if(C){C.apply(D)}if(F){F()}};m(D,w,A);return D}var x={};var r=function(H){var G=false;var F=function(){if(G){D.unbind(f,F)}if(t>0){D.each(function(){this.style[q.transition]=(x[this]||null)})}if(typeof C==="function"){C.apply(D)}if(typeof H==="function"){H()}};if((t>0)&&(f)&&(k.transit.useTransitionEnd)){G=true;D.bind(f,F)}else{window.setTimeout(F,t)}D.each(function(){if(t>0){this.style[q.transition]=E}k(this).css(z)})};var v=function(F){this.offsetWidth;r(F)};m(D,w,v);return this};function n(s,r){if(!r){k.cssNumber[s]=true}k.transit.propertyMap[s]=q.transform;k.cssHooks[s]={get:function(v){var u=k(v).css("transit:transform");return u.get(s)},set:function(v,w){var u=k(v).css("transit:transform");u.setFromString(s,w);k(v).css({"transit:transform":u})}}}function c(r){return r.replace(/([A-Z])/g,function(s){return"-"+s.toLowerCase()})}function o(s,r){if((typeof s==="string")&&(!s.match(/^[\-0-9\.]+$/))){return s}else{return""+s+r}}function l(s){var r=s;if(k.fx.speeds[r]){r=k.fx.speeds[r]}return o(r,"ms")}k.transit.getTransitionValue=g})(jQuery);


	
/***************** Smooth Scrolling ******************/

	function niceScrollInit(){
		$("html").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 40,
			cursorwidth: 15,
			cursorborder: 0,
			cursorcolor: '#2D3032',
			cursorborderradius: 6,
			autohidemode: false,
			horizrailenabled: false
		});
		
		if($('#boxed').length == 0){
			$('body, body #header-outer, body #header-secondary-outer, body #search-outer').css('padding-right','16px');
		}
		
		$('html').addClass('no-overflow-y');
	}

	var $smoothActive = $('body').attr('data-smooth-scrolling'); 
	var $smoothCache = ( $smoothActive == 1 ) ? true : false;
	
	if( $smoothActive == 1 && $(window).width() > 690 && $('body').outerHeight(true) > $(window).height() && Modernizr.csstransforms3d && !navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){ niceScrollInit(); } else {
		$('body').attr('data-smooth-scrolling','0');
	}
	
	
	

/***************** Sliders ******************/

	//gallery
	$('.flex-gallery').each(function(){
		
		var $that = $(this);
		
		imagesLoaded($(this),function(instance){
		
			 $that.flexslider({
		        animation: 'fade',
		        smoothHeight: false, 
		        animationSpeed: 500,
		        useCSS: false, 
		        touch: true
		    });
			
			////gallery slider add arrows
			$('.flex-gallery .flex-direction-nav li a.flex-next').html('<i class="icon-angle-right"></i>');
			$('.flex-gallery .flex-direction-nav li a.flex-prev').html('<i class="icon-angle-left"></i>');
		
		});
		
	});
	
	
	
/***************** Home Slider ******************/

	var sliderAdvanceSpeed = parseInt($('#featured').attr('data-advance-speed'));
	var sliderAnimationSpeed = parseInt($('#featured').attr('data-animation-speed'));
	var sliderAutoplay = parseInt($('#featured').attr('data-autoplay'));
	
	if( isNaN(sliderAdvanceSpeed) ) { sliderAdvanceSpeed = 5500;}
	if( isNaN(sliderAnimationSpeed) ) { sliderAnimationSpeed = 800;}
	
	var $yPos;
	

	var img_urls=[];
	$('[style*="background"]').each(function() {
	    var style = $(this).attr('style');
	    var pattern = /background.*?url\('(.*?)'\)/g
	    var match = pattern.exec(style);
	    if (match) {        
	        img_urls.push(match[1]);
	    }
	});
	
	var imgArray = [];
	
	for(i=0;i<img_urls.length;i++){
		imgArray[i] = new Image();
		imgArray[i].src = img_urls[i];
	}
	 
	
	//home slider height
	var sliderHeight = parseInt($('#featured').attr('data-slider-height'));
	if( isNaN(sliderHeight) ) { sliderHeight = 650 } else { sliderHeight = sliderHeight -12 }; 
	
	////min height if video
	if( $('#featured .video').length > 0 && sliderHeight < 500) sliderHeight = 500;
	
	function customSliderHeight(){
		if(!$('body').hasClass('mobile')){
			$('#featured').attr('style', 'height: '+sliderHeight+'px !important');
			$('#featured article').css('height',sliderHeight+headerPadding2-23+'px')
		}
		else {
			$('#featured').attr('style', 'height: '+sliderHeight+'px');
		}
	}
	
	customSliderHeight();
	
	
	//home slider bg color
	if( $('#featured').length > 0 ){
		var sliderBackgroundColor = $('#featured').attr('data-bg-color');
		if( sliderBackgroundColor.length == 0 ) sliderBackgroundColor = '#000000'; 
		
		$('#featured article').css('background-color',sliderBackgroundColor);
	}
	

	
	//take into account header height when calculating the controls and info positioning 
	var logoHeight = parseInt($('#header-outer').attr('data-logo-height'));
	var headerPadding = parseInt($('#header-outer').attr('data-padding'));
	var headerPadding2 = parseInt($('#header-outer').attr('data-padding'));
	var extraDef = 10;
	var headerResize = ($('body').hasClass('pp-video-function')) ? '1' : $('#header-outer').attr('data-header-resize');
	var headerResizeOffExtra = 0;
	var extraHeight = ($('#wpadminbar').length > 0) ? 28 : 0; //admin bar
	var usingLogoImage = true;
    var mediaElement = ($('.wp-video-shortcode').length > 0) ? 36 : 0;
    var secondaryHeader = ($('#header-outer').attr('data-using-secondary') == '1') ? 32 : 0 ;
    
	if( isNaN(logoHeight) ) { usingLogoImage = false; logoHeight = 30;}
	if( isNaN(headerPadding) ) { headerPadding = 28; headerPadding2 = 28;}
	if( headerResize.length == 0 ) { extraDef = 0; headerResizeOffExtra = headerPadding2; }
    if( $('header#top #logo img').length == 0 ) { logoHeight = 30; }
    
	var $captionPos = (((sliderHeight-70)/2 - $('div.slider-nav span.left span.white').height()/2) + headerPadding2 - headerResizeOffExtra) - 75;
	var $controlsPos = (((sliderHeight-70)/2 - $('div.slider-nav span.left span.white').height()/2) + logoHeight + headerPadding*2 + extraHeight + secondaryHeader) -10;
	
	var $scrollTop = 0;
	var $videoHeight; 
	
	
	function homeSliderInit(){
		$('#featured').orbit({
         	 animation: 'fade',
         	 advanceSpeed: sliderAdvanceSpeed,
         	 animationSpeed: sliderAnimationSpeed, 
         	 timer: sliderAutoplay
    	 });
    	 
    	 customSliderHeight();
		 sliderAfterSetup();
		 
		  //test for slider arrows
	 	 if(!$('body').hasClass('mobile')){
			$('.orbit-wrapper #featured article').css('top', ((- $scrollTop / 5)+logoHeight+headerPadding2+headerResizeOffExtra+extraHeight-extraDef+secondaryHeader)  + 'px');
			$('.orbit-wrapper div.slider-nav span.right, .orbit-wrapper div.slider-nav span.left').html('<span class="white"></span><span class="shadow"></span>');
		 } else {
			$('.orbit-wrapper div.slider-nav span.right').html('<i class="icon-angle-right"></i>');
			$('.orbit-wrapper div.slider-nav span.left').html('<i class="icon-angle-left"></i>');
		 }
	}
	
	//home slider init
	if($('#featured').length > 0 && $().orbit) {
		 
		 var $firstBg = $('#featured').find('.slide:first-child > article').attr('style');

	     var pattern = /url\(["']?([^'")]+)['"]?\)/;
	     var match = pattern.exec($firstBg);
	     if (match) {        
	        var slideImg = new Image();
			slideImg.src = match[1];
			
			$(slideImg).load(function(){ 
				homeSliderInit();
			});
		 } else {
		 	homeSliderInit();
		 }
    	 
    	$('#featured article .post-title h2 span').show();
    		 
    	////add hover effect to slider nav
    	$('.slider-nav > span').append('<span class="white"></span><span class="shadow"></span>');	
    	
    	////swipe for home slider
    	if($('body').hasClass('mobile')){
	    	$('#featured h2, #featured .video').swipe({
	    		swipeRight : function(e) {
					$('.slider-nav .left').trigger('click');
					e.stopImmediatePropagation();
					return false;
				 },
				 swipeLeft : function(e) {
					$('.slider-nav .right').trigger('click');
					e.stopImmediatePropagation();
					return false;
				 }    
	    	})
    	}
   
	
	}
	
	
	
	
	//inital load
	function sliderAfterSetup(){
		//webkit video fix
		$('#featured .mejs-container').css('width',$('#featured .video').width());
		$('#featured .mejs-container').css('height',$('#featured .video').width()/1.7777);
		//$(window).trigger('resize');
		
		$('body:not(.mobile) .orbit-wrapper #featured .orbit-slide:not(".has-video") article .container').css('top', $captionPos +"px");
		$('body:not(.mobile) .orbit-wrapper #featured .orbit-slide.has-video article .container').css('top', $videoHeight +"px");
		$('body:not(.mobile) .orbit-wrapper .slider-nav > span').css('top', $controlsPos +"px");	
		$('body:not(.mobile) .orbit-wrapper #featured .slide article').css({'top': ((- $scrollTop / 5)+logoHeight+headerPadding2+headerResizeOffExtra+extraHeight-extraDef+secondaryHeader)  + 'px' });
		
		//height fix for when resize on scroll if off
		if(!$('body').hasClass('mobile') && headerResize.length == 0){
			$('#featured article').css('height',sliderHeight-32+'px')
		}
		
		$(window).trigger('resize');
	}
	
	
	function videoSlidePos(){
		$('#featured > div').has('.video').each(function(){
			if( $(window).width() > 1300 ) {
				$('#featured .orbit-slide.has-video .video, #featured .orbit-slide.has-video h2').css('top','0');
				$('#featured .orbit-slide.has-video .post-title > a').css('top','10px');

				$videoHeight = ((sliderHeight-28)/2) - ((410-mediaElement)/2) + headerPadding2 - headerResizeOffExtra;
			}
			
			else if( $(window).width() > 1000 && $(window).width() < 1081 ){
				$('#featured .orbit-slide.has-video .video, #featured .orbit-slide.has-video h2').css('top','0');
				$('#featured .orbit-slide.has-video .post-title > a').css('top','10px');
				
				$videoHeight = ((sliderHeight-28)/2) - ((290-mediaElement)/2) + headerPadding2 - headerResizeOffExtra;
			}
			
			else {
				$videoHeight = ((sliderHeight-28)/2) - ((336-mediaElement)/2) +headerPadding2 - headerResizeOffExtra;
			}
	
		});
	}
	
	videoSlidePos();
	
	//dynamic controls and info positioning
	function controlsAndInfoPos(){
		$scrollTop = $(window).scrollTop();
		
		$('body:not(.mobile) .orbit-wrapper #featured .orbit-slide:not(".has-video") article .container').css({ 
			'opacity' : 1-($scrollTop/(sliderHeight-130)),
			'top' : ($scrollTop*-0.2) + $captionPos +"px"
		});
		
		//video slides
		$('body:not(.mobile) .orbit-wrapper #featured .orbit-slide.has-video article .container').css({ 
			'opacity' : 1-($scrollTop/(sliderHeight-130)),
			'top' : ($scrollTop*-0.2) + $videoHeight +"px"
		});
		
		if($('#boxed').length == 0){
			$('body:not(.mobile) .orbit-wrapper .slider-nav > span').css({ 
				'opacity' : 1-($scrollTop/(sliderHeight-130)),
				'top' : ($scrollTop*-0.4) + $controlsPos +"px"
			});
		}
		
	}
	
	controlsInit();
	function controlsInit(){

		if($('#boxed').length > 0) {
			if(1-$scrollTop/(sliderHeight-$controlsPos-20) >= 0){
				$(window).unbind('scroll',hideControls);
				$(window).bind('scroll',showControls);
			} else {
				$(window).unbind('scroll',showControls);
				$(window).bind('scroll',hideControls);
			}
		} else {
			$(window).unbind('scroll',showControls);
			$(window).unbind('scroll',hideControls);
		}
	
	}
	
	function showControls(){

		if(1-$scrollTop/(sliderHeight-$controlsPos-20) >= 0){
			$('body:not(.mobile) .orbit-wrapper .slider-nav > span.left').stop(true,true).animate({ 'left' : '0px'},450,'easeOutCubic');
			if($('body').attr('data-smooth-scrolling')=='1'){
				$('body:not(.mobile) .orbit-wrapper .slider-nav > span.right').stop(true,true).animate({ 'right' : '15px'},450,'easeOutCubic');
			} else {
				$('body:not(.mobile) .orbit-wrapper .slider-nav > span.right').stop(true,true).animate({ 'right' : '0px'},450,'easeOutCubic');
			}
			$(window).unbind('scroll',showControls);
			$(window).bind('scroll',hideControls);
		}
	}
	
	function hideControls(){
		
		if(1-$scrollTop/(sliderHeight-$controlsPos-20) < 0){
			$('body:not(.mobile) .orbit-wrapper .slider-nav > span.left').stop(true,true).animate({ 'left' : '-80px'},450,'easeOutCubic');
			$('body:not(.mobile) .orbit-wrapper .slider-nav > span.right').stop(true,true).animate({ 'right' : '-80px'},450,'easeOutCubic');
			$(window).unbind('scroll',hideControls);
			$(window).bind('scroll',showControls);
		}
		
	}
	
	if( $('#featured').length > 0){
	
		$(window).scroll(function(){
		    
		    //hide video to not mess up parallax section
		    $('#featured .mejs-mediaelement, #featured .iframe-embed').each(function(){
		    
		    	if( $(this).parents('.container').css('opacity') <= 0){
			    	$(this).css('visibility','hidden').hide();
			    } else {
			    	$(this).css('visibility','visible').show();
			    }
		    });
		    
		    if(!$('body').hasClass('mobile')){
		    	
		    	controlsAndInfoPos();
				$('body:not(.mobile) .orbit-wrapper #featured .slide:not(:transparent) article').css({'top': ((- $scrollTop / 5)+logoHeight+headerPadding2+headerResizeOffExtra+extraHeight-extraDef+secondaryHeader)  + 'px' });	
			
			}
		});
		
		
		//disable parallax for mobile
		$(window).resize(function(){
			if(!$('body').hasClass('mobile')){
				$('.orbit-wrapper #featured article').css('top', ((- $scrollTop / 5)+logoHeight+headerPadding2+headerResizeOffExtra+extraHeight-extraDef+secondaryHeader)  + 'px');
				$('.orbit-wrapper div.slider-nav span.right, .orbit-wrapper div.slider-nav span.left').html('<span class="white"></span><span class="shadow"></span>');
			} else {
				$('.orbit-wrapper div.slider-nav span.right').html('<i class="icon-angle-right"></i>');
				$('.orbit-wrapper div.slider-nav span.left').html('<i class="icon-angle-left"></i>');
			}

			videoSlidePos();
			controlsAndInfoPos();
			customSliderHeight();
			
			//height fix for when resize on scroll if off
			if(!$('body').hasClass('mobile') && headerResize.length == 0){
				$('#featured article').css('height',sliderHeight-32+'px')
			}
			
		});
		
	}

    
    //webkit self-hosted video fix
    $('.jp-video-container .jp-play, jp-video-container .jp-seek-bar').click(function(){
    	$(this).parents('.jp-video-container').prev('.jp-jplayer').find('video').show().css('display','block');
    	$(this).parents('.jp-video-container').prev('.jp-jplayer').find('.jp-jplayer > img').hide();
    });
    
    //mobile video more info
    $('#featured .span_12 a.more-info').click(function(){
    	if( !$(this).find('.btv').is(":visible")){
    		$(this).parent().parent().find('h2, > a').css('opacity',1);
    		$(this).parent().parent().find('.video').stop().animate({'top':'-400px'},800,'easeOutCubic');
	    	$(this).parent().parent().find('h2').stop().animate({'top':'-400px'},800,'easeOutCubic');
	    	$(this).parent().parent().find('> a').stop().animate({'top':'-380px'},800,'easeOutCubic');
	    	$(this).find('.btv').show();
	    	$(this).find('.mi').hide();
    	}
    	else {
    		$(this).parent().parent().find('.video').stop().animate({'top':'0px'},800,'easeOutCubic');
	    	$(this).parent().parent().find('h2').stop().animate({'top':'0px'},800,'easeOutCubic');
	    	$(this).parent().parent().find('> a').stop().animate({'top':'0px'},800,'easeOutCubic');
	    	$(this).find('.mi').show();
	    	$(this).find('.btv').hide();
    	}
    	
    	return false;
    });

/***************** Superfish ******************/

	function initSF(){

		$(".sf-menu").superfish({
			 delay: 900,
			 speed: 'fast',
			 speedOut:      'fast',             
			 animation:   {opacity:'show'}
		}); 

	}
	
	$('header#top nav > ul > li').mouseleave(function(){
		if(!$(this).hasClass('megamenu')){
			$(this).find('> ul').stop(true,true).fadeOut();
		}
	});
	
	function addOrRemoveSF(){
		
		if( window.innerWidth < 1000 && $('body').attr('data-responsive') == '1'){
			$('body').addClass('mobile');
			$('header#top nav').hide();
		}
		
		else {
			$('body').removeClass('mobile');
			$('header#top nav').show();
			$('#mobile-menu').hide();
			
			//recalc height of dropdown arrow
			$('.sf-sub-indicator').css('height',$('a.sf-with-ul').height());
		}
	}
	
	addOrRemoveSF();
	initSF();
	
	$(window).resize(addOrRemoveSF);

	
	function SFArrows(){

		//set height of dropdown arrow
		$('.sf-sub-indicator').css('height',$('a.sf-with-ul').height());
	}
	
	SFArrows();
	

	


/***************** Caroufredsel ******************/

	$('.carousel:not(".clients")').each(function(){
    	var $that = $(this); 
    	var maxCols = ($(this).parents('.carousel-wrap').attr('data-full-width') == 'true') ? 'auto' : 3 ;
    	var scrollNum = ($(this).parents('.carousel-wrap').attr('data-full-width') == 'true') ? 'auto' : '' ;
    	var colWidth = ($(this).parents('.carousel-wrap').attr('data-full-width') == 'true') ? 500 : 353 ;
    	var scrollSpeed, easing;
    	var $autoplayBool = ($(this).attr('data-autorotate') == 'true') ? true : false;

		(parseInt($(this).attr('data-scroll-speed'))) ? scrollSpeed = parseInt($(this).attr('data-scroll-speed')) : scrollSpeed = 700;
		($(this).attr('data-easing').length > 0) ? easing = $(this).attr('data-easing') : easing = 'linear';
		
		
		var $element = $that;
		if($that.find('img').length == 0) $element = $('body');
		
		imagesLoaded($element,function(instance){

			
	    	$that.carouFredSel({
	    		circular: true,
	    		responsive: true,
		        items       : {
					width : colWidth,
			        visible     : {
			            min         : 1,
			            max         : maxCols
			        }
			    },
			    swipe       : {
			        onTouch     : true,
			        onMouse         : true,
			        options      : {
			        	excludedElements: "button, input, select, textarea, .noSwipe"	
			        },
			        onBefore : function(){
			    		//hover effect fix
			    		$that.find('.work-item').trigger('mouseleave');
			    		$that.find('.work-item .work-info a').trigger('mouseup');
			    	}
			    },
			    scroll: {
			    	items			: scrollNum,
			    	easing          : easing,
		            duration        : scrollSpeed
			    },
		        prev    : {
			        button  : function() {
			           return $that.parents('.carousel-wrap').find('.carousel-prev');
			        }
		    	},
			    next    : {
		       		button  : function() {
			           return $that.parents('.carousel-wrap').find('.carousel-next');
			        }
			    },
			    auto    : {
			    	play: $autoplayBool
			    }
		    }).animate({'opacity': 1},1300);
		    
		    $that.parents('.carousel-wrap').wrap('<div class="carousel-outer">');
		    
		    carouselHeightCalcs();
		    
	     });//images loaded
	     	     
    });//each
    
    
    //fullwidth carousel swipe link fix
    var $mousePosStart = 0;
    var $mousePosEnd = 0;
    $('.carousel-wrap[data-full-width="true"] .portfolio-items .col .work-item .work-info a').mousedown(function(e){
    	$mousePosStart = e.clientX;
    });
    
    $('.carousel-wrap[data-full-width="true"] .portfolio-items .col .work-item .work-info a').mouseup(function(e){
    	$mousePosEnd = e.clientX;
    });
    
     $('.carousel-wrap[data-full-width="true"] .portfolio-items .col .work-item .work-info a').click(function(e){
    	if(Math.abs($mousePosStart - $mousePosEnd) > 10)  return false;
    });
    
     
	function carouselHeightCalcs(){
		
		//recent work carousel
		$('.carousel.portfolio-items').each(function(){
			
			var bottomSpace = ($(this).parents('.carousel-wrap').attr('data-full-width') == 'true' && $(this).find('.style-2').length > 0) ? 0 : 28 ;
			
			var tallestMeta = 0;
			
			$(this).find('> li').each(function(){
				($(this).find('.work-meta').height() > tallestMeta) ? tallestMeta = $(this).find('.work-meta').height() : tallestMeta = tallestMeta;
			});	
    	 	
     		$(this).parents('.caroufredsel_wrapper').css({
     			'height' : ($(this).find('.work-item').outerHeight() + tallestMeta + bottomSpace -2) + 'px'
     		});
   	  	});
   	  	
   	  	//standard carousel
   	  	$('.carousel:not(".portfolio-items, .clients")').each(function(){
			
			var tallestColumn = 0;
			
			$(this).find('> li').each(function(){
				($(this).height() > tallestColumn) ? tallestColumn = $(this).height() : tallestColumn = tallestColumn;
			});	
    	 	
         	$(this).css('height',tallestColumn + 5);
         	$(this).parents('.caroufredsel_wrapper').css('height',tallestColumn + 5);
			
   	  	});
   	  	
	}
 
    $(window).load(piVertCenter);


     $('.carousel.clients').each(function(){
    	var $that = $(this);
    	var columns; 
    	(parseInt($(this).attr('data-max'))) ? columns = parseInt($(this).attr('data-max')) : columns = 5;
    	if($(window).width() < 690 && $('body').attr('data-responsive') == '1') { columns = 2; $(this).addClass('phone') }
    	
    	var $element = $that;
		if($that.find('img').length == 0) $element = $('body');
		
		imagesLoaded($element,function(instance){
    		
	    	$that.carouFredSel({
		    		circular: true,
		    		responsive: true, 
			        items       : {
						
						height : $that.find('> div:first').height(),
						width  : $that.find('> div:first').width(),
				        visible     : {
				            min         : 1,
				            max         : columns
				        }
				    },
				    swipe       : {
				        onTouch     : true,
				        onMouse         : true
				    },
				    scroll: {
				    	items           : 1,
				    	easing          : 'easeInOutCubic',
			            duration        : '800',
			            pauseOnHover    : true
				    },
				    auto    : {
				    	play            : true,
				    	timeoutDuration : 2700
				    }
		    }).animate({'opacity': 1},1300);
		    
		    $that.parents('.carousel-wrap').wrap('<div class="carousel-outer">');
		     
		    //cients carousel height
	  		$(window).resize(function(){
	  			
	  			var tallestImage = 0;
	  			
		    	 $('.carousel.clients').each(function(){
		    	 	
		    	 	$(this).find('> div').each(function(){
						($(this).height() > tallestImage) ? tallestImage = $(this).height() : tallestImage = tallestImage;
					});	
		    	 	
		         	$(this).css('height',tallestImage);
		         	$(this).parent().css('height',tallestImage);
		         });
	   	    });  	
		    
		    $(window).trigger('resize');
		    
	    
	    });

    });
    
    
    //carousel grabbing class
    $('body').on('mousedown','.caroufredsel_wrapper, .carousel-wrap[data-full-width="true"] .portfolio-items .col .work-item .work-info a',function(){
    	$(this).addClass('active');
    });
    
    $('body').on('mouseup','.caroufredsel_wrapper, .carousel-wrap[data-full-width="true"] .portfolio-items .col .work-item .work-info a',function(){
    	$(this).removeClass('active');
    });
	    

	//fadein for clients / carousels
	$('.clients.fade-in-animation').each(function() {

		$(this).appear(function() {
			$(this).find('> div').each(function(i){
				$(this).delay(i*100).animate({'opacity':"1"},450);
			});
			
			var $that = $(this);
			
			//add the css transition class back in after the aniamtion is done
			setTimeout(function(){ $that.addClass('completed'); },($(this).find('> div').length*100) + 450);
		},{accX: 0, accY: -155},'easeInCubic');
	
	}); 
	
	
/*-------------------------------------------------------------------------*/
/*	2.	Helper Functions
/*-------------------------------------------------------------------------*/

	jQuery.fn.setCursorPosition = function(position){
	    if(this.lengh == 0) return this;
	    return $(this).setSelection(position, position);
	}
	
	jQuery.fn.setSelection = function(selectionStart, selectionEnd) {
	    if(this.lengh == 0) return this;
	    input = this[0];
	
	    if (input.createTextRange) {
	        var range = input.createTextRange();
	        range.collapse(true);
	        range.moveEnd('character', selectionEnd);
	        range.moveStart('character', selectionStart);
	        range.select();
	    } else if (input.setSelectionRange) {
	        input.focus();
	        input.setSelectionRange(selectionStart, selectionEnd);
	    }
	
	    return this;
	}
	
	

	$.extend($.expr[':'], {
	    transparent: function(elem, i, attr){
	      return( $(elem).css("opacity") === "0" );
	    }
	});
	
	
	//count
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
	
	
	
	
/*-------------------------------------------------------------------------*/
/*	3.	Shortcode Stuff
/*-------------------------------------------------------------------------*/


/***************** Milestone Counter ******************/

	$('.nectar-milestone').each(function() {
		//symbol
		if($(this).has('[data-symbol]')) {
			if($(this).attr('data-symbol-pos') == 'before') {
				$(this).find('.number').prepend($(this).attr('data-symbol'));
			} else {
				$(this).find('.number').append($(this).attr('data-symbol'));
			}
		}
	});
	
	if(!$('body').hasClass('mobile')) {
		
		$('.nectar-milestone').each(function() {
			//animation
			$(this).appear(function() {
				var $endNum = parseInt($(this).find('.number span').text());
				$(this).find('.number span').countTo({
					from: 0,
					to: $endNum,
					speed: 1500,
					refreshInterval: 30
				});
			},{accX: 0, accY: 0});
		}); 
	}
	
/***************** Tabbed ******************/

	$('.tabbed > ul li a').click(function(){
		var $id = $(this).attr('href');
		
		if(!$(this).hasClass('active-tab') && !$(this).hasClass('loading')){
			$(this).parents('ul').find('a').removeClass('active-tab');
			$(this).addClass('active-tab');
			
			$(this).parents('.tabbed').find('> div:not(.clear)').css({'visibility':'hidden','position':'absolute','opacity':'0','left':'-9999px','display':'none'});
			$(this).parents('.tabbed').find('> div'+$id).css({'visibility':'visible', 'position' : 'relative','left':'0','display':'block'}).stop().animate({'opacity':1});
			
			if($(this).parents('.tabbed').find('> div'+$id + ' .iframe-embed').length > 0) responsiveVideoIframes();
		}
		
		return false;
	});
	
	//make sure the tabs don't have a nectar slider - we'll init this after the sliders load in that case
	
	$('.tabbed').each(function(){
		if($(this).find('.swiper-container').length == 0 && $(this).find('.testimonial_slider').length == 0 && $(this).find('#portfolio').length == 0 && $(this).find('iframe').length == 0){
			$(this).find('> ul li:first-child a').click();
		}	
		if($(this).find('.testimonial_slider').length == 1 || $(this).find('#portfolio').length == 1 || $(this).find('iframe').length > 0 ){
			var $that = $(this);
			
			$(this).find('.wpb_tab').show().css({'opacity':0,'height':'1px'});
			$(this).find('> ul li a').addClass('loading');
			
			setTimeout(function(){ 
				$that.find('.wpb_tab').hide().css({'opacity':1,'height':'auto'}); 
				$that.find('> ul li a').removeClass('loading');
				$that.find('> ul li:first-child a').click(); 
			},900);
		}
	});

	
/***************** Toggle ******************/
	
	//toggles
	$('.toggle h3 a').click(function(){
		
		if(!$(this).parents('.toggles').hasClass('accordion')) { 
			$(this).parents('.toggle').find('> div').slideToggle(300);
			$(this).parents('.toggle').toggleClass('open');
			
			//switch icon
			if( $(this).parents('.toggle').hasClass('open') ){
				$(this).find('i').attr('class','icon-minus-sign');
			} else {
				$(this).find('i').attr('class','icon-plus-sign');
			}

			if($(this).parents('.toggle').find('> div .iframe-embed').length > 0 && $(this).parents('.toggle').find('> div .iframe-embed iframe').height() == '0') responsiveVideoIframes();
			
			return false;
		}
	});
	
	//accordion
	$('.accordion .toggle h3 a').click(function(){
		
		if($(this).parents('.toggle').hasClass('open')) return false;
		
		$(this).parents('.toggles').find('.toggle > div').slideUp(300);
		$(this).parents('.toggles').find('.toggle h3 a i').attr('class','icon-plus-sign');
		$(this).parents('.toggles').find('.toggle').removeClass('open');
		
		$(this).parents('.toggle').find('> div').slideDown(300);
		$(this).parents('.toggle').addClass('open');
		
		//switch icon
		if( $(this).parents('.toggle').hasClass('open') ){
			$(this).find('i').attr('class','icon-minus-sign');
		} else {
			$(this).find('i').attr('class','icon-plus-sign');
		}
		
		return false;
	});
	
	//accordion start open
	$('.accordion > .toggle').first().addClass('open').find('> div').show();
	$('.accordion > .toggle').first().find('a i').attr('class','icon-minus-sign');
	
	$('.toggles').each(function(){
		
		var $isAccordion = ($(this).hasClass('accordion')) ? true : false;
		
		$(this).find('.toggle').each(function(){
			if($(this).find('> div .testimonial_slider').length > 0 || $(this).find('> div iframe').length > 0) {
				var $that = $(this);
				$(this).find('> div').show().css({'opacity':0,'height':'1px', 'padding':'0'});
				
				testimonialHeightResize();
				
				setTimeout(function(){
					$that.find('> div').hide().css({'opacity':1,'height':'auto', 'padding':'10px 14px'}); 
					if($isAccordion == true && $that.index() == 0) $that.find('> div').slideDown(300);
				},900);
			} 
		});
	})
	

/***************** PARALLAX SECTIONS ******************/


	var $window = $(window);
	var windowHeight = $window.height();
	
	$window.resize(function () {
		windowHeight = $window.height();
	});
	
	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		//get the starting position of each element to have parallax applied to it		
		$this.each(function(){
		    firstTop = $this.offset().top;
		});
		
		$window.resize(function () {
			$this.each(function(){
		  	    firstTop = $this.offset().top;
			});
		});
		
		$window.load(function(){
			$this.each(function(){
		  	    firstTop = $this.offset().top;
			}); 
		});
	 
	
		getHeight = function(jqo) {
			return jqo.outerHeight(true);
		};
		 
			
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();				
	
			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);
				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}
	
				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}		
	
		$window.bind('scroll', update).resize(update);
		update();
	};



	
/***************** Full Width Section ******************/
	function fullWidthSections(){
		
		var $scrollBar = ($('#ascrail2000').length > 0 && window.innerWidth > 1000) ? -13 : 0;
			 
		if($('#boxed').length == 1){
			$justOutOfSight = ((parseInt($('.container-wrap').width()) - parseInt($('.main-content').css('max-width'))) / 2) + 4;
		} else {
			var $windowWidth = ($(window).width() <= parseInt($('.container').css('max-width'))) ? parseInt($('.container').css('max-width')) : $(window).width();
			$justOutOfSight = Math.ceil( (($windowWidth + $scrollBar - parseInt($('.container').css('max-width'))) / 2) )
		}
		
		$('.full-width-section').each(function(){
			
			if(!$(this).parent().hasClass('span_9') && !$(this).parent().hasClass('span_3') && $(this).parent().attr('id') != 'sidebar-inner' && $(this).parent().attr('id') != 'portfolio-extra' &&
			!$(this).hasClass('non-fw')){

				$(this).css({
					'margin-left': - $justOutOfSight,
					'padding-left': $justOutOfSight,
					'padding-right': $justOutOfSight,
					'visibility': 'visible'
				});	
			}  else if($(this).parent().attr('id') == 'portfolio-extra' && $('#full_width_portfolio').length != 0) {
				$(this).css({
					'margin-left': - $justOutOfSight,
					'padding-left': $justOutOfSight,
					'padding-right': $justOutOfSight,
					'visibility': 'visible'
				});	
			}
			
			else {
				$(this).css({
					'margin-left': 0,
					'padding-left': 0,
					'padding-right': 0,
					'visibility': 'visible'
				});	
			}
			
		});
	
	
	    //full width content sections
	    $('.carousel-outer').has('.carousel-wrap[data-full-width="true"]').css('overflow','visible');
	    
	    $('.carousel-wrap[data-full-width="true"], .portfolio-items[data-col-num="elastic"], .full-width-content').each(function(){
			
			$extraSpace = ($(this).hasClass('carousel-wrap')) ? 1 : 4;
	    	$carouselWidth = ($('#boxed').length == 1) ? parseInt($('.container').css('max-width')) + parseInt($justOutOfSight*2) : $(window).width() +$extraSpace  + $scrollBar ;
	    	
	    	if($(this).parent().hasClass('default-style')) { 
	    		
	    		if($('#boxed').length != 0) {
	    			$carouselWidth = ($('#boxed').length == 1) ? parseInt($('.container').css('max-width')) + parseInt($justOutOfSight*2) : $(window).width() + $extraSpace + $scrollBar ;
				}
				else {
					$carouselWidth = ($('#boxed').length == 1) ? parseInt($('.container').css('max-width')) + parseInt($justOutOfSight*2) : $(window).width()  - ($(window).width()*.02) + $extraSpace + $scrollBar ;
					$windowWidth = ($(window).width() <= parseInt($('.container').css('max-width'))) ? parseInt($('.container').css('max-width')) : $(window).width() - ($(window).width()*.02);
					$justOutOfSight = Math.ceil( (($windowWidth + $scrollBar - parseInt($('.container').css('max-width'))) / 2) )
				}
			}
	    	
	    	if(!$(this).parents('.span_9').length > 0 && !$(this).parent().hasClass('span_3') && $(this).parent().attr('id') != 'sidebar-inner' && $(this).parent().attr('id') != 'portfolio-extra' 
	    	&& !$(this).find('.nectar-slider-wrap[data-full-width="true"]').length > 0 && !$(this).find('.carousel-wrap[data-full-width="true"]').length > 0
	    	&& !$(this).find('#portfolio[data-col-num="elastic"]').length > 0){

				$(this).css({
					'margin-left': - $justOutOfSight,
					'width': $carouselWidth,
					'visibility': 'visible'
				});	
			}  else if($(this).parent().attr('id') == 'portfolio-extra' && $('#full_width_portfolio').length != 0) {
				$(this).css({
					'margin-left': - $justOutOfSight,
					'width': $carouselWidth,
					'visibility': 'visible'
				});	
			}
			
			else {
				$(this).css({
					'margin-left': 0,
					'visibility': 'visible'
				});	
			}
	    	
	    });

	}
	
	var $contentElementsNum = ($('#portfolio-extra').length == 0) ? $('.main-content > .row > *').length : $('.main-content > .row #portfolio-extra > *').length ;

	$('.full-width-section.parallax_section').each(function(){
	   var $id = $(this).attr('id');
	   $('#'+$id + ".parallax_section").parallax("50%", 0.2);
	});
	
	
	//if fullwidth section is first or last, remove the margins so it fits flush against header/footer
	$('.full-width-section, .full-width-content, .row > .nectar-slider-wrap[data-full-width="true"], .wpb_wrapper > .nectar-slider-wrap[data-full-width="true"], .parallax_slider_outer, .portfolio-items[data-col-num="elastic"]').each(function(){
		
		if(!$(this).parent().hasClass('span_9') && !$(this).parent().hasClass('span_3') && $(this).parent().attr('id') != 'sidebar-inner'){
			
			if($(this).parents('.wpb_row').length > 0){ 
			
				if($(this).parents('#portfolio-extra').length > 0 && $('#full_width_portfolio').length == 0) return false;
				
				////first
				if($(this).parents('.wpb_row').index() == '0' && $('#page-header-bg').length != 0 || $(this).parents('.wpb_row').index() == '0' && $('.parallax_slider_outer').length != 0){
					$(this).css('margin-top','-2.1em').addClass('first-section nder-page-header');
	
				} 
				else if($(this).parents('.wpb_row').index() == '0' && $('#page-header-bg').length == 0 && $('.project-title').length == 0 || $(this).parents('.wpb_row').index() == '0' && $('.parallax_slider_outer').length == 0 && $('.project-title').length == 0){
					$(this).css('margin-top','-70px').addClass('first-section');
				} 
				
				//check if it's also last (i.e. the only fws)
				if($(this).parents('.wpb_row').index() == $contentElementsNum-1 && $('#respond').length == 0 ) { 
					if($(this).attr('id') != 'portfolio-filters-inline') {
						$('.container-wrap').css('padding-bottom','0px');
						$('#call-to-action .triangle').remove();
					}
				} 
			
			} else {
				
				if($(this).parents('#portfolio-extra').length > 0 && $('#full_width_portfolio').length == 0) return false;
				
				if( $(this).find('#portfolio-filters-inline').length == 0 && $(this).attr('id') != 'post-area' ) {
					
					////first
					if($(this).index() == '0' && $('#page-header-bg').length != 0 || $(this).index() == '0' && $('.parallax_slider_outer').length != 0){
						$(this).css('margin-top','-2.1em').addClass('first-section nder-page-header');
		
					} 
					else if($(this).index() == '0' && $('#page-header-bg').length == 0 || $(this).index() == '0' && $('.parallax_slider_outer').length == 0){
						$(this).css('margin-top','-70px').addClass('first-section');
					} 
					
					//check if it's also last (i.e. the only fws)
					if($(this).index() == $contentElementsNum-1 && $('#respond').length == 0 ) { 
						$('.container-wrap').css('padding-bottom','0px');
						$('#call-to-action .triangle').remove();
					} 
				}
				
			}
		}
	});
	
	$('#portfolio-extra > .nectar-slider-wrap[data-full-width="true"], .portfolio-wrap').each(function(){
		//check if it's last 
		if($(this).index() == $contentElementsNum-1 && $('#commentform').length == 0) { 
			$(this).css('margin-bottom','-40px');
			$('#call-to-action .triangle').remove();
		}
	});
	
	
	
	$('#portfolio-filters').each(function(){
		////first
		if($(this).index() == '0' && $('#page-header-bg').length != 0 || $(this).index() == '0' && $('.parallax_slider_outer').length != 0){
			$(this).css({'margin-top':'-2.1em'}).addClass('first-section nder-page-header');
		}  else if($(this).index() == '0' && $('#page-header-bg').length == 0 || $(this).index() == '0' && $('.parallax_slider_outer').length == 0){
			$(this).css({'margin-top':'0px'}).addClass('first-section');
		}
	});
	
	$('#portfolio-filters-inline').each(function(){
		////first
		if($(this).parents('.wpb_row').length > 0){ 
			
			if($(this).parents('.wpb_row').index() == '0' && $('#page-header-bg').length != 0 || $(this).parents('.wpb_row').index() == '0' && $('.parallax_slider_outer').length != 0){
				$(this).css({'margin-top':'-2.1em', 'padding-top' : '19px'}).addClass('first-section nder-page-header');
			}  else if($(this).parents('.wpb_row').index() == '0' && $('#page-header-bg').length == 0 || $(this).parents('.wpb_row').index() == '0' && $('.parallax_slider_outer').length == 0){
				$(this).css({'margin-top':'-70px', 'padding-top' : '50px'}).addClass('first-section');
			}
			
		} else {
			if($(this).index() == '0' && $('#page-header-bg').length != 0 || $(this).index() == '0' && $('.parallax_slider_outer').length != 0){
				$(this).css({'margin-top':'-2.1em', 'padding-top' : '19px'}).addClass('first-section nder-page-header');
			}  else if($(this).index() == '0' && $('#page-header-bg').length == 0 || $(this).index() == '0' && $('.parallax_slider_outer').length == 0){
				$(this).css({'margin-top':'-70px', 'padding-top' : '50px'}).addClass('first-section');
			}
		}
		
	});
	
	
	
	$('.parallax_slider_outer').each(function(){
		if(!$(this).parent().hasClass('span_9') && !$(this).parent().hasClass('span_3') && $(this).parent().attr('id') != 'sidebar-inner'){
			
			if($(this).parents('#portfolio-extra').length > 0 && $('#full_width_portfolio').length == 0) return false;
			////first
			if($(this).parent().index() == '0' && $('#page-header-bg').length != 0){
				$(this).addClass('first-section nder-page-header');

			} 
			else if($(this).parent().index() == '0' && $('#page-header-bg').length == 0){
				$(this).css('margin-top','-40px').addClass('first-section');
				if(!$('body').hasClass('single-post')) $('.container-wrap').css('padding-top', '0px');
			} 
			
			//check if it's also last (i.e. the only fws)
			if($(this).parent().index() == $contentElementsNum-1 && $('#post-area').length == 0) {
				$('#call-to-action .triangle').remove();
				$('.container-wrap').hide();
			}
		}
	});
	
	//if not using a fullwidth slider first, ajdust the top padding
	if( $('.nectar-slider-wrap.first-section').length > 0 && $('.nectar-slider-wrap.first-section').attr('data-full-width') != 'true' || $('.nectar-slider-wrap.first-section').length > 0 && $('.nectar-slider-wrap.first-section').attr('data-full-width') != 'boxed-full-width' ) $('body').attr('data-bg-header','false');
	if( $('.wpb_row.first-section .nectar-slider-wrap').length > 0 && $('.wpb_row.first-section .nectar-slider-wrap').attr('data-full-width') != 'true' || $('.wpb_row.first-section .nectar-slider-wrap').length > 0 && $('.wpb_row.first-section .nectar-slider-wrap').attr('data-full-width') != 'boxed-full-width' ) $('body').attr('data-bg-header','false');
	
	
	//set sizes
	fullWidthSections();
	
	
	//sizing for fullwidth sections that are image only
	
	////set inital sizes
	$('.full-width-section').each(function(){
		
		var $fwsHeight = $(this).outerHeight(true);
		
		//make sure it's empty and also not being used as a small dvider
		if($(this).find('.span_12 *').length == 0 && $.trim( $(this).find('.span_12').text() ).length == 0  && $fwsHeight > 40){
			$(this).addClass('bg-only');
			$(this).css({'height': $fwsHeight, 'padding-top': '0px', 'padding-bottom': '0px'});
			$(this).attr('data-image-height',$fwsHeight);
		}

	});
	
	function fullwidthImgOnlySizing(){
		
		$('.full-width-section.bg-only').each(function(){
			var $initialHeight = $(this).attr('data-image-height');
			
			if( window.innerWidth < 1000 && window.innerWidth > 690 ) {
				$(this).css('height', $initialHeight - $initialHeight*.60);
			} 
			
			else if( window.innerWidth <= 690 ) {
				$(this).css('height', $initialHeight - $initialHeight*.78);
			} 
			
			else if( window.innerWidth < 1300 && window.innerWidth >= 1000  ) {
				$(this).css('height', $initialHeight - $initialHeight*.33);
			} 
			
			else {
				$(this).css('height', $initialHeight);
			}
			
		});
		
	}
	
	fullwidthImgOnlySizing();
	
/***************** Checkmarks ******************/

	$('ul.checks li').prepend('<i class="icon-ok-sign"></i>');
	

/***************** Image with Animation / Col Animation *******************/

$('img.img-with-animation').each(function() {

	$(this).appear(function() {
		if($(this).attr('data-animation') == 'fade-in-from-left'){
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1,
				'left' : '0px'
			},800,'easeOutSine');
		} else if($(this).attr('data-animation') == 'fade-in-from-right'){
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1,
				'right' : '0px'
			},800,'easeOutSine');
		} else if($(this).attr('data-animation') == 'fade-in-from-bottom'){
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1,
				'bottom' : '0px'
			},800,'easeOutSine');
		} else if($(this).attr('data-animation') == 'fade-in') {
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1
			},800,'easeOutSine');	
		} else if($(this).attr('data-animation') == 'grow-in') {
			var $that = $(this);
			setTimeout(function(){ 
				$that.transition({ scale: 1, 'opacity':1 },900,'cubic-bezier(0.15, 0.84, 0.35, 1.25)');
			},$that.attr('data-delay'));
		}
		
	},{accX: 0, accY: -105},'easeInCubic');

});



$('.col.has-animation, .wpb_column.has-animation').each(function() {

	$(this).appear(function() {
		if($(this).attr('data-animation') == 'fade-in-from-left'){
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1,
				'left' : '0px'
			},800,'easeOutSine');
		} else if($(this).attr('data-animation') == 'fade-in-from-right'){
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1,
				'right' : '0px'
			},800,'easeOutSine');
		} else if($(this).attr('data-animation') == 'fade-in-from-bottom'){
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1,
				'bottom' : '0px'
			},800,'easeOutSine');
		} else if($(this).attr('data-animation') == 'fade-in') {
			$(this).delay($(this).attr('data-delay')).animate({
				'opacity' : 1
			},800,'easeOutSine');	
		} else if($(this).attr('data-animation') == 'grow-in') {
			var $that = $(this);
			setTimeout(function(){ 
				$that.transition({ scale: 1, 'opacity':1 },900,'cubic-bezier(0.15, 0.84, 0.35, 1.25)');
			},$that.attr('data-delay'));
		}
		
	},{accX: 0, accY: -105},'easeInCubic');

}); 	 	
	
/***************** 4 Col Grid in iPad ******************/
	
	//add one-fourth class
	$('.col.span_3, .vc_span3').each(function(){
		var $currentDiv = $(this);
		var $nextDiv = $(this).next('div');
		if( $nextDiv.hasClass('span_3') && !$currentDiv.hasClass('one-fourths') || $nextDiv.hasClass('vc_span3') && !$currentDiv.hasClass('one-fourths')) {
			$currentDiv.addClass('one-fourths clear-both');
			$nextDiv.addClass('one-fourths right-edge');
		}
	});
	
	//make empty second 1/2 half columsn display right on iPad
	$('.span_12 .col.span_6').each(function(){
		if($(this).next('div').hasClass('span_6') && $.trim( $(this).next('div').html() ).length == 0 ) {
			$(this).addClass('empty-second')
		}
	}); 
	
	
/***************** Bar Graph ******************/
	
	$('.nectar-progress-bar').each(function(i){
		
		$(this).appear(function(){
			
			var percent = $(this).find('span').attr('data-width');
			var $endNum = parseInt($(this).find('span strong i').text());
			var $that = $(this);
			
			$(this).find('span').animate({
				'width' : percent + '%'
			},1600, 'easeOutCirc',function(){
			});
			
			$(this).find('span strong').animate({
				'opacity' : 1
			},1350);
			
			
			$(this).find('span strong i').countTo({
				from: 0,
				to: $endNum,
				speed: 1100,
				refreshInterval: 30,
				onComplete: function(){
		
				}
			});	
			
			////100% progress bar 
				if(percent == '100'){
					$that.find('span strong').addClass('full');
				}
	
		});

	});
	



/***************** Pricing Tables ******************/


var $tallestCol;

function pricingTableHeight(){
	$('.pricing-table').each(function(){
		$tallestCol = 0;
		
		$(this).find('> div ul').each(function(){
			($(this).height() > $tallestCol) ? $tallestCol = $(this).height() : $tallestCol = $tallestCol;
		});	
		
		//safety net incase pricing tables height couldn't be determined
		if($tallestCol == 0) $tallestCol = 'auto';
		
		//set even height
		$(this).find('> div ul').css('height',$tallestCol);

	});
}

pricingTableHeight();

 
/***************** Testimonial Slider ******************/

//fadeIn
$('.testimonial_slider').animate({'opacity':'1'},800);

//testimonial slider controls
$('body').on('click','.testimonial_slider .controls li', function(){
	
	if($(this).find('span').hasClass('active')) return false;
	
	var $index = $(this).index();
	var currentHeight = $(this).parents('.testimonial_slider').find('.slides blockquote').eq($index).height();
	
	$(this).parents('.testimonial_slider').find('li').html('<span class="pagination-switch"></span>');
	$(this).html('<span class="pagination-switch active"></span>');
	
	$(this).parents('.testimonial_slider').find('.slides blockquote').stop().css({'opacity':'0', 'left':'-25px', 'z-index': '1'});
	$(this).parents('.testimonial_slider').find('.slides blockquote').eq($index).stop(true,true).animate({'opacity':'1','left':'0'},550,'easeOutCubic').css('z-index','20');
	$(this).parents('.testimonial_slider').find('.slides').stop(true,true).animate({'height' : currentHeight + 20 + 'px' },450,'easeOutCubic');
	
});


var $tallestQuote;

//create controls
$('.testimonial_slider').each(function(){
	
	$(this).append('<div class="controls"><ul></ul></div>');
	
	var slideNum = $(this).find('blockquote').length;
	var $that = $(this);
	
	for(var i=0;i<slideNum;i++) {
		$that.find('.controls ul').append('<li><span class="pagination-switch"></span></li>')
	}
	
	//activate first slide
	$(this).find('.controls ul li').first().click();
	
	//autorotate
	if($(this).attr('data-autorotate').length > 0) {
		slide_interval = (parseInt($(this).attr('data-autorotate')) < 100) ? 4000 : parseInt($(this).attr('data-autorotate'));
		var $that = $(this);
		var $rotate = setInterval(function(){ testimonialRotate($that) },slide_interval);
	}
	
	$(this).find('.controls li').click(function(e){
		if(typeof e.clientX != 'undefined') clearInterval($rotate);
	});
	
	////swipe for testimonials
	$(this).swipe({
	
		swipeLeft : function(e) {
			$(this).find('.controls ul li span.active').parent().next('li').find('span').trigger('click');
			e.stopImmediatePropagation();
			clearInterval($rotate);
			return false;
		 },
		 swipeRight : function(e) {
			$(this).find('.controls ul li span.active').parent().prev('li').find('span').trigger('click');
			e.stopImmediatePropagation();
			clearInterval($rotate);
			return false;
		 }    
	});
	
});

function testimonialRotate(slider){
	
	var $testimonialLength = slider.find('li').length;
	var $currentTestimonial = slider.find('.pagination-switch.active').parent().index();
	
	//stop the rotation when toggles are closed
	if( slider.parents('.toggle').length > 0 && slider.parents('.toggle').hasClass('open') ) {

		if( $currentTestimonial+1 == $testimonialLength) {
			slider.find('ul li:first-child').click();
		} else {
			slider.find('.pagination-switch.active').parent().next('li').click();
		}
		
	} else {
		
		if( $currentTestimonial+1 == $testimonialLength) {
			slider.find('ul li:first-child').click();
		} else {
			slider.find('.pagination-switch.active').parent().next('li').click();
		}
	
	}

}

function testimonialHeightResize(){
	$('.testimonial_slider').each(function(){
		
		var $index = $(this).find('.controls ul li span.active').parent().index();
		var currentHeight = $(this).find('.slides blockquote').eq($index).height();
		$(this).find('.slides').stop(true,true).animate({'height' : currentHeight + 20 + 'px' },450,'easeOutCubic');
		
	});
}



/***************** WP Media Embed / External Embed ******************/

//this isn't the for the video shortcode* This is to help any external iframe embed fit & resize correctly 
function responsiveVideoIframesInit(){
	$('iframe').each(function(){
		
		//make sure the iframe has a src (things like adsense don't)
		if(typeof $(this).attr('src') != 'undefined' ){
			
			if( $(this).attr('src').toLowerCase().indexOf("youtube") >= 0 || $(this).attr('src').toLowerCase().indexOf("vimeo") >= 0  || $(this).attr('src').toLowerCase().indexOf("twitch.tv") >= 0 || $(this).attr('src').toLowerCase().indexOf("kickstarter") >= 0 || $(this).attr('src').toLowerCase().indexOf("dailymotion") >= 0) {
				$(this).wrap('<div class="iframe-embed"/>');	
				
				$(this).attr('data-aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
	
				//add wmode=transparent to all youytube embeds to fix z-index issues in IE
				if($(this).attr('src').indexOf('wmode=transparent') == -1) {
					if($(this).attr('src').indexOf('?') == -1){
						$(this).attr('src',$(this).attr('src') + '?wmode=transparent');
					} else {
						$(this).attr('src',$(this).attr('src') + '&wmode=transparent');
					}
				}
			}
			 
		} else {
			//if($(this).parents('ins').length == 0){ 
			//	$(this).wrap('<div class="iframe-embed-standard"/>');	
			//}
		}
		
	});
}

function responsiveVideoIframes(){
	
	 $('iframe[data-aspectRatio]').each(function() {
	 	var newWidth = $(this).parent().width();
	 	 
		var $el = $(this);
		
		$el.width(newWidth).height(newWidth * $el.attr('data-aspectRatio'));
		
	});
}

responsiveVideoIframesInit();
responsiveVideoIframes();


//unwrap post and protfolio videos
$('.video-wrap iframe').unwrap();
$('#sidebar iframe[src]').unwrap();

$('video').attr('width','100%');
$('video').attr('height','100%'); 

$('audio').attr('width','100%');
$('audio').attr('height','100%');

$('audio').css('visibility','visible');

if($('body').hasClass('mobile')){
	$('video').css('visibility','hidden');
} else {
	$('video').css('visibility','visible');
}

$(window).load(function(){
	$('video').css('visibility','visible');
	showLateIframes();
});

$(window).trigger('resize');

//webkit video back button fix 
$('iframe[src]').each(function(){
	$(this).attr('src',$(this).attr('src'));
	$(this).css({'opacity':'1', 'visibility':'visible'});
});

showLateIframes();

function showLateIframes(){
	$('iframe[src]').css('opacity','1');
	setTimeout(function(){ $('iframe[src]').css('opacity','1'); }, 100);
	setTimeout(function(){ $('iframe[src]').css('opacity','1'); }, 500);
	setTimeout(function(){ $('iframe[src]').css('opacity','1'); }, 1000);
	setTimeout(function(){ $('iframe[src]').css('opacity','1'); }, 1500);
	setTimeout(function(){ $('iframe[src]').css('opacity','1'); }, 2500);
}


/***************** Nectar Video BG ******************/

if($('.nectar-video-bg').length > 0) {
	
	$('.wpb_row .nectar-video-bg').mediaelementplayer({
		enableKeyboard: false,
		iPadUseNativeControls: false,
		pauseOtherPlayers: false,
		// force iPhone's native controls
		iPhoneUseNativeControls: false,
		// force Android's native controls
		AndroidUseNativeControls: false
	});

	var min_w = 1200; // minimum video width allowed
	var vid_w_orig;  // original video dimensions
	var vid_h_orig;
	
    vid_w_orig = 1280;
    vid_h_orig = 720;
 
	function resizeVideoToCover() {
		$('.nectar-video-wrap').each(function(i){
			
			var $containerHeight = $(this).parents('.wpb_row').outerHeight();			
			var $containerWidth = $(this).parents('.wpb_row').outerWidth();

		    // set the video viewport to the window size
		    $(this).width($containerWidth);
		    $(this).height($containerHeight);
		
		    // use largest scale factor of horizontal/vertical
		    var scale_h = $containerWidth / vid_w_orig;
		    var scale_v = ($containerHeight - $containerHeight) / vid_h_orig; 
		    var scale = scale_h > scale_v ? scale_h : scale_v;
			
			//update minium width to never allow excess space
		    min_w = 1280/720 * ($containerHeight+40);
		    
		    // don't allow scaled width < minimum video width
		    if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;}
		        
		    // now scale the video
		    $(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * vid_w_orig +20));
		    $(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * vid_h_orig +20));
		    
		    // and center it by scrolling the video viewport
		    $(this).scrollLeft(($(this).find('video').width() - $containerWidth) / 2);
		    $(this).scrollTop(($(this).find('video').height() - ($containerHeight)) / 2);
		    $(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - ($containerHeight)) / 2);

		});
	}
    
    //init
    setTimeout(function(){
    	resizeVideoToCover();
    	$('.video-color-overlay').each(function(){
    		$(this).css('background-color',$(this).attr('data-color'));
    	});
    	$('.nectar-video-wrap').animate({'opacity':'1'},800,'easeInOutExpo');
    	$('.video-color-overlay').animate({'opacity':'0.7'},800,'easeInOutExpo');
    	
    },400);

	if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
		$('.wpb_row .mobile-video-image').show();
		$('.nectar-video-wrap').remove();
	}
		
}


/*-------------------------------------------------------------------------*/
/*	4.	Header + Search
/*-------------------------------------------------------------------------*/	 



/***************** Page Headers ******************/

var pageHeaderHeight = parseInt($('#page-header-bg').attr('data-height'));
var pageHeaderHeightCopy = parseInt($('#page-header-bg').attr('data-height'));
var pageHeadingHeight;

//set the user defined height
$('#page-header-bg').css('height',pageHeaderHeight+'px').removeClass('not-loaded');
setTimeout(function(){ $('#page-header-bg').css('overflow','visible') },800);
	
function pageHeader(){
	
	
	if( window.innerWidth < 1000 && window.innerWidth > 690 && !$('body').hasClass('salient_non_responsive') ) {
		
		$('#page-header-bg').attr('data-height', pageHeaderHeightCopy/1.5).css('height',pageHeaderHeightCopy/1.5 +'px');
		
	} else if( window.innerWidth <= 690 && !$('body').hasClass('salient_non_responsive')) {
		
		$('#page-header-bg').attr('data-height', pageHeaderHeightCopy/2.2).css('height',pageHeaderHeightCopy/2.4 +'px');
		
	} else {
		$('#page-header-bg').attr('data-height', pageHeaderHeightCopy).css('height',pageHeaderHeightCopy +'px');
		$('#page-header-wrap').css('height',pageHeaderHeightCopy +'px');
	}
	
	
	if(!$('body').hasClass('mobile')){
		
		//recalc
		pageHeaderHeight = parseInt($('#page-header-bg').attr('data-height'));
		$('#page-header-bg .container > .row').css('top',0);
		
		//center the heading
		pageHeadingHeight = $('#page-header-bg .col.span_6').height();
		$('#page-header-bg:not("[data-parallax=1]") .col.span_6').css('top', (pageHeaderHeight/2) - (pageHeadingHeight/2) + 22);
		
		//center portfolio filters
		$('#page-header-bg:not("[data-parallax=1]") #portfolio-filters').css('top', (pageHeaderHeight/2) + 2);	
		
		if($('#page-header-bg[data-parallax="1"] .span_6').css('opacity') > 0) {
			//center the parallax heading
		    $('#page-header-bg[data-parallax="1"] .span_6').css({ 
				'opacity' : 1-($scrollTop/(pageHeaderHeight-($('#page-header-bg .col.span_6').height()*2)+60)),
				'top' : ((pageHeaderHeight/2) - (pageHeadingHeight/2)) +10 +"px"
		    });
		    
		    //center parllax portfolio filters
		    $('#page-header-bg[data-parallax="1"] #portfolio-filters').css({ 
				'opacity' : 1-($scrollTop/(pageHeaderHeight-($('#page-header-bg .col.span_6').height()*2)+75)),
				'top' : ($scrollTop*-0.10) + ((pageHeaderHeight/2)) - 7 +"px"
		    });
	   }
	}
	
	else {
		//recalc
		pageHeaderHeight = parseInt($('#page-header-bg').attr('data-height'));
		
		//center the heading
		var pageHeadingHeight = $('#page-header-bg .container > .row').height();
		$('#page-header-bg .container > .row').css('top', (pageHeaderHeight/2) - (pageHeadingHeight/2) + 5);
		
	}


	$('#page-header-bg .container > .row').css('visibility','visible');
}

pageHeader();


if($('#header-outer').attr('data-header-resize') == '' || $('#header-outer').attr('data-header-resize') == '0'){
	$('#page-header-wrap').css('margin-top','0');
}

 
/***************** Parallax Page Headers ******************/
if($('#page-header-bg[data-parallax="1"]').length > 0) {

	//fadeIn
	function extractUrl(input) {
 		return input.replace(/"/g,"").replace(/url\(|\)$/ig, "");
	}
	
	var img = new Image();
	
	var imgX, imgY, aspectRatio;
	var diffX, diffY;
	var pageHeadingHeight = $('#page-header-bg .col.span_6').height();
	var pageHeaderHeight = parseInt($('#page-header-bg').attr('data-height'));
	var headerPadding2 = parseInt($('#header-outer').attr('data-padding'))*2;
	var wooCommerceHeader = ($('.demo_store').length > 0) ? 32 : 0 ;
	img.onload = function() {
	
	  $('#page-header-bg[data-parallax="1"]').css({'top': (logoHeight+headerPadding+headerResizeOffExtra+extraHeight-extraDef+secondaryHeader+wooCommerceHeader)  + 'px' });
	  $('#page-header-bg[data-parallax="1"]').animate({ 'opacity' : 1},650,'easeInCubic');
	  
	  $('#page-header-wrap').css({'height' : pageHeaderHeight});
	  
	  $('#page-header-bg[data-parallax="1"] .span_6').css({ 
			'opacity' : 1-($scrollTop/(pageHeaderHeight-($('#page-header-bg .col.span_6').height()*2)+60)),
			'top' : ((pageHeaderHeight/2) - (pageHeadingHeight/2)) +10 +"px"
	   });
	   
	   $('#page-header-bg[data-parallax="1"] #portfolio-filters').css({ 
			'opacity' : 1-($scrollTop/(pageHeaderHeight-($('#page-header-bg .col.span_6').height()*2)+75)),
			'top' : ($scrollTop*-0.10) + ((pageHeaderHeight/2)) - 7 +"px"
	   });
	}
	
	img.src = extractUrl($('#page-header-bg[data-parallax="1"]').css('background-image'));
	
	
	
	
	$(window).scroll(function(){
		
		var $scrollTop = $(window).scrollTop();
		var pageHeadingHeight = $('#page-header-bg .col.span_6').height();
		var extraHeight = ($('#wpadminbar').length > 0) ? 28 : 0; //admin bar
		
		if(!$('body').hasClass('mobile') && navigator.userAgent.match(/iPad/i) == null){
	
			//calc bg pos
			//$('#page-header-bg[data-parallax="1"]').css({'top': ((- $scrollTop / 5)+logoHeight+headerPadding+headerResizeOffExtra+extraHeight-extraDef+secondaryHeader)  + 'px' });
			$('#page-header-bg[data-parallax="1"]').transition({ y: $(window).scrollTop()*-.2 },0);	
			
			$('#page-header-bg[data-parallax="1"] .span_6').css({ 
				'opacity' : 1-($scrollTop/(pageHeaderHeight-($('#page-header-bg .col.span_6').height()*2)+60))
			});
			
			$('#page-header-bg[data-parallax="1"] .span_6').stop(true,true).transition({ y: $(window).scrollTop()*-.14 },0);
			
			
			if($('#page-header-bg[data-parallax="1"] .span_6').css('opacity') == 0){
				$('#page-header-bg[data-parallax="1"] .span_6, #page-header-bg[data-parallax="1"] #portfolio-filters').hide();
			} else {
				$('#page-header-bg[data-parallax="1"] .span_6, #page-header-bg[data-parallax="1"] #portfolio-filters').show();
			}
			
			//hide elements to allow other parallax sections to work in webkit browsers
			if( ($scrollTop / (pageHeaderHeight + $('#header-space').height() + extraHeight)) > 1 ) {
				$('#page-header-bg').css('visibility','hidden').hide();
			}
			else {
			 	$('#page-header-bg').css('visibility','visible').show();
		    }
			
			
		}
		
	
	});
}





/***************** WooCommerce Cart *****************/
var timeout;
var productToAdd;

//notification
$('.woocommerce .product-wrap .add_to_cart_button').click(function(){
	productToAdd = $(this).parents('li').find('h3').text();
	$('#header-outer .cart-notification span.item-name').html(productToAdd);
});

//notification hover
$('#header-outer .cart-notification').hover(function(){
	$(this).fadeOut(400);
	$('#header-outer .widget_shopping_cart').stop(true,true).fadeIn(400);
	$('#header-outer .cart_list').stop(true,true).fadeIn(400);
	clearTimeout(timeout);
});

//cart dropdown
$('#header-outer div.cart-outer').hover(function(){
	$('#header-outer .widget_shopping_cart').stop(true,true).fadeIn(400);
	$('#header-outer .cart_list').stop(true,true).fadeIn(400);
	clearTimeout(timeout);
	$('#header-outer .cart-notification').fadeOut(300);
},function(e){
	$('#header-outer .widget_shopping_cart').stop(true,true).fadeOut(300);
	$('#header-outer .cart_list').stop(true,true).fadeOut(300);
});

$('body').bind('added_to_cart', shopping_cart_dropdown_show);
$('body').bind('added_to_cart', shopping_cart_dropdown);

function shopping_cart_dropdown() {
		
		if(!$('.widget_shopping_cart .widget_shopping_cart_content .cart_list .empty').length && $('.widget_shopping_cart .widget_shopping_cart_content .cart_list').length > 0 ) {
			$('.cart-menu-wrap').addClass('has_products');
		}
}

function shopping_cart_dropdown_show(e) {
		
		clearTimeout(timeout);
		
		if(!$('.widget_shopping_cart .widget_shopping_cart_content .cart_list .empty').length && $('.widget_shopping_cart .widget_shopping_cart_content .cart_list').length > 0 && typeof e.type != 'undefined' ) {
			//before cart has slide in
			if(!$('#header-outer .cart-menu-wrap').hasClass('has_products')) {
				setTimeout(function(){ $('#header-outer .cart-notification').fadeIn(400); },400);
			}
			else if(!$('#header-outer .cart-notification').is(':visible')) {
				$('#header-outer .cart-notification').fadeIn(400);
			} else {
				$('#header-outer .cart-notification').show();
			}
			timeout = setTimeout(hideCart,2700);
		}
}

function hideCart() {
	$('#header-outer .cart-notification').stop(true,true).fadeOut();
}

setTimeout(shopping_cart_dropdown,550);
setTimeout(shopping_cart_dropdown,650);
setTimeout(shopping_cart_dropdown,950);




/***************** Search ******************/
	var $placeholder = $('#search input[type=text]').attr('data-placeholder');
	var logoHeight = parseInt($('#header-outer').attr('data-logo-height'));
	
	////search box event
	$('#search-btn').mousedown(function(){
		
		$(this).removeClass();
		
		$('#header-outer #search-outer').stop(true).fadeIn(600,'easeOutExpo');
		
		$('#search-outer > #search input[type="text"]').css({
			'top' : $('#search-outer').height()/2 - $('#search-outer > #search input[type="text"]').height()/2
		});
		
		$('#search input[type=text]').focus();
		
		if($('#search input[type=text]').attr('value') == $placeholder){
			$('#search input[type=text]').setCursorPosition(0);	
		}

		return false;
	});
	
	$('#search input[type=text]').keydown(function(){
		if($(this).attr('value') == $placeholder){
			$(this).attr('value', '');
		}
	});
	
	$('#search input[type=text]').keyup(function(){
		if($(this).attr('value') == ''){
			$(this).attr('value', $placeholder);
			$(this).setCursorPosition(0);
		}
	});
	
	
	////close search btn event
	$('#close').click(function(){
		
		closeSearch();
		return false;
	});

	//if user clicks away from the search close it
	$('#search-box input[type=text]').blur(function(e){
		closeSearch();
	});
	
	
	function closeSearch(){
		$('#header-outer #search-outer').stop(true).fadeOut(450,'easeOutExpo');
	}
	
	
	//mobile search
	$('#mobile-menu #mobile-search .container a#show-search').click(function(){
		$('#mobile-menu .container > ul').slideUp(500);
		return false;
	});
	
/***************** Nav ******************/
	
	var logoHeight = parseInt($('#header-outer').attr('data-logo-height'));
	var headerPadding = parseInt($('#header-outer').attr('data-padding'));
	var usingLogoImage = $('#header-outer').attr('data-using-logo');
	
	if( isNaN(headerPadding) || headerPadding.length == 0 ) { headerPadding = 28; }
	if( isNaN(logoHeight) || usingLogoImage.length == 0 ) { usingLogoImage = false; logoHeight = 30;}
	
	//inital calculations
	function headerInit() {
			
		$('#header-outer #logo img').css({
			'height' : logoHeight,				
		});	
		
		$('#header-outer').css({
			'padding-top' : headerPadding
		});	
		
		$('header#top nav > ul > li > a').css({
			'padding-bottom' : ((logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding,
			'padding-top' : (logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)
		});	
		
		$('#header-outer .cart-menu').css({  
			'padding-bottom' : Math.ceil(((logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding),
			'padding-top' : Math.ceil(((logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding)
		});	
			
		$('header#top nav > ul li#search-btn').css({
			'padding-bottom' : (logoHeight/2) - ($('header#top nav > ul li#search-btn a').height()/2),
			'padding-top' : (logoHeight/2) - ($('header#top nav > ul li#search-btn a').height()/2)
		});	
		
		
		$('header#top .sf-menu > li > ul, header#top .sf-menu > li.sfHover > ul').css({
			'top' : $('header#top nav > ul > li > a').outerHeight() 
		});	
		
		
		setTimeout(function(){ 
			$('#search-outer #search-box .ui-autocomplete').css({
				'top': parseInt($('#header-outer').outerHeight())+'px'
			}); 
		},1000);
		
		$('#search-outer #search-box .ui-autocomplete').css({
			'top': parseInt($('#header-outer').outerHeight())+'px'
		});
		
		//header space
		if($('#header-outer').attr('data-using-secondary') == '1'){
			$('#header-space').css('height', parseInt($('#header-outer').outerHeight()) + 34);
		} else {
			$('#header-space').css('height', $('#header-outer').outerHeight());
		}
		
		$('#header-outer .container, #header-outer .cart-menu').css('visibility','visible');
		
		
		$('#search-outer, #search .container').css({
			'height' : logoHeight + headerPadding*2
		});	
		
		$('#search-outer > #search input[type="text"]').css({
			'font-size'  : 43,
			'top' : ((logoHeight + headerPadding*2)/2) - $('#search-outer > #search input[type="text"]').height()/2
		});
		
		$('#search-outer > #search #close a').css({
			'top' : ((logoHeight + headerPadding*2)/2) - 8
		});	
		
		//if no image is being used
		//if(usingLogoImage == false) $('header#top #logo').addClass('no-image');
		
	}
	
	//one last check to make sure the header space is correct (only if the user hasn't scrolled yet)
	$(window).load(function(){
		if($(window).scrollTop() == 0 ) { 
			
			if($('#header-outer').attr('data-using-secondary') == '1'){
				$('#header-space').css('height', parseInt($('#header-outer').outerHeight()) + 34);
			} else {
				$('#header-space').css('height', $('#header-outer').outerHeight());
			}
			
		}
	});
	
	
	//is header resize on scroll enabled?
	var headerResize = $('#header-outer').attr('data-header-resize');
	if( headerResize == 1 ){
		
		headerInit();
		
		$(window).bind('scroll',smallNav);
	} else {
		headerInit();
	}
	
	//if user starts in mobile but resizes to large, don't break the nav
	if($('body').hasClass('mobile')){
		$(window).resize(headerInit);
	}
		

	function smallNav(){
		var $offset = $(window).scrollTop();
		var $windowWidth = $(window).width();
		var shrinkNum = 6;
		
		if (logoHeight >= 40 && logoHeight < 60) shrinkNum = 8;
		else if (logoHeight >= 60 && logoHeight < 80) shrinkNum = 10;
		else if (logoHeight >= 80 ) shrinkNum = 14;
		
		if($offset > 0 && $windowWidth > 1000) {
			
			$('#header-outer').addClass('small-nav');
			
			$('#header-outer #logo img').stop(true,true).animate({
				'height' : logoHeight - shrinkNum
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
				
			$('#header-outer').stop(true,true).animate({
				'padding-top' : headerPadding / 1.8
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('header#top nav > ul > li > a').stop(true,true).animate({
				'padding-bottom' : (((logoHeight-shrinkNum)/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding / 1.8,
				'padding-top' : ((logoHeight-shrinkNum)/2) - ($('header#top nav > ul > li > a').height()/2)
			},{queue:false, duration:250, easing: 'easeOutCubic'});	 
			
			$('#header-outer .cart-menu').stop(true,true).animate({
				'padding-bottom' : Math.floor((((logoHeight-shrinkNum)/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding / 1.7),
				'padding-top' : Math.floor((((logoHeight-shrinkNum)/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding / 1.7)
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('header#top nav > ul li#search-btn').stop(true,true).animate({
				'padding-bottom' : Math.floor(((logoHeight-shrinkNum)/2) - ($('header#top nav > ul li#search-btn a').height()/2)),
				'padding-top' : Math.floor(((logoHeight-shrinkNum)/2) - ($('header#top nav > ul li#search-btn a').height()/2))
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('header#top .sf-menu > li > ul, header#top .sf-menu > li.sfHover > ul').stop(true,true).animate({
				'top' : Math.floor($('header#top nav > ul > li > a').height() + (((logoHeight-shrinkNum)/2) - ($('header#top nav > ul > li > a').height()/2))*2 + headerPadding / 1.8),
			},{queue:false, duration:250, easing: 'easeOutCubic'});		
			
			
			$('#search-outer #search-box .ui-autocomplete').stop(true,true).animate({
				'top': Math.floor((logoHeight-shrinkNum) + (headerPadding*2)/ 1.8) +'px'
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
		

			$('#search-outer, #search .container').stop(true,true).animate({
				'height' : Math.floor((logoHeight-shrinkNum) + (headerPadding*2)/ 1.8)
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('#search-outer > #search input[type="text"]').stop(true,true).animate({
				'font-size'  : 30,
				'line-height' : '30px',
				'top' : ((logoHeight-shrinkNum+headerPadding+5)/2) - ($('#search-outer > #search input[type="text"]').height()-15)/2
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			

			
			$('#search-outer > #search #close a').stop(true,true).animate({
				'top' : ((logoHeight-shrinkNum + headerPadding+5)/2) - 10
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			
			//if no image is being used
			if(usingLogoImage == false) $('header#top #logo').stop(true,true).animate({
				'margin-top' : 0
			},{queue:false, duration:450, easing: 'easeOutExpo'});	
			
			$(window).unbind('scroll',smallNav);
			$(window).bind('scroll',bigNav);
		}
	}
	
	function bigNav(){
		var $offset = $(window).scrollTop();
		var $windowWidth = $(window).width();
		if($offset == 0 && $windowWidth > 1000) {
			
			$('#header-outer').removeClass('small-nav');
			
			$('#header-outer #logo img').stop(true,true).animate({
				'height' : logoHeight,				
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			

			$('#header-outer').stop(true,true).animate({
				'padding-top' : headerPadding 
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('header#top nav > ul > li > a').stop(true,true).animate({
				'padding-bottom' : ((logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding,
				'padding-top' : (logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('#header-outer .cart-menu').stop(true,true).animate({
				'padding-bottom' : Math.ceil(((logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding),
				'padding-top' : Math.ceil(((logoHeight/2) - ($('header#top nav > ul > li > a').height()/2)) + headerPadding)
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('header#top nav > ul li#search-btn').stop(true,true).animate({
				'padding-bottom' : Math.floor((logoHeight/2) - ($('header#top nav > ul li#search-btn a').height()/2)),
				'padding-top' : Math.ceil((logoHeight/2) - ($('header#top nav > ul li#search-btn a').height()/2))
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			
			$('header#top .sf-menu > li > ul, header#top .sf-menu > li.sfHover > ul').stop(true,true).animate({
				'top' : $('header#top nav > ul > li > a').height() + (((logoHeight)/2) - ($('header#top nav > ul > li > a').height()/2))*2 + headerPadding,
			},{queue:false, duration:250, easing: 'easeOutCubic'});		
			
			$('#search-outer #search-box .ui-autocomplete').stop(true,true).animate({
				'top': Math.ceil(logoHeight + headerPadding*2) +'px'
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			
			$('#search-outer, #search .container').stop(true,true).animate({
				'height' : Math.ceil(logoHeight + headerPadding*2)
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			$('#search-outer > #search input[type="text"]').stop(true,true).animate({
				'font-size'  : 43,
				'line-height' : '43px',
				'top' : ((logoHeight + headerPadding*2)/2) - 30
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			
			$('#search-outer > #search #close a').stop(true,true).animate({
				'top' : ((logoHeight + headerPadding*2)/2) - 8
			},{queue:false, duration:250, easing: 'easeOutCubic'});	
			
			//if no image is being used
			if(usingLogoImage == false) $('header#top #logo').stop(true,true).animate({
				'margin-top' : 4
			},{queue:false, duration:450, easing: 'easeOutExpo'});	
		
			$(window).unbind('scroll',bigNav);
			$(window).bind('scroll',smallNav);
		}
	}
	
	
	
	//responsive nav
	$('#toggle-nav').click(function(){
		
		$('#mobile-menu').stop(true,true).slideToggle(500);
		return false;
	});
	
	////append dropdown indicators / give classes
	$('#mobile-menu .container ul li').each(function(){
		if($(this).find('> ul').length > 0) {
			 $(this).addClass('has-ul');
			 $(this).find('> a').append('<span class="sf-sub-indicator"><i class="icon-angle-down"></i></span>');
		}
	});
	
	////events
	$('#mobile-menu .container ul li:has(">ul") > a .sf-sub-indicator').click(function(){
		$(this).parent().parent().toggleClass('open');
		$(this).parent().parent().find('> ul').stop(true,true).slideToggle();
		return false;
	});
	


/*-------------------------------------------------------------------------*/
/*	5.	Page Specific
/*-------------------------------------------------------------------------*/	

	//recent work
	function piVertCenter() {
		$('.portfolio-items  > .col').each(function(){
			var $colHeight = $(this).find('.work-item').height();
			var $infoHeight = $(this).find('.vert-center').height();
			
			//xAmount px away from being centered so we can transition to center point on hover
-			$(this).find('.work-info .vert-center').css('margin-top', (($colHeight / 2) - ($infoHeight / 2 )) - 15 );
		});	 
	}
	
	$(window).load(function(){
	 	 piVertCenter();
	 	 portfolioCommentOrder();
	});
	
	
	//ie8 width fix
	function ie8Width(){
		if( $(window).width() >= 1300 ) {
			$('.container').css('max-width','1100px');
		} else {
			$('.container').css('max-width','880px');
		}
	}
	
	if( $(window).width() >= 1300 && $('html').hasClass('no-video')) { $('.container').css('max-width','1100px'); $(window).resize(ie8Width); };
	
	
	$(window).smartresize(function(){
		 //carousel height calcs
		 carouselHeightCalcs();
		 
		 //center portfolio text
		 piVertCenter();
		 
		 //portfolio comment order
		 portfolioCommentOrder();
		 
		 //testimonial slider height
		 testimonialHeightResize();
		 
		 //iframe video emebeds
		 responsiveVideoIframes();
		  
	});
	
	
	$(window).resize(function(){

		 portfolioDeviceCheck();

		 //fullwidth page section calcs
		 fullWidthSections(); 
		 fullwidthImgOnlySizing();
		 
		 if($('.nectar-video-bg').length > 0) {
		 	resizeVideoToCover();
		 }
		 
		 pageHeader();
	});
	
	//portfolio item hover effect
	
	////desktop event 
	if(!$('body').hasClass('mobile') && !navigator.userAgent.match(/(iPad|IEMobile)/)) {
		$('.portfolio-items .col .work-item').hover(function(){
			$(this).find('.work-info .vert-center').stop().animate({
				'padding-top' : 15
			},400,'easeOutCubic');
			$(this).find('.work-info, .work-info .vert-center *, .work-info > i').stop().animate({
				'opacity' : 1
			},250,'easeOutCubic');
			$(this).find('.work-info-bg').stop().animate({
				'opacity' : 0.88
			},250,'easeOutCubic');
		},function(){
			$(this).find('.work-info .vert-center').stop().animate({ 
				'padding-top' : 0
			},400,'easeOutCubic');
			$(this).find('.work-info, .work-info .vert-center *, .work-info > i').stop().animate({
				'opacity' : 0
			},250,'easeOutCubic');
			$(this).find('.work-info-bg').stop().animate({
				'opacity' : 0
			},250,'easeOutCubic');
		});
	} 
	////mobile event
	else {
		portfolioDeviceCheck();
	}
	
	function portfolioDeviceCheck(){
		if($('body').hasClass('mobile') || navigator.userAgent.match(/(iPad|IEMobile)/) ){
			
			//if using more details
			if($('.portfolio-items .col .work-item').find('a:not(".pp")').length > 0){
				$('.portfolio-items .col .work-item').find('a.pp').css('display','none');
			} 
			
			//if only using pp
			else {
				$('.portfolio-items .col .work-item').find('a:not(".pp")').css('display','none');
			}
		
		} else {
			$('.portfolio-items .col .work-item').find('a').css('display','inline');
		}
	}

	
	//portfolio sort
	$('#portfolio-filters').hover(function(){
		$(this).find('> ul').stop(true,true).slideDown(500,'easeOutExpo');
		$(this).find('a#sort-portfolio span').html($(this).find('a#sort-portfolio').attr('data-sortable-label'));
	},function(){
		var $activeCat = $(this).find('a.active').html();
		if( typeof $activeCat == 'undefined' || $activeCat.length == 0) $activeCat = $(this).attr('data-sortable-label');
		$(this).find('a#sort-portfolio span').html($activeCat);
		$(this).find('> ul').stop(true,true).slideUp(500,'easeOutExpo');
	});
	

	//mobile sort menu fix
	if($('body').hasClass('mobile') || navigator.userAgent.match(/(iPad|IEMobile)/)){
		$('#portfolio-filters').unbind('mouseenter mouseleave');
		$('#portfolio-filters > a, #portfolio-filters ul li a').click(function(){
			$(this).parents('#portfolio-filters').find('> ul').stop(true,true).slideToggle(600,'easeOutCubic');
		});
	}
	
	//portfolio selected category
	$('#portfolio-filters ul li a').click(function(){
		$(this).parents('#portfolio-filters').find('#sort-portfolio span').html($(this).html());
	});
	
	//inline portfolio selected category
	$('#portfolio-filters-inline ul li a').click(function(){
		$(this).parents('ul').find('li a').removeClass('active');
		$(this).addClass('active');
		$(this).parents('#portfolio-filters-inline').find('#current-category').html($(this).html());
		
	});
	
	$('#portfolio-filters-inline .container > ul > li:nth-child(2) a').click();
	
	//portfolio more details page menu highlight
	$('body.single-portfolio #header-outer nav > ul > li > a:contains("Portfolio")').parents('li').addClass('current-menu-item');
	
	//blog page highlight
	$('body.single-post #header-outer nav > ul > li > a:contains("Blog")').parents('li').addClass('current-menu-item');
	

	
	//blog love center
	function centerLove(){
		$('.post').each(function(){
			
			var $loveWidth = $(this).find('.post-meta .nectar-love').outerWidth();
			var $loveWrapWidth = $(this).find('.post-meta  .nectar-love-wrap').width();
			
			//center
			$(this).find('.post-meta .nectar-love').css('margin-left', $loveWrapWidth/2 - $loveWidth/2 + 'px' );
			$(this).find('.nectar-love-wrap').css('visibility','visible');
		});
	}
	
	$('.nectar-love').on('click',function(){
		centerLove();
	});
	
	centerLove();	
	
	
	//portfolio single comment order
	function portfolioCommentOrder(){
	
		if($('body').hasClass('mobile') && $('body').hasClass('single-portfolio') && $('#respond').length > 0){
			$('#sidebar').insertBefore('.comments-section');
		}
		 
		else if($('body').hasClass('single-portfolio') && $('#respond').length > 0) {
			$('#sidebar').insertAfter('#post-area');
		}
		
	}

	 portfolioCommentOrder();
	 
	
	//portfolio sidebar follow
	
	var sidebarFollow = $('.single-portfolio #sidebar').attr('data-follow-on-scroll');
	
	function portfolioSidebarFollow(){
	
		if( $('body.single-portfolio').length > 0 && sidebarFollow == 1 && !$('body').hasClass('mobile') && parseInt($('#sidebar').height()) + 50 <= parseInt($('#post-area').height())) {
			
			 $('#sidebar').addClass('fixed-sidebar');
			 
			 var $footer = '#footer-outer';
			 if( $('#call-to-action').length > 0 ) $footer = '#call-to-action';
			 
			 $('#sidebar').stickyMojo({footerID: $footer, contentID: '#post-area'});
			 
		}
		
	}
	
	$(window).load(portfolioSidebarFollow);
	
	
	//remove the portfolio filters that are not found in the current page
	var isotopeCatArr = [];
	var $portfolioCatCount = 0;
	$('#portfolio-filters ul li, #portfolio-filters-inline ul li').each(function(i){
		if($(this).find('a').length > 0) {
			isotopeCatArr[$portfolioCatCount] = $(this).find('a').attr('data-filter').substring(1);	
			$portfolioCatCount++;
		}
	});
	
	////ice the first (all)
	isotopeCatArr.shift();
	
	
	var itemCats = '';
	
	$('#portfolio > div').each(function(i){
		itemCats += $(this).attr('data-project-cat');
	});
	itemCats = itemCats.split(' ');
	
	////remove the extra item on the end of blank space
	itemCats.pop();
	
	////make sure the array has no duplicates
	itemCats = $.unique(itemCats);
	
	////if user has chosen a set of filters to display - only show those
	if($('.portfolio-items:not(".carousel")').length > 0 && $('.portfolio-items:not(".carousel")').attr('data-categories-to-show').length != 0 && $('.portfolio-items:not(".carousel")').attr('data-categories-to-show') != 'all') {
		$userSelectedCats = $('.portfolio-items:not(".carousel")').attr('data-categories-to-show').replace(/,/g , ' ');
		$userSelectedCats = $userSelectedCats.split(' ');
		
		$('.portfolio-items:not(".carousel")').removeAttr('data-categories-to-show');
	} else {
		$userSelectedCats = itemCats;
	}
	
	
	////Find which categories are actually on the current page
	var notFoundCats = [];
	$.grep(isotopeCatArr, function(el) {

    	if ($.inArray(el, itemCats) == -1) notFoundCats.push(el);
    	if ($.inArray(el, $userSelectedCats) == -1) notFoundCats.push(el);

	});
	
	//manipulate the list
	if(notFoundCats.length != 0){
		$('#portfolio-filters ul li, #portfolio-filters-inline ul li').each(function(){
			if($(this).find('a').length > 0) {
				if( $.inArray($(this).find('a').attr('data-filter').substring(1), notFoundCats) != -1 ){ $(this).hide(); }
			}
		})
	}
	
	
	
	//sharing buttons
	/*jQuery.sharedCount = function(url, fn) {
		url = encodeURIComponent(url || location.href);
		var arg = {
			url: "//" + (location.protocol == "https:" ? "sharedcount.appspot" : "api.sharedcount") + ".com/?url=" + url,
			cache: true,
			dataType: "json"
		};
		if ('withCredentials' in new XMLHttpRequest) {
			arg.success = fn;
		}
		else {
			var cb = "sc_" + url.replace(/\W/g, '');
			window[cb] = fn;
			arg.jsonpCallback = cb;
			arg.dataType += "p";
		}
		return jQuery.ajax(arg);
	};*/
	
	
	
	
	var completed = 0;
	var windowLocation = window.location.href.replace(window.location.hash, '');
	
	if( $('a.facebook-share').length > 0 || $('a.twitter-share').length > 0 || $('a.pinterest-share').length > 0) {
  
	 
		////facebook
		
		//load share count on load  
		$.getJSON("http://graph.facebook.com/?id="+ windowLocation +'&callback=?', function(data) {
			if((data.shares != 0) && (data.shares != undefined) && (data.shares != null)) { 
				$('.facebook-share a span.count, a.facebook-share span.count').html( data.shares );	
			}
			else {
				$('.facebook-share a span.count, a.facebook-share span.count').html( 0 );	
			}
			completed++;
			socialFade();
		});
	 
		function facebookShare(){
			window.open( 'https://www.facebook.com/sharer/sharer.php?u='+windowLocation, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.facebook-share').click(facebookShare);
		
		
		////google plus
		/*
		//load share count on load  
		$.sharedCount(location.href, function(data){
			
			$('.google-plus-share a span.count, a.google-plus-share span.count').html( data.GooglePlusOne );	
			
			completed++;
			socialFade();
		});
	 
		function googlePlusShare(){
			window.open( 'https://m.google.com/app/plus/x/?v=compose&content=INSERT_MESSAGE_HERE_WITH_URL_IF_YOU_WANT', "googlePlusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.google-plus-share').click(googlePlusShare);
		*/
		
		
		
		////twitter
		
		//load tweet count on load 
		$.getJSON('http://urls.api.twitter.com/1/urls/count.json?url='+windowLocation+'&callback=?', function(data) {
			if((data.count != 0) && (data.count != undefined) && (data.count != null)) { 
				$('.twitter-share a span.count, a.twitter-share span.count').html( data.count );
			}
			else {
				$('.twitter-share a span.count, a.twitter-share span.count').html( 0 );
			}
			completed++;
			socialFade();
		});
		
		function twitterShare(){
			if($(".section-title h1").length > 0) {
				var $pageTitle = encodeURIComponent($(".section-title h1").text());
			} else {
				var $pageTitle = encodeURIComponent($(document).find("title").text());
			}
			window.open( 'http://twitter.com/intent/tweet?text='+$pageTitle +' '+windowLocation, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		function wooTwitterShare(){
			window.open( 'http://twitter.com/intent/tweet?text='+$("h1.product_title").text() +' '+windowLocation, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.nectar-social:not(".woo") .twitter-share').click(twitterShare);
		$('.nectar-social.woo .twitter-share').click(wooTwitterShare);
		
		////pinterest
		
		//load pin count on load 
		$.getJSON('http://api.pinterest.com/v1/urls/count.json?url='+windowLocation+'&callback=?', function(data) {
			if((data.count != 0) && (data.count != undefined) && (data.count != null)) { 
				$('.pinterest-share a span.count, a.pinterest-share span.count').html( data.count );
			}
			else {
				$('.pinterest-share a span.count, a.pinterest-share span.count').html( 0 );
			}
			completed++;
			socialFade();
		});
		
		function pinterestShare(){
			var $sharingImg = ($('.single-portfolio').length > 0 && $('div[data-featured-img]').attr('data-featured-img') != 'empty' ) ? $('div[data-featured-img]').attr('data-featured-img') : $('.main-content img').first().attr('src'); 
			
			if($(".section-title h1").length > 0) {
				var $pageTitle = encodeURIComponent($(".section-title h1").text());
			} else {
				var $pageTitle = encodeURIComponent($(document).find("title").text());
			}
			
			window.open( 'http://pinterest.com/pin/create/button/?url='+windowLocation+'&media='+$sharingImg+'&description='+$pageTitle, "pinterestWindow", "height=640,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		function wooPinterestShare(){
			window.open( 'http://pinterest.com/pin/create/button/?url='+windowLocation+'&media='+$('img.attachment-shop_single').first().attr('src')+'&description='+$('h1.product_title').text(), "pinterestWindow", "height=640,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.nectar-social:not(".woo") .pinterest-share').click(pinterestShare);
		$('.nectar-social.woo .pinterest-share').click(wooPinterestShare);
		
		//fadeIn
		$('a.nectar-sharing > span.count').hide().css('width','auto');
		function socialFade(){

			if(completed == $('a.nectar-sharing').length && $('a.nectar-sharing').parent().hasClass('in-sight')) {
				
				$('.nectar-social > .nectar-sharing').animate({'padding-right':'15px'},350,'easeOutSine');
				
				//love fadein
				$('.nectar-social .nectar-love span').show(350,'easeOutSine',function(){
					$(this).animate({'opacity':1},800);
				});
				
				//sharing loadin
				$('.nectar-social a.nectar-sharing').each(function(i){
					var $that = $(this);
					
					$(this).find('> span').show(350,'easeOutSine',function(){
						$that.find('> span').animate({'opacity':1},800);
					});
					
				});
			}
		}
		
		//social light up
		$('.nectar-social').each(function() {

			$(this).appear(function() {
				
				$(this).addClass('in-sight');
				socialFade();
				
				$(this).find('> *').each(function(i){
					
					var $that = $(this);
					
					setTimeout(function(){ 
						
						$that.delay(i*100).queue(function(){ 
							
							var $that = $(this); $(this).addClass('hovered'); 
							
							setTimeout(function(){ 
								$that.removeClass('hovered');
							},300); 
							
						});
					
					},450);
				});
			
			},{accX: 0, accY: -115});
		
		}); 
		
		
	}
	
/*-------------------------------------------------------------------------*/
/*	6.	Scroll to top
/*-------------------------------------------------------------------------*/	

var $scrollTop = $(window).scrollTop();

//starting bind
if( $('#to-top').length > 0 && $(window).width() > 1020) {
	
	if($scrollTop > 350){
		$(window).bind('scroll',hideToTop);
	}
	else {
		$(window).bind('scroll',showToTop);
	}
}


function showToTop(){
	
	if( $scrollTop > 350 ){

		$('#to-top').stop(true,true).animate({
			'bottom' : '17px'
		},350,'easeInOutCubic');	
		
		$(window).unbind('scroll',showToTop);
		$(window).bind('scroll',hideToTop);
	}

}

function hideToTop(){
	
	if( $scrollTop < 350 ){

		$('#to-top').stop(true,true).animate({
			'bottom' : '-30px'
		},350,'easeInOutCubic');	
		
		$(window).unbind('scroll',hideToTop);
		$(window).bind('scroll',showToTop);	
		
	}
}

//to top color
if( $('#to-top').length > 0 ) {
	
	var $windowHeight, $pageHeight, $footerHeight, $ctaHeight;
	
	function calcToTopColor(){
		$scrollTop = $(window).scrollTop();
		$windowHeight = $(window).height();
		$pageHeight = $('body').height();
		$footerHeight = $('#footer-outer').height();
		$ctaHeight = ($('#call-to-action').length > 0) ? $('#call-to-action').height() : 0;
		
		if( ($scrollTop-35 + $windowHeight) >= ($pageHeight - $footerHeight) && $('#boxed').length == 0){
			$('#to-top').addClass('dark');
		}
		
		else {
			$('#to-top').removeClass('dark');
		}
	}
	
	//calc on scroll
	$(window).scroll(calcToTopColor);
	
	//calc on resize
	$(window).resize(calcToTopColor);

}

//scroll up event
$('#to-top').click(function(){
	$('body,html').stop().animate({
		scrollTop:0
	},800,'easeOutCubic')
	return false;
});
















	// Isotope
	var $portfolio_container = $('.portfolio-items:not(.carousel)');

	//// filter items when filter link is clicked
	var clearIsoAnimation = null;
	//// cache window
	var $window = jQuery(window);	
	
	if($portfolio_container.length > 0) {
		
		////filter event
		$('#portfolio-filters ul li a, #portfolio-filters-inline ul li a').click(function(){
			 
			 //add css animation only for sorting	 
			  clearTimeout(clearIsoAnimation);
			  $('.isotope, .isotope .isotope-item').css('transition-duration','0.7s');
			  clearIsoAnimation = setTimeout(function(){  $('.isotope, .isotope .isotope-item').css('transition-duration','0s'); },700);
			  
			  
			  var selector = $(this).attr('data-filter');
			  $portfolio_container.isotope({ filter: selector });
			  
			  //active classes
			  $('#portfolio-filters ul li a').removeClass('active');
			  $(this).addClass('active');
			  
			  setTimeout(masonryZindex,700);
			  
			  return false;
		});
	
	
		//// start up isotope with default settings
		$portfolio_container.imagesLoaded(function(){
			
			//verify smooth scorlling
			if( $smoothCache == true && $(window).width() > 690 && $('body').outerHeight(true) > $(window).height() && Modernizr.csstransforms3d && !navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){ niceScrollInit(); $(window).trigger('resize') } 
			

			//initl call to setup isotope
			var $layoutMode = ($('.portfolio-items.masonry-items').length > 0) ? 'masonry' : 'fitRows' ;
			var $startingFilter = ($('.portfolio-items:not(".carousel")').attr('data-starting-filter') != '' && $('.portfolio-items:not(".carousel")').attr('data-starting-filter') != 'default') ? '.' + $('.portfolio-items:not(".carousel")').attr('data-starting-filter') : '*';
			
			if($startingFilter != '*'){
				$('#portfolio-filters ul a[data-filter="'+$startingFilter+'"], #portfolio-filters-inline ul a[data-filter="'+$startingFilter+'"]').click();
			}
			
			$portfolio_container.isotope({
			  resizable: false, 
			  itemSelector : '.element',
			  filter: $startingFilter,
			  layoutMode: $layoutMode
			}).isotope( 'reLayout' );
			
			
			//call the reLayout to get things rollin'
			reLayout();
			masonryZindex();
			$window.resize( reLayout );
			$window.smartresize( masonryZindex );
		
			//fadeout the loading animation
			$('.portfolio-loading').stop(true,true).fadeOut(200);
			
			//fadeIn items one by one
			$('.portfolio-items .col').each(function(i){
				$(this).find('img, .work-meta, .nectar-love-wrap').delay(i*90).animate({'opacity':1},450);
			});
	
		});
		
		
		
	}//if portfolio items found
		
	function reLayout() {
  
		var mediaQuerySize; // = getComputedStyle(document.body, ':after').getPropertyValue('content'); 
		var windowSize = $window.width();
		var masonryObj;

		//remove double quotes for FF
		//if (navigator.userAgent.match('MSIE 8') == null) {
		//	mediaQuerySize = mediaQuerySize.replace(/"/g, '');
		//}
		
		//user defined cols
		var userDefinedColWidth;
		
		if($('.nectar-portfolio').attr('data-user-defined-cols') == 'span4') {
			userDefinedColWidth = 3
		} 
		
		else if($('.nectar-portfolio').attr('data-user-defined-cols') == 'span3') {
			userDefinedColWidth = 4
		} 
		
		var isFullWidth = $('.portfolio-items:not(".carousel")').attr('data-col-num') == 'elastic';
		
		
		//chrome 33 approved method for getting column sizing
		if(window.innerWidth > 1600){
			mediaQuerySize = 'five';
		} else if(window.innerWidth <= 1600 && window.innerWidth > 1300){
			mediaQuerySize = 'four';
		} else if(window.innerWidth <= 1300 && window.innerWidth > 990){
			mediaQuerySize = 'three';
		} else if(window.innerWidth <= 990 && window.innerWidth > 470){
			mediaQuerySize = 'two';
		} else if(window.innerWidth <= 470){
			mediaQuerySize = 'one';
		}
		
		//boxed
		if($('#boxed').length > 0) {
			if(window.innerWidth > 1300){
				mediaQuerySize = 'four';
			} else if(window.innerWidth < 1300 && window.innerWidth > 990){
				mediaQuerySize = 'three';
			} else if(window.innerWidth < 990){
				mediaQuerySize = 'one';
			}
			
		}
		
		//change masonry columns depending on screen size
		switch (mediaQuerySize) {
			case 'five':
				(isFullWidth) ? colWidth = 5 : colWidth = userDefinedColWidth;
				masonryObj = { columnWidth: $portfolio_container.width() / parseInt(colWidth) };
			break;
			
			case 'four':
				(isFullWidth) ? colWidth = 4 : colWidth = userDefinedColWidth;

				masonryObj = { columnWidth: $portfolio_container.width() / parseInt(colWidth) };
			break;
			
			case 'three':
				(isFullWidth) ? colWidth = 3 : colWidth = userDefinedColWidth;
				
				masonryObj = { columnWidth: $portfolio_container.width() / parseInt(colWidth) };
			break;
			
			case 'two':
				masonryObj = { columnWidth: $portfolio_container.width() / 2 };
			break;
			
			case 'one':
				masonryObj = { columnWidth: $portfolio_container.width() / 1 };
			break;
		}
		
		//sizing for large items
		var tallColHeight = $('.portfolio-items:not(".carousel") .col.elastic-portfolio-item[class*="regular"]:first img').height();
		var multipler = (window.innerWidth > 470) ? 2 : 1 ;
		$('.portfolio-items:not(".carousel") .col.elastic-portfolio-item[class*="tall"] img').css('height',(tallColHeight*multipler));

		$portfolio_container.isotope({
		   masonry: masonryObj
		}).isotope( 'reLayout' );
	
	}


	//z-index for masonry
	function masonryZindex(){
		var $coords = {};
		var $zindexRelation = {};
		
		$('body .portfolio-items:not(".carousel") .elastic-portfolio-item').each(function(){
			$matrix = matrixToArray($(this).css('transform'));
			$coords[$(this).index()] = $matrix[4];
		});
		
		var $corrdsArr = $.map($coords, function (value) { return value; });
		$corrdsArr = removeDuplicates($corrdsArr);
		$corrdsArr.sort(function(a,b){return a-b});

		for(var i = 0; i < $corrdsArr.length; i++){
			$zindexRelation[$corrdsArr[i]] = i*10; 
		}

		$.each($coords,function(k,v){
			
			var $zindex;
			var $coordCache = v;
			$.each($zindexRelation,function(k,v){
				if($coordCache == k) {
					$zindex = v;
				}
			});

			$('body .portfolio-items:not(".carousel") .elastic-portfolio-item:eq('+k+')').css('z-index',$zindex);
		});
	}
	
	function matrixToArray(matrix) {
	    return matrix.substr(7, matrix.length - 8).split(', ');
	}
	
	function removeDuplicates(inputArray) {
        var i;
        var len = inputArray.length;
        var outputArray = [];
        var temp = {};

        for (i = 0; i < len; i++) {
            temp[inputArray[i]] = 0;
        }
        for (i in temp) {
            outputArray.push(i);
        }
        return outputArray;
    }











/*-------------------------------------------------------------------------*/
/*	7.	Cross Browser Fixes
/*-------------------------------------------------------------------------*/	
	 
	//Fix current class in menu 
	if ($("body").hasClass("single-portfolio") || $('body').hasClass("error404") || $('body').hasClass("search-results")) {   
		$("li").removeClass("current_page_parent").removeClass("current-menu-ancestor").removeClass('current_page_ancestor');   
	}
	
	//fix for IE8 nth-child
	$('.recent_projects_widget div a:nth-child(3n+3), #sidebar #flickr div:nth-child(3n+3) a, #footer-outer #flickr div:nth-child(3n+3) a').css('margin-right','0px');
	
	//remove br's from code tag
	$('code').find('br').remove();	
	
	//if a clear is the last div, remove the padding
	if($('.container.main-content > .row > div:last-child').hasClass('clear')) {
		$('.container.main-content > .row > div:last-child').css('padding-bottom','0');
	}
	
	//homepage recent blog for IE8
	$('.container-wrap .blog-recent > div:last-child').addClass('col_last');
	
	//contact form
	$('.wpcf7-form p:has(input[type=submit])').css('padding-bottom','0px');
	
	//no caption home slider fix
	$('#featured article').each(function(){
		if($(this).find('h2').attr('data-has-caption') == '0') {
			$(this).parents('.slide').addClass('no-caption');
		}
	});
	
	//chat post format nth child color
	$('article.post.format-chat .content-inner dt:odd').css('color','#333');
	
	//remove margin on last cols inside of full width sections 
	$('.full-width-section').each(function(){
		$(this).find('> .span_12 > div.col_last').last().css('margin-bottom','0');
	});
	
	//remove p tags from extra content editor when warpping only an img 
	$('#portfolio-extra p').each(function(){
		if($(this).find('*').length == 1 && $(this).find('img').length == 1) {
			$(this).find('img').unwrap();
		}
	});
	
	//vc text_separator color
	$('.vc_text_separator').each(function(){
		if( $(this).parents('.full-width-section').length > 0 ) $(this).find('div').css('background-color',$(this).parents('.full-width-section').css('background-color'));
	});
	
	//carousel head button alignment  
	$('.carousel-heading').each(function(){
		if($(this).find('h2').length > 0) $(this).find('.carousel-prev, .carousel-next').css('top','7px');
	});
	
	//remove carousel heading if not being used
	$('.carousel-wrap').each(function(){
		if($(this).find('.carousel-heading .container:empty').length > 0) $(this).find('.carousel-heading').remove();
	});
	
	//woocommerce product thuimbnails
	$('.woocommerce div.product div.images div.thumbnails a:nth-child(4n+4)').css('margin-right','0px');
	
	//remove extra galleries when using the nectar gallery slider on projects and posts
	$('article.post .gallery-slider .gallery,  article.post .gallery-slider .jetpack-slideshow, .single-portfolio .gallery-slider .gallery, .single-portfolio .gallery-slider .jetpack-slideshow').remove();
	
	
	$('.woocommerce .span_9 .products.related .products li:nth-child(4), .woocommerce .span_9 .products.upsells .products li:nth-child(4)').remove();
	$('.woocommerce .span_9 .products.related .products li:nth-child(3), .woocommerce .span_9 .products.upsells .products li:nth-child(3)').css('margin-right','0');	
	
	//clients no hover if no link
	$('div.clients').each(function(){
		$(this).find('> div').each(function(){
			if($(this).find('a').length == 0) {
				$(this).addClass('no-link');
			}
		});
	});
	
	//shop header parallax margin 
	if($('body.woocommerce').find('#page-header-bg').length > 0){
		$('.container-wrap').css({'margin-top':'0px','padding-top':'30px'});
	}

	//remove arrows on mega menu item
	$('header#top nav .megamenu .sub-menu a.sf-with-ul .sf-sub-indicator').remove();
	
	//if using wooCommerce sitewide notice
	if($('.demo_store').length > 0) $('#header-outer, #header-space').css('margin-top','32px');
	
	//footer last column class for IE8
	$('#footer-widgets .container .row > div:last-child').addClass('col_last');
	
	//nectar slider external links
	$('.swiper-slide.external-button-1 .buttons > div:nth-child(1) a').attr('target','_blank');
	$('.swiper-slide.external-button-2 .buttons > div:nth-child(2) a').attr('target','_blank');
	
	//portfolio external links
	$(".portfolio-items a[href*='http://']:not([href*='"+window.location.hostname+"'])").attr("target","_blank"); 
	
	//remove excess inner content when empty row
	$('.container-wrap .row > .wpb_row').each(function(){
		if($(this).find('> .span_12 > .wpb_column > .wpb_wrapper').length > 0 && $(this).find('> .span_12 > .wpb_column > .wpb_wrapper').find('*').length == 0) $(this).find('> .span_12 ').remove();
	});
	
		
	
});



function resizeIframe() {
	var element = document.getElementById("pp_full_res").getElementsByTagName("iframe");
	var height = element[0].contentWindow.document.body.scrollHeight;
    
    //iframe height
    element[0].style.height = height + 'px';
	
	//pp height
	document.getElementsByClassName("pp_content_container")[0].style.height = height+40+ 'px';
	document.getElementsByClassName("pp_content")[0].style.height = height+40+ 'px';
	
}





/*!
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 */
(function(e){e.fn.hoverIntent=function(t,n,r){var i={interval:100,sensitivity:7,timeout:0};if(typeof t==="object"){i=e.extend(i,t)}else if(e.isFunction(n)){i=e.extend(i,{over:t,out:n,selector:r})}else{i=e.extend(i,{over:t,out:t,selector:n})}var s,o,u,a;var f=function(e){s=e.pageX;o=e.pageY};var l=function(t,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.abs(u-s)+Math.abs(a-o)<i.sensitivity){e(n).off("mousemove.hoverIntent",f);n.hoverIntent_s=1;return i.over.apply(n,[t])}else{u=s;a=o;n.hoverIntent_t=setTimeout(function(){l(t,n)},i.interval)}};var c=function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t);t.hoverIntent_s=0;return i.out.apply(t,[e])};var h=function(t){var n=jQuery.extend({},t);var r=this;if(r.hoverIntent_t){r.hoverIntent_t=clearTimeout(r.hoverIntent_t)}if(t.type=="mouseenter"){u=n.pageX;a=n.pageY;e(r).on("mousemove.hoverIntent",f);if(r.hoverIntent_s!=1){r.hoverIntent_t=setTimeout(function(){l(n,r)},i.interval)}}else{e(r).off("mousemove.hoverIntent",f);if(r.hoverIntent_s==1){r.hoverIntent_t=setTimeout(function(){c(n,r)},i.timeout)}}};return this.on({"mouseenter.hoverIntent":h,"mouseleave.hoverIntent":h},i.selector)}})(jQuery)