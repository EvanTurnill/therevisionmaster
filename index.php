<?php
session_start();
$page = "index";
$_SESSION['previous_location'] = $page;
$title = "RevisionMaster Homepage";
$metaD = "Welcome to RevisionMaster";
include 'inc/header.php';
?>
<div class="wrapper">
<div class="genbackground">
<div class="grid-container">

<div class="item1">
    <a href="index.php">
  <img src="img/revisioncards1.jpg" alt="Revision card picture" style="padding-top:26px">
</a>
</div>

<div class="item2">
    <a href="index.php">
<h2>Welcome to TheRevisionMaster</h2>
<h4>On this site you can create your own revision cards to help you memorise absolutely anything!</h4>
</a>
</div>


<div class="item3">
  <a href="revise.php">
<img src="img/revise.png" alt="Revise picture">
<h3>Revise</h3>

<p>Use your own revision cards or anybody elses</p>
</a>
</div>

<div class="item4">
    <a href="createrevisioncards.php">
  <img src="img/create.jpg" alt="Create picture">
  <h3>Create</h3>
  <p>Create your own revision cards</p>
</a>
</div>
<div class="item5">
    <a href="edit.php">
  <img src="img/edit.jpg" alt="Edit picture">
  <h3>Edit</h3>
  <p>Edit or delete any revision cards you have created</p>
  </a>
</div>


</div>
</div>
</div>

<?php


include 'inc/footer.php';
?>
