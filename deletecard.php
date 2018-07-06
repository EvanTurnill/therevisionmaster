<?php
session_start();
$_SESSION['previous_location'] = "edit.php";
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}


$_SESSION['user']=$fgmembersite->UserName();

$user= $_SESSION['user'];
?>
<!--linked to from edit.php to delete a card. Takes back to edit.php when info retrieved. -->
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
$outputdatatext="";
$q = intval($_GET['q']);
$_SESSION['id']=$q;
$outputdatatext="This is the card you have selected to delete:<br><br>";
require_once "inc/outputbyid.php";

echo '<button class="button" id="delete" style="display:inline" value="'.$q.'" type="button" name="delete" onclick="confirmDelete(this.value)">Permanently delete</button>';

?>
<br><br>
<button class="button" type="button" onClick="window.location.reload();">Choose a different card to delete</button>
<br><br>
</body>
</html>
