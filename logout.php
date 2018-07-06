<?php
session_start();
$previous_location = $_SESSION['previous_location'];
?>
<?php
$page = "logout";
$title = "logout";
$metaD = "Goodbye from RevisionMaster";
include 'inc/header.php';
?>
<?PHP
require_once("./include/membersite_config.php");

$fgmembersite->LogOut();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>


<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="login.php">
  <img src="img/login.png" alt="login picture">
</a>
</div>

<div class="item2contact">
    <a href="login.php">
<h1>You have logged out</h1>
</a>
</div>


<div class="item3contact">

  <p>
  <a href='login.php'>Login Again</a>
  </p>
</div>



</div>
</div>






<?php


include 'inc/footer.php';
?>
