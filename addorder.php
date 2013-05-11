<?php

include 'info.php';
$user_id = $_REQUEST['user_id'];
$allItems = $_REQUEST['itemsdata'];
$ordertotal = $_REQUEST['ordertotal'];

$items = explode(":",$allItems);


if(count($items)>=1 ) {   

$sqlOrder ="INSERT INTO  `order` (`order_id` ,`customer_id` ,`status` , `date`,`order_amount`) VALUES (NULL, '$user_id' ,'1',now(), $ordertotal)";

mysql_query($sqlOrder) or die(mysql_error());
 }
 $sql_part = array();
foreach( $items as $item )
{
$itemDetail =  explode(',',$item);
 var_dump($itemDetail);
array_push($sql_part ," (NULL, LAST_INSERT_ID(),'$itemDetail[0]') ");

}

$sql_addorderItem ="insert into `order_items` (`entity_id` ,`order_id` ,`item_id`) VALUES".implode(",",$sql_part) .';';
// echo $sql_addorderItem;
mysql_query($sql_addorderItem) or die(mysql_error());



?>