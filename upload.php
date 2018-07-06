<?PHP
session_start();
require_once("./include/membersite_config.php");

$page = "upload";
$_SESSION['previous_location'] = $page;

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}


$title = "upload";
$metaD = "Upload your revision cards";
include 'inc/header.php';

$_SESSION['previous_location'] = $page;
$_SESSION['user']=$fgmembersite->UserName();
$user= $_SESSION['user'];
?>

<div id='fg_membersite_content'>

<?php
//add if loop to ensure no attempt to reload data on submission of form
if (empty($_POST['submitthis'])){

  //include the file that loads the PhpSpreadsheet classes
  require 'vendor/autoload.php';

  //create directly an object instance of the IOFactory class, and load the xlsx file
  //$target_dir="uploads/";
  $fxls = $_FILES["fileToUpload"]["tmp_name"];
  //add in testing similar to uploads.php checking right sort of spreadsheet etc
  // Check file size
  $uploadOk = 1;
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large. Maximum size is 0.5 mb.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Your file was not uploaded. Hit the back button and try a different file.";
  // if everything is ok, try to upload file
  } else {
        try {
        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fxls);
        } catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
          die('Error loading file: '.$e->getMessage());
        }
  }

  //read excel data and store it into an array
  $worksheet = $spreadsheet->getActiveSheet();
  $xls_data=$worksheet->toArray(null, true, true, true);

  } else {
    $xls_data=$_SESSION['xls_data'];
  }

  $nr = count($xls_data); //number of rows

  $user_err="";
  $topic_err="";
  $question_err="";
  $answer_err="";

  if(is_array($xls_data)){
    for ($row=1; $row<=$nr; ++$row) {
      $xls_data[$row]['C']= $_SESSION['topiclog'];
      $xls_data[$row]['D']= $user;
    }
  }

  $error_sum=0;
  require_once "inc/validate.php";

  if(is_array($xls_data)){
    for ($row=1; $row<=$nr; ++$row) {
      $question_result=question_test($xls_data[$row]['A']);
      $answer_result=answer_test($xls_data[$row]['B']);
      $topic_result=topic_test($xls_data[$row]['C']);
      $user_result=user_test($xls_data[$row]['D']);
      $concat_err = $user_result[1].$topic_result[1].$question_result[1].$answer_result[1];
      if ($concat_err!= ""){
        $xls_data[$row]['E']=$concat_err;
        $xls_data[$row]['F']=1;
        $error_sum+=1;
      }else{
        $xls_data[$row]['E']="Format correct.";
        $xls_data[$row]['F']=0;
      }
    }
  }

  //ensure the table below has rows a different colour if there is an error in that row


  $html_tb ='<table class="fulltable" border="1"><tr>
                                  <th>User</th>
                                  <th>Topic</th>
                                  <th>Question</th>
                                  <th>Answer</th>
                                  <th>Format status</th>
                               </tr>';
  for($row = 1; $row <= $nr; $row++){
    if ($xls_data[$row]['F'] == 0){
      $html_tb .='<tr><td>'.nl2br(htmlentities($xls_data[$row]['D'])).'</td><td>'.nl2br(htmlentities($xls_data[$row]['C'])).'</td><td>'.
      nl2br(htmlentities($xls_data[$row]['A'])).'</td><td>'.nl2br(htmlentities($xls_data[$row]['B'])).'</td><td>'.$xls_data[$row]['E'].'</td></tr>';

    }else{
      $html_tb .='<tr class="errortwo"><td>'.nl2br(htmlentities($xls_data[$row]['D'])).'</td><td>'.nl2br(htmlentities($xls_data[$row]['C'])).'</td><td>'.
      nl2br(htmlentities($xls_data[$row]['A'])).'</td><td>'.nl2br(htmlentities($xls_data[$row]['B'])).'</td><td>'.$xls_data[$row]['E'].'</td></tr>';
    }
  }

  $html_tb .='</table>';
  ?>
  <div class="genbackground">
  <div class="grid-container">

  <div class="item1contact">
    <a href="upload.php">
    <img src="img/spreadsheet.png" alt="Spreadsheet picture">
    </a>
  </div>

  <div class="item2contact">
    <a href="upload.php">
    <h2>Check you are happy with your uploaded revision cards.</h2>
<?php
    if ($error_sum != 0){
      echo "There are one or more errors in the table.";
      echo "<br>";
      echo "Total rows with at least one error = ".$error_sum;
      echo "<br>";
      echo "Please amend your spreadsheet and try again.";
      echo "<br>";
     }else{
       if (empty($_POST['submitthis'])){

    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <p>If you are happy with your revision cards:</p>
      <input class="button" type="submit" name="submitthis" value="click here" id="submitthis" style="display:inline-block">
      <br><br>
    </form>
    <?php

     }
   }

   ?>
    </a>
  </div>


  <div class="item3contact">
  <?php
  if (empty($_POST['submitthis'])){
    echo $html_tb;
  }

   if ($error_sum != 0){
     echo "There are one or more errors in the table.";
     echo "<br>";
     echo "Total rows with at least one error = ".$error_sum;
     echo "<br>";
    }else{
      if (empty($_POST['submitthis'])){

   ?>

   <br>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <br>
     <p>If you are happy with your revision cards:</p>
     <input class="button" type="submit" name="submitthis" value="click here" id="submitthis" style="display:inline-block">
     <br><br>
   </form>
   <?php

    }
  }


  $_SESSION['xls_data']=$xls_data;

   if (isset($_POST['submitthis'])){
   $confirminsert=0;
   include 'inc/database.php';
   //attempt connect
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   // Check connection
   if($conn === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   // Prepare an insert statement
   $sql1 = "INSERT INTO revisioncards (user, topic, question, answer) VALUES (?, ?, ?, ?)";

   if ($stmt = mysqli_prepare($conn, $sql1)){
   // Bind variables to the prepared statement as parameters
   mysqli_stmt_bind_param($stmt, "ssss", $user, $topic, $question, $answer);

  $add_total_insertions=0;
  $add_errors_executing=0;



$xls_data=$_SESSION['xls_data'];

   // Set parameters and execute
   if(is_array($xls_data)){
       for ($row = 1; $row<=$nr; $row++) {
           $user = $xls_data[$row][D];
           $topic = $xls_data[$row][C];
           $question = $xls_data[$row][A];
           $answer = $xls_data[$row][B];
            // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
             $add_total_insertions+=1;
           }else{
             $add_errors_executing+=1;
           }
         }
       }
           echo "<br><br>";
           echo $add_total_insertions."&nbsp;records out of &nbsp;".$nr."&nbsp;were uploaded successfully.";
           echo "<br><br>";


     }else{
      echo "ERROR: Could not prepare query: $sql1. " . mysqli_error($conn);
    }
    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);

  //explain how many rows uploaded and how many failed


  }

?>

</div>
</div>
</div>

 <?php

 include 'inc/footer.php';
 ?>
