<?php
session_start();
$page = "about";
$_SESSION['previous_location'] = $page;
$title = "RevisionMaster About Us";
$metaD = "Welcome to RevisionMaster";
include 'inc/header.php';
?>

<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="about.php">
  <img src="img/about.jpg" alt="About picture">
</a>
</div>

<div class="item2contact">
    <a href="about.php">

<h1>About us</h1>
</a>
</div>


<div class="item3contact">
<h2>Here is all you need to know about The Revision Master!</h2>

<p>My name is Evan. This website was created as an exercise to improve my skills
as a coder.It is far from perfect and much more functionality could be added,
but it has proved useful for learning to write, edit and troubleshoot code.
<br><br>
I used and adapted some existing code to help me with including: PHPSpreadsheet
and fg_membersite.php. My code for this site can be found at
<a href="https://github.com/EvanTurnill/therevisionmaster">GitHub</a>
<br><br>
The content of the cards I uploaded is based on the information at
<a href="http://w3schools.com">w3schools.com</a>. Much is cut and pasted.
I did this so I could use them in a classic revision card format. If you like
the content, check out the original and fuller information provided at
<a href="http://w3schools.com">w3schools.com</a>
</p>
</div>
</div>
</div>

<?php


include 'inc/footer.php';
?>
