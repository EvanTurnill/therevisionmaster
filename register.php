<?php
require("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.php");
   }
}
$page = "register";
$title = "register";
$metaD = "Welcome to RevisionMaster please register here";
include 'inc/header.php';
?>

    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>



<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="register.php">
  <img src="img/register.jpg" alt="Register picture">
</a>
</div>

<div class="item2contact">
  <!-- Form Code Start -->
  <div id='fg_membersite' style="margin:auto auto; display:inline-block">
  <form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
  <fieldset >
  <legend>Register</legend>

  <input type='hidden' name='submitted' id='submitted' value='1'/>

  <div class='short_explanation'>* required fields</div>
  <input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

  <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
  <div class='container'>
      <label for='name' >Your Full Name*: </label><br/>
      <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name'); ?>' maxlength="50" /><br/>
      <span id='register_name_errorloc' class='error'></span>
  </div>
  <div class='container'>
      <label for='email' >Email Address*:</label><br/>
      <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email'); ?>' maxlength="50" /><br/>
      <span id='register_email_errorloc' class='error'></span>
  </div>
  <div class='container'>
      <label for='username' >UserName*:</label><br/>
      <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username');?>' maxlength="50" /><br/>
      <span id='register_username_errorloc' class='error'></span>
  </div>
  <div class='container' style='height:80px;'>
      <label for='password' >Password*:</label><br/>
      <div class='pwdwidgetdiv' id='thepwddiv' ></div>
      <noscript>
      <input type='password' name='password' id='password' maxlength="50" />
      </noscript>
      <div id='register_password_errorloc' class='error' style='clear:both'></div>
  </div>

  <div class='container'>
      <input type='submit' name='Submit' value='Submit' />
  </div>

  </fieldset>
  </form>
  <!-- client-side Form Validations:
  Uses the excellent form validation script from JavaScript-coder.com-->

  <script type='text/javascript'>
  // <![CDATA[
      var pwdwidget = new PasswordWidget('thepwddiv','password');
      pwdwidget.MakePWDWidget();

      var frmvalidator  = new Validator("register");
      frmvalidator.EnableOnPageErrorDisplay();
      frmvalidator.EnableMsgsTogether();
      frmvalidator.addValidation("name","req","Please provide your name");

      frmvalidator.addValidation("email","req","Please provide your email address");

      frmvalidator.addValidation("email","email","Please provide a valid email address");

      frmvalidator.addValidation("username","req","Please provide a username");

      frmvalidator.addValidation("password","req","Please provide a password");

  // ]]>
  </script>

  <!--
  Form Code End (see html-form-guide.com for more info.)
  -->
</div>
</div>


<div class="item3contact">

  <p>Haven't registered yet? It is free, just complete the form above and you'll be able to create your own revision cards. </p>

</div>



</div>
</div>

<?php


include 'inc/footer.php';
?>
