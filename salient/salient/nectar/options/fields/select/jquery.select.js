jQuery(document).ready(function ($) {
	
	$('h3:contains("Typography")').parent().find('h3').next('div').after('<table class="the-toggle">');
	
	var $clone = $('h3:contains("Typography")').parent().find('table').find('tr:first-child').clone();
	var $clone2 = $('h3:contains("Typography")').parent().find('table').find('tr:nth-child(2)').clone();
	$('h3:contains("Typography")').parent().find('table').find('tr:first-child, tr:nth-child(2)').remove();
	
	$clone.find('tr.font-family').removeClass();
	$clone2.find('tr.font-family').removeClass();
	
	$('.the-toggle').html($clone);
	$('.the-toggle').append($clone2);
	
	$('h3:contains("Typography")').parent().find('table:not(".the-toggle")').addClass('typography-table');
	$('h3:contains("Typography")').parent().find('table:not(".the-toggle")').find('tr').addClass('font-option');
	$('h3:contains("Typography")').parent().find('table:not(".the-toggle")').find('tr:nth-child(4n+1), tr:nth-child(1)').removeClass('font-option').addClass('font-family');
	
});
