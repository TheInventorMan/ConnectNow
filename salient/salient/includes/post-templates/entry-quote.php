<article class="post quote">
	
	<div class="post-content">
		
		<?php if( !is_single() ) { ?>
			
			<div class="post-meta">
				
				<?php $options = get_option('salient'); 
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
			$quote = get_post_meta($post->ID, '_nectar_quote', true);
			?>
			
			<div class="quote-inner">
				
				<?php if( !is_single() ) { ?> <a class="whole-link" href="<?php the_permalink(); ?>"></a><?php } ?>
				
					<?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?> 
						<h2 class="title">
							<?php echo $quote; ?>
						</h2> 
					<?php if( !is_single() ) { ?> </a> <?php } ?>
				
		    	<span class="author"> 
		    		<?php the_title(); ?>
		    	</span> 
		    	<span title="Quote" class="icon"></span>

		    	<?php if( !is_single() ) { ?> </a> <?php } ?>
		    	
			</div><!--/quote-inner-->
			
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