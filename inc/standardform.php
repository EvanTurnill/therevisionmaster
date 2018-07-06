<?php




?>

<p><span class="errortwo">* required field.</span></p>
<form id="standardform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="user" value="<?php echo $_SESSION["user"];?>" readonly="readonly" >
  Topic: <input type="text" name="topic" value="<?php echo $_SESSION["topiclog"];?>" readonly="readonly" >
  <span class="errortwo"> <?php echo $topicErr;?></span>
  <br><br>
  Question: <textarea name="question" rows="5" cols="40"><?php echo $question;?></textarea>
  <span class="errortwo">* <?php echo $questionErr;?></span>
  <br><br>
  Answer: <textarea name="answer" rows="5" cols="40"><?php echo $answer;?></textarea>
  <span class="errortwo">* <?php echo $answerErr;?></span>
  <br><br>
  <input class="button" type="submit" name="submitstandardform" value="<?php echo $submitbuttontext?>">
  <br><br>
</form>
