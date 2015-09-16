<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

class WPBakeryShortCode_VC_Column extends WPBakeryShortCode {
    protected  $predefined_atts = array(
        'el_class' => '',
        'el_position' => '',
        'width' => '1/1'
    );
    public function getColumnControls($controls, $extended_css = '') {
        $controls_start = '<div class="controls controls_column'.(!empty($extended_css) ? " {$extended_css}" : '').'">';
        $controls_end = '</div>';
        
        if ($extended_css=='bottom-controls') $control_title = __('Append to this column', 'js_composer');
        else $control_title = __('Prepend to this column', 'js_composer');
        
        $controls_add = ' <a class="column_add" href="#" title="'.$control_title.'"></a>';
        $controls_edit = ' <a class="column_edit" href="#" title="'.__('Edit this column', 'js_composer').'"></a>';

       return $controls_start .  $controls_add . $controls_edit . $controls_end;
    }
    public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes.
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "js_composer");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == true && $param['holder'] != 'hidden' ) {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }

    public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        if ( $width == 'column_14' || $width == '1/4' ) {
            $width = array('vc_span3');
        }
        else if ( $width == 'column_14-14-14-14' ) {
            $width = array('vc_span3', 'vc_span3', 'vc_span3', 'vc_span3');
        }

        else if ( $width == 'column_13' || $width == '1/3' ) {
            $width = array('vc_span4');
        }
        else if ( $width == 'column_13-23' ) {
            $width = array('vc_span4', 'vc_span8');
        }
        else if ( $width == 'column_13-13-13' ) {
            $width = array('vc_span4', 'vc_span4', 'vc_span4');
        }

        else if ( $width == 'column_12' || $width == '1/2' ) {
            $width = array('vc_span6');
        }
        else if ( $width == 'column_12-12' ) {
            $width = array('vc_span6', 'vc_span6');
        }

        else if ( $width == 'column_23' || $width == '2/3' ) {
            $width = array('vc_span8');
        }
        else if ( $width == 'column_34' || $width == '3/4' ) {
            $width = array('vc_span9');
        }
        else if ( $width == 'column_16' || $width == '1/6' ) {
            $width = array('vc_span2');
        } else if ( $width == 'column_56' || $width == '5/6' ) {
            $width = array('vc_span10');
        } else {
            $width = array('');
        }
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional($width[$i]), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional($width[$i]), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
    public function customAdminBlockParams() {
        return '';
    }

    public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="'.$this->settings["base"].'" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_'.$this->settings['base'].' wpb_sortable '.$this->templateWidth().' wpb_content_holder"'.$this->customAdminBlockParams();
    }

    public function containerHtmlBlockParams($width, $i) {
        return 'class="wpb_column_container vc_container_for_children"';
    }

    public function template($content = '') {
        return $this->contentAdmin($this->atts);
    }

    protected function templateWidth() {
        return '<%= window.vc_convert_column_size(params.width) %>';
    }
}
class WPBakeryShortCode_VC_Column_Inner extends WPBakeryShortCode_VC_Column {
    protected function getFileName() {
        return 'vc_column';
    }
}

vc_map( array(
  "name" => __("Column", "js_composer"),
  "base" => "vc_column_inner",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> array(
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "value" => "",
      "description" => __("If you wish to style this particular content element differently, please use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  ),
  "js_view" => 'VcColumnView'
) );














class WPBakeryShortCode_One_Half extends WPBakeryShortCode_VC_Column {

	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span6 wpb_content_holder"'.$this->customAdminBlockParams();
    }
    
    public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span6');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span6'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span6'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_One_Half_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span6 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span6');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span6'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span6'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}



class WPBakeryShortCode_One_Third extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span4 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span4');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span4'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span4'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_One_Third_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span4 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span4');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span4'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span4'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}




class WPBakeryShortCode_One_Fourth extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span3 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span3');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span3'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span3'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_One_Fourth_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span3 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span3');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span3'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span3'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_One_Sixth extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span2 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span2');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span2'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span2'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}




class WPBakeryShortCode_One_Sixth_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span2 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span2');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span2'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span2'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_Two_Thirds extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span8 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span8');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span8'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span8'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}



