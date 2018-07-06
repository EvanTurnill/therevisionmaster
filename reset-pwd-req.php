<?PHP
require_once("./include/membersite_config.php");

$emailsent = false;
if(isset($_POST['submitted']))
{
   if($fgmembersite->EmailResetPasswordLink())
   {
        $fgmembersite->RedirectToURL("reset-pwd-link-sent.php");
        exit;
   }
}

?>
<?php
session_start();
$previous_location = $_SESSION['previous_location'];
?>
<?php
$page = "reset-pwd-req";
$title = "reset password request";
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
  <div id='fg_membersite'>
  <form id='resetreq' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
  <fieldset >
  <legend>Reset Password</legend>

  <input type='hidden' name='submitted' id='submitted' value='1'/>

  <div class='short_explanation'>* required fields</div>

  <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
  <div class='container'>
      <label for='username' >Your Email*:</label><br/>
      <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
      <span id='resetreq_email_errorloc' class='error'></span>
  </div>
  <div class='short_explanation'>A link to reset your password will be sent to the email address</div>
  <div class='container'>
      <input type='submit' name='Submit' value='Submit' />
  </div>

  </fieldset>
  </form>
  <!-- client-side Form Validations:
  Uses the excellent form validation script from JavaScript-coder.com-->

  <script type='text/javascript'>
  // <![CDATA[

      var frmvalidator  = new Validator("resetreq");
      frmvalidator.EnableOnPageErrorDisplay();
      frmvalidator.EnableMsgsTogether();

      frmvalidator.addValidation("email","req","Please provide the email address used to sign-up");
      frmvalidator.addValidation("email","email","Please provide the email address used to sign-up");

  // ]]>
  </script>

  </div>
</div>






</div>
</div>

<?php


include 'inc/footer.php';
?>
