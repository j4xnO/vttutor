<?php
$error=false;
$questtext="";
$classID=0;
$coursenum = 0;
$questionid = "";
session_start();
date_default_timezone_set("America/New_York");

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

if(isset($_POST["submit"])){
    
    if(isset($_POST["questtext"])) $questtext=$_POST["questtext"];
    if(isset($_POST["coursenum"])) $coursenum=$_POST["coursenum"];
    if(isset($_POST["questionid"])) $questionid=$_POST["questionid"];
    //if(isset($_POST["classID"])) $classID=$_POST["classID"];

    if(!empty($questtext)){
        $inputTime = date("Y-m-d", strtotime("now"));
        setcookie("inputTimeStamp", $inputTime, time() + (24*60*60*2), "/");

    require_once("db.php");
    //add new employee record
    $sql = "INSERT INTO Questions (questionbody,coursenumber,questionid) VALUES ('$questtext','$coursenum','$questionid')";
    
    $result = $mydb->query($sql);
    if ($result == 1) {
        
    }
    

        //session_start();
        //$_SESSION['questtext'] = $questtext;
        //$_SESSION['classID'] = $classID;

        //header("HTTP/1.1 307 Temporary Redirect");
        //header("Location: QuestionDashboardJO.php"); 
    } else {
        $error=true;
    }

}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Create Question</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
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
                    <li class="nav-item"><a class="nav-link" href="AppointmentsDashboard"><i class="fas fa-table"></i><span>Appointments Dashboard</span></a></li>
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
            </nav> <div class="d-flex flex-column" id="content-wrapper">
                <h2 class="text-start text-dark mb-0">Ask a new question</h2>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                </div>
                <h4 class="text-start text-primary">How to post a question</h4>
                <div></div>
                <ul class="text-start">
                    <li class="text-dark">Submit one question per post</li>
                    <li class="text-dark">Get notified when your question is answered</li>
                    <li class="text-dark">Follow the Virginia Tech Honor Code</li>
                </ul>
                <form action="CreateQuestionJO.php" method="post">
                <h5 class="text-start text-bg-primary">What is your question?</h5><textarea rows="4" cols="80" name="questtext" placeholder="Enter question here"></textarea>
               
                <h5 class="text-start text-bg-primary">What is your question subject</h5><textarea rows="4" cols="80" name="questionid" placeholder="Enter question subject here"></textarea>
                <h5 class="text-bg-primary">What class are you enrolled in?</h5>
                <select name="coursenum">
                <?php
                require_once("db.php");
                //sql query
                $sql = "select courseNumber FROM Classes";
                //use the db connection
                $result = $mydb->query($sql);
                //while loop in product list is very similar to the while loop
                
                while($row = mysqli_fetch_array(($result))){
                                //<tr><td><td></td></td><td></td><td></td></tr>
                                echo "<option>" . $row["courseNumber"] . "</option>";
                                }
                                ?>
                </select>
    
                <?php
            if ($error && empty($coursenum)) {
                echo "<div class='error'>Please select a course.</div>";
            }
            ?>
                <p class="text-dark">Thank you for filling out your question!</p><button class="btn btn-primary text-center border rounded-pill float-none" type="submit" name="submit" style="text-align: center;margin-left: 0px;">Post question</button>
                <img class="float-end" src="assets/img/vt%20tutorR.png">
                </form>
            </div>
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