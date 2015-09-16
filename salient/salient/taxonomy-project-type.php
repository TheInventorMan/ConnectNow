<?php get_header(); 

$options = get_option('salient');  

//calculate cols
if(!empty($options['main_portfolio_layout'])) {
	
	switch($options['main_portfolio_layout']){
		case '3':
			$cols = 'cols-3';
			break; 
		case '4':
			$cols = 'cols-4';
			break; 
		case 'fullwidth':
			$cols = 'elastic';
			break; 
	}
	
} else {
	$cols = 'cols-3';
}
	
if(!empty($cols)) {
	
	switch($cols){
		case 'cols-3':
			$span_num = 'span_4';
			break; 
		case 'cols-4':
			$span_num = 'span_3';
			break; 
		case 'elastic':
			$span_num = 'elastic-portfolio-item';
			break; 
			
	}
	
} 

$project_style = (!empty($options['main_portfolio_project_style'])) ? $options['main_portfolio_project_style'] : '1' ;
$masonry_layout = (!empty($options['portfolio_use_masonry']) && $options['portfolio_use_masonry'] == '1') ? 'true' : 'false';

//disable masonry for default project style fullwidtrh
if($project_style == '1' && $cols == 'elastic') $masonry_layout = 'false';

$display_sortable = get_post_meta($post->ID, 'nectar-metabox-portfolio-display-sortable', true);
$inline_filters = (!empty($options['portfolio_inline_filters']) && $options['portfolio_inline_filters'] == '1') ? '1' : '0';
$filters_id = (!empty($options['portfolio_inline_filters']) && $options['portfolio_inline_filters'] == '1') ? 'portfolio-filters-inline' : 'portfolio-filters';
$bg = get_post_meta($post->ID, '_nectar_header_bg', true); 
?>

<style>
	<?php if($span_num == 'elastic-portfolio-item') { ?> 
		.container-wrap { padding-bottom: 0px!important; }
		#call-to-action .triangle { display: none; }
	<?php } ?>
	
	<?php if($span_num == 'elastic-portfolio-item' && !empty($bg)) { ?> 
		.container-wrap { padding-top: 0px!important; }
	<?php } ?>
</style>

<?php nectar_page_header($post->ID); ?>

