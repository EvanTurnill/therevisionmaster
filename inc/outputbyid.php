<?php
//start_session();
require 'inc/database.php';
//attempt connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT  id, user, topic, question, answer FROM revisioncards
         WHERE user=? AND id=?";

if ($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ss", $user, $_SESSION['id']);


// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){

  echo $outputdatatext;

  $result = mysqli_stmt_get_result($stmt);
  $html_tb ='<table class="fulltable nohover" id="selectedcard"><tr>
              <th>User</th>
              <th>Topic</th>
              <th>Question</th>
              <th>Answer</th>
              </tr>';


      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $html_tb .='<tr><td>'.htmlentities($row["user"]).'</td><td>'.htmlentities($row["topic"]).'</td><td>'.
            nl2br(htmlentities($row["question"])).'</td><td>'.htmlentities($row["answer"]).'</td></tr>';
          }

          $html_tb .='</table>';
          echo "<br>";
          echo $html_tb;
          echo "<br>";
        }
    }else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
}
    }else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
}
// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);
 ?>