class WPBakeryShortCode_Two_Thirds_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span8 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span8');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span8'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span8'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_Three_Fourths extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span9 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span9');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span9'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span9'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_Three_Fourths_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span9 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span9');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span9'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span9'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}


class WPBakeryShortCode_Five_Sixths extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span10 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span10');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span10'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span10'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}

class WPBakeryShortCode_Five_Sixths_Last extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span10 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span10');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span10'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span10'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}

class WPBakeryShortCode_One_Whole extends WPBakeryShortCode_VC_Column {
	
	public function mainHtmlBlockParams($width, $i) {
        return 'data-element_type="vc_column" data-vc-column-width="'.wpb_vc_get_column_width_indent($width[$i]).'" class="wpb_vc_column wpb_sortable vc_span12 wpb_content_holder"'.$this->customAdminBlockParams();
    }
	
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));
        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));
        $column_controls_bottom =  $this->getColumnControls('add', 'bottom-controls');

        $width = array('vc_span10');
 
        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div '.$this->mainHtmlBlockParams($width, $i).'>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span12'), $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div '.$this->containerHtmlBlockParams($width, $i).'>';
            $output .= do_shortcode( shortcode_unautop($content) );
            $output .= '</div>';
            if ( isset($this->settings['params']) ) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if ( is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= str_replace("%column_size%", wpb_translateColumnWidthToFractional('vc_span12'), $column_controls_bottom);
            $output .= '</div>';
        }
        return $output;
    }
	
}




$column_params = array(
	 array(
		"type" => "dropdown",
		"class" => "",
		"heading" => "Animation",
		"param_name" => "animation",
		"value" => array(
			 "None" => "none",
		     "Fade In" => "Fade In",
	  		 "Fade In From Left" => "Fade In From Left",
	  		 "Fade In Right" => "Fade In From Right",
	  		 "Fade In From Bottom" => "Fade In From Bottom",
	  		 "Grow In" => "Grow In"		
		)
	),
    array(
		"type" => "textfield",
		"class" => "",
		"heading" => "Animation Delay",
		"param_name" => "delay",
		"description" => ""
	),

	array(
		"type" => "checkbox",
		"class" => "",
		"heading" => "Boxed Column",
		"value" => array("Boxed Style" => "true" ),
		"param_name" => "boxed",
		"description" => ""
	),

	array(
		"type" => "checkbox",
		"class" => "",
		"heading" => "Centered Content",
		"value" => array("Centered Content Alignment" => "true" ),
		"param_name" => "centered_text",
		"description" => ""
	),

	 array(
		"type" => "textfield",
		"class" => "",
		"heading" => "Extra Class Name",
		"param_name" => "class",
		"value" => ""
	));







vc_map(  array(
  "name" => __("One Half", "js_composer"),
  "base" => "one_half",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Half", "js_composer"),
  "base" => "one_half_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Third", "js_composer"),
  "base" => "one_third",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Third", "js_composer"),
  "base" => "one_third_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Fourth", "js_composer"),
  "base" => "one_fourth",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Fourth", "js_composer"),
  "base" => "one_fourth_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));



vc_map(  array(
  "name" => __("One Sixth", "js_composer"),
  "base" => "one_sixth",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Sixth", "js_composer"),
  "base" => "one_sixth_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));



vc_map(  array(
  "name" => __("Three Fourths", "js_composer"),
  "base" => "three_fourths",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("Three Fourths", "js_composer"),
  "base" => "three_fourths_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("Two Thirds", "js_composer"),
  "base" => "two_thirds",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("Two Thirds", "js_composer"),
  "base" => "two_thirds_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("Five Sixths", "js_composer"),
  "base" => "five_sixths",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("Five Sixths", "js_composer"),
  "base" => "five_sixths_last",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
  "params"=> $column_params,
  "js_view" => 'VcColumnView'
));


vc_map(  array(
  "name" => __("One Whole", "js_composer"),
  "base" => "one_whole",
  "class" => "",
  "icon" => "",
  "wrapper_class" => "",
  "controls"	=> "full",
  "allowed_container_element" => false,
  "content_element" => false,
  "is_container" => true,
   "params"=> $column_params,
  "js_view" => 'VcColumnView'
));
















