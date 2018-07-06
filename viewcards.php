<?php
session_start();
$page = "viewcards";
$_SESSION['previous_location'] = $page;
require_once("./include/membersite_config.php");


$title = "View your selected cards";
$metaD = "RevisionMaster - view your selected cards";
include 'inc/header.php';
?>
<?php
if(isset($_POST['topichidden']))
{


 $_SESSION['prechoosentopic']=$_POST["topichidden"];

} else {
header('Location: revise.php');
}

$_SESSION['previous_location'] = $page;

?>


<script>
function showNextQuestion(str) {
  if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
  } else {
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
              document.getElementById("startrevise").style.display="none"
          }
      };
      xmlhttp.open("GET","getnextquestion.php?q="+str,true);
      xmlhttp.send();
  }
}
</script>

<script>
function showPreviousQuestion(str) {
  if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
  } else {
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }


      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
              if (document.getElementById("previous").value ==1){
                document.getElementById("previous").style.display = "none";
                document.getElementById("next").style.display = "inline";
              } else if (document.getElementById("previous").value ==10){
                document.getElementById("previous").style.display = "inline";
                document.getElementById("next").style.display = "none";
              } else {
                document.getElementById("previous").style.display = "inline";
                document.getElementById("next").style.display = "inline";
              }
          }
      };
      xmlhttp.open("GET","getpreviousquestion.php?q="+str,true);
      xmlhttp.send();
  }
}
</script>
<script>
function showQuestion() {
  document.getElementById("answertable").style.display = "none";
  document.getElementById("questiontable").style.display = "block";
  document.getElementById("showanswer").style.display = "inline";
  document.getElementById("showquestion").style.display = "none";
}
</script>
<script>
function showAnswer() {
  document.getElementById("answertable").style.display = "block";
  document.getElementById("questiontable").style.display = "none";
  document.getElementById("showanswer").style.display = "none";
  document.getElementById("showquestion").style.display = "inline";
}
</script>

<?php

if(isset($_SESSION['question'])){
  $_SESSION["question"] = 0;
}


?>



<div class="genbackground">
<div class="grid-container">

<div class="item1viewcards">
  <br>
  <p id="txtHint"><b>Questions about <?php echo $_SESSION['prechoosentopic'] ?> will be listed here...</b></p>
  <br>
  <button id="startrevise" style="display:inline"  class="button" type="button" name="next" onclick="showNextQuestion(1)">Start to revise!</button>
  <br>
  <p style="color:white;">oooooooooooooooopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopopop</p>
</div>






</div>
</div>



<?php


include 'inc/footer.php';
?>
