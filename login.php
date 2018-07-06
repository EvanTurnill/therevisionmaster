<?php
session_start();
$previous_location = $_SESSION['previous_location'];

require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login()){
     if ($previous_location==""){
       $fgmembersite->RedirectToURL("index.php");
     }else{
        $fgmembersite->RedirectToURL($previous_location.".php");
     }
   }

}


?>
<?php
$page = "login.php";
$title = "login";
$metaD = "Welcome to RevisionMaster please login";
include 'inc/header.php';
?>


<head>


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
  <!-- Form Code Start -->
  <div id='fg_membersite' style="margin:auto auto; display:inline-block">
  <form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
  <fieldset >
  <legend>Login</legend>

  <input type='hidden' name='submitted' id='submitted' value='1'/>

  <div class='short_explanation'>* required fields</div>

  <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
  <div class='container'>
      <label for='username' >UserName*:</label><br/>
      <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
      <span id='login_username_errorloc' class='error'></span>
  </div>
  <div class='container'>
      <label for='password' >Password*:</label><br/>
      <input type='password' name='password' id='password' maxlength="50" /><br/>
      <span id='login_password_errorloc' class='error'></span>
  </div>

  <div class='container'>
      <input type='submit' name='Submit' value='Submit' />
  </div>
  <div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
  </fieldset>
  </form>
  <br>
  <!-- client-side Form Validations:
  Uses the excellent form validation script from JavaScript-coder.com-->

  <script type='text/javascript'>
  // <![CDATA[

      var frmvalidator  = new Validator("login");
      frmvalidator.EnableOnPageErrorDisplay();
      frmvalidator.EnableMsgsTogether();

      frmvalidator.addValidation("username","req","Please provide your username");

      frmvalidator.addValidation("password","req","Please provide the password");

  // ]]>
  </script>
  </div>
  <!--
  Form Code End (see html-form-guide.com for more info.)
  -->
</div>


<div class="item3contact">

  <p>Haven't registered yet? </p>
    <button id="myButton" class="float-left submit-button" >To register click here</button>

    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
            location.href = "register.php";
        };
    </script>

</div>



</div>
</div>






<?php


include 'inc/footer.php';
?>
