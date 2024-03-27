(function($){
	
	/** Options Tabs */
	function infinityOptionsTabs() {
		
		$( '#infinity_tabs' ).tabs({
			cookie: { expires: 1 }
		});
		
	}
	
	/** jQuery Document Ready */
	$(document).ready(function(){		
		infinityOptionsTabs();		
	});

	/** jQuery Windows Load */
	$(window).load(function(){
	});	

})(jQuery);