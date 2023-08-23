<?php
require_once("db.php");
session_start();
$username = "";
$accounttype = "";

if (isset($_SESSION["username"]))
    $username = $_SESSION["username"];
if (isset($_SESSION["accounttype"]))
    $accounttype = $_SESSION["accounttype"];
?>

<style>
    #floatingRectangle {
        margin-right: 30%;
        width: 200px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Account Management</h3>
                    <div class="btn-group" role="group" aria-label="Basic example" id="floatingRectangle"><a
                            class="btn btn-primary" href="ModifyProfileIB.php" role="button">Modify Profile</a><a
                            class="btn btn-primary" href="DeleteProfileIB.php" role="button">Delete Profile</a><a
                            class="btn btn-primary" href="profVisualization.html" role="button">Profile Visualization</a><a
                            class="btn btn-primary" href="QuestionDashJO.php" role="button">Question Dashboard</a>
                    </div>
            </div>
        </div>
        <form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-dark">User</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Password</th>
                            <th class="text-dark">Class 1</th>
                            <th class="text-dark">Class 2</th>
                        </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    //use loop to process each of the results
                                    //table format
                                    echo "User Profile View";
                                    if ($accounttype == "student") {
                                        $sql = "SELECT * FROM Student WHERE studentemail='$username'";
                                    } else
                                        $sql = "SELECT * FROM Tutor WHERE tutoremail='$username'";
                                    $result = $mydb->query($sql);
                                    while ($row = mysqli_fetch_array(($result))) {
                                        if($accounttype == "student") {
                                            echo "<tr><td>" . $row["studentemail"] . "</td><td>" . $row["studentname"] . "</td><td>" . $row["studentpwrd"] . "</td><td>"
                                            . $row["class1"] . "</td><td>". $row["class2"] . "</td><td>";
                                        }
                                        else {
                                            echo "<tr><td>" . $row["tutoremail"] . "</td><td>" . $row["tutorname"] . "</td><td>" . $row["tutorpwd"] . "</td><td>"
                                            . $row["class1"] . "</td><td>". $row["class2"] . "</td><td>";
                                        }
                                    }

                                    ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            </form><img class="float-end" src="assets/img/vt%20tutorR.png">
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>