<?php 

extract(shortcode_atts(array("image" => "", "url" => '#', "alt" => ""), $atts));
$client_content = null;

(!empty($alt)) ? $alt_tag = $alt : $alt_tag = 'client';

if(preg_match('/^\d+$/',$image)){
	$image_src = wp_get_attachment_image_src($image, 'full');
	$image = $image_src[0];
}
	
	
if(!empty($url) && $url != 'none' && $url != '#'){
	$client_content = '<div><a href="'.$url.'" target="_blank"><img src="'.$image.'" alt="'.$alt_tag.'" /></a></div>';
}  
else {
	$client_content = '<div><img src="'.$image.'" alt="'.$alt_tag.'" /></div>';
}

echo $client_content;

?>