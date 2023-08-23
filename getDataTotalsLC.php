<?php
require_once("db.php");

//$supplierid=0;

if(isset($_GET["appointmentid"])) $appointmentid=$_GET["appointmentid"];

$sql="SELECT count(appointmentID) FROM appointments";
//$sql="select productname, unitprice * unitsinstock as totalvalue from products where supplierid=$supplierid";

$result = $mydb->query($sql);

$data = array();
for($x=0; $x<mysqli_num_rows($result); $x++) {
  $data[] = mysqli_fetch_assoc($result);
}

echo json_encode($data);
?>