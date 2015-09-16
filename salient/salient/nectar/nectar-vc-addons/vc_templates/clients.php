<?php 

extract(shortcode_atts(array("carousel" => "false", "fade_in_animation" => "false", "columns" => '4'), $atts));
	
$opening = null;
$closing = null;
$column_class = null;

switch ($columns) {
	case '2' :
		$column_class = 'two-cols';
		break;
	case '3' :
		$column_class = 'three-cols';
		break;
	case '4' :
		$column_class = 'four-cols';
		break;	
	case '5' :
		$column_class = 'five-cols';
		break;
	case '6' :
		$column_class = 'six-cols';
		break;
}

($fade_in_animation == "true") ? $animation = 'fade-in-animation' : $animation = null ;

if($carousel == "true"){
	$opening .= '<div class="carousel-wrap"><div class="row carousel clients '.$column_class.' ' .$animation.'" data-max="'.$columns.'">';
	$closing .= '</div></div>';
}
else{
	$opening .= '<div class="clients no-carousel '.$column_class.' ' .$animation.'">';
	$closing .= '</div>';
}

echo $opening . do_shortcode($content) . $closing;

?>