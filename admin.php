<?php
include_once 'info.php';
include 'functions.php';
?>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<title>Lalit's App :: Admin Order Page</title>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
</head>
<body class="app-wrapper admin">
<div class="content round-border">
  <div class="notification"></div>
  <div class="message"></div>
  <div class="Form-holder admin">
    <div class="placeholder">
      <fieldset>
      <ul>
        <li>
          <label class="label">Admin Order Page</label>
        </li>
      </ul>
      </fieldset>
      <fieldset class="dateholder">
      <ul class="date-admin">
        <li>
          <label class="caption">Select date</label>
          </li>
          <li>
          <div class="datehandler_holder  round-border">
          <span class="selected-date"> </span>
          <select id="datehandler" class="round-border hiden">
            <?php   echo makeOptions(getAllDates());  ?>
          </select>
          </div>
        </li>
      </ul>
      </fieldset>
      
      <div class="order_list"> 
      &nbsp;
      </div>
      
      <div class="snap_shot round-border"> 
      <div class="snap_shot_heading"> SnapShot</div>
            <div class="snap_shot_data"> SnapShot</div>
      &nbsp;
      </div>
      
      
    </div>
  </div>
</div>

<script src="scripts/jquery.min.js" type="text/javascript"></script>
<script src="scripts/cartactions.js" type="text/javascript"></script></body>