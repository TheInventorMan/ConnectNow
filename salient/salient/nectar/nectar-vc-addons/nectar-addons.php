<?php 

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

vc_remove_element("vc_button");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_gmaps");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_facebook");
vc_remove_element("vc_tweetmeme");
vc_remove_element("vc_googleplus");
vc_remove_element("vc_facebook");
vc_remove_element("vc_pinterest");
vc_remove_element("vc_message");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");
vc_remove_element("vc_flickr");
vc_remove_element("vc_tour");
vc_remove_element("vc_separator");
vc_remove_element("vc_single_image");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_accordion");
vc_remove_element("vc_accordion_tab");
vc_remove_element("vc_toggle");
vc_remove_element("vc_tabs");
vc_remove_element("vc_tab");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_text");


// VC_Row Mods/Additions
vc_remove_param("vc_row", "bg_color");
vc_remove_param("vc_row", "font_color");
vc_remove_param("vc_row", "margin_bottom");
vc_remove_param("vc_row", "bg_image");
vc_remove_param("vc_row", "bg_image_repeat");
vc_remove_param("vc_row", "padding");
vc_remove_param("vc_row", "el_class");

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"In Container" => "in_container",
		"Full Width Background" => "full_width_background",
		"Full Width Content" => "full_width_content"		
	)
));

vc_add_param("vc_row", array(
	"type" => "fws_image",
	"class" => "",
	"heading" => "Background Image",
	"param_name" => "bg_image",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Position",
	"param_name" => "bg_position",
	"value" => array(
		 "Left Top" => "left top",
  		 "Left Center" => "left center",
  		 "Left Bottom" => "left bottom",
  		 "Center Top" => "center top",
  		 "Center Center" => "center center",
  		 "Center Bottom" => "center bottom",
  		 "Right Top" => "right top",
  		 "Right Center" => "right center",
  		 "Right Bottom" => "right bottom"
	),
	"dependency" => Array('element' => "bg_image", 'not_empty' => true)
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Repeat",
	"param_name" => "bg_repeat",
	"value" => array(
		"No Repeat" => "no-repeat",
		"Repeat" => "repeat"
	),
	"dependency" => Array('element' => "bg_image", 'not_empty' => true)
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Parallax Background",
	"value" => array("Enable Parallax Background?" => "true" ),
	"param_name" => "parallax_bg",
	"description" => "",
	"dependency" => Array('element' => "bg_image", 'not_empty' => true)
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Color",
	"param_name" => "bg_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Video Background",
	"value" => array("Enable Video Background?" => "use_video" ),
	"param_name" => "video_bg",
	"description" => ""
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Video Color Overlay",
	"value" => array("Enable a color overlay ontop of your video?" => "true" ),
	"param_name" => "enable_video_color_overlay",
	"description" => "",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Overlay Color",
	"param_name" => "video_overlay_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "enable_video_color_overlay", 'value' => array('true'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "WebM File URL",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "You must include this format & the mp4 format to render your video with cross browser compatibility. OGV is optional.
Video must be in a 16:9 aspect ratio.",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "MP4 File URL",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "Enter the URL for your mp4 video file here",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "OGV File URL",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "Enter the URL for your ogv video file here",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video Preview Image",
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Color",
	"param_name" => "text_color",
	"value" => array(
		"Dark" => "dark",
		"Light" => "light",
		"Custom" => "custom"
	)
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Custom Text Color",
	"param_name" => "custom_text_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "text_color", 'value' => array('custom'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Alignment",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "top_padding",
	"description" => "Don'nt include \"px\" in your string. e.g. 40"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "bottom_padding",
	"description" => "Don'nt include \"px\" in your string. e.g. 40"
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Extra Class Name",
	"param_name" => "class",
	"value" => ""
));


//inner row class fix
vc_remove_param("vc_row_inner", "el_class");

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Extra Class Name",
	"param_name" => "class",
	"value" => ""
));


class WPBakeryShortCode_Full_Width_Section extends WPBakeryShortCode_VC_Row {
		
			
	public function contentAdmin($atts, $content = null) {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));

        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));

        for ( $i=0; $i < count($width); $i++ ) {
            $output .= '<div'.$this->customAdminBockParams().' data-element_type="vc_row" class="'.$this->settings['base'].' wpb_vc_row wpb_sortable">';
            $output .= str_replace("%column_size%", 1, $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div class="vc_row-fluid wpb_row_container vc_container_for_children">';
            if($content=='' && !empty($this->settings["default_content_in_template"])) {
                $output .= do_shortcode( shortcode_unautop($this->settings["default_content_in_template"]) );
            } else {
                $output .= do_shortcode( shortcode_unautop($content) );

            }
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
            $output .= '</div>';
        }

        return $output;
    }	
	
}

vc_map( array(
		"name" => "Full Width Section",
		"base" => "full_width_section",
		"class" => "wpb_vc_row",
		"is_container" => true,
 		"icon" => "icon-wpb-row",
 		"show_settings_on_create" => false,
		"category" => __('Nectar Elements', 'js_composer'),
		'js_view' => 'VcRowView',
		"content_element" => false,
	    'default_content' => '[vc_column width="1/1"]%content%[/vc_column]'
));



vc_add_param("full_width_section", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width Background" => "full_width_background",
		"Full Width Content" => "full_width_content",	
		"In Container" => "in_container"
	)
));

vc_add_param("full_width_section", array(
	"type" => "fws_image",
	"class" => "",
	"heading" => "Background Image",
	"param_name" => "image_url",
	"value" => "",
	"description" => ""
));

vc_add_param("full_width_section", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Position",
	"param_name" => "bg_pos",
	"value" => array(
		 "Left Top" => "Left Top",
  		 "Left Center" => "Left Center",
  		 "Left Bottom" => "Left Bottom",
  		 "Center Top" => "Center Top",
  		 "Center Center" => "Center Center",
  		 "Center Bottom" => "Center Bottom",
  		 "Right Top" => "Right Top",
  		 "Right Center" => "Right Center",
  		 "Right Bottom" => "Right Bottom"
	),
	"dependency" => Array('element' => "image_url", 'not_empty' => true)
));

vc_add_param("full_width_section", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Repeat",
	"param_name" => "bg_repeat",
	"value" => array(
		"No Repeat" => "No-Repeat",
		"Repeat" => "Repeat"
	),
	"dependency" => Array('element' => "image_url", 'not_empty' => true)
));

vc_add_param("full_width_section", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Parallax Background",
	"value" => array("Enable Parallax Background?" => "true" ),
	"param_name" => "parallax_bg",
	"description" => "",
	"dependency" => Array('element' => "image_url", 'not_empty' => true)
));

vc_add_param("full_width_section", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Color",
	"param_name" => "background_color",
	"value" => "",
	"description" => ""
));

vc_add_param("full_width_section", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Video Background",
	"value" => array("Enable Video Background?" => "use_video" ),
	"param_name" => "video_bg",
	"description" => ""
));

vc_add_param("full_width_section", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Video Color Overlay",
	"value" => array("Enable a color overlay ontop of your video?" => "true" ),
	"param_name" => "enable_video_color_overlay",
	"description" => "",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("full_width_section", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Overlay Color",
	"param_name" => "video_overlay_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "enable_video_color_overlay", 'value' => array('true'))
));

vc_add_param("full_width_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "WebM File URL",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "You must include this format & the mp4 format to render your video with cross browser compatibility. OGV is optional.
Video must be in a 16:9 aspect ratio.",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("full_width_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "MP4 File URL",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "Enter the URL for your mp4 video file here",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("full_width_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "OGV File URL",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "Enter the URL for your ogv video file here",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("full_width_section", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video Preview Image",
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video_bg", 'value' => array('use_video'))
));

vc_add_param("full_width_section", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Color",
	"param_name" => "text_color",
	"value" => array(
		"Light" => "light",
		"Dark" => "dark",
		"Custom" => "custom"
	)
));

vc_add_param("full_width_section", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Custom Text Color",
	"param_name" => "custom_text_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "text_color", 'value' => array('custom'))
));

vc_add_param("full_width_section", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Alignment",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
));

vc_add_param("full_width_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "top_padding",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));

vc_add_param("full_width_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "bottom_padding",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));

vc_add_param("full_width_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Extra Class Name",
	"param_name" => "class",
	"value" => ""
));



// Column Mods/Additions
vc_remove_param("vc_column", "el_class");

vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Animation",
	"value" => array("Enable Column Animation?" => "true" ),
	"param_name" => "enable_animation",
	"description" => ""
));

vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"param_name" => "animation",
	"value" => array(
		 "None" => "none",
	     "Fade In" => "fade-in",
  		 "Fade In From Left" => "fade-in-from-left",
  		 "Fade In Right" => "fade-in-from-right",
  		 "Fade In From Bottom" => "fade-in-from-bottom",
  		 "Grow In" => "grow-in"		
	),
	"dependency" => Array('element' => "enable_animation", 'not_empty' => true)
));

vc_add_param("vc_column", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Animation Delay",
	"param_name" => "delay",
	"admin_label" => false,
	"description" => "",
	"dependency" => Array('element' => "enable_animation", 'not_empty' => true)
));

vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Boxed Column",
	"value" => array("Boxed Style" => "true" ),
	"param_name" => "boxed",
	"description" => ""
));

vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Centered Content",
	"value" => array("Centered Content Alignment" => "true" ),
	"param_name" => "centered_text",
	"description" => ""
));

vc_add_param("vc_column", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Extra Class Name",
	"param_name" => "el_class",
	"value" => ""
));




vc_remove_param("vc_column_inner", "el_class");
vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Animation",
	"value" => array("Enable Column Animation?" => "true" ),
	"param_name" => "enable_animation",
	"description" => ""
));

vc_add_param("vc_column_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"param_name" => "animation",
	"value" => array(
		 "None" => "none",
	     "Fade In" => "fade-in",
  		 "Fade In From Left" => "fade-in-from-left",
  		 "Fade In Right" => "fade-in-from-right",
  		 "Fade In From Bottom" => "fade-in-from-bottom",
  		 "Grow In" => "grow-in"		
	),
	"dependency" => Array('element' => "enable_animation", 'not_empty' => true)
));

vc_add_param("vc_column_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Animation Delay",
	"param_name" => "delay",
	"admin_label" => false,
	"description" => "",
	"dependency" => Array('element' => "enable_animation", 'not_empty' => true)
));

vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Boxed Column",
	"value" => array("Boxed Style" => "true" ),
	"param_name" => "boxed",
	"description" => ""
));

vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Centered Content",
	"value" => array("Centered Content Alignment" => "true" ),
	"param_name" => "centered_text",
	"description" => ""
));

