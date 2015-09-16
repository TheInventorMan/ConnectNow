<?php


#-----------------------------------------------------------------#
# Create the Portfolio meta boxes
#-----------------------------------------------------------------# 

add_action('add_meta_boxes', 'nectar_metabox_portfolio');
function nectar_metabox_portfolio(){
	
	
	#-----------------------------------------------------------------#
	# Extra Content
	#-----------------------------------------------------------------# 
	$meta_box = array(
		'id' => 'nectar-metabox-portfolio-extra',
		'title' =>  __('Extra Content', NECTAR_THEME_NAME),
		'description' => __('Please use this section to place any extra content you would like to appear in the main content area under your portfolio item. (The above default editor is only used to populate your items sidebar content)', NECTAR_THEME_NAME),
		'post_type' => 'portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
    		array( 
				'name' => '',
				'desc' => '',
				'id' => '_nectar_portfolio_extra_content',
				'type' => 'editor',
				'std' => ''
			),
		)
	);
	
    $callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
		
    
	
	
	$portfolio_pages = array('default'=>'Default');
			
	//grab all pages that are using the portfolio layout
	$portfolio_pages_ft = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'page-portfolio.php'
	));
	
	if(!empty($portfolio_pages_ft)) {
		foreach($portfolio_pages_ft as $page){
			$portfolio_pages[$page->ID] = $page->post_title;
		}
	}
	
	$portfolio_pages_ft_new = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'template-portfolio.php'
	));
	
	if(!empty($portfolio_pages_ft_new)) {
		foreach($portfolio_pages_ft_new as $page){
			$portfolio_pages[$page->ID] = $page->post_title;
		}
	}
	
	
	//grab all pages that contain the portfolio shortcode
	global $wpdb;
	
	$results = $wpdb->get_results("SELECT * FROM $wpdb->posts
	WHERE post_content LIKE '%[nectar_portfolio%' AND post_type='page'");
	 
	if(!empty($results)) {
	    foreach ($results as $result) {
	       $portfolio_pages[$result->ID] = $result->post_title;
	    }
	}
	
	
	#-----------------------------------------------------------------#
	# Project Configuration
	#-----------------------------------------------------------------# 
	if ( floatval(get_bloginfo('version')) < "3.6" ) {
		$meta_box = array(
			'id' => 'nectar-metabox-custom-thummbnail',
			'title' =>  __('Project Configuration', NECTAR_THEME_NAME),
			'description' => __('', NECTAR_THEME_NAME),
			'post_type' => 'portfolio',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array( 
						'name' => __('Full Width Portfolio Item Layout', NECTAR_THEME_NAME),
						'desc' => __('This will remove the sidebar and allow you to use fullwidth sections and sliders', NECTAR_THEME_NAME),
						'id' => '_nectar_portfolio_item_layout',
						'type' => 'choice_below',
						'options' => array(
							'disabled' => 'Disabled',
							'enabled' => 'Enabled'
						),
						'std' => 'disabled'
				),
	    		array( 
					'name' => __('Custom Thumbnail Image', NECTAR_THEME_NAME),
					'desc' => __('If you would like to have a separate thumbnail for your portfolio item, upload it here. If left blank, a cropped version of your featured image will be automatically used instead. The recommended dimensions are 600px by 403px.', NECTAR_THEME_NAME),
					'id' => '_nectar_portfolio_custom_thumbnail',
					'type' => 'file',
					'std' => ''
				),
				array(
					'name' =>  __('Hide Featured Image/Video on Single Project Page?', NECTAR_THEME_NAME),
					'desc' => __('You can choose to hide your featured image/video from automatically displaying on the top of the main project page.', NECTAR_THEME_NAME),
					'id' => '_nectar_hide_featured',
					'type' => 'checkbox',
	                'std' => 1
				),
				array( 
					'name' => __('Masonry Item Sizing', NECTAR_THEME_NAME),
					'desc' => __('This will only be used if you choose to display your portfolio in the masonry format', NECTAR_THEME_NAME),
					'id' => '_portfolio_item_masonry_sizing',
					'type' => 'select',
					'std' => 'tall_regular',
					'options' => array(
						"regular" => "Regular",
				  		"wide" => "Wide",
				  		"tall" => "Tall",
				  		"wide_tall" => "Wide & Tall",
					)
				),
				array( 
					'name' => __('External Project URL', NECTAR_THEME_NAME),
					'desc' => __('If you would like your project to link to a custom location, enter it here (remember to include "http://")', NECTAR_THEME_NAME),
					'id' => '_nectar_external_project_url',
					'type' => 'text',
					'std' => ''
				),
				array( 
					'name' => 'Parent Portfolio Override',
					'desc' => 'This allows you to manually assign where your "Back to all" button will take the user on your single portfolio item pages.',
					'id' => 'nectar-metabox-portfolio-parent-override',
					'type' => 'select',
					'options' => $portfolio_pages,
					'std' => 'default'
				)
			)
		);
	} 
	
	//wp 3.6+
	else {
		

		$meta_box = array(
			'id' => 'nectar-metabox-project-configuration',
			'title' =>  __('Project Configuration', NECTAR_THEME_NAME),
			'description' => __('', NECTAR_THEME_NAME),
			'post_type' => 'portfolio',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array( 
						'name' => __('Full Width Portfolio Item Layout', NECTAR_THEME_NAME),
						'desc' => __('This will remove the sidebar and allow you to use fullwidth sections and sliders', NECTAR_THEME_NAME),
						'id' => '_nectar_portfolio_item_layout',
						'type' => 'choice_below',
						'options' => array(
							'disabled' => 'Disabled',
							'enabled' => 'Enabled'
						),
						'std' => 'disabled'
				),
	    		array( 
					'name' => __('Custom Thumbnail Image', NECTAR_THEME_NAME),
					'desc' => __('If you would like to have a separate thumbnail for your portfolio item, upload it here. If left blank, a cropped version of your featured image will be automatically used instead. The recommended dimensions are 600px by 403px.', NECTAR_THEME_NAME),
					'id' => '_nectar_portfolio_custom_thumbnail',
					'type' => 'file',
					'std' => ''
				),
				array(
					'name' =>  __('Hide Featured Image/Video on Single Project Page?', NECTAR_THEME_NAME),
					'desc' => __('You can choose to hide your featured image/video from automatically displaying on the top of the main project page.', NECTAR_THEME_NAME),
					'id' => '_nectar_hide_featured',
					'type' => 'checkbox',
	                'std' => 1
				),
				array( 
					'name' => __('Masonry Item Sizing', NECTAR_THEME_NAME),
					'desc' => __('This will only be used if you choose to display your portfolio in the masonry format', NECTAR_THEME_NAME),
					'id' => '_portfolio_item_masonry_sizing',
					'type' => 'select',
					'std' => 'tall_regular',
					'options' => array(
						"regular" => "Regular",
				  		"wide" => "Wide",
				  		"tall" => "Tall",
				  		"wide_tall" => "Wide & Tall",
					)
				),
				array(
					'name' =>  __('Gallery Slider', NECTAR_THEME_NAME),
					'desc' => __('This will turn all default WordPress galleries attached to this post into a simple slider.', NECTAR_THEME_NAME),
					'id' => '_nectar_gallery_slider',
					'type' => 'checkbox',
	                'std' => 1
				),
				array( 
					'name' => __('External Project URL', NECTAR_THEME_NAME),
					'desc' => __('If you would like your project to link to a custom location, enter it here (remember to include "http://")', NECTAR_THEME_NAME),
					'id' => '_nectar_external_project_url',
					'type' => 'text',
					'std' => ''
				),
				array( 
					'name' => 'Parent Portfolio Override',
					'desc' => 'This allows you to manually assign where your "Back to all" button will take the user on your single portfolio item pages.',
					'id' => 'nectar-metabox-portfolio-parent-override',
					'type' => 'select',
					'options' => $portfolio_pages,
					'std' => 'default'
				)
			)
		);

	}//endif

	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
		

    #-----------------------------------------------------------------#
	# Video 
	#-----------------------------------------------------------------#
		
	
    $meta_box = array( 
		'id' => 'nectar-metabox-portfolio-video',
		'title' => __('Video Settings', NECTAR_THEME_NAME),
		'description' => __('If you have a video, please fill out the fields below.', NECTAR_THEME_NAME),
		'post_type' => 'portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('M4V File URL', NECTAR_THEME_NAME),
					'desc' => __('Please upload the .m4v video file. <br/><strong>You must include both formats.</strong>', NECTAR_THEME_NAME),
					'id' => '_nectar_video_m4v',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('OGV File URL', NECTAR_THEME_NAME),
					'desc' => __('Please upload the .ogv video file. <br/><strong>You must include both formats.</strong>', NECTAR_THEME_NAME),
					'id' => '_nectar_video_ogv',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('Video Height', NECTAR_THEME_NAME),
					'desc' => __('This only needs to be filled out if your self hosted video is not in a 16:9 aspect ratio. Enter your height based on an 845px width. This is used to calculate the iframe height for the "Watch Video" link. <br/> <strong>Don\'t include "px" in the string. e.g. 480</strong>', NECTAR_THEME_NAME),
					'id' => '_nectar_video_height',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Preview Image', NECTAR_THEME_NAME),
					'desc' => __('Image should be at least 680px wide. Click the "Upload" button to begin uploading your image, followed by "Select File" once you have made your selection. Only applies to self hosted videos.', NECTAR_THEME_NAME),
					'id' => '_nectar_video_poster',
					'type' => 'file',
					'std' => ''
				),
			array(
					'name' => __('Embedded Code', NECTAR_THEME_NAME),
					'desc' => __('If the video is an embed rather than self hosted, enter in a Youtube or Vimeo embed code here. The width should be a minimum of 670px with any height.', NECTAR_THEME_NAME),
					'id' => '_nectar_video_embed',
					'type' => 'textarea',
					'std' => ''
				)
		)
	);


	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );


}