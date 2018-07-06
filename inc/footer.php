

<footer class="footer">

  <div class="footer-limiter">


    <nav id="footernav">
      <ul>
        <li><a href="index.php" <?php echoSelectedClassIfRequestMatches("index", $page)?>>Home</a></li>
        <li><a href="revise.php" <?php echoSelectedClassIfRequestMatches("revise", $page)?>>Revise</a></li>
        <li><a href="createrevisioncards.php" <?php echoSelectedClassIfRequestMatches("create", $page)?>>Create</a></li>
        <li><a href="edit.php" <?php echoSelectedClassIfRequestMatches("edit", $page)?>>Edit</a></li>
        <li><a href="about.php" <?php echoSelectedClassIfRequestMatches("about", $page)?>>About</a></li>
        <li><a href="faq.php" <?php echoSelectedClassIfRequestMatches("faq", $page)?>>Faq</a></li>
        <li><a href="contact.php" <?php echoSelectedClassIfRequestMatches("contact", $page)?>>Contact</a></li>
        <li><a id="login" style="<?php echodisplay('loggedin')?>" href="login.php" <?php echoSelectedClassIfRequestMatches("login", $page)?>>Log in</a></li>
				<li><a id="logout" style="<?php echodisplay('loggedout')?>" href="logout.php" <?php echoSelectedClassIfRequestMatches("logout", $page)?>>Log out</a></li>

      <ul>
    </nav>

  <p><a href="index.html" class="active">Copyright © Evan Turnill 2018</a></p>


  </div>


</footer>



</body>


</html>
