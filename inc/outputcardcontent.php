<?php
//start_session();
require 'inc/database.php';
//attempt connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT  topic, question, answer, reg_date FROM revisioncards
       WHERE topic=? ORDER BY reg_date
       LIMIT 1 OFFSET $offsetby";


if ($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $prechoosentopic);


// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){


  $result = mysqli_stmt_get_result($stmt);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

            $cardquestion = '<div id="questiontable" style="display:block" class="cards"><h3>Question'.'&nbsp;'.htmlentities($_SESSION["question"]).'&nbsp; of &nbsp;'.$totalrows.'</h3><br><p>'.htmlentities($row["question"]).'</p><br></div>';
            $cardanswer = '<div id="answertable" style="display:none" class="cards"><h3>Answer'.'&nbsp;'.htmlentities($_SESSION["question"]).'&nbsp; of &nbsp;'.$totalrows.'</h3><br><p>'.htmlentities($row["answer"]).'</p><br></div>';
          }

        echo 'The topic you are revising is:&nbsp;'.$prechoosentopic;
        echo "<br>";
        echo "<br>";
        echo $cardquestion;
        echo $cardanswer;
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
