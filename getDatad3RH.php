<?php
  require_once("db.php");

  $tutorid="";
  if(isset($_GET["tid"])) $tutorid = $_GET["tid"];

  $sql = "SELECT numberofupvotes, numberofdownvotes, Answers.tutorid FROM Questions, Answers
  where Questions.questionbody=Answers.questionbody And answers.tutorid='$tutorid'";
  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>