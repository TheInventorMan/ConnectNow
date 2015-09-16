<?php 

extract(shortcode_atts(array("autorotate"=>''), $atts));

echo '<div class="col span_12 testimonial_slider" data-autorotate="'.$autorotate.'"><div class="slides">'.do_shortcode($content).'</div></div>';

?>