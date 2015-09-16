<?php

   extract(shortcode_atts(array(
      'size' => '400',
	  "img_link_target" => '',
	  'map_center_lat'=> '', 
	  'map_center_lng'=> '', 
	  'zoom' => '12', 
	  'enable_zoom' => '', 
	  'marker_image'=> '', 
	  'marker_animation'=> 'false',
	  'map_markers' => ''
	),
	$atts));
	
	wp_enqueue_script('googleMaps', 'https://maps.google.com/maps/api/js?sensor=false', NULL, NULL, TRUE);
	wp_enqueue_script('nectarMap', get_template_directory_uri() . '/js/map.js', array('jquery', 'googleMaps'), '1.0', TRUE);

	$markersArr = array();
	$explodedByBr = explode("\n", $map_markers);	
	$count = 0;
	
	foreach ($explodedByBr as $brExplode) {
		
	    $markersArr[$count] = array();
	  
	    $explodedBySep = explode('|', $brExplode);
	  
	    foreach ($explodedBySep as $sepExploded) {
	        $markersArr[$count][] = $sepExploded;
	    }
	  
	    $count++;
	}

	
	$map_data = null;
	$count = 0;
	
	for($i = 1; $i <= sizeof($markersArr); $i++){
		
		if(empty($markersArr[$count][0])) $markersArr[$count][0] = null;
		if(empty($markersArr[$count][1])) $markersArr[$count][1] = null;
		if(empty($markersArr[$count][2])) $markersArr[$count][2] = null;
	
		$map_data[$i]['lat'] = $markersArr[$count][0];
		$map_data[$i]['lng'] = $markersArr[$count][1];
		$map_data[$i]['mapinfo'] =  $markersArr[$count][2];
		
		$count++;
	}
	
	wp_localize_script('nectarMap', 'map_data', $map_data);
	
	$marker_image_src = null;
	if(!empty($marker_image)) {
		$marker_image_src = wp_get_attachment_image_src($marker_image, 'full');
		$marker_image_src = $marker_image_src[0];
	}
	
	echo '<div id="'.uniqid("map_").'" style="height: '.$size.'px;" class="nectar-google-map" data-enable-animation="'.$marker_animation.'" data-enable-zoom="'.$enable_zoom.'" data-zoom-level="'.$zoom.'" data-center-lat="'.$map_center_lat.'" data-center-lng="'.$map_center_lng.'" data-marker-img="'.$marker_image_src.'"></div>';
	
?>