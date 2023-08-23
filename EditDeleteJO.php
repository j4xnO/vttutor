<?php
$error = false;
$questtext = "";
//$classID=0;
$anstext = "";
$newquest = "";
$numberofupvotes = 0;
$numberofdownvotes = 0;
$questionid = "";
$questBody = "";
$newanswer="";
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

if (isset($_POST["submit"])) {
    if (isset($_POST["questtext"]))
        $questtext = $_POST["questtext"];
    if (isset($_POST["newquest"]))
        $newquest = $_POST["newquest"];
    if (isset($_POST["questionid"]))
        $questionid = $_POST["questionid"];
    if (isset($_POST["answerBody"]))
        $anstext = $_POST["answerBody"];

    if (!empty($questionid) && !empty($questtext) && !empty($newquest)) {
        $inputTime = date("Y-m-d", strtotime("now"));
        setcookie("inputTimeStamp", $inputTime, time() + (24 * 60 * 60 * 2), "/");

        require_once("db.php");
        //update an existing employee record
        $sql = "update Questions set questionbody='$newquest' where questionid='$questionid'";
        
        $result = $mydb->query($sql);
        if ($result == 1) {
            echo "";
        }


        //session_start();
        //$_SESSION['questtext'] = $questtext;
        //$_SESSION['classID'] = $classID;

        //header("HTTP/1.1 307 Temporary Redirect");
        //header("Location: QuestionDashboardJO.php"); 
    } else {
        $error = true;
    }

}

if (isset($_POST["delete"])) {
    if (isset($_POST["questtext"]))
        $questtext = $_POST["questtext"];
    //if(isset($_POST["classID"])) $classID=$_POST["classID"];
    if (isset($_POST["newquest"]))
        $newquest = $_POST["newquest"];
    if (isset($_POST["questionid"]))
        $questionid = $_POST["questionid"];

    if (!empty($questtext)) {
        $inputTime = date("Y-m-d", strtotime("now"));
        setcookie("inputTimeStamp", $inputTime, time() + (24 * 60 * 60 * 2), "/");

        require_once("db.php");
        //update an existing employee record
        $sql = "DELETE FROM Questions WHERE questionbody='$questtext'";
        
        $result = $mydb->query($sql);
        if ($result == 1) {
            echo "";
        }


        //session_start();
        //$_SESSION['questtext'] = $questtext;
        //$_SESSION['classID'] = $classID;

        //header("HTTP/1.1 307 Temporary Redirect");
        //header("Location: QuestionDashboardJO.php"); 
    } else {
        $error = true;
    }
}

if (isset($_POST["numofupvotes"])) {
    if (isset($_POST['numofupvotes']))$numberofupvotes = $_POST['numofupvotes'];
    if (isset($_POST["questionbody"]))$questBody = $_POST["questionbody"];
    

    if (!empty($questBody)) {

        require_once("db.php");
        //add new employee record
        $sql = "UPDATE Questions set numberofupvotes=numberofupvotes+1  where questionbody='$questBody'";
        $result = $mydb->query($sql);
        if ($result == 1) {
            echo "";
        }
    } else {
        $error = true;
    }
}

