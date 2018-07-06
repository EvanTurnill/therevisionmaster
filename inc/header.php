<?php
if(!isset($_SESSION)){ session_start(); }
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php

  if(isset($metaD) && !empty($metaD)) {
     echo $metaD;
  }
  else {
     echo "Some meta description";
  } ?>" />

<title><?php
if(isset($title) && !empty($title)) {
   echo $title;
}
else {
   echo "Default title tag";
} ?></title>

	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/header.css">
  <link rel="stylesheet" href="stylesheets/footer.css">
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<!--<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
<!--use of $pageName to get $page inside function scope -->
  <?php
    function echoSelectedClassIfRequestMatches($requestPage, $pageName)
    {
        if (isset($pageName) && !empty($pageName) && ($pageName == $requestPage))
            echo 'class="selected"';
    }
?>

<?php
require_once("./include/membersite_config.php");

$_SESSION['status'] = 'loggedout';
if($fgmembersite->CheckLogin())
{
    $_SESSION['status'] ='loggedin';
}

		function echodisplay($loggedinorout)
    {
        if ($_SESSION['status']==$loggedinorout){
            echo 'display:none';
					}
    }
    ?>
<script>
function showmenu() {
	var x = document.getElementById("hiddennav");
	if (x.style.display === "none") {
		 x.style.display = "block";
	} else {
		 x.style.display = "none";
	}
}
</script>
<!--
<style>
.error {color: #FF0000;}
</style>
-->

</head>
<body>


  <header class="header">

    <div class="header-limiter">

      <h1><a href="index.php"><span>The</span>Revision<span>Master</span></a></h1>
			<a class="to_nav" onclick="showmenu()">Menu</a>

      <nav id="headernav">
        <a href="index.php" <?php echoSelectedClassIfRequestMatches("index", $page)?>>Home</a>
        <a href="revise.php" <?php echoSelectedClassIfRequestMatches("revise", $page)?>>Revise</a>
        <a href="createrevisioncards.php" <?php echoSelectedClassIfRequestMatches("createrevisioncards", $page)?>>Create</a>
				<a href="edit.php" <?php echoSelectedClassIfRequestMatches("edit", $page)?>>Edit</a>
				<a href="about.php" <?php echoSelectedClassIfRequestMatches("about", $page)?>>About</a>
        <a href="faq.php" <?php echoSelectedClassIfRequestMatches("faq", $page)?>>Faq</a>
        <a href="contact.php" <?php echoSelectedClassIfRequestMatches("contact", $page)?>>Contact</a>
        <a id="login" style="<?php echodisplay('loggedin')?>" href="login.php" <?php echoSelectedClassIfRequestMatches("login", $page)?>>Log in</a>
				<a id="logout" style="<?php echodisplay('loggedout')?>" href="logout.php" <?php echoSelectedClassIfRequestMatches("logout", $page)?>>Log out</a>
      </nav>


    </div>


  </header>

	<div class="hiddenmenu">


		<nav id="hiddennav" style="display:none">
			<ul>
				<li><a href="index.php" <?php echoSelectedClassIfRequestMatches("index", $page)?>>Home</a></li>
				<li><a href="revise.php" <?php echoSelectedClassIfRequestMatches("revise", $page)?>>Revise</a></li>
				<li><a href="createrevisioncards.php" <?php echoSelectedClassIfRequestMatches("create", $page)?>>Create</a></li>
				<li><a href="edit.php" <?php echoSelectedClassIfRequestMatches("edit", $page)?>>Edit</a></li>
				<li><a href="about.php" <?php echoSelectedClassIfRequestMatches("about", $page)?>>About</a></li>
				<li><a href="faq.php" <?php echoSelectedClassIfRequestMatches("faq", $page)?>>Faq</a></li>
				<li><a href="contact.php" <?php echoSelectedClassIfRequestMatches("contact", $page)?>>Contact</a></li>
				<li><a id="login" style="<?php echodisplay('loggedin')?>" href="login.php" <?php echoSelectedClassIfRequestMatches("login", $page)?>>Log in</a></li>
				<li><a id="logout" style="<?php echodisplay('loggedout')?>" href="logout.php" <?php echoSelectedClassIfRequestMatches("logout", $page)?>>Log out</a></li>

			<ul>
		</nav>
</div>
