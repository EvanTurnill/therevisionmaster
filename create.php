<?PHP
session_start();
$page = "create";
$_SESSION['previous_location'] = $page;
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

/*check if has been to createrevision cards to enter topic etc. If not, send them there*/
if(empty($_SESSION['topiclog']))
{
    $fgmembersite->RedirectToURL("createrevisioncards.php");
    exit;
}


$_SESSION['user']=$fgmembersite->UserName();
$user_name= $_SESSION['user'];
?>
<?php

$title = "RevisionMaster Create your own";
$metaD = "Create your own revisioncards individually";
include 'inc/header.php';

?>
<div id='fg_membersite_content'>

<?php


// define variables and set to empty values
$user = $userErr = $topic = $topicErr = "";
$question = $questionErr = $answer = $answerErr = "";
$email = $emailErr = "";

require_once 'inc/validate.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$user = user_test($_POST['user'])[0];
$userErr = user_test($_POST['user'])[1];
$topic = topic_test($_POST['topic'])[0];
$topicErr = topic_test($_POST['topic'])[1];
$question = question_test($_POST['question'])[0];
$questionErr = question_test($_POST['question'])[1];
$answer = answer_test($_POST['answer'])[0];
$answerErr = answer_test($_POST['answer'])[1];

}



?>
<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="create.php">
  <img src="img/create.jpg" alt="Create picture">
</a>
</div>

<div class="item2contact">
    <a href="create.php">
      <br><br>
<h1>Add a new question and answer to your topic.</h1>
</a>
</div>


<div class="item3contact">

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($user !="" && $userErr =="" && $topic !="" && $topicErr=="" && $question !="" && $questionErr =="" && $answer !="" && $answerErr==""){
    require_once 'inc/sendtodatabase.php';
    if ($confirminsert==1){
    $outputdatatext =  "<br><br>This is your new revision card:<br><br>";
    require_once 'inc/outputdata.php';
    }
  }
}

if ($confirminsert==0){
  $submitbuttontext="Add this question and answer to &nbsp;".$_SESSION["topiclog"];
  require_once 'inc/standardform.php';
}


if ($confirminsert==1){
?>
  <br>
  <button type="button" name="sametopic" id="sametopic" >Click to add another question to this topic!</button><br>
  <script type="text/javascript">
      document.getElementById("sametopic").onclick = function () {
          location.href = "create.php";
      };
  </script>
  <br>
<?php
}
?>
  <br>
  <button type="button" name="changetopic" id="changetopic" >Click to change topic!</button><br>
  <script type="text/javascript">
      document.getElementById("changetopic").onclick = function () {
          location.href = "createrevisioncards.php";
      };
  </script>
  <br><br>



</div>



</div>
</div>


<?php

include 'inc/footer.php';
?>