vc_add_param("vc_column_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Extra Class Name",
	"param_name" => "el_class",
	"value" => ""
));










// Video
vc_remove_param("vc_video", "title");


// Text block
vc_remove_param("vc_column_text", "css_animation");



// Nectar Slider
$slider_locations = get_terms('slider-locations');
$locations = array();

foreach ($slider_locations as $location) {
	$locations[$location->name] = $location->name;
}

if (empty($locations)) {
	$location_desc = 
      '<div class="alert">' .
	 __('You currently don\'t have any Slider Locations setup. Please create some and add assign slides to them before using this!',NECTAR_THEME_NAME). 
	'<br/><br/>
	<a href="' . admin_url('edit.php?post_type=nectar_slider') . '">'. __('Link to Nectar Slider', NECTAR_THEME_NAME) . '</a>
	</div>';
} else { $location_desc = ''; }

vc_map( array(
  "name" => __("Nectar Slider", "js_composer"),
  "base" => "nectar_slider",
  "icon" => "icon-wpb-nectar-slider",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('The jaw-dropping slider by ThemeNectar', 'js_composer'),
  "weight" => 10,
  "params" => array(
    array(
      "type" => "dropdown",
      "heading" => __("Select Slider", "js_composer"),
      "admin_label" => true,
      "param_name" => "location",
      "value" => $locations,
      "description" => $location_desc
    ),
	array(
      "type" => "textfield",
      "heading" => __("Slider Height", "js_composer"),
      "param_name" => "slider_height",
      "admin_label" => true,
      "description" => __("Don'nt include \"px\" in your string. e.g. 650", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Display Full Width?", "js_composer"),
      "param_name" => "full_width",
      "description" => __("Would you like this slider to display the full width of the page?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Fullscreen Slider?", "js_composer"),
      "param_name" => "fullscreen",
      "description" => __("This will cause your slider to resize to always fill the users screen size", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true'),
      "dependency" => Array('element' => "full_width", 'not_empty' => true)
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Display Arrow Navigation?", "js_composer"),
      "param_name" => "arrow_navigation",
      "description" => __("Would you like this slider to display arrows on the right and left sides?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Display Bullet Navigation?", "js_composer"),
      "param_name" => "bullet_navigation",
      "description" => __("Would you like this slider to display bullets on the bottom?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Enable Swipe on Desktop?", "js_composer"),
      "param_name" => "desktop_swipe",
      "description" => __("Would you like this slider to have swipe interaction on desktop?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Parallax Slider?", "js_composer"),
      "param_name" => "parallax",
      "description" => __("will only activate if the slider is the <b>top level element</b> in the page", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Loop Slider?", "js_composer"),
      "param_name" => "loop",
      "description" => __("Would you like your slider to loop infinitely?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Autorotate?", "js_composer"),
      "param_name" => "autorotate",
      "description" => __("If you would like this slider to autorotate, enter the rotation speed in miliseconds here. i.e 5000", "js_composer")
    )
  )
));



// Horizontal progress bar shortcode
vc_map( array(
		"name" => "Progress Bar",
		"base" => "bar",
		"icon" => "icon-wpb-progress_bar",
		"allowed_container_element" => 'vc_row',
		"category" => __('Nectar Elements', 'js_composer'),
		"description" => __('Include a horizontal progress bar', 'js_composer'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Bar Color",
				"param_name" => "color",
				"value" => array(
					"Accent-Color" => "Accent-Color",
					"Extra-Color-1" => "Extra-Color-1",
					"Extra-Color-2" => "Extra-Color-2",	
					"Extra-Color-3" => "Extra-Color-3"
				),
				"description" => ""
			)

		)
) );




// Divider
vc_map( array(
		"name" => "Divider",
		"base" => "divider",
		"icon" => "icon-wpb-separator",
		"allowed_container_element" => 'vc_row',
		"category" => __('Nectar Elements', 'js_composer'),
		"description" => __('Create space between your content', 'js_composer'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Dividing Height",
				"param_name" => "custom_height",
				"description" => "If you would like to control the specifc number of pixels your divider is, enter it here. Don't enter \"px\", just the numnber e.g. \"20\""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Line Type",
				"param_name" => "line_type",
				"value" => array(
					"No Line" => "No Line",
					"Full Width Line" => "Full Width Line",
					"Small Line" => "Small Line"
				)
			)

		)
));



// Single image
vc_map( array(
  "name" => __("Single Image", "js_composer"),
  "base" => "image_with_animation",
  "icon" => "icon-wpb-single-image",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Simple image with CSS animation', 'js_composer'),
  "params" => array(
    array(
      "type" => "fws_image",
      "heading" => __("Image", "js_composer"),
      "param_name" => "image_url",
      "value" => "",
      "description" => __("Select image from media library.", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Image Alignment", "js_composer"),
      "param_name" => "alignment",
      "value" => array(__("Align left", "js_composer") => "", __("Align right", "js_composer") => "right", __("Align center", "js_composer") => "center"),
      "description" => __("Select image alignment.", "js_composer")
    ),
    array(
	  "type" => "dropdown",
	  "heading" => __("CSS Animation", "js_composer"),
	  "param_name" => "animation",
	  "admin_label" => true,
	  "value" => array(
		    __("Fade In", "js_composer") => "Fade In", 
		    __("Fade In From Left", "js_composer") => "Fade In From Left", 
		    __("Fade In From Right", "js_composer") => "Fade In From Right", 
		    __("Fade In From Bottom", "js_composer") => "Fade In From Bottom", 
		    __("Grow In", "js_composer") => "Grow In"
		),
	  "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
	),
	array(
      "type" => "textfield",
      "heading" => __("Animation Delay", "js_composer"),
      "param_name" => "delay",
      "description" => __("Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in \"one by one\" effect in horizontal columns.", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Link to large image?", "js_composer"),
      "param_name" => "img_link_large",
      "description" => __("If selected, image will be linked to the bigger image.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Image link", "js_composer"),
      "param_name" => "img_link",
      "description" => __("Enter url if you want this image to have link.", "js_composer"),
      "dependency" => Array('element' => "img_link_large", 'is_empty' => true, 'callback' => 'wpb_single_image_img_link_dependency_callback')
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Link Target", "js_composer"),
      "param_name" => "img_link_target",
      "value" => array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank"),
      "dependency" => Array('element' => "img_link", 'not_empty' => true)
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
));




// Portfolio
$portfolio_types = get_terms('project-type');

$types_options = array("All" => "all");
$types_options_2 = array("Default" => "default");

foreach ($portfolio_types as $type) {
	$types_options[$type->name] = $type->slug;
	$types_options_2[$type->name] = $type->slug;
}




vc_map( array(
  "name" => __("Portfolio", "js_composer"),
  "base" => "nectar_portfolio",
  "weight" => 8,
  "icon" => "icon-wpb-portfolio",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Add a portfolio element', 'js_composer'),
  "params" => array(
	array(
	  "type" => "dropdown",
	  "heading" => __("Layout", "js_composer"),
	  "param_name" => "layout",
	  "admin_label" => true,
	  "value" => array(
		    "3 Columns" => "3",
		    "4 Columns" => "4",
		    "Fullwidth" => "fullwidth"
		),
	  "description" => __("Please select the layout you would like for your portfolio ", "js_composer")
	),
    array(
	  "type" => "dropdown_multi",
	  "heading" => __("Portfolio Categories", "js_composer"),
	  "param_name" => "category",
	  "admin_label" => true,
	  "value" => $types_options,
	  "description" => __("Please select the categories you would like to display for your portfolio. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
	),
	array(
	  "type" => "dropdown",
	  "heading" => __("Staring Category", "js_composer"),
	  "param_name" => "starting_category",
	  "admin_label" => false,
	  "value" => $types_options_2,
	  "description" => __("Please select the category you would like you're portfolio to start filtered on.", "js_composer"),
	  "dependency" => Array('element' => "enable_sortable", 'not_empty' => true)
	),
    array(
	  "type" => "dropdown",
	  "heading" => __("Project Style", "js_composer"),
	  "param_name" => "project_style",
	  "admin_label" => true,
	  "value" => array(
		    "Meta below thumb w/ links on hover" => "1",
		    "Meta on hover + entire thumb link" => "2"
		),
	  "description" => __("Please select the style you would like your projects to display in ", "js_composer")
	),
	array(
      "type" => 'checkbox',
      "heading" => __("Masonry Style", "js_composer"),
      "param_name" => "masonry_style",
      "description" => __("This will allow your portfolio items to display in a masonry layout as opposed to a fixed grid. You can define your masonry sizes in each project. <br/> If using the full width layout, will only be active with the alternative project style.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Enable Sortable", "js_composer"),
      "param_name" => "enable_sortable",
      "description" => __("Checking this box will allow your portfolio to display sortable filters", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Horizontal Filters", "js_composer"),
      "param_name" => "horizontal_filters",
      "description" => __("This will allow your filters to display horizontally instead of in a dropdown. (Only used if you enable sortable above.)", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Enable Pagination", "js_composer"),
      "param_name" => "enable_pagination",
      "description" => __("Would you like to enable pagination for this portfolio?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Projects Per Page", "js_composer"),
      "param_name" => "projects_per_page",
      "description" => __("How many projects would you like to display per page? <br/> If pagination is not enabled, will simply show this number of projects <br/> Enter as a number example \"20\"", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Lightbox Only", "js_composer"),
      "param_name" => "lightbox_only",
      "description" => __("This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    )
  )
));



vc_map( array(
  "name" => __("Recent Projects", "js_composer"),
  "base" => "recent_projects",
  "weight" => 8,
  "icon" => "icon-wpb-recent-projects",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Show off some recent projects', 'js_composer'),
  "params" => array(
    array(
	  "type" => "dropdown_multi",
	  "heading" => __("Portfolio Categories", "js_composer"),
	  "param_name" => "category",
	  "admin_label" => true,
	  "value" => $types_options,
	  "description" => __("Please select the categories you would like to display for your recent projects carousel. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
	),
    array(
	  "type" => "dropdown",
	  "heading" => __("Project Style", "js_composer"),
	  "param_name" => "project_style",
	  "admin_label" => true,
	  "value" => array(
		    "Meta below thumb w/ links on hover" => "1",
		    "Meta on hover + entire thumb link" => "2"
		),
	  "description" => __("Please select the style you would like your projects to display in ", "js_composer")
	),
	array(
      "type" => 'checkbox',
      "heading" => __("Full Width Carousel", "js_composer"),
      "param_name" => "full_width",
      "description" => __("This will make your carousel extend the full width of the page.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Heading Text", "js_composer"),
      "param_name" => "heading",
      "description" => __("Enter any text you would like for the heading of your carousel", "js_composer")
    ),
	array(
      "type" => "textfield",
      "heading" => __("Page Link Text", "js_composer"),
      "param_name" => "page_link_text",
      "description" => __("This will be the text that is in a link leading users to your desired page (will be omitted for full width carousels and an icon will be used instead)", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Page Link URL", "js_composer"),
      "param_name" => "page_link_url",
      "description" => __("Enter portfolio page URL you would like to link to. Remember to include \"http://\"!", "js_composer")
    ),	
    array(
      "type" => 'checkbox',
      "heading" => __("Hide Carousel Controls", "js_composer"),
      "param_name" => "hide_controls",
      "description" => __("Checking this box will remove the controls from your carousel", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Number of Projects To Show", "js_composer"),
      "param_name" => "number_to_display",
      "description" => __("Enter as a number example \"6\"", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Lightbox Only", "js_composer"),
      "param_name" => "lightbox_only",
      "description" => __("This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    )
  )
));



// Blog

$blog_types = get_categories();

$blog_options = array("All" => "all");

foreach ($blog_types as $type) {
	$blog_options[$type->name] = $type->slug;
}

vc_map( array(
  "name" => __("Blog", "js_composer"),
  "base" => "nectar_blog",
  "weight" => 8,
  "icon" => "icon-wpb-blog",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Display a Blog element', 'js_composer'),
  "params" => array(
    array(
	  "type" => "dropdown",
	  "heading" => __("Layout", "js_composer"),
	  "param_name" => "layout",
	  "admin_label" => true,
	  "value" => array(
		    'Standard Blog W/ Sidebar' => 'std-blog-sidebar',
		    'Standard Blog No Sidebar' => 'std-blog-fullwidth',
		    'Masonry Blog W/ Sidebar' => 'masonry-blog-sidebar',
		    'Masonry Blog No Sidebar' => 'masonry-blog-fullwidth',
		    'Masonry Blog Fullwidth' => 'masonry-blog-full-screen-width'
		),
	  "description" => __("Please select the layout you desire for your blog", "js_composer")
	),
	array(
	  "type" => "dropdown_multi",
	  "heading" => __("Blog Categories", "js_composer"),
	  "param_name" => "category",
	  "admin_label" => true,
	  "value" => $blog_options,
	  "description" => __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
	),
	array(
      "type" => 'checkbox',
      "heading" => __("Enable Pagination", "js_composer"),
      "param_name" => "enable_pagination",
      "description" => __("Would you like to enable pagination?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Posts Per Page", "js_composer"),
      "param_name" => "posts_per_page",
      "description" => __("How many posts would you like to display per page? <br/> If pagination is not enabled, will simply show this number of posts <br/> Enter as a number example \"10\"", "js_composer")
    )
  )
));


vc_map( array(
  "name" => __("Recent Posts", "js_composer"),
  "base" => "recent_posts",
  "weight" => 8,
  "icon" => "icon-wpb-recent-posts",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Display your recent blog posts', 'js_composer'),
  "params" => array(
	array(
	  "type" => "dropdown_multi",
	  "heading" => __("Blog Categories", "js_composer"),
	  "param_name" => "category",
	  "admin_label" => true,
	  "value" => $blog_options,
	  "description" => __("Please select the categories you would like to display in your recent posts. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "js_composer")
	),
	array(
      "type" => 'checkbox',
      "heading" => __("Enable Title Labels", "js_composer"),
      "param_name" => "title_labels",
      "description" => __("These labels are defined by you in the \"Blog Options\" tab of your theme options panel.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'true')
    ),
  )
));


// Centered Heading
vc_map( array(
  "name" => __("Centered Heading", "js_composer"),
  "base" => "heading",
  "icon" => "icon-wpb-centered-heading",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Simple heading', 'js_composer'),
  "params" => array(
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "heading" => __("Heading", "js_composer"),
      "param_name" => "content",
      "value" => __("", "js_composer")
    ), 
    array(
      "type" => "textfield",
      "heading" => __("Subtitle", "js_composer"),
      "param_name" => "subtitle",
      "description" => __("The subtitle text under the main title", "js_composer")
    )
  )
));




// Milestone
vc_map( array(
  "name" => __("Milestone", "js_composer"),
  "base" => "milestone",
  "icon" => "icon-wpb-milestone",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Add an animated milestone', 'js_composer'),
  "params" => array(
	array(
      "type" => "textfield",
      "heading" => __("Milestone Number", "js_composer"),
      "param_name" => "number",
      "admin_label" => false,
      "description" => __("The number/count of your milestone e.g. \"13\"", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Milestone Symbol", "js_composer"),
      "param_name" => "symbol",
      "admin_label" => false,
      "description" => __("An optional symbol to place next to the number counted to. e.g. \"%\" or \"+\"", "js_composer")
    ),
    array(
	  "type" => "dropdown",
	  "heading" => __("Milestone Symbol Position", "js_composer"),
	  "param_name" => "symbol_position",
	  "value" => array(
	     "After Number" => "after",
		 "Before Number" => "before",
	   ),
	  "description" => __("Please select the position you would like for your symbol.", "js_composer"),
	  "dependency" => Array('element' => "symbol", 'not_empty' => true)
	),
    array(
      "type" => "textfield",
      "heading" => __("Milestone Subject", "js_composer"),
      "param_name" => "subject",
      "admin_label" => true,
      "description" => __("The subject of your milestones e.g. \"Projects Completed\"", "js_composer")
    ),
     array(
	  "type" => "dropdown",
	  "heading" => __("Color", "js_composer"),
	  "param_name" => "color",
	  "value" => array(
	     "Default" => "Default",
		 "Accent-Color" => "Accent-Color",
		 "Extra-Color-1" => "Extra-Color-1",
		 "Extra-Color-2" => "Extra-Color-2",	
		 "Extra-Color-3" => "Extra-Color-3"
	   ),
	  "description" => __("Please select the color you wish for your milestone to display in.", "js_composer")
	)
  )
));






// Google Map
vc_map( array(
  "name" => __("Google Map", "js_composer"),
  "base" => "nectar_gmap",
  "icon" => "icon-wpb-map",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Flexible Google Map', 'js_composer'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Map height", "js_composer"),
      "param_name" => "size",
      "description" => __('Enter map height in pixels. Example: 200.', "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Map Center Point Latitude", "js_composer"),
      "param_name" => "map_center_lat",
      "description" => __("Please enter the latitude for the maps center point.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Map Center Point Longitude", "js_composer"),
      "param_name" => "map_center_lng",
      "description" => __("Please enter the longitude for the maps center point.", "js_composer")
    ),
    
  	array(
      "type" => "dropdown",
      "heading" => __("Map Zoom", "js_composer"),
      "param_name" => "zoom",
      "value" => array(__("14 - Default", "js_composer") => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20)
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Eanble Zoom In/Out", "js_composer"),
      "param_name" => "enable_zoom",
      "description" => __("Do you want users to be able to zoom in/out on the map?", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => true),
    ),
    
    array(
      "type" => "attach_image",
      "heading" => __("Marker Image", "js_composer"),
      "param_name" => "marker_image",
      "value" => "",
      "description" => __("Select image from media library.", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Marker Animation", "js_composer"),
      "param_name" => "marker_animation",
      "description" => __("This will cause your markers to do a quick bounce as they load in.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => true),
    ),
    array(
      "type" => "textarea",
      "heading" => __("Map Marker Locations", "js_composer"),
      "param_name" => "map_markers",
      "description" => __("Please enter the the list of locations you would like with a latitude|longitude|description format. <br/> Divide values with linebreaks (Enter). Example: <br/> 39.949|-75.171|Our Location <br/> 40.793|-73.954|Our Location #2", "js_composer")
    ),
    
  )
));








// Team Member
vc_map( array(
  "name" => __("Team Member", "js_composer"),
  "base" => "team_member",
  "icon" => "icon-wpb-team-member",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Add an animated milestone', 'js_composer'),
  "params" => array(
 	 array(
      "type" => "fws_image",
      "heading" => __("Image", "js_composer"),
      "param_name" => "image_url",
      "value" => "",
      "description" => __("Select image from media library.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Name", "js_composer"),
      "param_name" => "name",
      "admin_label" => true,
      "description" => __("Please enter the name of your team member", "js_composer")
    ),
	array(
      "type" => "textfield",
      "heading" => __("Job Position", "js_composer"),
      "param_name" => "job_position",
      "admin_label" => true,
      "description" => __("Please enter the job position for your team member", "js_composer")
    ),
    array(
      "type" => "textarea",
      "heading" => __("Description", "js_composer"),
      "param_name" => "description",
      "description" => __("The main text portion of your team member", "js_composer")
    ),
    array(
      "type" => "textarea",
      "heading" => __("Social Media", "js_composer"),
      "param_name" => "social",
      "description" => __("Enter any social media links with a comma separated list. e.g. Facebook,http://facebook.com, Twitter,http://twitter.com", "js_composer")
    ),
    array(
	  "type" => "dropdown",
	  "heading" => __("Team Member Link Type", "js_composer"),
	  "param_name" => "link_element",
	  "value" => array(
		 "None" => "none",
		 "Image" => "image",
		 "Name" => "name",	
		 "Both" => "both"
	   ),
	  "description" => __("Please select how you wish to link your team member to an arbitrary URL", "js_composer")
	),
	array(
      "type" => "textfield",
      "heading" => __("Team Memeber Link URL", "js_composer"),
      "param_name" => "link_url",
      "admin_label" => false,
      "description" => __("Please enter the URL for your team member link", "js_composer"),
      "dependency" => Array('element' => "link_element", 'value' => array('image', 'name', 'both'))
    ),
     array(
	  "type" => "dropdown",
	  "heading" => __("Link Color", "js_composer"),
	  "param_name" => "color",
	  "value" => array(
		 "Accent-Color" => "Accent-Color",
		 "Extra-Color-1" => "Extra-Color-1",
		 "Extra-Color-2" => "Extra-Color-2",	
		 "Extra-Color-3" => "Extra-Color-3"
	   ),
	  "description" => __("Please select the color you wish for your social links to display in.", "js_composer")
	)
  )
));



/* Accordion block
---------------------------------------------------------- */
vc_map( array(
  "name" => __("Toggle Panels", "js_composer"),
  "base" => "toggles",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-ui-accordion",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('jQuery toggles/accordion', 'js_composer'),
  "params" => array(
    array(
      "type" => 'checkbox',
      "heading" => __("Allow collapsible all", "js_composer"),
      "param_name" => "accordion",
      "description" => __("Select checkbox to turn the toggles in an accordion.", "js_composer"),
      "value" => Array(__("Allow", "js_composer") => 'true')
    )
  ),
  "custom_markup" => '
  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
  %content%
  </div>
  <div class="tab_controls">
  <button class="add_tab" title="'.__("Add toggle", "js_composer").'">'.__("Add toggle", "js_composer").'</button>
  </div>
  ',
  'default_content' => '
  [toggle title="'.__('Section', "js_composer").'"][/toggle]
  [toggle title="'.__('Section', "js_composer").'"][/toggle]
  ',
  'js_view' => 'VcAccordionView'
));
vc_map( array(
  "name" => __("Accordion Section", "js_composer"),
  "base" => "toggle",
  "allowed_container_element" => 'vc_row',
  "is_container" => true,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", "js_composer"),
      "param_name" => "title",
      "description" => __("Accordion section title.", "js_composer")
    ),
     array(
	  "type" => "dropdown",
	  "heading" => __("Color", "js_composer"),
	  "param_name" => "color",
	  "admin_label" => true,
	  "value" => array(
	     "Default" => "Default",
		 "Accent-Color" => "Accent-Color",
		 "Extra-Color-1" => "Extra-Color-1",
		 "Extra-Color-2" => "Extra-Color-2",	
		 "Extra-Color-3" => "Extra-Color-3"
	   ),
	  "description" => __("Please select the color you wish for your toggle to display in.", "js_composer")
	)
  ),
  'js_view' => 'VcAccordionTabView'
) );






/* Tabs
---------------------------------------------------------- */
$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
vc_map( array(
  "name"  => __("Tabs", "js_composer"),
  "base" => "tabbed_section",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-ui-tab-content",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Tabbed content', 'js_composer'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  ),
  "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [tab title="'.__('Tab','js_composer').'" id="'.$tab_id_1.'"] I am text block. Click edit button to change this text. [/tab]
  [tab title="'.__('Tab','js_composer').'" id="'.$tab_id_2.'"] I am text block. Click edit button to change this text. [/tab]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
));


vc_map( array(
  "name" => __("Tab", "js_composer"),
  "base" => "tab",
  "allowed_container_element" => 'vc_row',
  "is_container" => true,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", "js_composer"),
      "param_name" => "title",
      "description" => __("Tab title.", "js_composer")
    ),
    array(
      "type" => "tab_id",
      "heading" => __("Tab ID", "js_composer"),
      "param_name" => "id"
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
));



/* testimonial slider */
class WPBakeryShortCode_Testimonial_Slider extends WPBakeryShortCode_Tabbed_Section { }

$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
vc_map( array(
  "name"  => __("Testiomonial SLider", "js_composer"),
  "base" => "testimonial_slider",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-testimonial-slider",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('An appealing testmonial slider.', 'js_composer'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Auto rotate?", "js_composer"),
      "param_name" => "autorotate",
      "value" => '',
      "description" => __("If you would like this to autorotate, enter the rotation speed in miliseconds here. i.e 5000", "js_composer")
    )
  ),
  "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [testimonial title="'.__('Testimonial','js_composer').'" id="'.$tab_id_1.'"] Click the edit button to add your testimonial. [/testimonial]
  [testimonial title="'.__('Testimonial','js_composer').'" id="'.$tab_id_2.'"] Click the edit button to add your testimonial. [/testimonial]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
));


class WPBakeryShortCode_Testimonial extends WPBakeryShortCode {
	
	public function customAdminBlockParams() {
        return ' id="tab-'.$this->atts['id'] .'"';
    }
	
}



vc_map( array(
  "name" => __("Testimonial", "js_composer"),
  "base" => "testimonial",
  "allowed_container_element" => 'vc_row',
  "is_container" => false,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Name", "js_composer"),
      "param_name" => "name",
      "admin_label" => true,
      "description" => __("The testimonial source", "js_composer")
    ),
    array(
      "type" => "textarea",
      "heading" => __("Quote", "js_composer"),
      "param_name" => "quote",
      "description" => __("The testimonial quote", "js_composer")
    ),
    array(
      "type" => "id",
      "heading" => __("Testimonial ID", "js_composer"),
      "param_name" => "id"
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
));









/* clients slider */
class WPBakeryShortCode_Clients extends WPBakeryShortCode_Tabbed_Section { }

$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
vc_map( array(
  "name"  => __("Clients Display", "js_composer"),
  "base" => "clients",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-clients",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Show off your clients!', 'js_composer'),
  "params" => array(
    array(
      "type" => "dropdown",
      "heading" => __("Columns", "js_composer"),
      "param_name" => "columns",
      "value" => array(
			"Two" => "2",
			"Three" => "3",	
			"Four" => "4",
			"Five" => "5",
			"Six" => "6"
		),
      "description" => __("Please select how many columns you would like..", "js_composer")
    ),
    array(
      "type" => "checkbox",
	  "class" => "",
	  "heading" => "Fade In One By One?",
	  "value" => array("Yes, please" => "true" ),
	  "param_name" => "fade_in_animation",
	  "description" => ""
    ),
    array(
      "type" => "checkbox",
	  "class" => "",
	  "heading" => "Turn Into Carousel",
	  "value" => array("Yes, please" => "true" ),
	  "param_name" => "carousel",
	  "description" => ""
    )
  ),
  "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [client title="'.__('Client','js_composer').'" id="'.$tab_id_1.'"] Click the edit button to add your testimonial. [/client]
  [client title="'.__('Client','js_composer').'" id="'.$tab_id_2.'"] Click the edit button to add your testimonial. [/client]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
));


class WPBakeryShortCode_Client extends WPBakeryShortCode {
	
	public function customAdminBlockParams() {
        return ' id="tab-'.$this->atts['id'] .'"';
    }
	
}



vc_map( array(
  "name" => __("Client", "js_composer"),
  "base" => "client",
  "allowed_container_element" => 'vc_row',
  "is_container" => false,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "fws_image",
      "heading" => __("Image", "js_composer"),
      "param_name" => "image",
      "value" => "",
      "description" => __("Select image from media library.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("URL", "js_composer"),
      "param_name" => "url",
      "description" => __("Add an optional link to your client", "js_composer")
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Client Name", "js_composer"),
      "param_name" => "name",
      "description" => __("Fill this out to keep track of which client is which in your page builder interface.", "js_composer")
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
));




/* pricing table */
class WPBakeryShortCode_Pricing_Table extends WPBakeryShortCode_Tabbed_Section { }

$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
vc_map( array(
  "name"  => __("Pricing Table", "js_composer"),
  "base" => "pricing_table",
  "show_settings_on_create" => false,
  "is_container" => true,
  "icon" => "icon-wpb-pricing-table",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Stylish pricing tables', 'js_composer'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
	)
  ),
  "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [pricing_column title="'.__('Column','js_composer').'" id="'.$tab_id_1.'"]  [/pricing_column]
  [pricing_column title="'.__('Column','js_composer').'" id="'.$tab_id_2.'"]  [/pricing_column]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
));


class WPBakeryShortCode_Pricing_Column extends WPBakeryShortCode {
	
	public function customAdminBlockParams() {
        return ' id="tab-'.$this->atts['id'] .'"';
    }
	
}



vc_map( array(
  "name" => __("Pricing Column", "js_composer"),
  "base" => "pricing_column",
  "allowed_container_element" => 'vc_row',
  "is_container" => false,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", "js_composer"),
      "param_name" => "title",
      "admin_label" => true,
      "description" => __("Please enter a title for your pricing column", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Price", "js_composer"),
      "param_name" => "price",
      "description" => __("Enter the price for your column", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Currency Symbol", "js_composer"),
      "param_name" => "currency_symbol",
      "description" => __("Enter the currency symbol that will display for your price", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Interval", "js_composer"),
      "param_name" => "interval",
      "description" => __("Enter the interval for your pricing e.g. \"Per Month\" or \"Per Year\" ", "js_composer")
    ),
    array(
      "type" => "checkbox",
	  "class" => "",
	  "heading" => "Highlight Column?",
	  "value" => array("Yes, please" => "true" ),
	  "param_name" => "highlight",
	  "description" => ""
    ),
    array(
      "type" => "textfield",
      "heading" => __("Highlight Reason", "js_composer"),
      "param_name" => "highlight_reason",
      "description" => __("Enter the reason for the column being highlighted e.g. \"Most Popular\"" , "js_composer"),
      "dependency" => Array('element' => "highlight", 'not_empty' => true)
    ),
    array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Color",
		"param_name" => "color",
		"value" => array(
			"Accent-Color" => "Accent-Color",
			"Extra-Color-1" => "Extra-Color-1",
			"Extra-Color-2" => "Extra-Color-2",	
			"Extra-Color-3" => "Extra-Color-3"
		),
		"description" => ""
	),
	array(
      "type" => "textarea_html",
      "heading" => __("Pricing Table Content", "js_composer"),
      "param_name" => "content",
      "admin_label" => true,
      "description" => __("Please use the Unordered List button <img src='".get_template_directory_uri() ."/nectar/assets/img/icons/ul.png' alt='unordered list' /> on the editor to create the points of your pricing column. <br/> The demo also makes use of the button shortcode underneath the list for a call to action. ", "js_composer")
    ),
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
));





/* carousel */
class WPBakeryShortCode_Carousel extends WPBakeryShortCode_Tabbed_Section { }

$tab_id_1 = time().'-1-'.rand(0, 100);
$tab_id_2 = time().'-2-'.rand(0, 100);
$tab_id_3 = time().'-3-'.rand(0, 100);

vc_map( array(
  "name"  => __("Carousel", "js_composer"),
  "base" => "carousel",
  "show_settings_on_create" => true,
  "is_container" => true,
  "icon" => "icon-wpb-carousel",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('A simple carousel for any content', 'js_composer'),
  "params" => array(
   array(
      "type" => "textfield",
      "heading" => __("Carousel Title", "js_composer"),
      "param_name" => "carousel_title",
      "description" => __("Enter the title you would like at the top of your carousel (optional)" , "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Transition Scroll Speed", "js_composer"),
      "param_name" => "scroll_speed",
      "description" => __("Enter in milliseconds (default is 700)" , "js_composer")
    ),
    array(
		"type" => "checkbox",
		"class" => "",
		"heading" => __("Autorotate?", "js_composer"),
     	"param_name" => "autorotate",
		"value" => Array(__("Yes", "js_composer") => 'true'),
		"description" => ""
	),
    array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"admin_label" => false,
		"heading" => "Easing",
		"param_name" => "easing",
		"value" => array(
			'linear'=>'linear',
			'swing'=>'swing',
			'easeInQuad'=>'easeInQuad',
			'easeOutQuad' => 'easeOutQuad',
			'easeInOutQuad'=>'easeInOutQuad',
			'easeInCubic'=>'easeInCubic',
			'easeOutCubic'=>'easeOutCubic',
			'easeInOutCubic'=>'easeInOutCubic',
			'easeInQuart'=>'easeInQuart',
			'easeOutQuart'=>'easeOutQuart',
			'easeInOutQuart'=>'easeInOutQuart',
			'easeInQuint'=>'easeInQuint',
			'easeOutQuint'=>'easeOutQuint',
			'easeInOutQuint'=>'easeInOutQuint',
			'easeInExpo'=>'easeInExpo',
			'easeOutExpo'=>'easeOutExpo',
			'easeInOutExpo'=>'easeInOutExpo',
			'easeInSine'=>'easeInSine',
			'easeOutSine'=>'easeOutSine',
			'easeInOutSine'=>'easeInOutSine',
			'easeInCirc'=>'easeInCirc',
			'easeOutCirc'=>'easeOutCirc',
			'easeInOutCirc'=>'easeInOutCirc',
			'easeInElastic'=>'easeInElastic',
			'easeOutElastic'=>'easeOutElastic',
			'easeInOutElastic'=>'easeInOutElastic',
			'easeInBack'=>'easeInBack',
			'easeOutBack'=>'easeOutBack',
			'easeInOutBack'=>'easeInOutBack',
			'easeInBounce'=>'easeInBounce',
			'easeOutBounce'=>'easeOutBounce',
			'easeInOutBounce'=>'easeInOutBounce',
		),
		"description" => "Select the animation easing you would like for slide transitions <a href=\"http://jqueryui.com/resources/demos/effect/easing.html\" target=\"_blank\"> Click here </a> to see examples of these."
	)
  ),
  "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
  ,
  'default_content' => '
  [item id="'.$tab_id_1.'"] Add Content Here [/item]
  [item id="'.$tab_id_2.'"] Add Content Here [/item]
  [item id="'.$tab_id_3.'"] Add Content Here [/item]
  ',
  "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
));



vc_map( array(
  "name" => __("Carousel Item", "js_composer"),
  "base" => "item",
  "allowed_container_element" => 'vc_row',
  "is_container" => true,
  "content_element" => false,
  "params" => array(
    array(
      "type" => "id",
      "heading" => __("Carousel Item ID", "js_composer"),
      "param_name" => "id"
    )
  ),
  'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
));




// Social Buttons
vc_map( array(
  "name" => __("Social Buttons", "js_composer"),
  "base" => "social_buttons",
  "icon" => "icon-wpb-social-buttons",
  "category" => __('Nectar Elements', 'js_composer'),
  "description" => __('Add social buttons to any page', 'js_composer'),
  "params" => array(
 	 array(
      "type" => 'checkbox',
      "heading" => __("Nectar Love", "js_composer"),
      "param_name" => "nectar_love",
      "value" => Array(__("Yes", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Facebook", "js_composer"),
      "param_name" => "facebook",
      "value" => Array(__("Yes", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Twitter", "js_composer"),
      "param_name" => "twitter",
      "value" => Array(__("Yes", "js_composer") => 'true')
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Pinterest", "js_composer"),
      "param_name" => "pinterest",
      "description" => '',
      "value" => Array(__("Yes", "js_composer") => 'true')
    )
  )
));




//gallery 
vc_remove_param("vc_gallery", "type");
vc_remove_param("vc_gallery", "title");
vc_remove_param("vc_gallery", "interval");
vc_remove_param("vc_gallery", "images");
vc_remove_param("vc_gallery", "img_size");
vc_remove_param("vc_gallery", "onclick");
vc_remove_param("vc_gallery", "custom_links");
vc_remove_param("vc_gallery", "custom_links_target");
vc_remove_param("vc_gallery", "el_class");



vc_add_param("vc_gallery",array(
      "type" => "dropdown",
      "heading" => __("Gallery type", "js_composer"),
      "param_name" => "type",
      "value" => array(
         __("Basic Slider Style", "js_composer") => "flexslider_style", 
         __("Nectar Slider Style", "js_composer") => "nectarslider_style"
       ),
      "description" => __("Select gallery type.", "js_composer")
));
vc_add_param("vc_gallery",array(
      "type" => "dropdown",
      "heading" => __("Auto rotate slides", "js_composer"),
      "param_name" => "interval",
      "value" => array(3, 5, 10, 15, __("Disable", "js_composer") => 0),
      "description" => __("Auto rotate slides each X seconds.", "js_composer"),
      "dependency" => Array('element' => "type", 'value' => array('flexslider_fade', 'flexslider_slide', 'nivo'))
));
vc_add_param("vc_gallery",array(
      "type" => "attach_images",
      "heading" => __("Images", "js_composer"),
      "param_name" => "images",
      "value" => "",
      "description" => __("Select images from media library.", "js_composer")
));
vc_add_param("vc_gallery",array(
      "type" => "textfield",
      "heading" => __("Image size", "js_composer"),
      "param_name" => "img_size",
      "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer")
));
vc_add_param("vc_gallery",array(
      "type" => "dropdown",
      "heading" => __("On click", "js_composer"),
      "param_name" => "onclick",
      "value" => array(__("Open prettyPhoto", "js_composer") => "link_image", __("Do nothing", "js_composer") => "link_no", __("Open custom link", "js_composer") => "custom_link"),
      "description" => __("What to do when slide is clicked?", "js_composer")
));
vc_add_param("vc_gallery",array(
      "type" => "exploded_textarea",
      "heading" => __("Custom links", "js_composer"),
      "param_name" => "custom_links",
      "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'js_composer'),
      "dependency" => Array('element' => "onclick", 'value' => array('custom_link'))
));
vc_add_param("vc_gallery",array(
      "type" => "dropdown",
      "heading" => __("Custom link target", "js_composer"),
      "param_name" => "custom_links_target",
      "description" => __('Select where to open  custom links.', 'js_composer'),
      "dependency" => Array('element' => "onclick", 'value' => array('custom_link')),
      'value' => array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank")
));
vc_add_param("vc_gallery",array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
));














   $fa_icons = array(
	      'icon-glass' => 'icon-glass',
		  'icon-music' => 'icon-music',
		  'icon-search' => 'icon-search',
		  'icon-envelope-alt' => 'icon-envelope-alt',
		  'icon-heart' => 'icon-heart',
		  'icon-star' => 'icon-star',
		  'icon-star-empty' => 'icon-star-empty',
		  'icon-user' => 'icon-user',
		  'icon-film' => 'icon-film',
		  'icon-th-large' => 'icon-th-large',
		  'icon-th' => 'icon-th',
		  'icon-th-list' => 'icon-th-list',
		  'icon-ok' => 'icon-ok',
		  'icon-remove' => 'icon-remove',
		  'icon-zoom-in' => 'icon-zoom-in',
		  'icon-zoom-out' => 'icon-zoom-out',
		  'icon-off' => 'icon-off',
		  'icon-signal' => 'icon-signal',
		  'icon-cog' => 'icon-cog',
		  'icon-trash' => 'icon-trash',
		  'icon-home' => 'icon-home',
		  'icon-file-alt' => 'icon-file-alt',
		  'icon-time' => 'icon-time',
		  'icon-road' => 'icon-road',
		  'icon-download-alt' => 'icon-download-alt',
		  'icon-download' => 'icon-download',
		  'icon-upload' => 'icon-upload',
		  'icon-inbox' => 'icon-inbox',
		  'icon-play-circle' => 'icon-play-circle',
		  'icon-repeat' => 'icon-repeat',
		  'icon-refresh' => 'icon-refresh',
		  'icon-list-alt' => 'icon-list-alt',
		  'icon-lock' => 'icon-lock',
		  'icon-flag' => 'icon-flag',
		  'icon-headphones' => 'icon-headphones',
		  'icon-volume-off' => 'icon-volume-off',
		  'icon-volume-down' => 'icon-volume-down',
		  'icon-volume-up' => 'icon-volume-up',
		  'icon-qrcode' => 'icon-qrcode',
		  'icon-barcode' => 'icon-barcode',
		  'icon-tag' => 'icon-tag',
		  'icon-tags' => 'icon-tags',
		  'icon-book' => 'icon-book',
		  'icon-bookmark' => 'icon-bookmark',
		  'icon-print' => 'icon-print',
		  'icon-camera' => 'icon-camera',
		  'icon-font' => 'icon-font',
		  'icon-bold' => 'icon-bold',
		  'icon-italic' => 'icon-italic',
		  'icon-text-height' => 'icon-text-height',
		  'icon-text-width' => 'icon-text-width',
		  'icon-align-left' => 'icon-align-left',
		  'icon-align-center' => 'icon-align-center',
		  'icon-align-right' => 'icon-align-right',
		  'icon-align-justify' => 'icon-align-justify',
		  'icon-list' => 'icon-list',
		  'icon-indent-left' => 'icon-indent-left',
		  'icon-indent-right' => 'icon-indent-right',
		  'icon-facetime-video' => 'icon-facetime-video',
		  'icon-picture' => 'icon-picture',
		  'icon-pencil' => 'icon-pencil',
		  'icon-map-marker' => 'icon-map-marker',
		  'icon-adjust' => 'icon-adjust',
		  'icon-tint' => 'icon-tint',
		  'icon-edit' => 'icon-edit',
		  'icon-share' => 'icon-share',
		  'icon-check' => 'icon-check',
		  'icon-move' => 'icon-move',
		  'icon-step-backward' => 'icon-step-backward',
		  'icon-fast-backward' => 'icon-fast-backward',
		  'icon-backward' => 'icon-backward',
		  'icon-play' => 'icon-play',
		  'icon-pause' => 'icon-pause',
		  'icon-stop' => 'icon-stop',
		  'icon-forward' => 'icon-forward',
		  'icon-fast-forward' => 'icon-fast-forward',
		  'icon-step-forward' => 'icon-step-forward',
		  'icon-eject' => 'icon-eject',
		  'icon-chevron-left' => 'icon-chevron-left',
		  'icon-chevron-right' => 'icon-chevron-right',
		  'icon-plus-sign' => 'icon-plus-sign',
		  'icon-minus-sign' => 'icon-minus-sign',
		  'icon-remove-sign' => 'icon-remove-sign',
		  'icon-ok-sign' => 'icon-ok-sign',
		  'icon-question-sign' => 'icon-question-sign',
		  'icon-info-sign' => 'icon-info-sign',
		  'icon-screenshot' => 'icon-screenshot',
		  'icon-remove-circle' => 'icon-remove-circle',
		  'icon-ok-circle' => 'icon-ok-circle',
		  'icon-ban-circle' => 'icon-ban-circle',
		  'icon-arrow-left' => 'icon-arrow-left',
		  'icon-arrow-right' => 'icon-arrow-right',
		  'icon-arrow-up' => 'icon-arrow-up',
		  'icon-arrow-down' => 'icon-arrow-down',
		  'icon-share-alt' => 'icon-share-alt',
		  'icon-resize-full' => 'icon-resize-full',
		  'icon-resize-small' => 'icon-resize-small',
		  'icon-plus' => 'icon-plus',
		  'icon-minus' => 'icon-minus',
		  'icon-asterisk' => 'icon-asterisk',
		  'icon-exclamation-sign' => 'icon-exclamation-sign',
		  'icon-gift' => 'icon-gift',
		  'icon-leaf' => 'icon-leaf',
		  'icon-fire' => 'icon-fire',
		  'icon-eye-open' => 'icon-eye-open',
		  'icon-eye-close' => 'icon-eye-close',
		  'icon-warning-sign' => 'icon-warning-sign',
		  'icon-plane' => 'icon-plane',
		  'icon-calendar' => 'icon-calendar',
		  'icon-random' => 'icon-random',
		  'icon-comment' => 'icon-comment',
		  'icon-magnet' => 'icon-magnet',
		  'icon-chevron-up' => 'icon-chevron-up',
		  'icon-chevron-down' => 'icon-chevron-down',
		  'icon-retweet' => 'icon-retweet',
		  'icon-shopping-cart' => 'icon-shopping-cart',
		  'icon-folder-close' => 'icon-folder-close',
		  'icon-folder-open' => 'icon-folder-open',
		  'icon-resize-vertical' => 'icon-resize-vertical',
		  'icon-resize-horizontal' => 'icon-resize-horizontal',
		  'icon-bar-chart' => 'icon-bar-chart',
		  'icon-twitter-sign' => 'icon-twitter-sign',
		  'icon-facebook-sign' => 'icon-facebook-sign',
		  'icon-camera-retro' => 'icon-camera-retro',
		  'icon-key' => 'icon-key',
		  'icon-cogs' => 'icon-cogs',
		  'icon-comments' => 'icon-comments',
		  'icon-thumbs-up-alt' => 'icon-thumbs-up-alt',
		  'icon-thumbs-down-alt' => 'icon-thumbs-down-alt',
		  'icon-star-half' => 'icon-star-half',
		  'icon-heart-empty' => 'icon-heart-empty',
		  'icon-signout' => 'icon-signout',
		  'icon-linkedin-sign' => 'icon-linkedin-sign',
		  'icon-pushpin' => 'icon-pushpin',
		  'icon-external-link' => 'icon-external-link',
		  'icon-signin' => 'icon-signin',
		  'icon-trophy' => 'icon-trophy',
		  'icon-github-sign' => 'icon-github-sign',
		  'icon-upload-alt' => 'icon-upload-alt',
		  'icon-lemon' => 'icon-lemon',
		  'icon-phone' => 'icon-phone',
		  'icon-check-empty' => 'icon-check-empty',
		  'icon-bookmark-empty' => 'icon-bookmark-empty',
		  'icon-phone-sign' => 'icon-phone-sign',
		  'icon-twitter' => 'icon-twitter',
		  'icon-facebook' => 'icon-facebook',
		  'icon-github' => 'icon-github',
		  'icon-unlock' => 'icon-unlock',
		  'icon-credit-card' => 'icon-credit-card',
		  'icon-rss' => 'icon-rss',
		  'icon-hdd' => 'icon-hdd',
		  'icon-bullhorn' => 'icon-bullhorn',
		  'icon-bell' => 'icon-bell',
		  'icon-certificate' => 'icon-certificate',
		  'icon-hand-right' => 'icon-hand-right',
		  'icon-hand-left' => 'icon-hand-left',
		  'icon-hand-up' => 'icon-hand-up',
		  'icon-hand-down' => 'icon-hand-down',
		  'icon-circle-arrow-left' => 'icon-circle-arrow-left',
		  'icon-circle-arrow-right' => 'icon-circle-arrow-right',
		  'icon-circle-arrow-up' => 'icon-circle-arrow-up',
		  'icon-circle-arrow-down' => 'icon-circle-arrow-down',
		  'icon-globe' => 'icon-globe',
		  'icon-wrench' => 'icon-wrench',
		  'icon-tasks' => 'icon-tasks',
		  'icon-filter' => 'icon-filter',
		  'icon-briefcase' => 'icon-briefcase',
		  'icon-fullscreen' => 'icon-fullscreen',
		  'icon-group' => 'icon-group',
		  'icon-link' => 'icon-link',
		  'icon-cloud' => 'icon-cloud',
		  'icon-beaker' => 'icon-beaker',
		  'icon-cut' => 'icon-cut',
		  'icon-copy' => 'icon-copy',
		  'icon-paper-clip' => 'icon-paper-clip',
		  'icon-save' => 'icon-save',
		  'icon-sign-blank' => 'icon-sign-blank',
		  'icon-reorder' => 'icon-reorder',
		  'icon-list-ul' => 'icon-list-ul',
		  'icon-list-ol' => 'icon-list-ol',
		  'icon-strikethrough' => 'icon-strikethrough',
		  'icon-underline' => 'icon-underline',
		  'icon-table' => 'icon-table',
		  'icon-magic' => 'icon-magic',
		  'icon-truck' => 'icon-truck',
		  'icon-pinterest' => 'icon-pinterest',
		  'icon-pinterest-sign' => 'icon-pinterest-sign',
		  'icon-google-plus-sign' => 'icon-google-plus-sign',
		  'icon-google-plus' => 'icon-google-plus',
		  'icon-money' => 'icon-money',
		  'icon-caret-down' => 'icon-caret-down',
		  'icon-caret-up' => 'icon-caret-up',
		  'icon-caret-left' => 'icon-caret-left',
		  'icon-caret-right' => 'icon-caret-right',
		  'icon-columns' => 'icon-columns',
		  'icon-sort' => 'icon-sort',
		  'icon-sort-down' => 'icon-sort-down',
		  'icon-sort-up' => 'icon-sort-up',
		  'icon-envelope' => 'icon-envelope',
		  'icon-linkedin' => 'icon-linkedin',
		  'icon-undo' => 'icon-undo',
		  'icon-legal' => 'icon-legal',
		  'icon-dashboard' => 'icon-dashboard',
		  'icon-comment-alt' => 'icon-comment-alt',
		  'icon-comments-alt' => 'icon-comments-alt',
		  'icon-bolt' => 'icon-bolt',
		  'icon-sitemap' => 'icon-sitemap',
		  'icon-umbrella' => 'icon-umbrella',
		  'icon-paste' => 'icon-paste',
		  'icon-lightbulb' => 'icon-lightbulb',
		  'icon-exchange' => 'icon-exchange',
		  'icon-cloud-download' => 'icon-cloud-download',
		  'icon-cloud-upload' => 'icon-cloud-upload',
		  'icon-user-md' => 'icon-user-md',
		  'icon-stethoscope' => 'icon-stethoscope',
		  'icon-suitcase' => 'icon-suitcase',
		  'icon-bell-alt' => 'icon-bell-alt',
		  'icon-coffee' => 'icon-coffee',
		  'icon-food' => 'icon-food',
		  'icon-file-text-alt' => 'icon-file-text-alt',
		  'icon-building' => 'icon-building',
		  'icon-hospital' => 'icon-hospital',
		  'icon-ambulance' => 'icon-ambulance',
		  'icon-medkit' => 'icon-medkit',
		  'icon-fighter-jet' => 'icon-fighter-jet',
		  'icon-beer' => 'icon-beer',
		  'icon-h-sign' => 'icon-h-sign',
		  'icon-plus-sign-alt' => 'icon-plus-sign-alt',
		  'icon-double-angle-left' => 'icon-double-angle-left',
		  'icon-double-angle-right' => 'icon-double-angle-right',
		  'icon-double-angle-up' => 'icon-double-angle-up',
		  'icon-double-angle-down' => 'icon-double-angle-down',
		  'icon-angle-left' => 'icon-angle-left',
		  'icon-angle-right' => 'icon-angle-right',
		  'icon-angle-up' => 'icon-angle-up',
		  'icon-angle-down' => 'icon-angle-down',
		  'icon-desktop' => 'icon-desktop',
		  'icon-laptop' => 'icon-laptop',
		  'icon-tablet' => 'icon-tablet',
		  'icon-mobile-phone' => 'icon-mobile-phone',
		  'icon-circle-blank' => 'icon-circle-blank',
		  'icon-quote-left' => 'icon-quote-left',
		  'icon-quote-right' => 'icon-quote-right',
		  'icon-spinner' => 'icon-spinner',
		  'icon-circle' => 'icon-circle',
		  'icon-reply' => 'icon-reply',
		  'icon-github-alt' => 'icon-github-alt',
		  'icon-folder-close-alt' => 'icon-folder-close-alt',
		  'icon-folder-open-alt' => 'icon-folder-open-alt',
		  'icon-expand-alt' => 'icon-expand-alt',
		  'icon-collapse-alt' => 'icon-collapse-alt',
		  'icon-smile' => 'icon-smile',
		  'icon-frown' => 'icon-frown',
		  'icon-meh' => 'icon-meh',
		  'icon-gamepad' => 'icon-gamepad',
		  'icon-keyboard' => 'icon-keyboard',
		  'icon-flag-alt' => 'icon-flag-alt',
		  'icon-flag-checkered' => 'icon-flag-checkered',
		  'icon-terminal' => 'icon-terminal',
		  'icon-code' => 'icon-code',
		  'icon-reply-all' => 'icon-reply-all',
		  'icon-mail-reply-all' => 'icon-mail-reply-all',
		  'icon-star-half-empty' => 'icon-star-half-empty',
		  'icon-location-arrow' => 'icon-location-arrow',
		  'icon-crop' => 'icon-crop',
		  'icon-code-fork' => 'icon-code-fork',
		  'icon-unlink' => 'icon-unlink',
		  'icon-question' => 'icon-question',
		  'icon-info' => 'icon-info',
		  'icon-exclamation' => 'icon-exclamation',
		  'icon-superscript' => 'icon-superscript',
		  'icon-subscript' => 'icon-subscript',
		  'icon-eraser' => 'icon-eraser',
		  'icon-puzzle-piece' => 'icon-puzzle-piece',
		  'icon-microphone' => 'icon-microphone',
		  'icon-microphone-off' => 'icon-microphone-off',
		  'icon-shield' => 'icon-shield',
		  'icon-calendar-empty' => 'icon-calendar-empty',
		  'icon-fire-extinguisher' => 'icon-fire-extinguisher',
		  'icon-rocket' => 'icon-rocket',
		  'icon-maxcdn' => 'icon-maxcdn',
		  'icon-chevron-sign-left' => 'icon-chevron-sign-left',
		  'icon-chevron-sign-right' => 'icon-chevron-sign-right',
		  'icon-chevron-sign-up' => 'icon-chevron-sign-up',
		  'icon-chevron-sign-down' => 'icon-chevron-sign-down',
		  'icon-html5' => 'icon-html5',
		  'icon-css3' => 'icon-css3',
		  'icon-anchor' => 'icon-anchor',
		  'icon-unlock-alt' => 'icon-unlock-alt',
		  'icon-bullseye' => 'icon-bullseye',
		  'icon-ellipsis-horizontal' => 'icon-ellipsis-horizontal',
		  'icon-ellipsis-vertical' => 'icon-ellipsis-vertical',
		  'icon-rss-sign' => 'icon-rss-sign',
		  'icon-play-sign' => 'icon-play-sign',
		  'icon-ticket' => 'icon-ticket',
		  'icon-minus-sign-alt' => 'icon-minus-sign-alt',
		  'icon-check-minus' => 'icon-check-minus',
		  'icon-level-up' => 'icon-level-up',
		  'icon-level-down' => 'icon-level-down',
		  'icon-check-sign' => 'icon-check-sign',
		  'icon-edit-sign' => 'icon-edit-sign',
		  'icon-external-link-sign' => 'icon-external-link-sign',
		  'icon-share-sign' => 'icon-share-sign',
		  'icon-compass' => 'icon-compass',
		  'icon-collapse' => 'icon-collapse',
		  'icon-collapse-top' => 'icon-collapse-top',
		  'icon-expand' => 'icon-expand',
		  'icon-eur' => 'icon-eur',
		  'icon-gbp' => 'icon-gbp',
		  'icon-usd' => 'icon-usd',
		  'icon-inr' => 'icon-inr',
		  'icon-jpy' => 'icon-jpy',
		  'icon-cny' => 'icon-cny',
		  'icon-krw' => 'icon-krw',
		  'icon-btc' => 'icon-btc',
		  'icon-file' => 'icon-file',
		  'icon-file-text' => 'icon-file-text',
		  'icon-sort-by-alphabet' => 'icon-sort-by-alphabet',
		  'icon-sort-by-alphabet-alt' => 'icon-sort-by-alphabet-alt',
		  'icon-sort-by-attributes' => 'icon-sort-by-attributes',
		  'icon-sort-by-attributes-alt' => 'icon-sort-by-attributes-alt',
		  'icon-sort-by-order' => 'icon-sort-by-order',
		  'icon-sort-by-order-alt' => 'icon-sort-by-order-alt',
		  'icon-thumbs-up' => 'icon-thumbs-up',
		  'icon-thumbs-down' => 'icon-thumbs-down',
		  'icon-youtube-sign' => 'icon-youtube-sign',
		  'icon-youtube' => 'icon-youtube',
		  'icon-xing' => 'icon-xing',
		  'icon-xing-sign' => 'icon-xing-sign',
		  'icon-youtube-play' => 'icon-youtube-play',
		  'icon-dropbox' => 'icon-dropbox',
		  'icon-stackexchange' => 'icon-stackexchange',
		  'icon-instagram' => 'icon-instagram',
		  'icon-flickr' => 'icon-flickr',
		  'icon-adn' => 'icon-adn',
		  'icon-bitbucket' => 'icon-bitbucket',
		  'icon-bitbucket-sign' => 'icon-bitbucket-sign',
		  'icon-tumblr' => 'icon-tumblr',
		  'icon-tumblr-sign' => 'icon-tumblr-sign',
		  'icon-long-arrow-down' => 'icon-long-arrow-down',
		  'icon-long-arrow-up' => 'icon-long-arrow-up',
		  'icon-long-arrow-left' => 'icon-long-arrow-left',
		  'icon-long-arrow-right' => 'icon-long-arrow-right',
		  'icon-apple' => 'icon-apple',
		  'icon-windows' => 'icon-windows',
		  'icon-android' => 'icon-android',
		  'icon-linux' => 'icon-linux',
		  'icon-dribbble' => 'icon-dribbble',
		  'icon-skype' => 'icon-skype',
		  'icon-foursquare' => 'icon-foursquare',
		  'icon-trello' => 'icon-trello',
		  'icon-female' => 'icon-female',
		  'icon-male' => 'icon-male',
		  'icon-gittip' => 'icon-gittip',
		  'icon-sun' => 'icon-sun',
		  'icon-moon' => 'icon-moon',
		  'icon-archive' => 'icon-archive',
		  'icon-bug' => 'icon-bug',
		  'icon-vk' => 'icon-vk',
		  'icon-weibo' => 'icon-weibo',
		  'icon-renren' => 'icon-renren',
	);
		
$steadysets = array(
		  'steadysets-icon-type' => 'steadysets-icon-type',
		  'steadysets-icon-box' => 'steadysets-icon-box',
		  'steadysets-icon-archive' => 'steadysets-icon-archive',
		  'steadysets-icon-envelope' => 'steadysets-icon-envelope',
		  'steadysets-icon-email' => 'steadysets-icon-email',
		  'steadysets-icon-files' => 'steadysets-icon-files',
		  'steadysets-icon-uniE606' => 'steadysets-icon-uniE606',
		  'steadysets-icon-connection-empty' => 'steadysets-icon-connection-empty',
		  'steadysets-icon-connection-25' => 'steadysets-icon-connection-25',
		  'steadysets-icon-connection-50' => 'steadysets-icon-connection-50',
		  'steadysets-icon-connection-75' => 'steadysets-icon-connection-75',
		  'steadysets-icon-connection-full' => 'steadysets-icon-connection-full',
		  'steadysets-icon-microphone' => 'steadysets-icon-microphone',
		  'steadysets-icon-microphone-off' => 'steadysets-icon-microphone-off',
		  'steadysets-icon-book' => 'steadysets-icon-book',
		  'steadysets-icon-cloud' => 'steadysets-icon-cloud',
		  'steadysets-icon-book2' => 'steadysets-icon-book2',
		  'steadysets-icon-star' => 'steadysets-icon-star',
		  'steadysets-icon-phone-portrait' => 'steadysets-icon-phone-portrait',
		  'steadysets-icon-phone-landscape' => 'steadysets-icon-phone-landscape',
		  'steadysets-icon-tablet' => 'steadysets-icon-tablet',
		  'steadysets-icon-tablet-landscape' => 'steadysets-icon-tablet-landscape',
		  'steadysets-icon-laptop' => 'steadysets-icon-laptop',
		  'steadysets-icon-uniE617' => 'steadysets-icon-uniE617',
		  'steadysets-icon-barbell' => 'steadysets-icon-barbell',
		  'steadysets-icon-stopwatch' => 'steadysets-icon-stopwatch',
		  'steadysets-icon-atom' => 'steadysets-icon-atom',
		  'steadysets-icon-syringe' => 'steadysets-icon-syringe',
		  'steadysets-icon-pencil' => 'steadysets-icon-pencil',
		  'steadysets-icon-chart' => 'steadysets-icon-chart',
		  'steadysets-icon-bars' => 'steadysets-icon-bars',
		  'steadysets-icon-cube' => 'steadysets-icon-cube',
		  'steadysets-icon-image' => 'steadysets-icon-image',
		  'steadysets-icon-crop' => 'steadysets-icon-crop',
		  'steadysets-icon-graph' => 'steadysets-icon-graph',
		  'steadysets-icon-select' => 'steadysets-icon-select',
		  'steadysets-icon-bucket' => 'steadysets-icon-bucket',
		  'steadysets-icon-mug' => 'steadysets-icon-mug',
		  'steadysets-icon-clipboard' => 'steadysets-icon-clipboard',
		  'steadysets-icon-lab' => 'steadysets-icon-lab',
		  'steadysets-icon-bones' => 'steadysets-icon-bones',
		  'steadysets-icon-pill' => 'steadysets-icon-pill',
		  'steadysets-icon-bolt' => 'steadysets-icon-bolt',
		  'steadysets-icon-health' => 'steadysets-icon-health',
		  'steadysets-icon-map-marker' => 'steadysets-icon-map-marker',
		  'steadysets-icon-stack' => 'steadysets-icon-stack',
		  'steadysets-icon-newspaper' => 'steadysets-icon-newspaper',
		  'steadysets-icon-uniE62F' => 'steadysets-icon-uniE62F',
		  'steadysets-icon-coffee' => 'steadysets-icon-coffee',
		  'steadysets-icon-bill' => 'steadysets-icon-bill',
		  'steadysets-icon-sun' => 'steadysets-icon-sun',
		  'steadysets-icon-vcard' => 'steadysets-icon-vcard',
		  'steadysets-icon-shorts' => 'steadysets-icon-shorts',
		  'steadysets-icon-drink' => 'steadysets-icon-drink',
		  'steadysets-icon-diamond' => 'steadysets-icon-diamond',
		  'steadysets-icon-bag' => 'steadysets-icon-bag',
		  'steadysets-icon-calculator' => 'steadysets-icon-calculator',
		  'steadysets-icon-credit-cards' => 'steadysets-icon-credit-cards',
		  'steadysets-icon-microwave-oven' => 'steadysets-icon-microwave-oven',
		  'steadysets-icon-camera' => 'steadysets-icon-camera',
		  'steadysets-icon-share' => 'steadysets-icon-share',
		  'steadysets-icon-bullhorn' => 'steadysets-icon-bullhorn',
		  'steadysets-icon-user' => 'steadysets-icon-user',
		  'steadysets-icon-users' => 'steadysets-icon-users',
		  'steadysets-icon-user2' => 'steadysets-icon-user2',
		  'steadysets-icon-users2' => 'steadysets-icon-users2',
		  'steadysets-icon-unlocked' => 'steadysets-icon-unlocked',
		  'steadysets-icon-unlocked2' => 'steadysets-icon-unlocked2',
		  'steadysets-icon-lock' => 'steadysets-icon-lock',
		  'steadysets-icon-forbidden' => 'steadysets-icon-forbidden',
		  'steadysets-icon-switch' => 'steadysets-icon-switch',
		  'steadysets-icon-meter' => 'steadysets-icon-meter',
		  'steadysets-icon-flag' => 'steadysets-icon-flag',
		  'steadysets-icon-home' => 'steadysets-icon-home',
		  'steadysets-icon-printer' => 'steadysets-icon-printer',
		  'steadysets-icon-clock' => 'steadysets-icon-clock',
		  'steadysets-icon-calendar' => 'steadysets-icon-calendar',
		  'steadysets-icon-comment' => 'steadysets-icon-comment',
		  'steadysets-icon-chat-3' => 'steadysets-icon-chat-3',
		  'steadysets-icon-chat-2' => 'steadysets-icon-chat-2',
		  'steadysets-icon-chat-1' => 'steadysets-icon-chat-1',
		  'steadysets-icon-chat' => 'steadysets-icon-chat',
		  'steadysets-icon-zoom-out' => 'steadysets-icon-zoom-out',
		  'steadysets-icon-zoom-in' => 'steadysets-icon-zoom-in',
		  'steadysets-icon-search' => 'steadysets-icon-search',
		  'steadysets-icon-trashcan' => 'steadysets-icon-trashcan',
		  'steadysets-icon-tag' => 'steadysets-icon-tag',
		  'steadysets-icon-download' => 'steadysets-icon-download',
		  'steadysets-icon-paperclip' => 'steadysets-icon-paperclip',
		  'steadysets-icon-checkbox' => 'steadysets-icon-checkbox',
		  'steadysets-icon-checkbox-checked' => 'steadysets-icon-checkbox-checked',
		  'steadysets-icon-checkmark' => 'steadysets-icon-checkmark',
		  'steadysets-icon-refresh' => 'steadysets-icon-refresh',
		  'steadysets-icon-reload' => 'steadysets-icon-reload',
		  'steadysets-icon-arrow-right' => 'steadysets-icon-arrow-right',
		  'steadysets-icon-arrow-down' => 'steadysets-icon-arrow-down',
		  'steadysets-icon-arrow-up' => 'steadysets-icon-arrow-up',
		  'steadysets-icon-arrow-left' => 'steadysets-icon-arrow-left',
		  'steadysets-icon-settings' => 'steadysets-icon-settings',
		  'steadysets-icon-battery-full' => 'steadysets-icon-battery-full',
		  'steadysets-icon-battery-75' => 'steadysets-icon-battery-75',
		  'steadysets-icon-battery-50' => 'steadysets-icon-battery-50',
		  'steadysets-icon-battery-25' => 'steadysets-icon-battery-25',
		  'steadysets-icon-battery-empty' => 'steadysets-icon-battery-empty',
		  'steadysets-icon-battery-charging' => 'steadysets-icon-battery-charging',
		  'steadysets-icon-uniE669' => 'steadysets-icon-uniE669',
		  'steadysets-icon-grid' => 'steadysets-icon-grid',
		  'steadysets-icon-list' => 'steadysets-icon-list',
		  'steadysets-icon-wifi-low' => 'steadysets-icon-wifi-low',
		  'steadysets-icon-folder-check' => 'steadysets-icon-folder-check',
		  'steadysets-icon-folder-settings' => 'steadysets-icon-folder-settings',
		  'steadysets-icon-folder-add' => 'steadysets-icon-folder-add',
		  'steadysets-icon-folder' => 'steadysets-icon-folder',
		  'steadysets-icon-window' => 'steadysets-icon-window',
		  'steadysets-icon-windows' => 'steadysets-icon-windows',
		  'steadysets-icon-browser' => 'steadysets-icon-browser',
		  'steadysets-icon-file-broken' => 'steadysets-icon-file-broken',
		  'steadysets-icon-align-justify' => 'steadysets-icon-align-justify',
		  'steadysets-icon-align-center' => 'steadysets-icon-align-center',
		  'steadysets-icon-align-right' => 'steadysets-icon-align-right',
		  'steadysets-icon-align-left' => 'steadysets-icon-align-left',
		  'steadysets-icon-file' => 'steadysets-icon-file',
		  'steadysets-icon-file-add' => 'steadysets-icon-file-add',
		  'steadysets-icon-file-settings' => 'steadysets-icon-file-settings',
		  'steadysets-icon-mute' => 'steadysets-icon-mute',
		  'steadysets-icon-heart' => 'steadysets-icon-heart',
		  'steadysets-icon-enter' => 'steadysets-icon-enter',
		  'steadysets-icon-volume-decrease' => 'steadysets-icon-volume-decrease',
		  'steadysets-icon-wifi-mid' => 'steadysets-icon-wifi-mid',
		  'steadysets-icon-volume' => 'steadysets-icon-volume',
		  'steadysets-icon-bookmark' => 'steadysets-icon-bookmark',
		  'steadysets-icon-screen' => 'steadysets-icon-screen',
		  'steadysets-icon-map' => 'steadysets-icon-map',
		  'steadysets-icon-measure' => 'steadysets-icon-measure',
		  'steadysets-icon-eyedropper' => 'steadysets-icon-eyedropper',
		  'steadysets-icon-support' => 'steadysets-icon-support',
		  'steadysets-icon-phone' => 'steadysets-icon-phone',
		  'steadysets-icon-email2' => 'steadysets-icon-email2',
		  'steadysets-icon-volume-increase' => 'steadysets-icon-volume-increase',
		  'steadysets-icon-wifi-full' => 'steadysets-icon-wifi-full'
	);

$linecons = array(
		  'linecon-icon-heart' => 'linecon-icon-heart',
		  'linecon-icon-cloud' => 'linecon-icon-cloud',
		  'linecon-icon-star' => 'linecon-icon-star',
		  'linecon-icon-tv' => 'linecon-icon-tv',
		  'linecon-icon-sound' => 'linecon-icon-sound',
		  'linecon-icon-video' => 'linecon-icon-video',
		  'linecon-icon-trash' => 'linecon-icon-trash',
		  'linecon-icon-user' => 'linecon-icon-user',
		  'linecon-icon-key' => 'linecon-icon-key',
		  'linecon-icon-search' => 'linecon-icon-search',
		  'linecon-icon-eye' => 'linecon-icon-eye',
		  'linecon-icon-bubble' => 'linecon-icon-bubble',
		  'linecon-icon-stack' => 'linecon-icon-stack',
		  'linecon-icon-cup' => 'linecon-icon-cup',
		  'linecon-icon-phone' => 'linecon-icon-phone',
		  'linecon-icon-news' => 'linecon-icon-news',
		  'linecon-icon-mail' => 'linecon-icon-mail',
		  'linecon-icon-like' => 'linecon-icon-like',
		  'linecon-icon-photo' => 'linecon-icon-photo',
		  'linecon-icon-note' => 'linecon-icon-note',
		  'linecon-icon-food' => 'linecon-icon-food',
		  'linecon-icon-t-shirt' => 'linecon-icon-t-shirt',
		  'linecon-icon-fire' => 'linecon-icon-fire',
		  'linecon-icon-clip' => 'linecon-icon-clip',
		  'linecon-icon-shop' => 'linecon-icon-shop',
		  'linecon-icon-calendar' => 'linecon-icon-calendar',
		  'linecon-icon-wallet' => 'linecon-icon-wallet',
		  'linecon-icon-vynil' => 'linecon-icon-vynil',
		  'linecon-icon-truck' => 'linecon-icon-truck',
		  'linecon-icon-world' => 'linecon-icon-world',
		  'linecon-icon-clock' => 'linecon-icon-clock',
		  'linecon-icon-paperplane' => 'linecon-icon-paperplane',
		  'linecon-icon-params' => 'linecon-icon-params',
		  'linecon-icon-banknote' => 'linecon-icon-banknote',
		  'linecon-icon-data' => 'linecon-icon-data',
		  'linecon-icon-music' => 'linecon-icon-music',
		  'linecon-icon-megaphone' => 'linecon-icon-megaphone',
		  'linecon-icon-study' => 'linecon-icon-study',
		  'linecon-icon-lab' => 'linecon-icon-lab',
		  'linecon-icon-location' => 'linecon-icon-location',
		  'linecon-icon-display' => 'linecon-icon-display',
		  'linecon-icon-diamond' => 'linecon-icon-diamond',
		  'linecon-icon-pen' => 'linecon-icon-pen',
		  'linecon-icon-bulb' => 'linecon-icon-bulb',
		  'linecon-icon-lock' => 'linecon-icon-lock',
		  'linecon-icon-tag' => 'linecon-icon-tag',
		  'linecon-icon-camera' => 'linecon-icon-camera',
		  'linecon-icon-settings' => 'linecon-icon-settings'
	);
	
// Icon list
$icon_arr = array_merge($fa_icons, $steadysets, $linecons);

vc_map( array(
  "name" => __("Text With Icon", "js_composer"),
  "base" => "text-with-icon",
  "icon" => "icon-wpb-text-with-icon",
  "category" => __('Nectar Elements', 'js_composer'),
  "weight" => 1,
  "description" => __('Add a text block with stylish icon', 'js_composer'),
  "params" => array(
    array(
	  "type" => "dropdown",
	  "heading" => __("Icon Type", "js_composer"),
	  "param_name" => "icon_type",
	  "admin_label" => true,
	  "value" => array(
		 "Font Icon" => "font_icon",
		 "Image Icon" => "image_icon",
	   ),
	  "description" => __("Please select type of icon you would like for the text block", "js_composer")
	),
	array(
	  "type" => "dropdown",
	  "heading" => __("Icon", "js_composer"),
	  "param_name" => "icon",
	  "admin_label" => false,
	  "value" => $icon_arr,
	  "description" => __("Please select the icon you wish to use", "js_composer"),
	  "dependency" => Array('element' => "icon_type", 'value' => array('font_icon'))
	),
     array(
	  "type" => "dropdown",
	  "heading" => __("Color", "js_composer"),
	  "param_name" => "color",
	  "admin_label" => false,
	  "value" => array(
		 "Accent-Color" => "Accent-Color",
		 "Extra-Color-1" => "Extra-Color-1",
		 "Extra-Color-2" => "Extra-Color-2",	
		 "Extra-Color-3" => "Extra-Color-3"
	   ),
	  "description" => __("Please select the color you wish for icon to display in", "js_composer"),
	  "dependency" => Array('element' => "icon_type", 'value' => array('font_icon'))
	),
	array(
		"type" => "attach_image",
		"class" => "",
		"heading" => "Icon Image",
		"param_name" => "icon_image",
		"value" => "",
		"description" => "",
		"dependency" => Array('element' => "icon_type", 'value' => array('image_icon'))
	),
	array(
      "type" => "textarea_html",
      "holder" => "div",
      "heading" => __("Text Content", "js_composer"),
      "param_name" => "content",
      "value" => __("", "js_composer")
    )
  )
));



?>