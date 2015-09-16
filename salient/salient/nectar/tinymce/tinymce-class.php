<?php


#-----------------------------------------------------------------
# Enqueue scripts
#-----------------------------------------------------------------

function enqueue_generator_scripts(){

	wp_enqueue_style('tinymce',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/tinymce.css'); 
	wp_enqueue_style('chosen',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/chosen/chosen.css'); 
	wp_enqueue_style('simple-slider',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/simple_slider/simple-slider.css'); 
	wp_enqueue_style('simple-slider-volume',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/simple_slider/simple-slider-volume.css'); 
	
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css'); 
	wp_enqueue_style('steadysets', get_template_directory_uri() . '/css/steadysets.css');
	wp_enqueue_style('linecon', get_template_directory_uri() . '/css/linecon.css');
		 
	wp_enqueue_script('chosen',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/chosen/chosen.jquery.min.js','jquery','1.0 ', TRUE);
	wp_enqueue_script('simple-slider',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/simple_slider/simple-slider.min.js','jquery','1.0 ', TRUE);
	
	wp_enqueue_style('magnific',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/magnific-popup.css'); 
	wp_enqueue_script('magnific',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/magnific-popup.js','jquery','0.9.7 ', TRUE);
	
	wp_enqueue_script('nectar-shortcode-generator-popup',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/popup.js','jquery','0.9.7 ', TRUE);
	wp_enqueue_script('nectar-shortcode-generator',get_template_directory_uri() . '/nectar/tinymce/nectar-shortcode-generator.js','jquery','0.9.7 ', TRUE);
	
}

add_action('admin_enqueue_scripts','enqueue_generator_scripts');



 
add_action('admin_footer','content_display');


function content_display(){
		
//Shortcodes Definitions
#-----------------------------------------------------------------
# Columns
#-----------------------------------------------------------------

//Half
$nectar_shortcodes['header_1'] = array( 
	'type'=>'heading', 
	'title'=>__('Columns', NECTAR_THEME_NAME)
);

$nectar_shortcodes['one_half'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Half (1/2)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


//Thirds
$nectar_shortcodes['one_third'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Third Column (1/3)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['two_thirds'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Two Thirds Column (2/3)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


//Fourths
$nectar_shortcodes['one_fourth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Fourth Column (1/4)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['three_fourths'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Three Fourths Column (3/4)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


//Sixths
$nectar_shortcodes['one_sixth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Sixth Column (1/6)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['five_sixths'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Five Sixths Column (5/6)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['one_whole'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Whole Column (1/1)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


#-----------------------------------------------------------------
# Elements 
#-----------------------------------------------------------------

$nectar_shortcodes['header_6'] = array( 
	'type'=>'heading', 
	'title'=>__('Elements', NECTAR_THEME_NAME )
); 

//nectar Slider
$slider_locations = get_terms('slider-locations');
$locations = array();

foreach ($slider_locations as $location) {
	$locations[$location->slug] = $location->name;
}

if (empty($locations)) {
	$location_desc = 
      '<div class="alert">' .
	 __('You currently don\'t have any Slider Locations setup. Please create some and add assign slides to them before using this!',NECTAR_THEME_NAME). 
	'<br/><br/>
	<a href="' . admin_url('edit.php?post_type=nectar_slider') . '">'. __('Link to Nectar Slider', NECTAR_THEME_NAME) . '</a>
	</div>';
} else { $location_desc = ''; }

$nectar_shortcodes['nectar_slider'] = array( 
	'type'=>'regular', 
	'title'=>__('Nectar Slider', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'location'=>array(
			'type'=>'select', 
			'desc' => $location_desc,
			'title'  => __('Select Slider',NECTAR_THEME_NAME),
			'values' => $locations
		),
		
		'slider_height'=>array(
			'type'=>'text', 
			'title'=>__('Slider Height', NECTAR_THEME_NAME),
			'desc' => __('Don\'nt include "px" in your string. e.g. 650', NECTAR_THEME_NAME),
		),
		
		'full_width'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to display the full width of the page?', 'title'=>__('Display Full Width?', NECTAR_THEME_NAME)),
		'arrow_navigation'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to display arrows on the right and left sides?', 'title'=>__('Display Arrow Navigation', NECTAR_THEME_NAME)),
		'bullet_navigation'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to display bullets on the bottom?', 'title'=>__('Display Bullet Navigation', NECTAR_THEME_NAME)),
		'desktop_swipe'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to have swipe interaction on desktop?', 'title'=>__('Enable Swipe on Desktop?', NECTAR_THEME_NAME)),
		'parallax'=>array('type'=>'checkbox',  'desc' => 'will only activate if the slider is the <b>top level element</b> in the page', 'title'=>__('Parallax Slider?', NECTAR_THEME_NAME)),
		'loop'=>array('type'=>'checkbox',  'desc' => 'Would you like your slider to loop infinitely?', 'title'=>__('Loop Slider?', NECTAR_THEME_NAME)),
		'fullscreen'=>array('type'=>'checkbox',  'desc' => 'This will only become active when used in combination with the full width option', 'title'=>__('Fullscreen Slider?', NECTAR_THEME_NAME)),
		'autorotate'=>array('type'=>'text',  'desc' => 'If you would like this slider to autorotate, enter the rotation speed in <b>miliseconds</b> here. i.e 5000', 'title'=>__('Autorotate?', NECTAR_THEME_NAME))
	)
);

 
//Full Width Section
$nectar_shortcodes['full_width_section'] = array( 
	'type'=>'custom', 
	'title'=>__('Full Width Section', NECTAR_THEME_NAME ), 
	'attr'=>array( 
	    'color' =>array('type'=>'custom', 'title'  => __('Background Color',NECTAR_THEME_NAME)),
		'image'=>array('type'=>'custom', 'title'  => __('Background Image',NECTAR_THEME_NAME)),
		'bg_pos'=>array(
			'type'=>'select', 
			'title'  => __('Background Position',NECTAR_THEME_NAME),
			'values' => array(
			     "left top" => "Left Top",
		  		 "left center" => "Left Center",
		  		 "left bottom" => "Left Bottom",
		  		 "center top" => "Center Top",
		  		 "center center" => "Center Center",
		  		 "center bottom" => "Center Bottom",
		  		 "right top" => "Right Top",
		  		 "right center" => "Right Center",
		  		 "right bottom" => "Right Bottom"
			)
		),
		'bg_repeat'=>array(
			'type'=>'select', 
			'title'  => __('Background Repeat',NECTAR_THEME_NAME),
			'values' => array(
			     "no-repeat" => "No-Repeat",
		  		 "repeat" => "Repeat"
			)
		),
		'parallax_bg'=>array('type'=>'checkbox', 'title'=>__('Parallax Background', NECTAR_THEME_NAME)),
		'text_color'=>array(
			'type'=>'select', 
			'title'  => __('Text Color',NECTAR_THEME_NAME),
			'values' => array(
		  		 "light_text" => "Light",
		  		 "dark_text" => "Dark"
			)
		),
		
		'top_padding'=>array(
			'type'=>'text', 
			'title'=>__('Top Padding', NECTAR_THEME_NAME),
			'desc' => __('Don\'nt include "px" in your string. e.g. 40', NECTAR_THEME_NAME),
		),
		'bottom_padding'=>array(
			'type'=>'text', 
			'title'=>__('Bottom Padding', NECTAR_THEME_NAME),
			'desc' => __('Don\'nt include "px" in your string. e.g. 40', NECTAR_THEME_NAME),
		),
		
	)
);


//Image with Animation
$nectar_shortcodes['image_with_animation'] = array( 
	'type'=>'custom', 
	'title'=>__('Image With Animation', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image',NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'title'  => __('Image Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'title'=>__('Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		),
	)
);

//Heading
$nectar_shortcodes['heading'] = array( 
	'type'=>'simple', 
	'title'=>__('Centered Heading', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'subtitle'=>array('type'=>'text', 'title'=>__('Subtitle', NECTAR_THEME_NAME)) 
	)
);

//Divider
$nectar_shortcodes['divider'] = array( 
	'type'=>'regular', 
	'title'=>__('Divider', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'line_type'=>array(
			'type'=>'select', 
			'title'  => __('Display Line?',NECTAR_THEME_NAME),
			'values' => array(
			     "no-line" => "No Line",
		  		 "full-width" => "Full Width Line",
		  		 "small" => "Small Line"
			)
		),
		'custom_height'=>array(
			'type'=>'text', 
			'desc' => 'If you would like to control the specifc number of pixels your divider is, enter it here. <b>Don\'t enter "px", just the numnber e.g. "20"</b>', 
			'title'=>__('Custom Dividing Height', NECTAR_THEME_NAME)
		)
	)
);

//Milestone 
$nectar_shortcodes['milestone'] = array( 
	'type'=>'regular', 
	'title'=>__('Milestone', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'number'=>array('type'=>'text', 'desc' => 'The number/count of your milestone e.g. "13"', 'title'=>__('Milestone Number', NECTAR_THEME_NAME)),
		'subject'=>array('type'=>'text', 'desc' => 'The subject of your milestones e.g. "Projects Completed"', 'title'=>__('Milestone Subject', NECTAR_THEME_NAME)),
		'symbol'=>array('type'=>'text', 'desc' => 'An optional symbol to place next to the number counted to. e.g. "%" or "+"', 'title'=>__('Milestone Symbol', NECTAR_THEME_NAME)),
		'symbol_position'=>array(
			'type'=>'select', 
			'title'  => __('Milestone Symbol Position',NECTAR_THEME_NAME),
			'values' => array(
			    "after" => "after",
		 		"before" => "before",
			)
		),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Color',NECTAR_THEME_NAME),
			'values' => array(
			     "default" => "Default",
			     "accent-color" => "Accent-Color",
		  		 "extra-color-1" => "Extra-Color-1",
		  		 "extra-color-2" => "Extra-Color-2",
		  		 "extra-color-3" => "Extra-Color-3"
			)
		)
	)
);


//Button
$nectar_shortcodes['button'] = array( 
	'type'=>'radios', 
	'title'=>__('Button', NECTAR_THEME_NAME), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Size', NECTAR_THEME_NAME), 
			'opt'=>array(
				'small'=>'Small',
				'medium'=>'Medium',
				'large'=>'Large'
			)
		),
		'url'=>array(
			'type'=>'text', 
			'title'=>'Link URL'
		),
		'text'=>array(
			'type'=>'text', 
			'title'=>__('Text', NECTAR_THEME_NAME)
		),
		'open_new_tab'=>array('type'=>'checkbox', 'title'=>__('Open Link In New Tab?',NECTAR_THEME_NAME)),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Color',NECTAR_THEME_NAME),
			'values' => array(
			     "accent-color" => "Accent-Color",
		  		 "extra-color-1" => "Extra-Color-1",
		  		 "extra-color-2" => "Extra-Color-2",
		  		 "extra-color-3" => "Extra-Color-3",
		  		 "see-through" => "See-Through"
			)
		)
	) 
);


//Icon
$nectar_shortcodes['icon'] = array( 
	'type'=>'regular', 
	'title'=>__('Icon', NECTAR_THEME_NAME), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Icon Style', NECTAR_THEME_NAME), 
			'desc' => __('Tiny is recommended to be used inline with regular text. <br/> Small is recommended to be used inline right before heading text. <br> Regular can be used in a variety of places. <br> Large is recommended to be used at the top of columns.', NECTAR_THEME_NAME),
			'opt'=>array(
				'tiny'=>'Tiny',
				'small'=>'Small Circle',
				'regular'=>'Regular',
				'large'=>'Large Circle',
				'large-2'=>'Large Circle Alt',
			)
		),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Color',NECTAR_THEME_NAME),
			'values' => array(
			     "accent-color" => "Accent-Color",
		  		 "extra-color-1" => "Extra-Color-1",
		  		 "extra-color-2" => "Extra-Color-2",
		  		 "extra-color-3" => "Extra-Color-3",
			)
		),
		'icons' => array(
			'type'=>'icons', 
			'title'=>'Icon', 
			'values'=> array(
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
			)
		),
		'steadysets' => array(
			'type'=>'icons', 
			'title'=>'Steadysets', 
			'values'=> array(
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
			)
		),
		'linecons' => array(
			'type'=>'icons', 
			'title'=>'Linecons', 
			'values'=> array(
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
			)
		)
		
	) 
);

//Toggle
$nectar_shortcodes['toggles'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Toggle Panels', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'toggles'=>array('type'=>'custom')
	)
);

//Tabbed Sections
$nectar_shortcodes['tabbed_section'] = array( 
	'type'=>'dynamic',  
	'title'=>__('Tabbed Section', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'tabs'=>array('type'=>'custom')
	)
);
 

//Testimonial Slider
$nectar_shortcodes['testimonial_slider'] = array( 
	'type'=>'dynamic',  
	'title'=>__('Testimonial Slider', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'testimonials'=>array('type'=>'custom')
	)
);


//Bar Graph
$nectar_shortcodes['bar_graph'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Bar Graph', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'bar_graph'=>array('type'=>'custom')
	)
);

//Clients
$nectar_shortcodes['clients'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Clients', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'clients'=>array('type'=>'custom', 'title'  => __('Image',NECTAR_THEME_NAME))
	)
);
 

//Pricing Table
$nectar_shortcodes['pricing_table'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Pricing Table', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'columns'=>array(
			'type'=>'radio', 
			'title'=>__('Columns', NECTAR_THEME_NAME), 
			'desc' => __('How many columns would you like?', NECTAR_THEME_NAME),
			'opt'=>array(
				'2'=>'Two',
				'3'=>'Three',
				'4'=>'Four',
				'5'=>'Five'
			)
		)
	)
);

//Team Member
$nectar_shortcodes['team_member'] = array( 
	'type'=>'regular', 
	'title'=>__('Team Member', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image',NECTAR_THEME_NAME)),
		'name'=>array('type'=>'text', 'title'=>__('Name', NECTAR_THEME_NAME)),
		'job_position'=>array('type'=>'text', 'title'=>__('Job Position', NECTAR_THEME_NAME)),
		'description'=>array('type'=>'textarea', 'title'=> __('Description', NECTAR_THEME_NAME)),
		'social'=>array('type'=>'textarea', 'title'=>__('Social Media', NECTAR_THEME_NAME), 'desc' => __('Enter any social media links with a comma separated list. e.g. Facebook,http://facebook.com, Twitter,http://twitter.com', NECTAR_THEME_NAME)),  
		'link_element'=>array(
			'type'=>'regular-select', 
			'title'  => __('Team Member Link Type',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
		  		 "image" => "Image",
		  		 "name" => "Name",
		  		 "both" => "Both"
			)
		),
		'link_url'=>array('type'=>'text', 'title'=>__('Team Memeber Link URL', NECTAR_THEME_NAME),'desc' => __('Will only be used if Link Type is not set to "None".',NECTAR_THEME_NAME)),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Link Color',NECTAR_THEME_NAME),
			'values' => array(
			     "accent-color" => "Accent-Color",
		  		 "extra-color-1" => "Extra-Color-1",
		  		 "extra-color-2" => "Extra-Color-2",
		  		 "extra-color-3" => "Extra-Color-3"
			)
		)
	)
);

//Carousel
$nectar_shortcodes['carousel'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Carousel', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'carousel_title'=>array(
			'type'=>'text', 
			'title'=> __('Carousel Title', NECTAR_THEME_NAME)
		),
		'scroll_speed'=>array(
			'type'=>'text', 
			'title'=> __('Scroll Speed', NECTAR_THEME_NAME),
			'desc' => __('Enter in milliseconds (default is 700)', NECTAR_THEME_NAME),
		),
		'autorotate'=>array(
			'type'=>'checkbox', 
			'title'=> __('Autorotate', NECTAR_THEME_NAME),
			'desc' => __('Would you like the carousel the transition automatically?', NECTAR_THEME_NAME),
		),
		'easing'=>array(
			'type'=>'select', 
			'title'=> __('Easing', NECTAR_THEME_NAME), 
			'values'=>array(
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
			'desc' => '<a href="http://jqueryui.com/resources/demos/effect/easing.html" target="_blank">'. __("Click here",NECTAR_THEME_NAME) .'</a> ' . __("to see examples of these.", NECTAR_THEME_NAME)
		),
	)
);


$nectar_shortcodes['social_buttons'] = array( 
	'type'=>'regular', 
	'title'=>__('Social Buttons', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'nectar_love'=>array(
			'type'=>'checkbox', 
			'title'=>__('Nectar Love', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'facebook'=>array(
			'type'=>'checkbox', 
			'title'=>__('Facebook', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'twitter'=>array(
			'type'=>'checkbox', 
			'title'=>__('Twitter', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'pinterest'=>array(
			'type'=>'checkbox', 
			'title'=>__('Pinterest', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		)
		/*'google_plus'=>array(
			'type'=>'checkbox', 
			'title'=>__('Google Plus', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),*/
	)
);
	 
//Video
$nectar_shortcodes['video'] = array(  
	'type'=>'regular', 
	'title'=>__('Video', NECTAR_THEME_NAME ),  
	'attr'=>array( 
	    'mp4'=>array('type'=>'text', 'title'=>__('MP4 File URL', NECTAR_THEME_NAME), 'desc' => __('Only supply the formats you desire, this shortcode is just a shortcut to place the <a href="https://codex.wordpress.org/Video_Shortcode" target="_blank">default WordPress video player</a>.')),
	    'webm'=>array('type'=>'text', 'title'=>__('WEBM File URL', NECTAR_THEME_NAME)),
		'ogv'=>array('type'=>'text', 'title'=>__('OGV FILE URL', NECTAR_THEME_NAME)),
		'poster'=>array('type'=>'custom', 'title'  => __('Preview Image',NECTAR_THEME_NAME), 'desc' => __('The preview image should be the same dimensions as your video.'),NECTAR_THEME_NAME)
	)
);

//Audio
$nectar_shortcodes['audio'] = array( 
	'type'=>'regular', 
	'title'=>__('Audio', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'mp3'=>array('type'=>'text', 'title'=>__('MP3 File URL', NECTAR_THEME_NAME)),
		'ogg'=>array('type'=>'text', 'title'=>__('OGA File URL', NECTAR_THEME_NAME))
	)
);


#-----------------------------------------------------------------
# Recent Posts/Projects 
#-----------------------------------------------------------------


$nectar_shortcodes['header_7'] = array( 
	'type'=>'heading', 
	'title'=>__('Portfolio/Blog', NECTAR_THEME_NAME )
);



//Portfolio
$portfolio_types = get_terms('project-type');

$types_options = array("all" => "All");

foreach ($portfolio_types as $type) {
	$types_options[$type->slug] = $type->name;
}


$nectar_shortcodes['nectar_portfolio'] = array( 
	'type'=>'regular', 
	'title'=>__('Portfolio', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'layout'=>array(
			'type'=>'radio', 
			'title'=>__('Layout', NECTAR_THEME_NAME), 
			'opt'=>array(
				'3'=>'3 Columns',
				'4'=>'4 Columns',
				'fullwidth'=>'Fullwidth'
			)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => 'Portfolio Categories',
			'desc' => 'Please select the categories you would like to display for your portfolio. <br/>You can select multiple categories too (ctrl + click on PC and command + click on Mac).',
			'values' => $types_options
		),
		'starting_category' => array(
			'type' => 'regular-select',
			'title' => 'Starting Category',
			'desc' => 'Please select the category you would like you\'re portfolio to start filtered on',
			'values' => $types_options
		),
		'project_style' => array(
			'type' => 'regular-select',
			'title' => 'Project Style',
			'desc' => 'Please select the style you would like your projects to display in.',
			'values' => array(
			   '1' => 'Meta below thumb w/ links on hover',
			   '2' => 'Meta on hover + entire thumb link'
			)
		),
		
		'masonry_style'=>array(
			'type'=>'checkbox', 
			'title'=>__('Masonry Style', NECTAR_THEME_NAME),
			'desc' => __('This will allow your portfolio items to display in a masonry layout as opposed to a fixed grid. You can define your masonry sizes in each project. <br/> <br/>If using the full width layout, will only be active with the alternative project style.', NECTAR_THEME_NAME)
		),
		
		'enable_sortable'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Sortable', NECTAR_THEME_NAME),
			'desc' => __('Checking this box will allow your portfolio to display sortable filters', NECTAR_THEME_NAME)
		),

		'horizontal_filters'=>array(
			'type'=>'checkbox', 
			'title'=>__('Horizontal Filters', NECTAR_THEME_NAME),
			'desc' => __('This will allow your filters to display horizontally instead of in a dropdown. (Only used if you enable sortable above.)', NECTAR_THEME_NAME)
		),
		'enable_pagination'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Pagination', NECTAR_THEME_NAME),
			'desc' => __('Would you like to enable pagination for this portfolio?', NECTAR_THEME_NAME)
		),
		'projects_per_page'=>array(
			'type'=>'text', 
			'title'=>__('Projects Per Page', NECTAR_THEME_NAME),
			'desc' => __('How many projects would you like to display per page? <br/> If pagination is not enabled, will simply show this number of projects <br/> Enter as a number example "20"', NECTAR_THEME_NAME)
		),
		'lightbox_only'=>array( 
			'type'=>'checkbox', 
			'title'=>__('Lightbox Only?', NECTAR_THEME_NAME), 
			'desc' => __('This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.', NECTAR_THEME_NAME)
		)
	)
);





$nectar_shortcodes['recent_projects'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Recent Projects', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'full_width'=>array(
			'type'=>'checkbox', 
			'title'=>__('Full Width Carousel?', NECTAR_THEME_NAME),
			'desc' => __('This will make your carousel extend the full width of the page. Won\'t work in a column shortcode!', NECTAR_THEME_NAME)
		),
		'heading'=>array(
			'type'=>'text', 
			'title'=>__('Heading Text', NECTAR_THEME_NAME),
			'desc' => __('Enter any text you would like for the heading of your carousel', NECTAR_THEME_NAME)
		),
		'page_link_text'=>array(
			'type'=>'text', 
			'title'=>__('Page Link Text', NECTAR_THEME_NAME),
			'desc' => __('This will be the text that is in a link leading users to your desired page <br/> (will be omitted for full width carousels and an icon will be used instead)', NECTAR_THEME_NAME)
		),
		'page_link_url'=>array(
			'type'=>'text', 
			'title'=>__('Page Link URL', NECTAR_THEME_NAME),
			'desc' => __('Enter portfolio page URL you would like to link to. <br/> Remember to include "http://"!', NECTAR_THEME_NAME)
		),
		
		'hide_controls'=>array(
			'type'=>'checkbox', 
			'title'=>__('Hide Carousel Controls?', NECTAR_THEME_NAME),
			'desc' => __('Checking this box will remove the controls from your carousel', NECTAR_THEME_NAME)
		),
		
		'number_to_display'=>array(
			'type'=>'text', 
			'title'=>__('Number of Projects To Show', NECTAR_THEME_NAME),
			'desc' => __('Enter as a number example "6"', NECTAR_THEME_NAME)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => 'Category To Display From',
			'values' => $types_options
		),
		'project_style' => array(
			'type' => 'regular-select',
			'title' => 'Project Style',
			'desc' => 'Please select the style you would like your projects to display in.',
			'values' => array(
			   '1' => 'Meta below thumb w/ links on hover',
			   '2' => 'Meta on hover + entire thumb link'
			)
		),
		'lightbox_only'=>array( 
			'type'=>'checkbox', 
			'title'=>__('Lightbox Only?', NECTAR_THEME_NAME), 
			'desc' => __('This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.', NECTAR_THEME_NAME)
		)
	)
);




//Blog
$blog_types = get_categories();

$blog_options = array("all" => "All");

foreach ($blog_types as $type) {
	$blog_options[$type->slug] = $type->name;
}


$nectar_shortcodes['nectar_blog'] = array( 
	'type'=>'regular', 
	'title'=>__('Blog', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'layout'=>array(
			'type'=>'regular-select', 
			'title'=>__('Layout', NECTAR_THEME_NAME), 
			'values'=>array(
				'std-blog-sidebar' => __('Standard Blog W/ Sidebar', NECTAR_THEME_NAME), 
			    'std-blog-fullwidth' => __('Standard Blog No Sidebar', NECTAR_THEME_NAME),
			    'masonry-blog-sidebar' => __('Masonry Blog W/ Sidebar', NECTAR_THEME_NAME),
			    'masonry-blog-fullwidth' => __('Masonry Blog No Sidebar', NECTAR_THEME_NAME),
			    'masonry-blog-full-screen-width' => __('Masonry Blog Fullwidth', NECTAR_THEME_NAME)
			)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => 'Blog Categories',
			'desc' => 'Please select the categories you would like to display for your blog. <br/>You can select multiple categories too (ctrl + click on PC and command + click on Mac).',
			'values' => $blog_options
		),
		'enable_pagination'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Pagination', NECTAR_THEME_NAME),
			'desc' => __('Would you like to enable pagination?', NECTAR_THEME_NAME)
		),
		'posts_per_page'=>array(
			'type'=>'text', 
			'title'=>__('Posts Per Page', NECTAR_THEME_NAME),
			'desc' => __('How many posts would you like to display per page? <br/> If pagination is not enabled, will simply show this number of posts <br/>  Enter as a number example "10"', NECTAR_THEME_NAME)
		)
	)
);




$nectar_shortcodes['recent_posts'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Recent Posts', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'title_labels'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Title Labels?', NECTAR_THEME_NAME),
			'desc' => __('These labels are defined by you in the "Blog Options" tab of your theme options panel.', NECTAR_THEME_NAME)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => 'Category To Display From',
			'values' => $blog_options
		)
	)
);
	
	


		//Shortcode html
		$html_options = null;
		
		$shortcode_html = '
		
		<div id="nectar-sc-heading">
		
		<div id="nectar-sc-generator" class="mfp-hide mfp-with-anim">
		    					
			<div class="shortcode-content">
				<div id="nectar-sc-header">
					<div class="label"><strong>Nectar Shortcodes</strong></div>			
					<div class="content"><select id="nectar-shortcodes" data-placeholder="' . __("Choose a shortcode", NECTAR_THEME_NAME) .'">
				    <option></option>';
					
					foreach( $nectar_shortcodes as $shortcode => $options ){
						
						if(strpos($shortcode,'header') !== false) {
							$shortcode_html .= '<optgroup label="'.$options['title'].'">';
						}
						else {
							$shortcode_html .= '<option value="'.$shortcode.'">'.$options['title'].'</option>';
							$html_options .= '<div class="shortcode-options" id="options-'.$shortcode.'" data-name="'.$shortcode.'" data-type="'.$options['type'].'">';
							
							if( !empty($options['attr']) ){
								 foreach( $options['attr'] as $name => $attr_option ){
									$html_options .= nectar_option_element( $name, $attr_option, $options['type'], $shortcode );
								 }
							}
			
							$html_options .= '</div>'; 
						}
						
					} 
			
			$shortcode_html .= '</select></div></div>'; 	
		
	
		 echo $shortcode_html . $html_options; ?>
			
			<div id="shortcode-content">
				
				<div class="label"><label id="option-label" for="shortcode-content"><?php echo __( 'Content: ', NECTAR_THEME_NAME ); ?> </label></div>
				<div class="content"><textarea id="shortcode_content"></textarea></div>
			
			    <div class="hr"></div>
			    
			</div>
		
			<code class="shortcode_storage"><span id="shortcode-storage-o" style=""></span><span id="shortcode-storage-d"></span><span id="shortcode-storage-c" style=""></span></code>
			<a class="btn" id="add-shortcode"><?php echo __( 'Add Shortcode', NECTAR_THEME_NAME ); ?></a>
			
		</div>

	</div>	
		
	<?php 
}



