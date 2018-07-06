<?php
//linked to by edit.php
session_start();

 $page = "editcards";
 $title = "Edit your cards";
 $metaD = "RevisionMaster edit your cards";
 include 'inc/header.php';


$_SESSION['previous_location'] = $page;

$topic=$_SESSION["topiclog"];

if (isset ($_POST['idVar'])){
  $_SESSION['id']=$_POST['idVar'];
}

 require_once("./include/membersite_config.php");

 if(!$fgmembersite->CheckLogin())
 {
     $fgmembersite->RedirectToURL("login.php");
     exit;
 }

 $_SESSION['user']=$fgmembersite->UserName();
 $user= $_SESSION['user'];

 ?>
 <div class="genbackground">
 <div class="grid-container">

 <div class="item1contact">
     <a href="editcards.php">
   <img src="img/edit.jpg" alt="Edit picture">
 </a>
 </div>

 <div class="item2contact">
     <a href="editcards.php">

 <h1>Edit your card!</h1>
 </a>
 <?php
 //if (!($user !="" && $userErr =="" && $topic !="" && $topicErr=="" && $question !="" && $questionErr =="" && $answer !="" && $answerErr=="")){
?>
 <p>Previous version of the revision card:</p>

<?php
//needs $_SESSION['id'] and $user and $outputdatatext

$outputdatatext="";
require "inc/outputbyid.php";
//}
?>

<br><br>
 </div>


 <div class="item3contact">


   <?php


   require_once 'inc/validate.php';

   if (isset($_POST['submitstandardform'])){

     $user = user_test($_POST['user'])[0];
     $userErr = user_test($_POST['user'])[1];
     $topic = topic_test($_POST['topic'])[0];
     $topicErr = topic_test($_POST['topic'])[1];
     $question = question_test($_POST['question'])[0];
     $questionErr = question_test($_POST['question'])[1];
     $answer = answer_test($_POST['answer'])[0];
     $answerErr = answer_test($_POST['answer'])[1];

     if ($user !="" && $userErr =="" && $topic !="" && $topicErr=="" && $question !="" && $questionErr =="" && $answer !="" && $answerErr==""){
       require_once 'inc/amenddatabase.php';
       if ($confirminsert==1){
        $outputdatatext = "This is your amended card:<br><br>";

       require 'inc/outputdata.php';

       }
     }
   }


   if (!($user !="" && $userErr =="" && $topic !="" && $topicErr=="" && $question !="" && $questionErr =="" && $answer !="" && $answerErr=="")){
     $submitbuttontext="Amend the question and answer.";
     require_once 'inc/standardform.php';
   }
   ?>
     <br>
     <button class="button" type="button" name="sametopic" id="sametopic" >Click to amend another question</button><br>
     <script type="text/javascript">
         document.getElementById("sametopic").onclick = function () {
             location.href = "edit.php";
         };
     </script>
     <br>



 </div>
 </div>
 </div>

 <?php
 include 'inc/footer.php';
 ?>
