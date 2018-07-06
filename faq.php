<?php
session_start();
$page = "faq";
$_SESSION['previous_location'] = $page;
$title = "RevisionMaster FAQ";
$metaD = "Welcome to RevisionMaster";
include 'inc/header.php';
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
<!--http://www.itechroom.com-->
$(document).ready(function($) {
       $('#accordion div').hide();
       $('#accordion p span').click(function(){
               $('#accordion div').slideUp();
               $(this).parent().next().slideDown();
               return false;
       });
});

</script>




<div class="genbackground">
<div class="grid-container">

<div class="item1contact">
    <a href="faq.php">
  <img src="img/faq.jpg" alt="FAQ picture">
</a>
</div>

<div class="item2contact">
    <a href="faq.php">
  <h1>Frequently asked questions</h1>

</a>
</div>


<div class="item3contact">
  <div id="accordion">
<p class="news-title"><span>What type of spreadsheets can I upload?</span></p>
<div class="news_text"> <strong>Answer</strong>:
  <p> Xlsx, Xml, Ods, Slk, Gnumeric, Csv file types should work. </p>
</div>


<p class="news-title"><span>If the spreadsheet is not uploading, what could be wrong?</span></p>
<div class="news_text"> <strong>Answer</strong>:
  <p>First check there are no blank entries. This might include cells written in which later became blank. Try deleting all rows below and columns to the side. If that doesn't work, go to the contact page and drop me a line and I'll see if I can help.</p>
</div>

</div>



</div>
</div>
</div>

<?php






include 'inc/footer.php';
?>
