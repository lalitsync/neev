// JavaScript Document
/*
jQuery Functions Created for a Test App.
Author: Lalit Kumawat
Version : 1.1
*/


jQuery(document).ready(function() {
								
		var  sizeInfo ='even';
		var items = [];
		jQuery.each(jQuery('.allProducts select option'), function(key, val) {
			if(key%2==1) {
				sizeInfo ='odd';
			}
			else    { 
				sizeInfo ='even';
			}
		
		items.push('<li id="fruit_' + key + '"  class="'+sizeInfo+'"><div class="name" >'+jQuery(this).text()+' </div> <div class="price" >'+jQuery(this).attr('label')+' </div></li>');
		  });
		 jQuery('<ul/>', {
		    'class': 'my-new-list',
		    html: items.join('')
		  }).appendTo('.allProducts .productList');
		 
		 
/* Selecting The Item from List*/		 
		 jQuery('.allProducts li , div.selected li').live('click',function() {
														 
														 jQuery(this).toggleClass('active');
														 
														 });
		 
		 
		 
	/* Adding Fruit into Order Basket*/	
		 jQuery('button.add').live('click',function() {
						var CountSelected = jQuery('.allProducts li.active').length;
						if(CountSelected <=0) { 
									jQuery('div.message').html('<p class="error round-border"> Please Select Product To add!</p>');  
									jQuery('p.error').fadeOut(5000);  
									return false;
								}
								
			var itemsSelected =[];
			jQuery.each(jQuery('.allProducts li.active'), function(key, val) {
				if(key%2==1) {   sizeInfo ='odd'; } else { sizeInfo ='even'; }
					itemsSelected.push('<li id="' + jQuery(this).attr('id')+ '"  class="'+jQuery(this).attr('class')+'">'+jQuery(this).html()+'</li>');
					jQuery(this).hide();
				});
				
				jQuery('.selected .productList').html('');
				
				jQuery('<ul/>', {
					'class': 'selected-fruits',
					html: itemsSelected.join('')
					}).appendTo('.selected .productList');
				
				jQuery('.selected li').removeClass('active');
			});


/*Removing Fruits from Order  basket*/
jQuery('button.remove').live('click',function() {
											  var CountSelected = jQuery('.selected li.active').length;
						if(CountSelected <=0) { 
									jQuery('div.message').html('<p class="error round-border"> Please Select Product To Remove!</p>');  
									jQuery('p.error').fadeOut(5000);  
									return false;
								}
						
											  
									jQuery.each(jQuery('.selected li.active'), function(key, val) { 
										   jQuery(this).remove();
										   jQuery('.allProducts li#'+jQuery(this).attr('id')).show().removeClass('active');
								   });
							   });
		});