if (isset($_POST["numofdownvotes"])) {
    if (isset($_POST['numberofdownvotes']))$numberofdownvotes = $_POST['numberofdownvotes'];
    if (isset($_POST["questionbody"]))$questBody = $_POST["questionbody"];

    if (!empty($questBody)) {
        require_once("db.php");
        //add new employee record
        $sql = "UPDATE Questions set numberofdownvotes=numberofdownvotes-1  where questionbody='$questBody'";
        $result = $mydb->query($sql);
        if ($result == 1) {
            echo "";
        }
    }
} else {
        $error = true;
        
    }


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit/Delete</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
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
             <div class="d-flex flex-column" id="content-wrapper">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Want to edit or delete a question?</h3>
                    </div>
                </div>
                <h4 class="text-primary">How to edit or delete a question</h4>
                <ul>
                    <li class="text-dark">Select question from dropdown</li>
                    <li class="text-dark">Select your correlating question subject from dropdown</li>
                    <li class="text-dark">Write in textbox below changes you want to apply</li>
                    <li class="text-dark">Press the submit button to finish editing a question</li>
                    <li class="text-dark">If you want to delete a question</li>
                    <li class="text-dark">Select a question from the dropdown</li>
                    <li class="text-dark">Press the delete button to delete the question</li>
                </ul>
                <h5 class="text-bg-primary">Want to add a like to an Answer?</h5>
                    <script>
                        var asyncRequest;
                        function getContent() {
                            var qBody = document.getElementById("questionbody").value;
                            var z = document.getElementById("contentArea");
                            if (qBody == "") {
                                z.innerHTML = "";
                            } else {
                                
                                try {
                                    asyncRequest = new XMLHttpRequest();  //create request object
                                    //console.log("hello");
                                    //register event handler
                                    asyncRequest.onreadystatechange = stateChange;
                                    var url = "BackEndAjaxJO.php?qBody=" + qBody;
                                   console.log(url);
                                    asyncRequest.open('GET', url, true);  // prepare the request
                                    asyncRequest.send(null);  // send the request
                                }
                                catch (exception) { alert("Request failed"); }

                            }

                            function stateChange() {
                                // if request completed successfully
                                if (asyncRequest.readyState == 4 && asyncRequest.status == 200) {
                                    document.getElementById("contentArea").innerHTML =
                                        asyncRequest.responseText;  // places text in contentArea
                                }
                            }
                        }
                    </script>
                    </head>
                <form action="EditDeleteJO.php" method="post">
                    
                    <select name="questionbody" id="questionbody" onchange="getContent()" placeholder="Select answer here">
                    
                        <?php
                        require_once("db.php");
                        //sql query
                        $sql = "select questionbody FROM Questions";
                        //use the db connection
                        $result = $mydb->query($sql);
                        //while loop in product list is very similar to the while loop
                        
                        while ($row = mysqli_fetch_array(($result))) {
                            //<tr><td><td></td></td><td></td><td></td></tr>
                            echo "<option>" . $row["questionbody"] . "</option>";
                        }
                        if ($error && empty($questBody)) {
                            echo "<div class='error'>Please select a question.</div>";
                        }
                        ?>
                    </select>
                    <div id="contentArea">&nbsp;</div>
                    <button class="btn btn-primary" name="numofupvotes" type="submit" >Like Button</button> <button class="btn btn-primary" name="numofdownvotes" type="submit">Dislike Button</button>
                    <br></br>
                    <h5 class="text-bg-primary">Select a Question</h5>
                    <select name="questtext" placeholder="Select question here">
                        <?php
                        require_once("db.php");
                        //sql query
                        $sql = "select questionbody FROM Questions";
                        //use the db connection
                        $result = $mydb->query($sql);
                        //while loop in product list is very similar to the while loop
                        
                        while ($row = mysqli_fetch_array(($result))) {
                            //<tr><td><td></td></td><td></td><td></td></tr>
                            echo "<option>" . $row["questionbody"] . "</option>";
                        }
                        if ($error && empty($questtext)) {
                            echo "<div class='error'>Please select a question.</div>";
                        }
                        ?>
                    </select>
                    <h5 class="text-bg-primary">What is you question subject?</h5>
                    <select name="questionid">
                        <?php
                        require_once("db.php");
                        //sql query
                        $sql = "select questionid FROM Questions";
                        //use the db connection
                        $result = $mydb->query($sql);
                        //while loop in product list is very similar to the while loop
                        
                        while ($row = mysqli_fetch_array(($result))) {
                            //<tr><td><td></td></td><td></td><td></td></tr>
                            echo "<option>" . $row["questionid"] . "</option>";
                        }
                        if ($error && empty($questionid)) {
                            echo "<div class='error'>Please select a course.</div>";
                        }
                        ?>
                    </select>

                    <h5 class="text-bg-primary">Edit the Question in the textbox below</h5>
                    <textarea rows="4" cols="80" name="newquest" placeholder="Enter updated question here"></textarea>
                    <p class="text-dark">Press one of the buttons below to submit your request.</p><button class="btn btn-primary"
                        name="submit" type="submit" >Submit Edited Question</button><button class="btn btn-primary"
                        name="delete" type="submit" >Delete Question</button>
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