<div class="container-wrap">
	
	<div class="container" data-col-num="cols-<?php echo $cols; ?>">
	
		<div class="row">
			<div class="col span_12 section-title blog-title">
				<h1><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				if($term) {
					echo $term->name;
				} else {
					wp_title("",true);
				} ?></h1>
			</div>
		</div>
		
		<div class="portfolio-wrap <?php if($project_style == '1' && $span_num == 'elastic-portfolio-item') echo 'default-style'; ?>">
			
		<span class="portfolio-loading"></span>
		
		<div id="portfolio" class="row portfolio-items <?php if($masonry_layout == 'true') echo 'masonry-items'; ?>"  data-categories-to-show="<?php echo $project_categories; ?>" data-starting-filter="" data-col-num="<?php echo $cols; ?>">
			<?php 
			
			$posts_per_page = '-1';
			if(!empty($options['portfolio_pagination']) && $options['portfolio_pagination'] == '1') {
				$posts_per_page = (!empty($options['portfolio_pagination_number'])) ? $options['portfolio_pagination_number'] : '-1';
			}
		
			
			if(have_posts()) : while(have_posts()) : the_post(); ?>
				
				
				<?php 
					
				   $terms = get_the_terms($post->id,"project-type");
				   $project_cats = NULL;
				   
				   if ( !empty($terms) ){
				     foreach ( $terms as $term ) {
				       $project_cats .= strtolower($term->slug) . ' ';
				     }
				   }
				
					$custom_project_link = get_post_meta($post->ID, '_nectar_external_project_url', true);
					$the_project_link = (!empty($custom_project_link)) ? $custom_project_link : get_permalink();
					
				?>
				
				<div class="col <?php echo $span_num . ' '. $masonry_item_sizing; ?> element" data-project-cat="<?php echo $project_cats; ?>">
					
					
					<?php //project style 1
							
							if($project_style == '1') { ?>
								
							<div class="work-item">
								 
								<?php
				 				
				 				$thumb_size = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
								
								//custom thumbnail
								$custom_thumbnail = get_post_meta($post->ID, '_nectar_portfolio_custom_thumbnail', true); 
								
								if( !empty($custom_thumbnail) ){
									echo '<img class="custom-thumbnail" src="'.$custom_thumbnail.'" alt="'. get_the_title() .'" />';
								}
								else {
									
									if ( has_post_thumbnail() ) {
										 echo get_the_post_thumbnail($post->ID, $thumb_size, array('title' => '')); 
									} 
									//no image added
									else {
										switch($thumb_size) {
											case 'wide':
												$no_image_size = 'no-portfolio-item-wide.jpg';
												break;
											case 'tall':
												$no_image_size = 'no-portfolio-item-tall.jpg';
												break;
											case 'regular':
												$no_image_size = 'no-portfolio-item-tiny.jpg';
												break;
											case 'wide_tall':
												$no_image_size = 'no-portfolio-item-tiny.jpg';
												break;
											default:
												$no_image_size = 'no-portfolio-item-small.jpg';
												break;
										}
										 echo '<img src="'.get_template_directory_uri().'/img/'.$no_image_size.'" alt="no image added yet." />';
									 }   
									
								} ?>
								
								<div class="work-info-bg"></div>
								<div class="work-info"> 
									
									<div class="vert-center">
										<?php 
										
										$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );  							
										$video_embed = get_post_meta($post->ID, '_nectar_video_embed', true);
										$video_m4v = get_post_meta($post->ID, '_nectar_video_m4v', true);
										
										//video 
									    if( !empty($video_embed) || !empty($video_m4v) ) {
			
										    if( !empty( $video_embed) && floatval(get_bloginfo('version')) < "3.6") {
										    	
										    	echo '<a href="#video-popup-'.$post->ID.'"  class="pretty_photo">'.__("Watch Video", NECTAR_THEME_NAME).'</a> ';
												echo '<div id="video-popup-'.$post->ID.'">';
										        echo '<div class="video-wrap">' . stripslashes(htmlspecialchars_decode($video_embed)) . '</div>';
												echo '</div>';
										    } 
										    
										    else {
												 echo '<a href="'.get_template_directory_uri(). '/includes/portfolio-functions/video.php?post-id=' .$post->ID.'&iframe=true&width=854" class="pretty_photo" >'.__("Watch Video", NECTAR_THEME_NAME).'</a> ';	 
										     }
				
								        } 
										
										//image
									    else {
									       echo '<a href="'. $featured_image[0].'" class="pretty_photo" >'.__("View Larger", NECTAR_THEME_NAME).'</a> ';
									    }
										
									    echo '<a href="' . $the_project_link . '">'.__("More Details", NECTAR_THEME_NAME).'</a>'; ?>
									    
									</div><!--/vert-center-->
								</div>
							</div><!--work-item-->
							
							<div class="work-meta">
								<h4 class="title"><?php the_title(); ?></h4>
								
								<?php 
									if(!empty($options['portfolio_date']) && $options['portfolio_date'] == 1) echo get_the_date();
								?>
			
							</div>
							<div class="nectar-love-wrap">
								<?php if( function_exists('nectar_love') ) nectar_love(); ?>
							</div><!--/nectar-love-wrap-->	
						
						<?php } //project style 1 
						
						
						//project style 2
						else { ?>
							
							<div class="work-item style-2">
								
								<?php
								$thumb_size = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
								
								//custom thumbnail
								$custom_thumbnail = get_post_meta($post->ID, '_nectar_portfolio_custom_thumbnail', true); 
								
								if( !empty($custom_thumbnail) ){
									echo '<img class="custom-thumbnail" src="'.$custom_thumbnail.'" alt="'. get_the_title() .'" />';
								}
								else {
									
									if ( has_post_thumbnail() ) {
										 echo get_the_post_thumbnail($post->ID, $thumb_size, array('title' => '')); 
									} 
									
									//no image added
									else {
										switch($thumb_size) {
											case 'wide':
												$no_image_size = 'no-portfolio-item-wide.jpg';
												break;
											case 'tall':
												$no_image_size = 'no-portfolio-item-tall.jpg';
												break;
											case 'regular':
												$no_image_size = 'no-portfolio-item-tiny.jpg';
												break;
											case 'wide_tall':
												$no_image_size = 'no-portfolio-item-tiny.jpg';
												break;
											default:
												$no_image_size = 'no-portfolio-item-small.jpg';
												break;
										}
										 echo '<img src="'.get_template_directory_uri().'/img/'.$no_image_size.'" alt="no image added yet." />';
									 }   
									
								} ?>
				
								<div class="work-info-bg"></div>
								<div class="work-info">
									
									<i class="icon-salient-plus"></i> 
									
									<a href="<?php echo $the_project_link; ?>"></a>
		
									<div class="vert-center"><h3><?php echo get_the_title(); ?></h3> <p><?php if(!empty($options['portfolio_date']) && $options['portfolio_date'] == 1) echo get_the_date(); ?></p></div><!--/vert-center-->
									
								</div>
							</div><!--work-item-->
							
						<?php } //project style 2 ?>
				
				</div><!--/col-->
				
			<?php endwhile; endif; ?>
		</div><!--/portfolio-->
	
		
		<?php 
		 if( !empty($options['portfolio_extra_pagination']) && $options['portfolio_extra_pagination'] == '1' ){
		 	
				    global $wp_query, $wp_rewrite;  
			 
	                $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1; 
				    $total_pages = $wp_query->max_num_pages;  
					
					$permalink_structure = get_option('permalink_structure');
				    $format = empty( $permalink_structure ) ? '&paged=%#%' : 'page/%#%/';  
				    if ($total_pages > 1){  
				      
					  echo '<div id="pagination">';
					   
				      echo paginate_links(array(  
				          'base' => get_pagenum_link(1) .'%_%', 
	    			      'format' => $format,
				          'current' => $current,  
				          'total' => $total_pages,  
				        )); 
						
					  echo  '</div>'; 
						
				    }  
			}
			//regular pagination
			else{
				
				if( get_next_posts_link() || get_previous_posts_link() ) { 
					echo '<div id="pagination">
					      <div class="prev">'.get_previous_posts_link('&laquo; Previous Entries').'</div>
					      <div class="next">'.get_next_posts_link('Next Entries &raquo;','').'</div>
				          </div>';
				
		        }
			}  ?>
		
		</div><!--/container-->
		
	</div><!--/container-wrap-->

</div>

<?php get_footer(); ?>