//Option Element Function
	
function nectar_option_element( $name, $attr_option, $type, $shortcode ){
	
	$option_element = null;
	
	(isset($attr_option['desc']) && !empty($attr_option['desc'])) ? $desc = '<p class="description">'.$attr_option['desc'].'</p>' : $desc = '';
	
	if(isset($attr_option['half_width']) && $attr_option['half_width'] == 'true') $option_element .= '<div class="column-wrap"> <div class="half_width">';
	if(isset($attr_option['second_half_width']) && $attr_option['second_half_width'] == 'true') $option_element .= '<div class="second_half_width">';
		
	switch( $attr_option['type'] ){
		
	case 'radio':
	    
		$option_element .= '<div class="label"><strong>'.$attr_option['title'].': </strong></div><div class="content">';
	    foreach( $attr_option['opt'] as $val => $title ){
	    
		(isset($attr_option['def']) && !empty($attr_option['def'])) ? $def = $attr_option['def'] : $def = '';
		
		 $option_element .= '
			<label for="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'">'.$title.'</label>
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$shortcode.'-'.$name.'" value="'.$val.'" id="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'"'. ( $val == $def ? ' checked="checked"':'').'>';
	    }
		
		$option_element .= $desc . '</div>';
		
	    break;
		
	case 'checkbox':
		
		$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />'. $desc. '</div> ';
		
		break;	
	
	case 'select':

		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';

		break;
	
	case 'regular-select':
		
		if($attr_option['title'] == 'Starting Category') { $option_element .= '<div class="starting_category">'; }
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$k.'">'.$v.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		if($attr_option['title'] == 'Starting Category') { $option_element .= '</div>'; }
		
		break;
	
	case 'multi-select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select multiple="multiple" id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$k.'">'.$v.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
		
	case 'icons':
		if($attr_option['title'] == 'Icon') {
			$first_select = '<div class="label"><label><strong>Font Set: </strong></label></div> <div class="content"><select name="icon-set-select" class="skip-processing"> <option value="icon">Font Awesome</option> <option value="steadysets">Steadysets</option>  <option value="linecons">Linecons</option>  </select></div> <div class="clear no-line"></div>';
		} else {
			$first_select = null;
		}
		
		$parsed_title = str_replace(" ","-",$attr_option['title']);
		 
		$option_element .= $first_select.'
		
		<div class="icon-option '.strtolower($parsed_title).'">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;
		
	case 'custom':
 
		if( $name == 'tabs' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Tab Content: </strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Tab', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Tab', NECTAR_THEME_NAME ).'</a>';
			
		}

		if( $name == 'toggles' ){
			$option_element .= '
			
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
			
				<div class="label"><label><strong>Turn into accordion?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="accordion" type="checkbox" name="accordion">
				</div>
				<div class="clear"></div>

				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Tab Content: </strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
					<div class="label"><label><strong>Color: </strong></label></div>
					<div class="content">
						<select class="dynamic-select" id="color">
							<option value="Accent-Color">Accent-Color</option>
							<option value="Extra-Color-1">Extra-Color-1</option>
							<option value="Extra-Color-2">Extra-Color-2</option>
							<option value="Extra-Color-3">Extra-Color-3</option>
						</select>
					</div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Toggle', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Toggle', NECTAR_THEME_NAME ).'</a>';
			
		}  
		
		elseif( $name == 'bar_graph' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Bar Percent: </strong></label></div>
					<div class="content dd-percent"><input class="shortcode-dynamic-item-input percent" data-slider="true"  data-slider-range="1,100" data-slider-step="1" type="text" name=""  value="" /></div><div class="clear no-border"></div>
					<div class="label"><label><strong>Color: </strong></label></div>
					<div class="content">
						<select class="dynamic-select" id="color">
							<option value="Accent-Color">Accent-Color</option>
							<option value="Extra-Color-1">Extra-Color-1</option>
							<option value="Extra-Color-2">Extra-Color-2</option>
							<option value="Extra-Color-3">Extra-Color-3</option>
						</select>
					</div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Bar', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Bar', NECTAR_THEME_NAME ).'</a>';
			
		} 
		
		elseif( $name == 'testimonials' ){
			$option_element .= '
			
			<div class="label"><label for="shortcode-option-autorotate"><strong>Autorotate?: </strong></label></div>
			<div class="content"><input class="attr" type="text" data-attrname="autorotate" value="" />If you would like this to autorotate, enter the rotation speed in <b>miliseconds</b> here. i.e 5000</div>
			
			<div class="clear"></div>
			
			<div class="shortcode-dynamic-items testimonials" id="options-item" data-name="testimonial">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Name: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Quote: </strong></label></div>
					<div class="content"><textarea class="quote" name="quote"></textarea></div>
				</div>
			</div>

			<a href="#" class="btn blue remove-list-item">'.__('Remove Testimonial', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Testimonial', NECTAR_THEME_NAME ).'</a>';
			
		} 
		
		elseif( $name == 'image' ){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', NECTAR_THEME_NAME) . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', NECTAR_THEME_NAME) . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'poster' ){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="poster" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', NECTAR_THEME_NAME) . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', NECTAR_THEME_NAME) . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'color' ){
			
			if(get_bloginfo('version') >= '3.5') {
	           $option_element .= '
	           <div class="label"><label><strong>Background Color: </strong></label></div>
			   <div class="content"><input type="text" value="" class="popup-colorpicker" style="width: 70px;" data-default-color=""/></div>';
	        } else {
	           $option_element .='You\'re using an outdated version of WordPress. Please update to use this feature.';
	        }	
				
		}
		
		elseif( $name == 'clients' ){
			$option_element .= '
			<div class="shortcode-dynamic-items clients" id="options-item" data-name="item">
			    
				<div class="label"><label><strong>Columns</strong>:</label></div>
				<div class="content">
					<label for="shortcode-option-button-2-col" class="inline">Two</label>
					<input id="shortcode-option-button-2-col" class="attr" type="radio" value="2" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-3-col" class="inline">Three</label>
					<input id="shortcode-option-button-3-col" class="attr" type="radio" value="3" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-4-col" class="inline">Four</label>
					<input id="shortcode-option-button-4-col" class="attr" type="radio" value="4" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-5-col" class="inline">Five</label>
					<input id="shortcode-option-button-5-col" class="attr" type="radio" value="5" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-6-col" class="inline">Six</label>
					<input id="shortcode-option-button-6-col" class="attr" type="radio" value="6" name="client_columns[]" data-attrname="columns">
				</div>
				
				<div class="clear"></div>
				
				<div class="label"><label><strong>Fade In One by One?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="fade_in_animation" type="checkbox" name="fade_in_animation">
				</div>
				
				<div class="clear"></div>
				
				<div class="label"><label><strong>Turn Into Carousel?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="carousel" type="checkbox" name="carousel">
				</div>
				
				<div class="clear"></div>
				
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Client Image: </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="redux-opts-screenshot-" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', NECTAR_THEME_NAME) . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', NECTAR_THEME_NAME) . '</a>
					
					</div>
					<div class="clear"></div>
					<div class="label"><label><strong>Client URL</strong> (optional):</label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Client', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Client', NECTAR_THEME_NAME ).'</a>';
			
		} 
		
		elseif( $type == 'checkbox' ){
			$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />' . $desc . '</div> ';
		} 
	
		
		break;
		
	case 'textarea':
		$option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><textarea data-attrname="'.$name.'"></textarea> ' . $desc . '</div>';
		break;
			
	case 'text':
	default:
	    $option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><input class="attr" type="text" data-attrname="'.$name.'" value="" />' . $desc . '</div>';
	    break;
    }
	
	$option_element .= '<div class="clear"></div>';
    
	if(isset($attr_option['half_width']) && $attr_option['half_width'] == 'true' || isset($attr_option['second_half_width']) && $attr_option['second_half_width'] == 'true') $option_element .= '</div>';
	if(isset($attr_option['second_half_width']) && $attr_option['second_half_width'] == 'true') $option_element .= '<div class="clear no-line"></div> </div>';
	
    return $option_element;
}



?>