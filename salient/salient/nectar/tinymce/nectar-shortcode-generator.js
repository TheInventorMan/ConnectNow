jQuery(document).ready(function($){
	
	$('body').on('click','.nectar-shortcode-generator',function(){
       
 
            $.magnificPopup.open({
                mainClass: 'mfp-zoom-in',
 	 		 	items: {
 	  	     		src: '#nectar-sc-generator'
  	        	},
  	         	type: 'inline',
                removalDelay: 500
	    }, 0);         
 
	}); 


});
