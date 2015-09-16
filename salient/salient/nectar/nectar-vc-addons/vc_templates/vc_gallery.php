<?php
$output = $title = $type = $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $interval = '';
extract(shortcode_atts(array(
    'title' => '',
    'type' => 'flexslider',
    'onclick' => 'link_image',
    'custom_links' => '',
    'custom_links_target' => '',
    'img_size' => 'thumbnail',
    'images' => '',
    'el_class' => '',
    'interval' => '5',
), $atts));
$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';

$el_class = $this->getExtraClass($el_class);

if ( $type == 'flexslider_style' ) {
    $el_start = '<li>';
    $el_end = '</li>';
    $slides_wrap_start = '<ul class="slides">';
    $slides_wrap_end = '</ul>';
	
    wp_enqueue_script('flexslider');
	
} else if ( $type == 'nectarslider_style' ) {
    

    $el_start = '';
    $el_end = '';
	
   	$bulk_param = ($onclick != 'link_no') ? 'false' : 'true';
	
	if($img_size == 'thumbnail') {
		$slide_height = '200';
	} else {
		$arr = explode("x", $img_size, 2);
		$slide_height = $arr[1];
	}

	$slides_wrap_start .= '<div class="nectar-slider-wrap" style="height: '.$slide_height.'px" data-fullscreen="false"  data-full-width="false" data-parallax="false" data-autorotate="5500" id="ns-id-'.uniqid().'">';
	$slides_wrap_start .=	'<div class="swiper-container" style="height: '.$slide_height.'px"  data-loop="'.$bulk_param.'" data-height="'.$slide_height.'" data-arrows="true" data-bullets="false" data-desktop-swipe="'.$bulk_param.'" data-settings="">';
	$slides_wrap_start .=	'<div class="swiper-wrapper">';
	
	$slides_wrap_end .= '</div>  <a href="" class="slider-prev"><i class="icon-salient-left-arrow"></i> <div class="slide-count"> <span class="slide-current">1</span> <i class="icon-salient-right-line"></i> <span class="slide-total"></span> </div> </a>
			     		<a href="" class="slider-next"><i class="icon-salient-right-arrow"></i> <div class="slide-count"> <span class="slide-current">1</span> <i class="icon-salient-right-line"></i> <span class="slide-total"></span> </div> </a>';
			       
	$slides_wrap_end .= '<div class="nectar-slider-loading"></div> </div> </div>';
	
	
} else if ( $type == 'image_grid' ) {
    wp_enqueue_script( 'isotope' );

    $el_start = '<li class="isotope-item">';
    $el_end = '</li>';
    $slides_wrap_start = '<ul class="wpb_image_grid_ul">';
    $slides_wrap_end = '</ul>';
}




$flex_fx = '';
if ( $type == 'flexslider_style' ) {
    $type = ' wpb_flexslider flex-gallery flexslider';
    $flex_fx = ' data-flex_fx="fade"';
} else if ( $type == 'nectarslider_style' ) {
    $type = 'nectarslider_style';
    $flex_fx = '';
} 


/*
 else if ( $type == 'fading' ) {
    $type = ' wpb_slider_fading';
    $el_start = '<li>';
    $el_end = '</li>';
    $slides_wrap_start = '<ul class="slides">';
    $slides_wrap_end = '</ul>';
    wp_enqueue_script( 'cycle' );
}*/

//if ( $images == '' ) return null;
if ( $images == '' ) $images = '-1,-2,-3';

$pretty_rel_random = ' rel="prettyPhoto[rel-'.rand().']"'; //rel-'.rand();

if ( $onclick == 'custom_link' ) { $custom_links = explode( ',', $custom_links); }
$images = explode( ',', $images);
$i = -1;

foreach ( $images as $attach_id ) {
    $i++;
    if ($attach_id > 0) {
        $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ));
    }
    else {
        $different_kitten = 400 + $i;
        $post_thumbnail = array();
        $post_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/'.$different_kitten.'/300" />';
        $post_thumbnail['p_img_large'][0] = 'http://placekitten.com/g/1024/768';
    }

    $thumbnail = $post_thumbnail['thumbnail'];
    $p_img_large = $post_thumbnail['p_img_large'];
    $link_start = $link_end = '';

    if ( $onclick == 'link_image' ) {
        $link_start = '<a href="'.$p_img_large[0].'"'.$pretty_rel_random.'>';
        $link_end = '</a>';
    }
    else if ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ) {
        $link_start = '<a href="'.$custom_links[$i].'"' . (!empty($custom_links_target) ? ' target="'.$custom_links_target.'"' : '') . '>';
        $link_end = '</a>';
    }
	
	if($type == 'nectarslider_style') {
		$img = wp_get_attachment_image_src(  $attach_id, $img_size );
		
		$thumbnail = '<div class="swiper-slide" style="background-image: url('. $img[0].');" data-bg-alignment="center" data-color-scheme="light" data-x-pos="centered" data-y-pos="middle">';
		
		if ( $onclick == 'link_image' ) {
	        $slide_link = '<a class="entire-slide-link" href="'.$p_img_large[0].'"'.$pretty_rel_random.'></a>';
	    }
	    else if ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ) {
	        $slide_link = '<a class="entire-slide-link" href="'.$custom_links[$i].'"' . (!empty($custom_links_target) ? ' target="'.$custom_links_target.'"' : '') . '></a>';
	    } else {
	    	$slide_link = null;
	    }
		
		$thumbnail .= $slide_link;
		
		$link_start = null;
		$link_end = null;
		
		$thumbnail .= '</div>';
		
		
	}
	
    $gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
}
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gallery wpb_content_element'.$el_class.' clearfix', $this->settings['base']);
$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_gallery_heading'));
$output .= '<div class="wpb_gallery_slides'.$type.'" data-interval="'.$interval.'"'.$flex_fx.'>'.$slides_wrap_start.$gal_images.$slides_wrap_end.'</div>';
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_gallery');

echo $output;