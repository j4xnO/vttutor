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
  <title>Log out page</title>
</head>
<body>
  <?php
    //$username = "";
    //session_start();
    //$username = $_SESSION["username"];
    //unset($_SESSION["username"]);

    //session_destroy();



    echo "<p>Goodbye, ".$username."</p>";
    echo "You have successfully logged out. Please <a href='loginIB.php'>click here to login again</a>";

  ?>

<br>
<div id="info">
<p></p>
<p> Click button to display the project information </p>
<button type="button" onclick="loadDoc()">Project Information</button>
</div>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "infoIB.html", true);
  xhttp.send();
}
</script>
</body>
</html>