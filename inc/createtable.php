<?php
include 'database.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('<p>Failed to connect to MySQL: '.mysqli_connect_error().'</p>');
} else {
    echo '<p>Connection to MySQL server successfully established.</p >';
}

// sql to create table
$sql = "CREATE TABLE revisioncards (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user VARCHAR(30) NOT NULL,
topic VARCHAR(30) NOT NULL,
question VARCHAR(2000) NOT NULL,
answer VARCHAR(2000) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table revisioncards created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
