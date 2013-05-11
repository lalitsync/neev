<?php
include 'info.php';

// creating customers  table


if(isset($_REQUEST['refresh']))
{
$table_truncate =" TRUNCATE Table  `customer`";
mysql_query($table_truncate);


$table_truncate =" TRUNCATE Table  `order`";
mysql_query($table_truncate);


$table_truncate =" TRUNCATE Table  `order_items`";
mysql_query($table_truncate);

$table_truncate =" TRUNCATE Table  `products`";
mysql_query($table_truncate);


}



$mynewSQL ="
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(211) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ;
";

$rs= mysql_query($mynewSQL) or die(mysql_error());

// adding customers
$mynewSQL ="INSERT INTO `customer` (`customer_id`, `username`) VALUES
(1, 'arvind'),
(2, 'john'),
(3, 'ram'),
(4, 'sham'),
(5, 'victor'),
(6, 'laxmn'),
(7, 'dravid'),
(8, 'sachin'),
(9, 'vishal'),
(10, 'sita'),
(11, 'geeta'),
(12, 'rita'),
(13, 'alice'),
(14, 'gorge'),
(15, 'rohan');  ";

$rs= mysql_query($mynewSQL) or die(mysql_error());


// crating Products data 
$mynewSQL ="CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(211) NOT NULL,
  `product_price` decimal(11,0) NOT NULL,
  `product_image` varchar(211) NOT NULL,
  `comments` varchar(211) NOT NULL,
  PRIMARY KEY (`p_id`)
);" ;


$rs= mysql_query($mynewSQL) or die(mysql_error());


// adding products 
$mynewSQL ="INSERT INTO `products` (`p_id`, `product_name`, `product_price`, `product_image`, `comments`) VALUES
(1, 'apple', 140, 'img/apple.jpg', 'price is for one apple'),
(2, 'banana', 30, 'img/banana.jpg', 'price for dozones of banana'),
(3, 'brinjal', 40, 'img/brinjal.jpg', 'price per kg'),
(4, 'capsicum', 40, 'img/capsicum.jpg', ''),
(5, 'carrot', 60, 'img/carrot.jpg', 'price per kg'),
(6, 'grapes', 80, 'img/grapes.jpg', 'price per kg'),
(7, 'greenChilly', 20, 'img/greenChilly.jpg', 'price per kg'),
(8, 'ladiesfinger', 30, 'img/ladiesfinger.jpg', 'price per kg'),
(9, 'lemon', 100, 'img/lemon.jpg', 'price for 10 lemons'),
(10, 'mango.jpg', 600, 'img/mango.jpg', 'pirce for dozones of mangoes'),
(11, 'methi.jpg', 20, 'img/methi.jpg', 'price for bunch of methi'),
(12, 'orange.jpg', 100, 'img/orange.jpg', 'price per dozones of oranges'),
(13, 'papaya', 80, 'img/papaya.jpg', 'price of 2 papaya'),
(14, 'raddish', 0, 'img/raddish.jpg', 'price per kg'),
(15, 'redChilly', 50, 'img/redChilly.jpg', 'price per kg'),
(16, 'strawberries', 80, 'img/strawberries.jpg', 'price per kg'),
(17, 'watermelon', 50, 'img/watermelon.jpg', 'price of one watermelon'),
(18, 'coriander', 20, 'img/coriander.jpg', 'price per bunch of coriander'),
(19, 'springonion', 20, 'img/springonion.jpg', 'price per bunch of coriander');
";

$rs= mysql_query($mynewSQL) or die(mysql_error());


$mynewSQL ="CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_amount` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ;";
$rs= mysql_query($mynewSQL) or die(mysql_error());

$mynewSQL ="
INSERT INTO `order` (`order_id`, `customer_id`, `status`, `date`, `order_amount`) VALUES
(1, 1, 1, '2013-05-11', 360),
(2, 1, 1, '2013-04-11', 280),
(3, 6, 1, '2013-05-09', 80),
(4, 9, 1, '2013-05-11', 40),
(5, 1, 1, '2013-05-11', 40),
(6, 1, 1, '2013-05-11', 40),
(7, 1, 1, '2013-05-11', 40),
(8, 1, 1, '2013-05-11', 40),
(9, 1, 1, '2013-05-11', 80),
(10, 1, 1, '2013-05-11', 80),
(11, 1, 1, '2013-05-11', 80),
(12, 1, 1, '2013-05-12', 80),
(13, 1, 1, '2013-05-12', 140);
";
$rs= mysql_query($mynewSQL) or die(mysql_error());




$mynewSQL ="CREATE TABLE IF NOT EXISTS `order_items` (
  `entity_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_id`)
)  ;
";



$rs= mysql_query($mynewSQL) or die(mysql_error());



$mynewSQL ="INSERT INTO `order_items` (`entity_id`, `order_id`, `item_id`) VALUES
(1, 1, 3),
(2, 1, 1),
(3, 1, 4),
(4, 1, 6),
(5, 1, 5),
(6, 2, 3),
(7, 2, 1),
(8, 2, 4),
(9, 2, 5),
(10, 3, 3),
(11, 3, 4),
(12, 4, 4),
(13, 6, 4),
(14, 5, 4),
(15, 7, 4),
(16, 8, 4),
(17, 9, 4),
(18, 9, 3),
(19, 10, 4),
(20, 10, 3),
(21, 11, 4),
(22, 11, 3),
(23, 12, 4),
(24, 12, 3),
(25, 13, 1); ";
$rs= mysql_query($mynewSQL) or die(mysql_error());

header('location:index.php');