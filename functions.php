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

?>
