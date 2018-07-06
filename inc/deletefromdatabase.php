<?php
//start_session();
require 'inc/database.php';
//attempt connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "DELETE FROM revisioncards
        WHERE id=? AND user=?";

if ($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ss", $id, $user);


// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
  echo $deletedatatext;


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
