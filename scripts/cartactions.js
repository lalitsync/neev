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
					itemsSelectedCookie.push('<li id="' + jQuery(this).attr('id')+ '"  class="'+jQuery(this).attr('class')+'"  label="'+jQuery(this).attr('label')+'">'+jQuery(this).html()+'</li>');
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


function showSuccess()
{
		jQuery('div.message').html('<p class="success round-border"> Order SuccessFully Placed !</p>');  
		jQuery('p.success').fadeOut(5000)
		jQuery('.allProducts  .my-new-list li ').show();
		jQuery('.selected   .selected-fruits li ').remove();
		
		/* Remove Ityems From Cookie*/
		var date = new Date();
		var cookie ='';
			date.setTime(date.getTime()+(365*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
			document.cookie = 'selectedProducts='+cookie+'; expires='+date.toGMTString()+';path=/'
		return false;
}


function SetHistory()
{	    	var cookie = "";
			jQuery.each(jQuery('.selected li'), function(key, val) {
					cookie = cookie +'|##|'+jQuery(this).attr('id')+':::'+jQuery(this).attr('class')+':::'+jQuery(this).val();
				});
			var date = new Date();
			date.setTime(date.getTime()+(365*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
			document.cookie = 'selectedProducts='+cookie+'; expires='+date.toGMTString()+';path=/'
}

jQuery(document).ready(function() {
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
									// jQuery('p.error').remove();  
									return false;
								}
								
			var itemsSelected =[];
			jQuery.each(jQuery('.allProducts li.active'), function(key, val) {
				if(key%2==1) {   sizeInfo ='odd'; } else { sizeInfo ='even'; }
					itemsSelected.push('<li id="' + jQuery(this).attr('id')+ '"  class="'+jQuery(this).attr('class')+'"  label="'+jQuery(this).attr('label')+'">'+jQuery(this).html()+'</li>');
					jQuery(this).removeClass('active');
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
									// jQuery('p.error').remove();
									return false;
								}
									jQuery.each(jQuery('.selected li.active'), function(key, val) { 
										   jQuery(this).remove();
										   jQuery('.allProducts li#'+jQuery(this).attr('id')).show().removeClass('active');
								   });
						SetHistory();
		});


jQuery('button.submit').live('click',function() { 
											  
				 var Items = [];
				 var OrderTotal =0
											  
				jQuery.each(jQuery('.selected li'), function(key, val) {
						var itemdetail =[];
					itemdetail[0]= jQuery(this).attr('label') ;
					itemdetail[1] =jQuery(this).find('.price .amount').text();
					OrderTotal = OrderTotal+ parseInt(itemdetail[1]);
					var  itemdetail2 = ""+jQuery(this).attr('label')+","+jQuery(this).find('.price .amount').text()+",1 ";
					Items.push(itemdetail2);
					
				});
				
				// alert(Items.length);
				jQuery.post("addorder.php", {'user_id': jQuery('select#handle').val(), 'ordertotal':OrderTotal,'itemsdata': Items.join(':')} ,function(data) {   
							showSuccess();																																   
					 });
				
				
			});
	});


// admin dunctionality	  
function getOrdersByDate(date)
{
jQuery.post("getorderbydate.php", {'date': date} ,function(data) {   
														   
														   jQuery('div.order_list').html(data);
														   
														   });

jQuery.post("getsnapshotbydate.php", {'date': date} ,function(data) {   
														   
														   jQuery('div.snap_shot_data').html(data);
														   
														   });

 }


function updateDropDown()
{
		jQuery.each(jQuery('select'), function(key, val) {
						jQuery(this).prev('span').text(jQuery(this).find('option:selected').text());
										
				});
				jQuery('.Order-Row .Order_items').hide();
				jQuery('.Order-Row .Order_items .heading .status').addClass('close');
								jQuery('.Order-Row .Order_items .heading .status').removeClass('open');

}

jQuery(document).ready(function() {
								
								jQuery('.status').live('click',function() {
																		
																		jQuery(this).toggleClass('open');
																		jQuery(this).toggleClass('close');
																		jQuery('.close').parent().parent().find('.Order_items').hide();

																		jQuery('.open').parent().parent().find('.Order_items').show();
																		
																		});
								
								
								updateDropDown();
								getOrdersByDate(jQuery('#datehandler').val());
													jQuery('#datehandler').live('change',function() {
														getOrdersByDate(jQuery(this).val());
															updateDropDown()
													});
													
													jQuery('select#handle').live('change',function() {
														updateDropDown()
													});
											  
								});


			  
											 