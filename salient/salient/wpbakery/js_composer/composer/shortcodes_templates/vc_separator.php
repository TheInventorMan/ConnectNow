<?php
$output = '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_separator wpb_content_element', $this->settings['base']);
$output .= '<div class="'.$css_class.'"></div>'.$this->endBlockComment('separator')."\n";

echo $output;