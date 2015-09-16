<?php

   extract(shortcode_atts(array(
	  "type" => 'in_container',
	  'bg_image'=> '', 
	  'bg_position'=> '', 
	  'bg_repeat' => '', 
	  'parallax_bg' => '', 
	  'bg_color'=> '', 
	  'text_align'=> '', 
	  
	  'video_bg'=> '', 
	  'enable_video_color_overlay'=> '', 
	  'video_overlay_color'=> '', 
	  'video_webm'=> '', 
	  'video_mp4'=> '', 
	  'video_ogv'=> '', 
	  'video_image'=> '', 
	  
	  "top_padding" => "0", 
	  "bottom_padding" => "0",
	  'text_color' => 'dark',  
	  'custom_text_color' => '',  
	  'class' => ''), 
	$atts));
	
	wp_enqueue_style( 'js_composer_front' );
	wp_enqueue_script( 'wpb_composer_front_js' );
	wp_enqueue_style('js_composer_custom_css');
	
    $style = null;
	$etxra_class = null;
	
	if(!empty($bg_image)) {

		if(!preg_match('/^\d+$/',$bg_image)){
				
			$style .= 'background-image: url('. $bg_image . '); ';
			$style .= 'background-position: '. $bg_position .'; ';
		
		} else {
			$bg_image_src = wp_get_attachment_image_src($bg_image, 'full');
			
			$style .= 'background-image: url('. $bg_image_src[0]. '); ';
			$style .= 'background-position: '. $bg_position .'; ';
		}
		
		//for pattern bgs
		if(strtolower($bg_repeat) == 'repeat'){
			$style .= 'background-repeat: '. strtolower($bg_repeat) .'; ';
			$etxra_class = 'no-cover';
		} else {
			$style .= 'background-repeat: '. strtolower($bg_repeat) .'; ';
			$etxra_class = null;
		}
	}
	
	if(!empty($bg_color)) {
		$style .= 'background-color: '. $bg_color.'; ';
	}
	
	if(strtolower($parallax_bg) == 'true'){
		$parallax_class = 'parallax_section';
	} else {
		$parallax_class = 'standard_section';
	}
	
	$style .= 'padding-top: '. $top_padding .'px; ';
	$style .= 'padding-bottom: '. $bottom_padding .'px; ';
	
	if($text_color == 'custom' && !empty($custom_text_color)) {
		$style .= 'color: '. $custom_text_color .'; ';
	}
	
	//main class
	if($type == 'in_container') {
		
		$main_class = "";
		
	} else if($type == 'full_width_background'){
		
		$main_class = "full-width-section ";
		
	} else if($type == 'full_width_content'){
		
		$main_class = "full-width-content ";
	}
	 
	 
	 
	 
	 
    echo'
	<div id="'.uniqid("fws_").'" class="wpb_row vc_row-fluid '. $main_class . $parallax_class . ' ' . $class . ' ' . $etxra_class.' " style="'.$style.'">';
	
	//video bg
	if($video_bg) {
		
		if ( floatval(get_bloginfo('version')) >= "3.6" ) {
			wp_enqueue_script('wp-mediaelement');
			wp_enqueue_style('wp-mediaelement');
		} else {
			//register media element for WordPress 3.5
			wp_register_script('wp-mediaelement', get_template_directory_uri() . '/js/mediaelement-and-player.min.js', array('jquery'), '1.0', TRUE);
			wp_register_style('wp-mediaelement', get_template_directory_uri() . '/css/mediaelementplayer.min.css');
			
			wp_enqueue_script('wp-mediaelement');
			wp_enqueue_style('wp-mediaelement');
		}
		
		//parse video image
		if(strpos($video_image, "http://") !== false){
			$video_image_src = $video_image;
		} else {
			$video_image_src = wp_get_attachment_image_src($video_image, 'full');
			$video_image_src = $video_image_src[0];
		}
		
		//$poster_markup = (!empty($video_image)) ? 'poster="'.$video_image_src.'"' : null ;
		$poster_markup = null;
		
		if($enable_video_color_overlay != 'true') $video_overlay_color = null;
		$video_markup .=  '<div class="video-color-overlay" data-color="'.$video_overlay_color.'"></div>';
		
			 
		$video_markup .= '
		
		<div class="mobile-video-image" style="background-image: url('.$video_image_src.')"></div>
		<div class="nectar-video-wrap">
			
			
			<video class="nectar-video-bg" width="1800" height="700" '.$poster_markup.' controls="controls" preload="auto" loop autoplay>';
	
			    if(!empty($video_webm)) { $video_markup .= '<source type="video/webm" src="'.$video_webm.'">'; }
			    if(!empty($video_mp4)) { $video_markup .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
			    if(!empty($video_ogv)) { $video_markup .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
			  
			   $video_markup .='<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/js/flashmediaelement.swf">
			        <param name="movie" value="'.get_template_directory_uri().'/js/flashmediaelement.swf" />
			        <param name="flashvars" value="controls=true&file='.$video_mp4.'" />
			        <img src="'.$video_image_src.'" width="1800" height="700" alt="No video playback capabilities" title="No video playback capabilities" />
			    </object>
			</video>
	
		</div>';
		
		echo $video_markup;
	}
	
    echo '<div class="col span_12 '.strtolower($text_color).' '.$text_align.'">'.do_shortcode($content).'</div></div>';
	
?>