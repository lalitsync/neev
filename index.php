<?php
include_once 'info.php';
include 'functions.php';
?><html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<title>Lalit's App</title>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
</head>
<body class="app-wrapper">
<div class="content round-border">
  <div class="notification"></div>
  <div class="message"></div>
  <div class="Form-holder">
    <div class="placeholder home">
      <fieldset class="page-title">
      <ul>
        <li>
          <label class="label">Fruits Bazar</label>
        </li>
      </ul>
      </fieldset>
      
      <fieldset>
      <ul>
        <li>
          <label class="caption">Select A Customer</label>
        </li>
         <li>
         <div class="customerhandler_holder  round-border">
          <span class="selected-customer"> &nbsp; </span>
          <select id="handle" class="round-border hiden">
            <?php   echo makeOptions(getAllUsers());  ?>
          </select>
          </div>
        </li>
      </ul>
      </fieldset>
    </div>
  </div>
  <div class="cart">
<div class="allProducts box large">
<div class="heading"> Available fruits</div>
<div class='productList'>
 <?php   echo getAllFruits();  ?>
 </div>
</div>
<div class="actions box small"> 
      <ul>
        <li>
			<button class="add round-border"> <span> Add > </span></button>
        </li>
        <li>
			<button class="remove round-border"> <span> < remove </span></button>
        </li>
        <li>
			<button class="submit round-border"> <span> submit </span></button>
        </li>
      </ul>
           
</div>
<div class="selected box large">
<div class="heading"> Order Bsket</div>
<div class='productList'></div>

</div>
 <div class="clear"></div>
  </div>
</div>
<script src="scripts/jquery.min.js" type="text/javascript"></script>
<script src="scripts/cartactions.js" type="text/javascript"></script></body>
</html>
