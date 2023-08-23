<?php
  require_once("db.php");

  $sql = "(SELECT 'Student' as accountype, count(studentemail) as cnt FROM Student) UNION (SELECT 'Tutor' as accountype, count(Tutor.tutoremail) as cnt from Tutor)";
  $result = $mydb->query($sql);
  
  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>