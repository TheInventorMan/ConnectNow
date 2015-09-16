<?php 

function nectar_typography() { 
	
	$options = get_option('salient'); 
	
	$body = $options['body_font'];
	$navigation = $options['navigation_font'];
	$navigation_dropdown = $options['navigation_dropdown_font'];
	$home_slider_caption = $options['home_slider_caption_font'];
	$standard_header = $options['standard_h_font'];
	$sidebar_carousel_footer_header = $options['sidebar_footer_h_font'];
	$team_member_names = $options['team_member_h_font'];
	
	echo '<style type="text/css">';
	/*-------------------------------------------------------------------------*/
	/*	Body Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['body_font_style']);
	
	( intval( substr($options['body_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['body_font_size'],0,-2)) +10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body, .toggle h3 a, body .ui-widget, .bar_graph li span strong, #search-results .result .title span, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3, body .nectar-love span, body .nectar-social .nectar-love .nectar-love-count
	{'; ?>
		<?php if($options['body_font'] != '-') {
			$font_family = (1 === preg_match('~[0-9]~', $options['body_font'])) ? '"'. $options['body_font'] .'"' : $options['body_font'];
		}
			  if($options['body_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['body_font_size'] != '-') echo 'font-size:' . $options['body_font_size'] .';'; ?>
		
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Navigation Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['navigation_font_style']);
	
	( intval( substr($options['navigation_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['navigation_font_size'],0,-2)) - 1 .'px' : $line_height = null ;  ?>
	
	<?php echo 'header#top nav > ul > li > a
	{'; ?>	
		<?php if($options['navigation_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['navigation_font'])) ? '"'. $options['navigation_font'] .'"' : $options['navigation_font'];
		}
			  if($options['navigation_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['navigation_font_size'] != '-') echo 'font-size:' . $options['navigation_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Navigation Dropdown Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['navigation_dropdown_font_style']);
	( intval( substr($options['navigation_dropdown_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['navigation_dropdown_font_size'],0,-2)) + 10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'header#top .sf-menu li ul li a, #header-secondary-outer nav > ul > li > a, #header-secondary-outer ul ul li a, #header-outer .widget_shopping_cart .cart_list a
	{';?>	
		<?php if($options['navigation_dropdown_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['navigation_dropdown_font'])) ? '"'. $options['navigation_dropdown_font'] .'"' : $options['navigation_dropdown_font'];
		}
			  if($options['navigation_dropdown_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['navigation_dropdown_font_size'] != '-') echo 'font-size:' . $options['navigation_dropdown_font_size'] .';'; ?>
			
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	<?php echo '@media only screen 
	and (min-width : 1px) and (max-width : 1000px) 
	{
	  header#top .sf-menu a {
	  	font-family: '. $options['navigation_dropdown_font'] .'!important;
	  	font-size: 14px!important;
	  }
	}'; ?>
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Nectar Slider Heading Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['nectar_slider_heading_font_style']);
	( intval( substr($options['nectar_slider_heading_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['nectar_slider_heading_font_size'],0,-2)) + 19 .'px!important' : $line_height = null ;  ?>
	
	<?php echo '.swiper-slide .content h2
	{'; ?>
		<?php if($options['nectar_slider_heading_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['nectar_slider_heading_font'])) ? '"'. $options['nectar_slider_heading_font'] .'"' : $options['nectar_slider_heading_font'];	
	     }  
			  if($options['nectar_slider_heading_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['nectar_slider_heading_font_size'] != '-') echo 'font-size:' . $options['nectar_slider_heading_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Nectar/Home Slider Caption / Testimonial Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['home_slider_caption_font_style']);
	( intval( substr($options['home_slider_caption_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['home_slider_caption_font_size'],0,-2)) + 19 .'px!important' : $line_height = null ;  ?>
	
	<?php echo '#featured article .post-title h2 span, blockquote, .swiper-slide .content p, .testimonial_slider blockquote, .testimonial_slider blockquote span, #portfolio-filters-inline #current-category, body .vc_text_separator div
	{'; ?>	
		<?php if($options['home_slider_caption_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['home_slider_caption_font'])) ? '"'. $options['home_slider_caption_font'] .'"' : $options['home_slider_caption_font'];	
		}  
			  if($options['home_slider_caption_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['home_slider_caption_font_size'] != '-') echo 'font-size:' . $options['home_slider_caption_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	<?php echo '.swiper-slide .content p.transparent-bg span { '; $nectar_slider_line_height_2 = intval(substr($options["home_slider_caption_font_size"],0,-2)) + 25; ?>
	     <?php if(!empty($line_height)) echo 'line-height:' . $nectar_slider_line_height_2 .'px;'; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Standard Header Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['standard_h_font_style']);
	?>
	
	<?php echo 'h1, h2, h3, h4, h5, h6, .row .col.section-title h1, .row .col.section-title h2, #call-to-action span, header#top #logo, #error-404 h1, #error-404 h2, #page-header-bg h1,
	article.post .post-header h1, article.post .post-header h2, article.post.quote .post-content h2, article.post.link .post-content h2, .woocommerce .products .price, #header-outer .widget_shopping_cart .cart_list a,
	#header-outer .total, #header-outer .total strong, .woocommerce .cart-notification .item-name, .nectar-milestone .number, body .carousel-wrap[data-full-width="true"] .carousel-heading h2
	{'; ?>	
		<?php if($options['standard_h_font'] != '-') {
			   $font_family = (1 === preg_match('~[0-9]~', $options['standard_h_font'])) ? '"'. $options['standard_h_font'] .'"' : $options['standard_h_font'];
		}
			  if($options['standard_h_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	<?php echo 'body h1, article.post .post-header h1, .row .col.section-title h1 {
		font-size:'. 30 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:'. (30 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	
	#page-header-bg h1 {
		font-size: '. 49 + intval($options['standard_h_font_deviation']) . 'px;
		line-height: '.(49 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	
	body h2, article.post .post-header h2, #call-to-action .container span {
	    font-size:'. 24 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:'. (24 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	
	.row .col h2, #search-results .result h2 {
		font-size:'. 24 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:'. (24 + intval($options['standard_h_font_deviation'])) +3 . 'px;
	}
	
	article.post.quote .post-content h2, article.post.link .post-content h2 {
		font-size:'. 24 + intval($options['standard_h_font_deviation']) . 'px;
	 	line-height:'. (24 + intval($options['standard_h_font_deviation'])) + 5 . 'px;
	}
	
	body h3 {
	    font-size:'. 21 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:' . (21 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	body h4 {
	    font-size:'. 18 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:'. (18 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	body h5 {
	    font-size:'. 16 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:'. (16 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	body h6 {
	    font-size:'. 15 + intval($options['standard_h_font_deviation']) . 'px;
		line-height:'. (15 + intval($options['standard_h_font_deviation'])) . 'px;
	}
	   
	
	header#top #logo 
	{
		line-height: 22px!important;
	}
	
	article.post .post-meta .day 
	{';
		 if($options['standard_h_font'] != '-') echo 'font-family: ' . $options['standard_h_font'].';'; ?>
	<?php echo '}'; ?>
	
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Sidear, Carousel & Nectar Button Header Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['sidebar_footer_h_font_style']);
	$line_height =  substr($options['sidebar_footer_h_font_size'],0,-2); ?>
	
	<?php echo '#footer-outer .widget h4, #sidebar h4, #call-to-action .container a, .uppercase, .nectar-button, body .widget_calendar table th, body #footer-outer #footer-widgets .col .widget_calendar table th, .swiper-slide .button a,
	header#top nav > ul > li.megamenu > ul > li > a, .carousel-heading h2, body .gform_wrapper .top_label .gfield_label, body .vc_pie_chart .wpb_pie_chart_heading
	{'; ?>	
		<?php if($options['sidebar_footer_h_font'] != '-') {
			   $font_family = (1 === preg_match('~[0-9]~', $options['sidebar_footer_h_font'])) ? '"'. $options['sidebar_footer_h_font'] .'"' : $options['sidebar_footer_h_font'];
		}
			  if($options['sidebar_footer_h_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['sidebar_footer_h_font_size'] != '-') echo 'font-size:' . $options['sidebar_footer_h_font_size'] .';'; ?>
				
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Team member names & heading subtitles
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['team_member_h_font_style']);
	$line_height =  substr($options['team_member_h_font_size'],0,-2); ?>
	
	<?php echo '.team-member h3, .row .col.section-title p, .row .col.section-title span, #page-header-bg .subheader, .nectar-milestone .subject
	{'; ?>	
	<?php if($options['team_member_h_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['team_member_h_font'])) ? '"'. $options['team_member_h_font'] .'"' : $options['team_member_h_font'];
	}  		
			  if($options['team_member_h_font'] != '-') echo 'font-family: ' . $font_family .';'; ?>
		<?php if($options['team_member_h_font_size'] != '-') echo 'font-size:' . $options['team_member_h_font_size'] .';'; ?>
			
		<?php if(!empty($styles[0])) echo 'font-weight:' .  $styles[0] .';'; ?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
			
	<?php echo '}'; ?>
	
	
	<?php echo 'article.post .post-meta .month 
	{
		line-height:'. $line_height + -6 . 'px!important;
	}'; 
	
	echo '</style>';
}


add_action('wp_head', 'nectar_typography');

?>