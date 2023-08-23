<?php
//Session vars

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


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - VT Tutor Service</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready($(function() {
            $("#rating").load("calculateRatingRH.php")
            //$("#chartGoesHere").load("likesToDislikesRH.php")
        }))
    </script>
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
                    <li class="nav-item"><a class="nav-link active" href="performanceDashboardRH.php"><i class="fas fa-tachometer-alt"></i><span>Tutor Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="QuestionDashJO.php"><i class="fas fa-user"></i><span>Question Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="upcomingAppointmentLC.php"><i class="fas fa-table"></i><span>Appointments Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="loginIB.php"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div>
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">

                            <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                <?php echo ($name) ?>
                            </span>
                    </div>

                    </ul>
                </nav>
            </div>
            </nav>

            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Performance Dashboard</h3>
                    <div class="btn-group" role="group" aria-label="Basic example" id="floatingRectangle">
                        <a class="btn btn-primary" href="createClassRH.php" role="button">Create Class</a>
                        &nbsp;
                        <a class="btn btn-primary" href="changeTeacherRH.php" role="button">Update a Teacher</a>
                        &nbsp;
                        <a class="btn btn-primary" href="recentLikesRH.php" role="button">See Recent Likes</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total
                                                Meetings</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>
                                                <?php echo ($nummeetings) //add to this for each iteration of the loop 
                                                ?>
                                            </span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Overall
                                                Rating</span></div>
                                        <div class="row g-0 align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark fw-bold h5 mb-0 me-3" id="rating"><span>
                                                        &nbsp;<?php //echo ($rating) 
                                                                ?>
                                                    </span></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">


                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0">Upcoming Meetings</h6>
                                    </div>
                                    <ul class="list-group list-group-flush">

                                        <?php
                                        //select all from appointment table and set result each to that
                                        $sql = 'select * from Appointments';
                                        $result = $mydb->query($sql);
                                        while ($row = mysqli_fetch_array(($result))) {
                                            if ($row['tutoremail'] == $username) {
                                                echo ("<li class='list-group-item'>
                                                <div class='row align-items-center no-gutters'>
                                                    <div class='col me-2'>
                                                        <h6 class='mb-0'><strong>$row[appointmentID] | $row[studentemail]</strong></h6>
                                                        <span class='text-xs'>$row[scheduledtime]</span>
                                                    </div>
                                                </div>
                                            </li>");
                                            }
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>