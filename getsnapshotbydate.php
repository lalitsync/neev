<?php
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

	include 'info.php';
	include 'functions.php';
	$date = $_REQUEST['date'];
	$orderArray =array();
	$sqlOrder ="SELECT sum(`order_amount`) as total ,max(`order_amount`) as largest, c.username as customer ,  DATE_FORMAT(date, '%d %M %Y') as datestring  FROM `order` o left join  order_items oi on o.order_id=oi.order_id  left join customer c on c.customer_id = o.customer_id where `date` = '$date' "; 
	// echo $sqlOrder;
	$result =mysql_query($sqlOrder) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result))	{
			// array_push($orderArray,$row);
			$resultHtml ='<div class="snap_shot_detail"> <ul> <li> Total Order For  '.$row['datestring'].' is <strong>  RS '.$row['total'].'</strong> </li>	<li> Largest Order Placed  By <strong> '.$row['customer'].'</strong> for <strong> RS  '.$row['largest'].' </strong></li></ul></div>';			
			
		}
		
		echo 			$resultHtml;
// 		PrepareOrderpage($orderArray);
	
?>