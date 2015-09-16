<?php 

extract(shortcode_atts(array("name" => '', "quote" => ''), $atts));
	
echo '<blockquote><p>"'.$quote.'"</p>'. '<span>&minus; '.$name.'</span></blockquote>';

?>