<?php
    session_start();
    $page = "edit";
    $_SESSION['previous_location'] = $page;

    require_once("./include/membersite_config.php");

    if(!$fgmembersite->CheckLogin())
    {
        $fgmembersite->RedirectToURL("login.php");
        exit;
    }

?>
<?php

$title = "Edit your questions and answers";
$metaD = "RevisionMaster edit your questions and answers";
include 'inc/header.php';
?>


<script>
function editCard(id) {
document.getElementById('idVar').value= id;
document.getElementById('myform').submit();
}
</script>

<script>
function deleteCard(str) {
    if (str == "") {
        document.getElementById("txtholder").innerHTML = "";
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
                document.getElementById("txtholder").innerHTML = this.responseText;
                document.getElementById("editdeltab").style.display = "none";

            }
        };
        xmlhttp.open("GET","deletecard.php?q="+str,true);
        xmlhttp.send();

    }
  }
</script>



<script>
function confirmDelete(str) {
    if (str == "") {
        document.getElementById("txtholder").innerHTML = "";
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
                document.getElementById("txtholder").innerHTML = this.responseText;
                //document.getElementsByClassName("fulltable").style.display = "none";
            }
        };
        xmlhttp.open("GET","confirmdelete.php?q="+str,true);
        xmlhttp.send();
    }
  }
</script>


<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

$_SESSION['user']=$fgmembersite->UserName();

$user_name= $_SESSION['user'];
?>

<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="edit.php">
  <img src="img/edit.jpg" alt="Edit picture">
</a>
</div>

<div class="item2contact">
    <a href="edit.php">
<h2>Choose the topic you want to edit or delete. You can only select a topic you created.</h2>
</a>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <select name="choosetopic" id="choosetopic" >
    <option value="selecttopic">--- Please select ---</option>
    <?php
    //get prepared statements to recover this from database
    //needs $user_name
    require "inc/searchfortopicbyuser.php";

    ?>
  </select>
  <br><br>
  <input class="button" type="submit" id="submitnow" value="Find your questions and answers"><br><br>
</form>
</div>


<div class="item3contact">

  <?php
  $posted = $_POST['choosetopic'];

  if(empty($_POST) && isset($_SESSION["topiclog"])) {
    $topicVar=$_SESSION["topiclog"];
  }
  if ($posted != "selecttopic" and $posted!=""){
    $topicVar=$posted;
  }
//This is needed by standardform.php which is required by editcards.php
$_SESSION["topiclog"]=$topicVar;

if($topicVar!="" && $topicVar!=NULL){
    require 'inc/database.php';
    //attempt connect
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    $sql2 = "SELECT id, user, topic, question, answer, LEFT(question,50) AS question_fifty, LEFT(answer,50) AS answer_fifty FROM revisioncards
              WHERE topic=?";
    $stmt = mysqli_prepare($conn, $sql2);

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, s , $topicVar);

    // Attempt to execute the prepared statement
    mysqli_stmt_execute($stmt);


  $result2 = mysqli_stmt_get_result($stmt);

  //create table if has not selected from drop down and clicked find questions and answers
  $html_tb ='<br><br><table class="fulltable" id="editdeltab"><tr>
                                  <th>Topic</th>
                                  <th>Question</th>
                                  <th>Answer</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                               </tr>';
  if ($result2->num_rows > 0) {
      // output data of each row
      while($row = $result2->fetch_assoc()) {

        //the insane button code is because each parameter in an onclick that is a string needs quotes round it.
              $html_tb .='<tr><td>'.nl2br(htmlentities($row["topic"])).'</td><td>'.
              nl2br(htmlentities($row["question_fifty"])).'</td><td>'.nl2br(htmlentities($row["answer_fifty"])).'</td><td>
              <button class="button" id="edit" style="display:inline" value="'.$row["id"].'" type="button" name="edit" onclick="editCard(this.value)">edit</button></td><td>
              <button class="button" id="delete" style="display:inline" value="'.$row["id"].'" type="button" name="delete" onclick="deleteCard(this.value)">delete</button></td></tr>';
            }


          $html_tb .='</table>';

          echo $html_tb;

      } else {
      //echo "0 results";
  }

  // Close statement
  mysqli_stmt_close($stmt);

  // Close connection
  mysqli_close($conn);

}

  ?>

  <br>
  <div id="txtholder"><p></p></div>
  <br>
  <!-- hidden form to send info regarding selected entry to edit -->
  <form hidden method="post" id="myform" name="myform" action="editcards.php">
      <input type="text" name="idVar" id="idVar" value=""></input>
      <!--<input type="text" name="topicVar" id="topicVar" value=""></input>
      <input type="text" name="questionVar" id="questionVar" value=""></input>
      <input type="text" name="answerVar" id="answerVar" value=""></input>-->
      <input type="submit" value="Send form!">
  </form>
</div>


</div>
</div>

<?php
include 'inc/footer.php';
?>
