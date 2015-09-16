<article class="post link">
	
	<div class="post-content">
		
		<?php if( !is_single() ) { ?>
			
			<div class="post-meta">
				
				<?php 
				$options = get_option('salient'); 
				global $layout;
				$blog_type = $options['blog_type']; ?>
				
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
			
			<?php 
			$link = get_post_meta($post->ID, '_nectar_link', true); 
			$link_text = get_the_content(); ?>
			
			<a target="_blank" href="<?php echo $link; ?>">
				
				<div class="link-inner">
					<h2 class="title"><?php if(empty($link_text)) { echo get_the_title(); } else { echo $link_text; } ?></h2>
			    	<span class="destination"> <?php echo $link; ?></span>
			    	<span title="Link" class="icon"></span>
				</div><!--/link-inner-->
			
			</a>
			
		</div><!--/content-inner-->
		
	</div><!--/post-content-->
		
</article><!--/article-->