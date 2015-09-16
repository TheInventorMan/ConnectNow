<article class="post standard">
					
	<div class="post-content">
		
		<?php if( !is_single() ) { ?>
				
			<div class="post-meta">
				
				<?php $options = get_option('salient'); 
				$blog_type = $options['blog_type']; 
				global $layout;
				
				$use_excerpt = (!empty($options['blog_auto_excerpt']) && $options['blog_auto_excerpt'] == '1') ? 'true' : 'false'; 
				?>
				
				<div class="date">
					<?php 
					if(
					$blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || 
					$blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || 
					$blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || 
					$layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') {
						echo get_the_date();
					}
					else { ?>
					
						<span class="month"><?php the_time('M'); ?></span>
						<span class="day"><?php the_time('d'); ?></span>
						<?php $options = get_option('salient'); 
						if(!empty($options['display_full_date']) && $options['display_full_date'] == 1) {
							echo '<span class="year">'. get_the_time('Y') .'</span>';
						}
					} ?>
				</div><!--/date-->
				
				<div class="nectar-love-wrap">
					<?php if( function_exists('nectar_love') ) nectar_love(); ?>
				</div><!--/nectar-love-wrap-->	
							
			</div><!--/post-meta-->
			
		<?php } ?>
		
		<?php $enable_gallery_slider = get_post_meta( get_the_ID(), '_nectar_gallery_slider', true ); ?>
		
		<div class="content-inner <?php if(!empty($enable_gallery_slider) && $enable_gallery_slider == 'on') echo 'gallery-slider'; ?>">
			
			<?php 
				
				$gallery = get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&orderby=menu_order&order=ASC&post_parent='.$post->post_parent);
				$attr = array(
				    'class' => "attachment-full wp-post-image",
				);
				
				if(!empty($enable_gallery_slider) && $enable_gallery_slider == 'on') { $gallery_ids = grab_ids_from_gallery(); ?>
					
				<div class="flex-gallery"> 
						 <ul class="slides">
						 	<?php 
							foreach( $gallery_ids as $image_id ) {
							     echo '<li>' . wp_get_attachment_image($image_id, '', false, $attr) . '</li>';
							} ?>
				    	</ul>
			   	 </div><!--/gallery-->
		   	  	
		   	<?php } ?> 	
				
			<?php if( !is_single() ) { ?>
					
				<div class="post-header">
					<h2 class="title"><?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if( !is_single() ) {?> </a> <?php } ?></h2>
					<span class="meta-author"><?php echo __('Posted by', NECTAR_THEME_NAME); ?> <?php the_author_posts_link(); ?></span> <span class="meta-category">| <?php the_category(', '); ?></span> <span class="meta-comment-count">| <a href="<?php comments_link(); ?>">
					<?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
				</div><!--/post-header-->
			
			<?php
			
				//if no excerpt is set
				global $post;
				if(empty( $post->post_excerpt ) && $use_excerpt != 'true') {
					the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
				}
				
				//excerpt
				else {
					echo '<div class="excerpt">';
						the_excerpt();
					echo '</div>';
					echo '<a class="more-link" href="' . get_permalink() . '"><span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) .'</span></a>';
				}
				
				?>
			
			<?php } ?>
			
		   
			<?php 
			if(is_single()){
				//on the single post page display the content
				the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>'); 
			} ?>
			
			<?php $options = get_option('salient');
				if( $options['display_tags'] == true ){
					 
					if( is_single() && has_tag() ) {
					
						echo '<div class="post-tags"><h4>Tags: </h4>'; 
						the_tags('','','');
						echo '<div class="clear"></div></div> ';
						
					}
				}
			?>
		
		</div><!--/content-inner-->
		
	</div><!--/post-content-->
		
</article><!--/article-->