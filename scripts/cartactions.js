// JavaScript Document
/*
jQuery Functions Created for a Test App.
Author: Lalit Kumawat
Version : 1.1
*/


function reloadHistory()
{
//									readCookie('selectedProducts');

var nameEQ =  "selectedProducts=";
var ca = document.cookie.split(';');

var SelectedProducts='';
for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) { SelectedProducts = c.substring(nameEQ.length,c.length); }
}
var ca = SelectedProducts.split('|##|');

// alert("cookie data"+ca);
var itemsSelectedCookie=[];
for(var i=0;i < ca.length;i++) {
        var c = ca[i];
		var productVal = c.split(':::');
		
					var ProductId=productVal[0];
								var ProductClass=productVal[1];
								
								//alert(ProductId);
								
									if(productVal.length>=2){ 
									jQuery.each(jQuery('.allProducts li#'+ProductId), function(key, val) {
				if(key%2==1) {   sizeInfo ='odd'; } else { sizeInfo ='even'; }
					itemsSelectedCookie.push('<li id="' + jQuery(this).attr('id')+ '"  class="'+jQuery(this).attr('class')+'">'+jQuery(this).html()+'</li>');
					jQuery(this).hide();
				});
				
				jQuery('.selected .productList').html('');
				
				jQuery('<ul/>', {
					'class': 'selected-fruits',
					html: itemsSelectedCookie.join('')
					}).appendTo('.selected .productList');
				
				jQuery('.selected li').removeClass('active');
				jQuery('.selected li#'+ProductId).addClass(ProductClass);
				
									}
								
								
								
								
								

}
}



function SetHistory()
{
	
	    	var cookie = "";
	
	alert(jQuery('.selected li').length);
			jQuery.each(jQuery('.selected li'), function(key, val) {
					cookie = cookie +'|##|'+jQuery(this).attr('id')+':::'+jQuery(this).attr('class');
				});
			var date = new Date();
			date.setTime(date.getTime()+(365*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
			document.cookie = 'selectedProducts='+cookie+'; expires='+date.toGMTString()+';path=/'

}



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
		 
		 
		 reloadHistory();
		 
		 
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
				
				// jQuery('.selected .productList').html('');
				
				jQuery('<ul/>', {
					'class': 'selected-fruits',
					html: itemsSelected.join('')
					}).appendTo('.selected .productList');
				
				jQuery('.selected li').removeClass('active');
				SetHistory();
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
						SetHistory();
		});

	});
