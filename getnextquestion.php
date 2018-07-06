<?php
session_start();
require_once("./include/membersite_config.php");
$_SESSION['previous_location'] = "viewcards.php";


$_SESSION['user']=$fgmembersite->UserName();
$user=$_SESSION['user'];
?>


<html>
<head>
	<link rel="stylesheet" href="stylesheets/style.css">
  <style>


</style>
</head>
<body>

<?php

$prechoosentopic=$_SESSION["prechoosentopic"];
$q = intval($_GET['q']);
$_SESSION["question"] += $q;

$offsetby = $_SESSION["question"]-1;


include 'inc/database.php';


//counttopics needs $prechoosentopic to be defined
require_once "inc/counttopics.php";

//outputcardcontent needs $prechoosentopic and $offsetby
require_once "inc/outputcardcontent.php";

if ($_SESSION['question']==1 && $totalrows==1){

?>
<button class="button" id="next" style="display:none" value="<?php echo $_SESSION["question"]?>" type="button" name="next" onclick="showNextQuestion(1)">Next</button>

<?php
echo "This topic only has one question and one answer.<br><br>";
}elseif ($_SESSION['question']==1 && $totalrows!=1){
?>
<button class="button" id="next" style="display:inline-block" value="<?php echo $_SESSION["question"]?>" type="button" name="next" onclick="showNextQuestion(1)">Next</button><br><br>
<?php
} elseif ($_SESSION['question']==$totalrows && $totalrows!=1){
?>
<button class="button" id="previous" style="display:inline" value="<?php echo $_SESSION["question"]?>" type="button" name="previous" onclick="showNextQuestion(-1)">Previous</button><br><br>
<?php
} else {
?>
<button class="button" id="previous" style="display:inline" value="<?php echo $_SESSION["question"]?>" type="button" name="previous" onclick="showNextQuestion(-1)">Previous</button>
<button class="button" id="next" style="display:inline" value="<?php echo $_SESSION["question"]?>" type="button" name="next" onclick="showNextQuestion(1)">Next</button><br><br>


<?php

}
?>
<button class="button" id="showanswer" style="display:inline" type="button" name="showanswer" onclick="showAnswer()">Reveal answer!</button>
<button class="button" id="showquestion" style="display:none" type="button" name="showquestion" onclick="showQuestion()">Look back at question</button>
<br>
<?php
?>
</body>
</html>
