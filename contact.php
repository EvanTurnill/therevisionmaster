<?php
session_start();
$page = "contact";
$_SESSION['previous_location'] = $page;
$title = "RevisionMaster Homepage";
$metaD = "Welcome to RevisionMaster";
include 'inc/header.php';
?>


<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="contact.php">
  <img src="img/contact.jpg" alt="Contact picture">
</a>
</div>

<div class="item2contact">
    <a href="contact.php">
    <br>
<h1>Contact us</h1>
</a>
</div>


<div class="item3contact">
  <a href="mailto:evanturnill@hotmail.com">
<h2>You can contact us in the following ways:</h2>
<p>Email: <a href="mailto:evanturnill@hotmail.com">evanturnill@hotmail.com</a></p>
</a>
</div>



</div>
</div>


<?php


include 'inc/footer.php';
?>
