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


if (isset($_POST["confirm"])) {
    //delete appointment if button is clicked, but how to tell which appointment the button was clicked for?;
    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: confirmAppointmentLC.php");

}

if (isset($_POST["delete"])){
    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: deleteButtonLC.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - VT Tutor Service</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>VT Tutor Service</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="AccountManagementIB.php"><i
                                class="far fa-user-circle"></i><span>Account Management</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="performanceDashboardRH.php"><i
                                class="fas fa-tachometer-alt"></i><span>Tutor Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="QuestionDashJO.php"><i
                                class="fas fa-user"></i><span>Question Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="upcomingAppointmentLC.php"><i
                                class="fas fa-table"></i><span>Appointments Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="logoutIB.php"><i
                                class="far fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="requestAppointmentLC.php"><i
                                class="fas fa-table"></i><span>Request an Appointment</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">

                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $name; ?></span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Upcoming Appointments</h3>
                    </div>
                </div>



                <?php
                //select all from appointment table and set result each to that
                $sql = 'select * from Appointments';
                $result = $mydb->query($sql);
                while ($row = mysqli_fetch_array(($result))) {
                    if ($row['studentemail'] == $username) {

                        echo ("<div class='card'>
                        <div class='card-body'>
                        <h4 class='card-title'>Appointment $row[appointmentID]</h4>
                        <h6 class='text-muted card-subtitle mb-2'>$row[scheduledtime]</h6>
                        <h6 class='text-muted card-subtitle mb-2'>$row[appointmentsdescription]</h6>
                        <div class='container'>
                            
                        </div>
                    </div>
                </div>");
                    }
                }
                ?>

            <form class="text-left" method="post">
                <div>
                    <button class="btn btn-primary" type="submit" name="delete">Delete An Appointment</button>

                    <button class="btn btn-primary" type="submit" name="confirm">Confirm An Appointment</button>
                </div>
            </form>


            <form method="get" action="totalsD3LC.php">
                <label for="appointmentid">
                    <input type="submit" type="submit" name="submit">Total Appointments</input>
                </label>
            </form><img class="float-end" src="assets/img/vt%20tutorR.png">


            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © VT Tutor Service 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>