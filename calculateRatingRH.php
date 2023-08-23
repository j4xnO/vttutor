<?php
require_once("db.php");
session_start();
$username = "";
$pwd = "";
$name = "";
$class1 = "";
$class2 = "";
$accounttype = "";
$nummeetings = 0;
$rating = 0;
$upvotes = 0;
$downvotes = 0;
$sum = 0;
$difference = 0;
$ratio = 0;

if (isset($_SESSION["username"]))
  $username = $_SESSION["username"];
if (isset($_SESSION["password"]))
  $pwd = $_SESSION["password"];
if (isset($_SESSION["name"]))
  $name = $_SESSION["name"];
if (isset($_SESSION["class1"]))
  $class1 = $_SESSION["class1"];
if (isset($_SESSION["class2"]))
  $class2 = $_SESSION["class2"];
if (isset($_SESSION["accounttype"]))
  $accounttype = $_SESSION["accounttype"];
if (isset($_SESSION["numberofmeetings"]))
  $nummeetings = $_SESSION["numberofmeetings"];
if (isset($_SESSION["rating"]))
  $rating = $_SESSION["rating"];
?>

<!doctype html>
<html>

<head>
  <title> Calculate Rating </title>
 
</head>

<body>
  <?php
  //ratio for the likes/dislikes is the sum over the differnce

  $sql = "SELECT numberofupvotes, numberofdownvotes, Answers.tutorid FROM Questions, Answers
  where Questions.questionbody=Answers.questionbody";
  $result = $mydb->query($sql);
  while ($row = mysqli_fetch_array(($result))) {
  

    if ($row['tutorid'] == $username) {

      $upvotes = $row['numberofupvotes'];
      $downvotes = $row['numberofdownvotes'] * -1;
      $sum = $upvotes + $downvotes;
      $difference = $upvotes - $difference;
      $rating = ((($difference / $sum) * 100) + $rating) / 2;
    }
  }
  echo(round($rating)."%");
  ?>
</body>

</html>