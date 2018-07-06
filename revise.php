<?php
session_start();
$page = "revise";
$_SESSION['previous_location'] = $page;
$title = "RevisionMaster Topics";
$metaD = "Welcome to RevisionMaster - start revising here!";
include 'inc/header.php';
$sortby=topic;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sortby=$_POST["sortby"];
}

//echo $sortby;
?>


<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="revise.php">
  <img src="img/revise.png" alt="Contact picture">
</a>
</div>

<div class="item2contact">
    <a href="revise.php">
<h1>Choose a topic and get revising!</h1>
</a>
<form id="searchby" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <input type="radio" name="sortby" value="topic" <?php if($sortby==topic){echo "checked";}?>>Sort by topic</input>
  <input type="radio" name="sortby" value="reg_date" <?php if($sortby==reg_date){echo "checked";}?>>Sort by date uploaded</input>
  <input type="radio" name="sortby" value="user" <?php if($sortby==user){echo "checked";}?>>Sort by user</input>
  <br><br>
  <input class ="button" type="submit" name="submit" value="Sort your results">
  <br><br>
</form>
</div>



<div class="item3contact">

  <script>
  function revise(topic) {
  document.getElementById('topichidden').value=topic;
  document.getElementById('myform').submit();
  }
  </script>

  <?php

      $topicErr = "Topic is required";


include 'inc/database.php';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT min(reg_date) AS reg_date, user, topic
          FROM revisioncards
          GROUP BY topic
          ORDER BY $sortby";
  $result = $conn->query($sql);
  $html_tb ='<br><br><table class="fulltable" id="editdeltab"><tr>
                                  <th>User</th>
                                  <th>Topic</th>
                                  <th>Date</th>
                                  <th>Select</th>
                               </tr>';
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $time = strtotime($row['reg_date']);
        $date = date("j-M-Y", $time);


            $html_tb .='<tr><td>'.$row["user"].'</td><td>'.$row["topic"].'</td><td>'.$date.'</td><td>
            <button id="revise" style="display:inline" type="button" name="revise" class="button" onclick="revise(\''.$row["topic"].'\')">Revise this topic</button></td></tr>';
              }
          $html_tb .='</table>';
          echo $html_tb;

      } else {
      echo "0 results";
  }

  $conn->close();

  ?>
  <form hidden method=post id="myform" name="myform" action="viewcards.php">
      <input type="text" name="topichidden" id="topichidden" value="default"></input>
      <input type="submit" value="Send form!">
  </form>

</div>
</div>
</div>




<?php


include 'inc/footer.php';
?>
