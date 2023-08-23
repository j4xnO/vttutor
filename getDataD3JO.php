<?php
  require_once("db.php");

  $questid="";
  if(isset($_GET["qid"])) $questid = $_GET["qid"];

  //get total instock value and anme of each product provided by the selected supplier
  $sql="select questionbody, coursenumber from Questions where questionid='$questid'";

  //$sql = "select year(emp_hiredate) as hireyear, count(emp_id) as empCount from Employee group by hireyear order by hireyear";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>