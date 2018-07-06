<?php



require 'inc/database.php';
//attempt connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT topic FROM revisioncards
        WHERE user=?";

if ($stmt = mysqli_prepare($conn, $sql)){

  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "s", $user_name);

  // Attempt to execute the prepared statement
  if(mysqli_stmt_execute($stmt)){
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
    <option value="<?= htmlentities($row['topic']) ?>"><?= htmlentities($row['topic']) ?></option>
    <?php
      }
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
