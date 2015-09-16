jQuery(document).ready(function($){
	
 
/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/
	
	$('#post-formats-select input').change(checkFormat);
	$('.wp-post-format-ui .post-format-options > a').click(checkFormat);
	 
	function checkFormat(){
		var format = $('#post-formats-select input:checked').attr('value');
		
		// For < WP 3.6
		//only run on the posts page
		if(typeof format != 'undefined'){
			
			if(format == 'gallery'){
				$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeIn(500);
			}
			
			else {
				$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeOut(500);
			}
			
			$('#post-body div[id^=nectar-metabox-post-]').hide();
			$('#post-body #nectar-metabox-post-'+format+'').stop(true,true).fadeIn(500);
					
		}
		
		// >= WP 3.6 
		else {
			var format = $(this).attr('data-wp-format');
			
			if( typeof format == 'undefined' && $('a[data-wp-format="gallery"]').hasClass('active')){
				format = $('a[data-wp-format="gallery"]').attr('data-wp-format');
			}
			
			if(typeof format != 'undefined'){
			
				if(format == 'gallery'){
					$('#nectar-metabox-post-gallery').stop(true,true).fadeIn(500);
				}
				
				else {
					$('#nectar-metabox-post-gallery').stop(true,true).fadeOut(500);
				}
				
			}
		}
	
	}
	 
	$(window).load(function(){
		checkFormat();
	})
	
	//default gallery featured image hide
	$('#poststuff div[id$=slide][id^=post]').hide();
	
	if($('.wp-post-format-ui .post-format-options').length > 0 ) {
		$('#nectar-metabox-post-gallery').hide();
	}


	
	/*----------------------------------------------------------------------------------*/
	/*	Take care of the unnecessary buttons on the slider post type edit page
	/*----------------------------------------------------------------------------------*/
	
	if( $('#nectar-metabox-home-slider').length > 0 ){
		$('#preview-action, #wp-admin-bar-view').hide();
		$('.wrap > #message.updated p').html('Slide Updated.');
		
		 $('.buttonset').buttonset();
		 $('.buttonset').append('<span class="msg">This setting is not active when using a video.</span>');
		 
		 checkSlideVideo();
		 
		 $('#_nectar_video_m4v, #_nectar_video_ogv, #_nectar_video_embed').keyup(function(){
		 	checkSlideVideo();
		 });
		 
	}

	
	function checkSlideVideo(){
		
		//if < WP 3.6
		if( $('#_nectar_video_m4v').length > 0 ){

			 if( $('#_nectar_video_m4v').val().length > 0 || $('#_nectar_video_ogv').val().length > 0 || $('#_nectar_video_embed').val().length > 0 ){
			 	$('.buttonset').stop().animate({'opacity':0.55},600);
			 	$('.buttonset .msg').stop().animate({'opacity': 1},600);
			 }
			 else {
			 	$('.buttonset').stop().animate({'opacity':1},600);
			 	$('.buttonset .msg').stop().animate({'opacity': 0},600);
			 }
		 
		} 
		//>= WP 3.6
		else {
			
			 if( $('#_nectar_video_embed').val().length > 0 ){
			 	$('.buttonset').stop().animate({'opacity':0.55},600);
			 	$('.buttonset .msg').stop().animate({'opacity': 1},600);
			 }
			 else {
			 	$('.buttonset').stop().animate({'opacity':1},600);
			 	$('.buttonset .msg').stop().animate({'opacity': 0},600);
			 }
			
		}
		
	}
	
	
	/*----------------------------------------------------------------------------------*/
	/*	Only show the portfolio display settings if the portfolio template is chosen
	/*----------------------------------------------------------------------------------*/
	
	function portfolioDisplaySettings(){
		if($('select#page_template').val() == 'template-portfolio.php'){
			$('#nectar-metabox-portfolio-display').show();
		} else {
			$('#nectar-metabox-portfolio-display').hide();
		}
	}
	
	$('select#page_template').change(portfolioDisplaySettings);
	portfolioDisplaySettings();
	
    
    /*----------------------------------------------------------------------------------*/
	/*	Only show parallax when using bg image
	/*----------------------------------------------------------------------------------*/
    function toggleParallaxOption(){
    	if($('#redux-opts-screenshot-_nectar_header_bg').length > 0 && $('#redux-opts-screenshot-_nectar_header_bg').attr('src').length > 0 ){
    		$('#_nectar_header_parallax').parents('tr').show();
    	} else {
    		$('#_nectar_header_parallax').parents('tr').hide();
    		$('#_nectar_header_parallax').prop('checked', false);
    	}
    }
    toggleParallaxOption();
    
    
    /*----------------------------------------------------------------------------------*/
    /*	Only show social options when using applicable layout
	/*----------------------------------------------------------------------------------*/
    function toggleSocialOptions(){
    	if($('select#header_layout').length > 0 && $('select#header_layout').val() == 'header_with_secondary' ){
    		$('#enable_social_in_header').parents('tr').show();
    		
    		if($('input#enable_social_in_header[type="checkbox"]').is(':checked')){
    			$('#enable_social_in_header').parents('tr').nextAll('tr').show();
    		}
    	} else {
    		$('#enable_social_in_header').parents('tr').hide();
    		$('#enable_social_in_header').parents('tr').nextAll('tr').hide();
    	}
    }
    toggleSocialOptions();
    
    $('select#header_layout').change(function(){
    	 toggleSocialOptions();
    });
    
    
    
    
    
    
    /*----------------------------------------------------------------------------------*/
	/*	Take care of the unnecessary buttons on the slider post type edit page
	/*----------------------------------------------------------------------------------*/
	
	if( $('#nectar-metabox-home-slider').length > 0 ){
		$('#preview-action, #wp-admin-bar-view').hide();
		$('.wrap > #message.updated p').html('Slide Updated.');
	}
		
	
	//chosen on template selection
	$('#select-aqpb-template').chosen();


    //slider meta hide/show
    
    ////bg type
    $('a[rel-id=_nectar_media_upload_mp4], a[rel-id=_nectar_media_upload_ogv], a[rel-id=_nectar_media_upload_webm], a[rel-id=_nectar_slider_image], label[for=_nectar_slider_video_texture]').parents('tr').hide();
    
    function backgroundType(){
    	$active = $('label[for=_nectar_slider_bg_type]').parents('tr').find('.buttonset .ui-state-active').attr('for');
    	if($active == 'nectar_meta_video_bg'){
    		
    		 $('a[rel-id=_nectar_media_upload_mp4], a[rel-id=_nectar_media_upload_webm], a[rel-id=_nectar_media_upload_ogv], label[for=_nectar_slider_video_texture], a[rel-id=_nectar_slider_preview_image], label[for=_nectar_slider_slide_bg_alignment]').parents('tr').fadeIn();
    		 $('a[rel-id=_nectar_slider_image]').parents('tr').hide();
    		 
    	} else if($active == 'nectar_meta_no_bg') {
    		
    		 $('a[rel-id=_nectar_slider_image]').parents('tr').fadeIn();
    		 $('a[rel-id=_nectar_media_upload_mp4], a[rel-id=_nectar_media_upload_ogv], a[rel-id=_nectar_media_upload_webm], label[for=_nectar_slider_video_texture], a[rel-id=_nectar_slider_preview_image]').parents('tr').hide();
    		 $('a[rel-id=_nectar_slider_image], label[for=_nectar_slider_slide_bg_alignment]').parents('tr').hide();
    		 
    	} else {
    		
    		 $('a[rel-id=_nectar_slider_image], label[for=_nectar_slider_slide_bg_alignment]').parents('tr').fadeIn();
    		 $('a[rel-id=_nectar_media_upload_mp4], a[rel-id=_nectar_media_upload_ogv], a[rel-id=_nectar_media_upload_webm], label[for=_nectar_slider_video_texture], a[rel-id=_nectar_slider_preview_image]').parents('tr').hide();
    	}
    }
    
    $('label[for=_nectar_slider_bg_type]').parents('tr').find('.buttonset label').click(function(){ setTimeout(backgroundType,60); });
    
    
    ////link tpye
    $('td.inline, label[for=_nectar_slider_entire_link], label[for=_nectar_slider_video_popup]').parents('tr').hide();
    
    function linkType(){
    	$active = $('label[for=_nectar_slider_link_type]').parents('tr').find('.buttonset .ui-state-active').attr('for');
    	if($active == 'nectar_meta_button_links'){
    		$('td.inline').parents('tr').fadeIn();
    		$('label[for=_nectar_slider_entire_link], label[for=_nectar_slider_video_popup]').parents('tr').hide();
    	}
		else if($active == 'nectar_meta_full_slide_link'){
			$('label[for=_nectar_slider_entire_link]').parents('tr').fadeIn();
    		$('td.inline, label[for=_nectar_slider_video_popup]').parents('tr').hide();
		} else {
    		$('label[for=_nectar_slider_video_popup]').parents('tr').fadeIn();
    		$('td.inline, label[for=_nectar_slider_entire_link]').parents('tr').hide();
    	}
    }
    
    $('label[for=_nectar_slider_link_type]').parents('tr').find('.buttonset label').click(function(){ setTimeout(linkType,60); });
    
    
    $(window).load(function(){
    	backgroundType();
    	linkType();
    	checkButtonStyle();
    	portfolioLayout();
    	$('.nectar-metabox-table textarea#_nectar_slider_caption, .nectar-metabox-table input#_nectar_slider_heading').parents('td').attr('colspan','2');
    });
    
    function checkButtonStyle(){
    	if($('select#_nectar_slider_button_style').val() == 'transparent'){ $('select#_nectar_slider_button_style').parents('td').next('td.inline').css({'opacity':'0.3'}); } 
    	else { $('select#_nectar_slider_button_style').parents('td').next('td.inline').css({'opacity':'1'}); }
    	
    	if($('select#_nectar_slider_button_style_2').val() == 'transparent'){ $('select#_nectar_slider_button_style_2').parents('td').next('td.inline').css({'opacity':'0.3'}); } 
    	else { $('select#_nectar_slider_button_style_2').parents('td').next('td.inline').css({'opacity':'1'}); }
    }
    
    $('select#_nectar_slider_button_style, select#_nectar_slider_button_style_2').change(function(){
    	 checkButtonStyle();
    });
    
    checkButtonStyle();
    
    
    //portfolio full width layout
    function portfolioLayout(){
    	if($('input#post_type').length > 0 && $('input#post_type').attr('value') == 'portfolio'){

		    if($('#nectar-metabox-project-configuration .ui-state-active').attr('for') == 'nectar_meta_enabled'){
		    	$('.edit-form-section').stop(true,true).slideUp(700);
		    	$('#nectar-metabox-portfolio-extra .hndle span').html('Full Width Content');
		    	$('#nectar-metabox-portfolio-extra .inside > p:not(.composer-switch)').html('Please enter your portfolio item content here - all nectar shortcodes are available for use.');
		    } else {
		    	$('.edit-form-section').stop(true,true).slideDown(700);
		    	$('#nectar-metabox-portfolio-extra .hndle span').html('Extra Content');
		    	$('#nectar-metabox-portfolio-extra .inside > p:not(.composer-switch)').html('Please use this section to place any extra content you would like to appear in the main content area under your portfolio item. (The above default editor is only used to populate your items sidebar content)');
		    }
		    
		}
    }
    
 
    portfolioLayout();
    
     $('label[for=nectar_meta_disabled]').parents('tr').find('.buttonset label').click(function(){ setTimeout(portfolioLayout,60); });

     if($('#adminmenu .wp-has-current-submenu').length > 0 && $('#adminmenu a.wp-has-current-submenu').css('background-color') == 'rgb(0, 116, 162)' ||
     $('#adminmenu > .current').length > 0 && $('#adminmenu > .current a.current').css('background-color') == 'rgb(0, 116, 162)'){
     	
     	if($('#toplevel_page_redux_options').length > 0) {
	     	var preloadSrc = $('#toplevel_page_redux_options > a .wp-menu-image img').attr('src');
	     	preloadSrc = preloadSrc.replace('.svg','-hover.svg');
	     	var preloadHoverImage = new Image()
			preloadHoverImage.src = preloadSrc;
		}
		
     	$('#toplevel_page_redux_options:not(.wp-has-current-submenu)').hover(function(){
     		$hoverSrc = $(this).find('> a .wp-menu-image img').attr('src');
     		$hoverSrc = $hoverSrc.replace('.svg','-hover.svg');
     		$(this).find('>a .wp-menu-image img').attr('src',$hoverSrc);
     	},function(){
     		$hoverSrc = $(this).find('>a .wp-menu-image img').attr('src');
     		$hoverSrc = $hoverSrc.replace('-hover.svg','.svg');
     		$(this).find('> a .wp-menu-image img').attr('src',$hoverSrc);
     	});
     	
     }
     
     if($('#adminmenu .wp-has-current-submenu').length > 0 && $('#adminmenu a.wp-has-current-submenu').css('background-color') == 'rgb(136, 136, 136)' ||
     $('#adminmenu > .current').length > 0 && $('#adminmenu > .current a.current').css('background-color') == 'rgb(136, 136, 136)'){
     	
     	if($('#toplevel_page_redux_options').length > 0) {
	     	var preloadSrc = $('#toplevel_page_redux_options > a .wp-menu-image img').attr('src');
	     	preloadSrc = preloadSrc.replace('-grey.svg','.svg');
	     	var preloadHoverImage = new Image()
			preloadHoverImage.src = preloadSrc;
		}

     	$('#toplevel_page_redux_options:not(.wp-has-current-submenu) > a').hover(function(){
     		$hoverSrc = $(this).find('.wp-menu-image img').attr('src');
     		$hoverSrc = $hoverSrc.replace('-grey.svg','.svg');
     		$(this).find('.wp-menu-image img').attr('src',$hoverSrc).css('opacity',0.6);
     	},function(){
     		$hoverSrc = $(this).find('.wp-menu-image img').attr('src');
     		$hoverSrc = $hoverSrc.replace('.svg','-grey.svg');
     		$(this).find('.wp-menu-image img').attr('src',$hoverSrc).css('opacity',0.7);
     	});
     	
     	$('#toplevel_page_redux_options.wp-has-current-submenu > a .wp-menu-image img').attr('src',preloadSrc).css('opacity',0.6);
     	
     }
     
     
     //page builder starting categories
     $('body').on('change','.edit_form_line select.wpb_vc_param_value.dropdown_multi.category[name="category"]', function(){
    	
    	if($('.edit_form_line .starting_category').length > 0) {
    		
			var selectedCats = $(this).val();
			
			if(selectedCats == 'all') {
				$('.edit_form_line .starting_category option').removeAttr('disabled').removeAttr('selected').show();
			} else {
				$('.edit_form_line .starting_category option:not([value="default"])').attr('disabled','disabled').removeAttr('selected').hide();
				for(var i=0; i < selectedCats.length; i++){
					$('.edit_form_line .starting_category option[value="' + selectedCats[i] + '"]').removeAttr('disabled').show();
				}
				$('.edit_form_line .starting_category option:not([disabled])').first().attr('selected','selected');
			}
			
		}
	});
	
     
});


