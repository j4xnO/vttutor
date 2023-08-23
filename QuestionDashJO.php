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

//sql query
$sql = "select Questions.questionbody, numberofupvotes, numberofdownvotes, coursenumber, answerBody FROM Questions
left join Answers on Questions.questionbody=Answers.questionbody";
//use the db connection
$result = $mydb->query($sql);

?>

<style>
    #floatingRectangle {
        margin-right: 0%;
        width: 400px;
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
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
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
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                    placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i
                                        class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small">
                                            <?php echo ($name) ?>
                                        </span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Question Dashboard</h3>
                        <div class="btn-group" role="group" aria-label="Basic example" id="floatingRectangle"><a
                                class="btn btn-primary" href="EditDeleteJO.php" role="button">Edit/Delete</a><a
                                class="btn btn-primary" href="CreateQuestionJO.php" role="button">Create</a><a
                                class="btn btn-primary" href="AnswerQuestionJO.php" role="button">Answer</a>
                        </div>
                    </div>
                </div>
                <h3 class="text-bg-primary">Search for Questions At bottom of the screen</h3>
                <form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-dark">Class</th>
                                    <th class="text-dark">Question&nbsp;</th>
                                    <th class="text-dark">Answers</th>
                                    <th class="text-dark">Likes</th>
                                    <th class="text-dark">Dislikes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    //use loop to process each of the results
                                    //table format
                                    while ($row = mysqli_fetch_array(($result))) {
                                        //<tr><td><td></td></td><td></td><td></td></tr>
                                        echo "<tr><td>" . $row["coursenumber"] . "</td><td>" . $row["questionbody"] . "</td><td>" . $row["answerBody"] . "</td><td>"
                                            . $row["numberofupvotes"] . "</td><td>" . $row["numberofdownvotes"] . "</td><td>";
                                    }

                                    ?>
                            </tbody>
                        </table>
                    </div>
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
                    <h5 class="text-bg-primary">Search for Questions Here</h5>
                    <form action="QuestionDashJO.php" method="post">

                        <select name="questionbody" id="questionbody" onchange="getContent()"
                            placeholder="Select answer here">

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
                        <h5 class="text-bg-primary">View Level of Class for Questions</h5>
                    </form>
                    <form method="get" action="LikesD3JO.php">
                        <label for="questionid">Choose a question subject:
                            <select name="questionid" id="qid">
                                <?php
                require_once("db.php");
                $sql = "select questionid from Questions order by questionid";
                $result = $mydb->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row["questionid"] . "'>" . $row["questionid"] . "</option>";
                }
                ?>
                            </select>
                            <br><br>
                            <input type="submit" name="Submit" value="View Level">
                        </label>
                    </form><img class="float-end" src="assets/img/vt%20tutorR.png">
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