<!doctype html>
<html>
<head>
  <title> Back End</title>
</head>
<body>
  <?php
    $qBody = "";
    if(isset($_GET['qBody'])) $qBody=$_GET['qBody'];

    require_once("db.php");

    $sql="SELECT Questions.questionbody as questionbody, Questions.numberofupvotes as numberofupvotes, Questions.numberofdownvotes as numberofdownvotes ,answerBody FROM Answers
    inner join Questions on Answers.questionbody=Questions.questionbody
    WHERE Questions.questionbody='$qBody'";
    //$sql="SELECT questionbody, answerBody FROM Questions,Answers WHERE questionid=".$qBody;
    $result = $mydb->query($sql);
    echo"<table class=table>
    <thead>
        <tr>
        <th>Question</th>
        <th>Answer</th>
        <th>Likes</th>
        <th>Dislikes</th>
        </tr>
    </thead>
    <tbody>";

    if($row=mysqli_fetch_array($result)){
      echo "<tr><td>" . $row["questionbody"] . "</td><td>" . $row["answerBody"] . "</td><td>". $row["numberofupvotes"] . "</td><td>". $row["numberofdownvotes"] . "</td><td>";
    } else {
      echo "Your question and answer cannot be found.";
    }

  ?>
</body>
</html>