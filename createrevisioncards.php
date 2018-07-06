<?php
session_start();
$page = "createrevisioncards";
$_SESSION['previous_location'] = $page;
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{

    $fgmembersite->RedirectToURL('login.php');
    exit;
}

$title = "Create your own revision cards";
$metaD = "Choose to upload your revision cards individually or by spreadsheet";
include 'inc/header.php';
?>

<?php


$_SESSION['user']=$fgmembersite->UserName();
$user_name= $_SESSION['user'];
if(isset($_POST['submitnow'])){
    $_SESSION['choosenew'] = $_POST["choosenew"];
    $_SESSION['choosetopic'] = $_POST["choosetopic"];
    if ($_POST["upload"] == "individual"){

      $goto = "create.php";
    } else {

      $goto = "choosefile.php";
    }
    if ($_POST["neworexist"] == "newtopic"){
      $_SESSION['topiclog'] = $_POST['choosenew'];
    }else{
      $_SESSION['topiclog'] = $_POST['choosetopic'];
    }
  }
?>
<?php
$topic = $topicErr = "";
$existingtopicErr = $uploadchoiceErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["choosenew"]) && $_POST["neworexist"]=="newtopic") {
    $topicErr = "<br>Topic is required<br>";
  }elseif(isset($_POST["choosenew"]) && $_POST["neworexist"]=="newtopic") {
    $topic = $_POST["choosenew"];

    // check if user only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$topic)) {
    $topicErr = "<br>Only letters and white space allowed<br>";
    }
    if (strlen($topic)>=40){
      $topicErr = "<br>Maximum length of topic is 40 characters<br>";
    }

    //check if already existing

    //needs $topic outputs $topicErr
require "inc/checktopicexists.php";

  }


  if (($_POST["choosetopic"]=="selecttopic")&&($_POST["neworexist"]!="newtopic")) {
    $existingtopicErr = "<br>Topic is required<br>";
  }

  if (empty($_POST["upload"])){
    $uploadchoiceErr = "<br>Upload choice is required<br>";
  }
}

 ?>

<!--hide or show various input options upon selecting radio button of new or existing-->
<script>
function newclick() {
  var newtopic = document.getElementById("newtopic");
  var choosetopic = document.getElementById("choosetopic");
  var choosenew = document.getElementById("choosenew");
  var enternew = document.getElementById("enternew");
  var enterexisting = document.getElementById("enterexisting")


  if (newtopic.checked ==true){
    choosenew.style.display = "inline";
    choosetopic.style.display = "none";
    enternew.style.display = "inline";
    enterexisting.style.display = "none";
  } else {
    choosenew.style.display = "none";
    choosetopic.style.display = "inline";
    enternew.style.display = "none";
    enterexisting.style.display = "inline";
  }
}

</script>

<div id='fg_membersite_content'>
<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="createrevisioncards.php">
  <img src="img/create.jpg" alt="Create picture">
</a>
</div>

<div class="item2contact">
    <a href="createrevisioncards.php">
      <br>
<h1>Create your own revision cards!</h1>
</a>
</div>


<div class="item3contact" style="text-align:center;">

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br>New or existing topic:<br>
                         <input type="radio" name="neworexist" value="newtopic" id="newtopic" onclick="newclick()" <?php if (isset($_POST['neworexist']) && $_POST['neworexist'] == 'newtopic') echo 'checked="checked"';?>>new<br>
                         <input type="radio" name="neworexist" value="existingtopic" id="existingtopic" onclick="newclick()" <?php if (isset($_POST['neworexist']) && $_POST['neworexist'] == 'existingtopic') echo 'checked="checked"';?>>existing
                         <p id="enternew" style="display:none"><br>Enter new topic:</p>
                         <input type="text" name="choosenew" value="<?php echo $_SESSION["choosenew"];?>" id="choosenew" style="display:none"><br>
                         <p id="enterexisting" style="display:none">Select existing topic:</p>
                        <select name="choosetopic" id="choosetopic" style="display:none">
                        <option value="selecttopic">--- Please select ---</option>

  <?php
  //get prepared statements to recover this from database
  //needs $user_name
require "inc/searchfortopicbyuser.php";

  ?>


     </select>
     <span id="topicerrormessage" class="errortwo"><?php echo $topicErr;?></span>
     <span id="existingtopicerrormessage" class="errortwo"><?php echo $existingtopicErr;?></span>
     <br>Choose how to upload your cards:<br>
     <input type="radio" name="upload" value="individual"  id="individual" style="display:inline" <?php if (isset($_POST['upload']) && $_POST['upload'] == 'individual') echo 'checked="checked"';?>>individually<br>
     <input type="radio" name="upload" value="spreadsheet"  id="spreadsheet" style="display:inline" <?php if (isset($_POST['upload']) && $_POST['upload'] == 'spreadsheet') echo 'checked="checked"';?>>spreadsheet<br>
     <span id="uploadchoiceerrormessage" class="errortwo"><?php echo $uploadchoiceErr;?></span>
     <br><br>
     <input class="button" type="submit" name="submitnow" id="submitnow" style="display:inline">
     <br><br>
  </form>
</div>


  <?php
  //after submitting the form - show the choices made and any error messages
  if (isset($_POST["neworexist"]) && $_POST["neworexist"] == "newtopic"){
  ?>
  <script>
  var choosetopic = document.getElementById("choosetopic");
  var choosenew = document.getElementById("choosenew");
  var enternew = document.getElementById("enternew");
  var enterexisting = document.getElementById("enterexisting");

  choosenew.style.display = "inline";
  choosetopic.style.display = "none";
  enternew.style.display = "inline";
  enterexisting.style.display = "none";
  </script>
  <?php
  }
  ?>

  <?php
  if (isset($_POST["neworexist"]) && $_POST["neworexist"] == "existingtopic"){
  ?>
  <script>
  var choosetopic = document.getElementById("choosetopic");
  var choosenew = document.getElementById("choosenew");
  var enternew = document.getElementById("enternew");
  var enterexisting = document.getElementById("enterexisting")
  choosenew.style.display = "none";
  choosetopic.style.display = "inline";
  enternew.style.display = "none";
  enterexisting.style.display = "inline";
  </script>
  <?php
  }


//if everything is correct, go to the page for individual or spreadsheet upload as defined by $goto
  if ($uploadchoiceErr=="" && (($_POST["neworexist"]=="newtopic" && $topic !="" && $topicErr =="") or ($_POST["neworexist"]=="existingtopic" && $existingtopicErr !="<br>Topic is required<br>"))){
    ?>
    <script type="text/javascript">
            var goto = '<?php echo $goto;?>';
            location.href = goto;
    </script>
    <?php
  }
     ?>


</div>
</div>
</div>
</div>
<?php


include 'inc/footer.php';
?>
