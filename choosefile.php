<?php
$page = "createrevisioncards.php";
$title = "Create your own revision cards";
$metaD = "Welcome to RevisionMaster";
include 'inc/header.php';
?>
<?php
session_start();
$_SESSION['previous_location'] = $page;
?>
<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="choosefile.php">
  <img src="img/spreadsheet.png" alt="Spreadsheet picture">
</a>
</div>

<div class="item2contact">
    <a href="choosefile.php">
<h1>Choose a file to upload</h1>
</a>
</div>


<div class="item3contact">
<br>
<p style="text-align:justify">This will cope with most spreadsheet types (excel and libre among others).The revision cards should be written in two columns. First column questions. Second column answers. Leave no blanks. </p>
<br>
  <form action="upload.php" method="post" enctype="multipart/form-data">
      Select a spreadsheet to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input class="button" type="submit" value="Show database" name="submit" required>
  </form>
<br><br>
</div>



</div>
</div>





<?php


include 'inc/footer.php';
?>
