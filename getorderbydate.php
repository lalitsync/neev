<?php
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

	include 'info.php';
	include 'functions.php';
	$date = $_REQUEST['date'];
	$orderArray =array();
	$sqlOrder ="SELECT * FROM `order` o left join  order_items oi on o.order_id=oi.order_id  left join  products p  on oi.item_id=p.p_id  left join customer c on c.customer_id = o.customer_id  where  o.`date` = '$date'"; 
	// echo $sqlOrder;
	$result =mysql_query($sqlOrder) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result))	{
			array_push($orderArray,$row);
		}
		PrepareOrderpage($orderArray);
	
?>