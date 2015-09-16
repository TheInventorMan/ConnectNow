<?php 
// Access WordPress 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

require_once( $path_to_wp . '/wp-load.php' );


$postid = stripslashes(htmlspecialchars_decode(filter_input(INPUT_GET, 'post-id', FILTER_SANITIZE_STRING)));

$video_height = get_post_meta($postid, '_nectar_video_height', true);
$video = get_post_meta($postid, '_nectar_video_embed', true);

$video_m4v = get_post_meta($postid, '_nectar_video_m4v', true); 
$video_ogv = get_post_meta($postid, '_nectar_video_ogv', true); 
$video_poster = get_post_meta($postid, '_nectar_video_poster', true); 

if(empty($video_height)) $video_height = 480;
 
wp_head(); 

wp_dequeue_script( 'my_acsearch' );  

?>


	<script>
	jQuery(document).ready(function($){
		if( $(window).width() <= 690 ){

			function pp_video_height() {
				$('#pp-video-wrap').css('height',$('.mejs-container').width()/1.777);
			}
			
			$(window).resize(pp_video_height);
			pp_video_height();
		}
	});	
	</script>


<style>
	#header-outer { display: none!Important;}
</style>
</head>

<div id="header-outer" data-header-resize="1"></div>

<?php if ( floatval(get_bloginfo('version')) < "3.6" ) { ?>
	<style>
		body {background-color: #000; height: <?php echo $video_height + 33; ?>px!Important;}
		#wpadminbar { display: none;}
		html { margin-top: 0px!important; }
		.jp-video-container { margin-bottom: 0px!important;}
		.jp-jplayer { height: <?php echo $video_height; ?>px!important; }
		
		@media only screen 
		and (min-width : 1px) and (max-width : 1050px) {
			body {background-color: transparent!important;}
			.jp-jplayer { height: auto!important; }
			
		}
	</style>
<?php }  else { ?>
	<style>
		body {background-color: #000; overflow-y:hidden; height: <?php echo $video_height; ?>px!Important;}
		#wpadminbar { display: none;}
		html { margin-top: 0px!important; }
		.mejs-mediaelement #me_flash_0_container {
			height: 100%;
		}
		.mejs-fullscreen-button {
			display: none!important;
		}
		@media only screen 
		and (min-width : 1px) and (max-width : 1050px) {
			body {background-color: transparent!important;}
		}
	</style>
<?php } ?>

<body class="pp-video-function">
<?php
if ( floatval(get_bloginfo('version')) < "3.6" ) {
	nectar_video($postid); 	
} else {
	
	//self hosted
	if(!empty($video_m4v) || !empty($video_ogv)) {
							        		
		$video_output = '[video ';
		
		if(!empty($video_m4v)) { $video_output .= 'mp4="'. $video_m4v .'" '; }
		if(!empty($video_ogv)) { $video_output .= 'ogv="'. $video_ogv .'"'; }
		
		$video_output .= ' poster="'.$video_poster.'"]';
		
		echo '<div class="video">' . do_shortcode($video_output) . '</div>';	
	} 
	
	//embed
	else {
		echo '<div id="pp-video-wrap">'.do_shortcode($video).'</div>';
	}
	
}

wp_footer(); ?>