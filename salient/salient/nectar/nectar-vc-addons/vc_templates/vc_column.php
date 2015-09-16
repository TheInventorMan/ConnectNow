<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    "boxed" => 'false', 
    "centered_text" => 'false', 
    'animation' => '', 
    'delay' => '0'
), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$box_border = null;
$parsed_animation = null;	
	
$el_class .= ' wpb_column column_container col';

if($boxed == 'true')  { $el_class .= ' boxed'; $box_border = '<span class="bottom-line"></span>'; }
if($centered_text == 'true') $el_class .= ' centered-text';

if(!empty($animation) && $animation != 'none') {
	 $el_class .= ' has-animation';
	
	 $parsed_animation = str_replace(" ","-",$animation);
	 $delay = intval($delay);
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
$output .= "\n\t".'<div class="'.$css_class.'" data-animation="'.strtolower($parsed_animation).'" data-delay="'.$delay.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;