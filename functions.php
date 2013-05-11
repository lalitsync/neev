<?php

function makeOptions($array)
{
 $options= '';
foreach($array as $key=>$arrayVal)
{
$options .='<option for="'.$arrayVal['id'].'"  value="'.$arrayVal['id'].'"  label="'.$arrayVal['price'].'" >'.$arrayVal['name'].'</option>';
}

return $options;

}

function getAllFruits()
{

$sql_fruits ='select p_id as id, product_name as name  , product_price as price from products';

$res= mysql_query($sql_fruits);

$returnArray =array();
while($row =mysql_fetch_assoc($res))
{

array_push($returnArray,$row);
}

return $returnArray;
}

function getAllDates()
{

$sql_orderDates ='select date as id, DATE_FORMAT(date, "%d %M %Y") as name  , order_amount as price from `order` group by date';

$res= mysql_query($sql_orderDates);

$returnArray =array();
while($row =mysql_fetch_assoc($res))
{
// var_dump($row);
array_push($returnArray,$row);
}

return $returnArray;
}



function getAllUsers()
{

$sql_fruits ='select  customer_id as id, username as name  , 0 as price from customer';

$res= mysql_query($sql_fruits);

$returnArray =array();
while($row =mysql_fetch_assoc($res))
{

array_push($returnArray,$row);
}

return $returnArray;
}



function PrepareOrderpage($orderObject){
	$lastOrderId=0;
	$dateString = $orderObject[0]['date'] ;
	$html ='<h2 class="dateHeadin"> Order For  '. date("d M Y", strtotime($dateString)).' </h2><div class="orderDetails"><ul><li><div><ul>';
	$rowsCount = count($orderObject);
	$ulopen ='no';
	
	$subTotal =0;
	
	foreach($orderObject as $keyId => $orderRow) 	{
if($keyId ==0  || $orderRow['order_id'] !=$lastOrderId)
	{ 
	$html .='</ul></div></li><li class="Order-Row"> <div class="heading"><div class="open status"></div><div class="orderId"> Order #'.$orderRow['order_id'].' - '.$orderRow['username'].'</div> </div> <div class="Order_items"><ul>'; $ulopen='yes';
} 
				$html.=' <li id="fruit_'.$orderRow['order_id'].'" class="odd"><div class="name"> '.$orderRow['product_name'].' </div> <div class="price"> '.$orderRow['product_price'].' </div></li>';
					$subTotal = 	$subTotal + $orderRow['product_price'];
	
	 $nextkeyId =$keyId+1;

	 if($keyId == $rowsCount || $orderRow['order_id'] != $orderObject[$nextkeyId]['order_id'] ) {  
	 $html.=' <li id="subtotal" class="odd"><div class="name">  Sub Total </div> <div class="price"> '.$subTotal.' </div></li>';  $subTotal =0;
	}

	
	 if($keyId >=1) {
	 
	 	 if($keyId == $rowsCount || $orderRow['order_id'] != $orderObject[$keyId-1]['order_id'] ) {  
	//  $html.=' <li id="subtotal" class="odd"><div class="name">  Sub Total </div> <div class="price"> '.$subTotal.' </div></li>';
	 $html .'</ul></div></li>';
	 $subTotal =0;
	 }
	 
	 }
	 $lastOrderId =  $orderRow['order_id'] ;
	}
	
	$html .='</ul></div>';
	echo $html;
}
?>
