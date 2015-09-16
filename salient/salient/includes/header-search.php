<?php $options = get_option('salient'); 

if(!empty($options['header-disable-ajax-search']) && $options['header-disable-ajax-search'] == '1') {
	$ajax_sarch = 'no';	
} else {
	$ajax_search = 'yes';
} ?>

<div id="search-outer">
		
	<div id="search">
	  	 
		<div class="container">
		  	 	
		     <div id="search-box">
		     	
		     	<div class="col span_12">
			      	<form action="<?php echo home_url(); ?>" method="GET">
			      		<input type="text" name="s" <?php if($ajax_search == 'yes') { echo 'id="s"'; } ?> value="<?php echo __('Start Typing...', NECTAR_THEME_NAME); ?>" data-placeholder="<?php echo __('Start Typing...', NECTAR_THEME_NAME); ?>" />
			      	</form>
		        </div><!--/span_12-->
			      
		     </div><!--/search-box-->
		     
		     <div id="close"><a href=""><span class="icon-salient-x" aria-hidden="true"></span></a></div>
		     
		 </div><!--/container-->
	    
	</div><!--/search-->
	  
</div><!--/search-outer-->