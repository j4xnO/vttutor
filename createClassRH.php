<?php
//set your session vars. reference the login page
require_once('db.php');
session_start();

$username = "";
$pwd = "";
$name = "";
$class1 = "";
$class2 = "";
$accounttype = "";
$nummeetings = 0;
$tutoremail = "";
$rating = 0;
$error=false;
$apptdesc="";
$courseNumber="";
$newCourseNumber = 0;
$teacher = "";
$dept = "";
$newClassID = 0;



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
    if(isset($_POST["dept"])) $dept=$_POST["dept"];
    if(isset($_POST["coursenum"])) $newCourseNumber=$_POST["coursenum"];
    if(isset($_POST["teacher"])) $teacher=$_POST["teacher"];

    if($dept=="" || empty($newCourseNumber) || $teacher == ""){
            $error=true;
    } 
    if (!$error){
        
        require_once("db.php");
        $sql = "SELECT max(classID) from Classes";
        $result = $mydb->query($sql);
        while ($row = mysqli_fetch_array(($result))) {
            $newClassID = $row['max(classID)'] + 1;
        }

        $sql = "insert into Classes(classID, department,
        courseNumber, teacher) values($newClassID, 
        '$dept', $newCourseNumber, '$teacher')";
        $result = $mydb->query($sql);

        header("HTTP/1.1 307 Temporary Redirect");
        header("Location: performanceDashboardRH.php"); 
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - VT Tutor Service</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <style>
    .errlabel {
      color: red;
    }
  </style>
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
            
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Create a Class</h3>
                    </div>
                </div>

    <form class="text-left" method="post">              
        <button class="btn btn-primary" type="submit" name="submit">Create a New Class</button>
        <br />
        <label class="form-label">Department<br /><input type="text" name="dept" value="<?php echo $dept; ?>">
            <?php
                if ($error && empty($dept)) {
                    echo "<label class='errlabel'>enter dept</label>";
                }
            ?>
        </label>
        <br />
        <label class="form-label">Course Number<br />
            <input type="number" name="coursenum" value="<?php echo $newCourseNumber; ?>">
                <?php
                    if ($error && empty($newCourseNumber)) {
                        echo "<label class='errlabel'>enter cn</label>";
                    }
                ?>
        </label>
        <br />        
        <label class="form-label">Teacher<br /><input type="text" name="teacher" value="<?php echo $teacher; ?>">
            <?php
                if ($error && empty($teacher)) {
                    echo "<label class='errlabel'>enter teacher</label>";
                }
            ?>
        </label>

                    
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </form>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>