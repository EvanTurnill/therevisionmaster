<?php

/*sanitize the data*/


/*connect to database*/


/* prepare statements*/

/*send to database*/


/*close database and confirm outcome*/

$confirminsert=0;

include 'inc/database.php';
//attempt connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Prepare an insert statement
$sql1 = "UPDATE revisioncards SET question=?, answer=?
WHERE user=? AND id=?";


if ($stmt = mysqli_prepare($conn, $sql1)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssss", $question, $answer, $user, $_SESSION['id']);


// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
  echo "<br>Records amended successfully.";
$confirminsert=1;

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
