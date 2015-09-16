<article class="post audio">
	
	<div class="post-content">
		
		<?php if( !is_single() ) { ?>
			
			<div class="post-meta">
				
				<?php 
				$options = get_option('salient'); 
				
				global $layout;
				
				$blog_type = $options['blog_type']; 
				
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
		
		<div class="content-inner">
			
			<div class="audio-wrap">		
				<?php 
				
					$audio_mp3 = get_post_meta($post->ID, '_nectar_audio_mp3', true);
				    $audio_ogg = get_post_meta($post->ID, '_nectar_audio_ogg', true); 
					
					if(!empty($audio_ogg) || !empty($audio_mp3)) {
			        	
						$audio_output = '[audio ';
						
						if(!empty($audio_mp3)) { $audio_output .= 'mp3="'. $audio_mp3 .'" '; }
						if(!empty($audio_ogg)) { $audio_output .= 'ogg="'. $audio_ogg .'"'; }
						
						$audio_output .= ']';
						
		        		echo  do_shortcode($audio_output);	
		        	}

				 ?>
			</div><!--/audio-wrap-->
			
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