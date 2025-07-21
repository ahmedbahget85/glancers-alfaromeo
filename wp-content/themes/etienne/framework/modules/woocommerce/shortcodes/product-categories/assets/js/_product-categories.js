(function($) {
	'use strict';
	
	$(document).ready(function(){
		eltdfInitProductCategoriesPosition();
	});


	function eltdfInitProductCategoriesPosition(){
	    var lists = $('.eltdf-prod-cats-holder');
	    if (lists.length) {
	    	lists.each(function(){
	    		var list = $(this),
	    			items = list.find('.eltdf-prod-cat.eltdf-cat-with-image');

	    		list.waitForImages(function(){

		    		items.each(function(i){
		    			var thisItem = $(this),
		    				siblingItem,
		    				itemHeight,
		    				siblingHeight,
		    				margins;

		    			if (list.hasClass('eltdf-two-columns')){
							if ((i+1)%4 == 1) {
								siblingItem = thisItem.next();
							} else if ((i+1)%4 == 0) {
								siblingItem = thisItem.prev();
							}
						} else {
							if ((i+1)%6 == 1) {
								siblingItem = thisItem.next();
							} else if ((i+1)%2 == 1) {
								siblingItem = thisItem.prev();
							}						
						}

		    			
		    		});
		    	});

	    	});
	    }

	}
	
})(jQuery);