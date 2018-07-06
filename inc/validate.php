<?php

$user = $userErr = $topic = $topicErr = "";
$question = $questionErr = $answer = $answerErr = "";

function user_test($input1) {
  //check not $totalempty
  if (empty($input1) or $input1==null) {
    $userErr = "Username is required."."<br>";
  }
  // check if user only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$input1)) {
    $userErr.= "Only letters and white space allowed."."<br>";
  }
  //Check less than 40 char
  if (strlen($input1) > 40){
    $userErr.= "Username can be a maximum of 40 characters."."<br>";
  }
  //if no errors, assign to $user
  if ($userErr ==""){
    $user = $input1;
  }
  return array ($user, $userErr);
}



function topic_test($input2) {
  //check not $totalempty
  if (empty($input2) or $input2==null) {
    $topicErr = "Topic name is required."."<br>";
  }
  // check if topic only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$input2)) {
    $topicErr.= "Only letters and white space allowed."."<br>";
  }
  //Check less than 40 char
  if (strlen($input2) > 40){
    $topicErr.="Topic name can be a maximum of 40 characters."."<br>";
  }
  //if no errors, assign to $topic
  if ($topicErr ==""){
    $topic = $input2;
  }
  return array ($topic, $topicErr);
}

function question_test($input3) {
  //check not $totalempty
  if (empty($input3) or $input3==null) {
    $questionErr = "Question is required."."<br>";
  }
  //Check less than 2000 char
  if (strlen($input3) > 2000){
    $questionErr.="Questions can be a maximum of 2000 characters."."<br>";
  }
  //if no errors, assign to $question
  if ($questionErr ==""){
    $question = $input3;
  }
  return array ($question, $questionErr);
}

function answer_test($input4) {
  //check not $totalempty
  if (empty($input4) or $input4==null) {
    $answerErr = "Answer is required."."<br>";
  }
  //Check less than 2000 char
  if (strlen($input4) > 2000){
    $answerErr+="Answer can be a maximum of 2000 characters."."<br>";
  }
  //if no errors, assign to $answer
  if ($answerErr ==""){
    $answer = $input4;
  }
  return array ($answer, $answerErr);
}
?>
