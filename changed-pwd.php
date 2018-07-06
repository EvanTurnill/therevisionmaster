<?php
session_start();
$previous_location = $_SESSION['previous_location'];
?>
<?php
$page = "changed-pwd";
$title = "Password changed";
$metaD = "Welcome to RevisionMaster";
include 'inc/header.php';

require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>

    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>


<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="register.php">
  <img src="img/register.jpg" alt="Register picture">
</a>
</div>

<div class="item2contact">


  <div id='fg_membersite_content'>
  <h2>Changed password</h2>
  Your password is updated!

  <p>
  <a href='logout.php'>logout</a>
  </p>

  </div>
</div>






</div>
</div>

<?php


include 'inc/footer.php';
?>
