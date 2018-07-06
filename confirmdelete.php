<!--This is linked to from edit.php and actually deletes the records selected -->
<?php
session_start();
require_once("./include/membersite_config.php");
$_SESSION['previous_location'] = "edit.php";
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

$_SESSION['user']=$fgmembersite->UserName();
$user=$_SESSION['user'];
?>

<html>
<head>

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


<?php
$q = $_GET['q'];
$deletedatatext="This has now been deleted.";
$id=$q;
require_once "inc/deletefromdatabase.php";

?>

</body>
</html>
