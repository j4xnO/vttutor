<?php
require_once('db.php');
session_start();
$error = false;
$username = "";
$pwd = "";
$ranking = 0;
$accounttype = "";
$loginOK=null;

if (isset($_POST["submit"])) {
    if (isset($_POST["email"]))
        $username = $_POST["email"];
    if (isset($_POST["pname"]))
        $pwd = $_POST["pname"];
    if (isset($_POST["account"]))
        $accounttype = $_POST["account"];
    if (empty($username) || empty($pwd) || empty($accounttype)) {
        $error = true;
    }

    if (!$error) {
        if ($accounttype == "student") {
            $sql = "SELECT * FROM Student WHERE studentemail='$username' AND studentpwrd='$pwd'";
            $result = $mydb->query($sql);
            if (!$row = mysqli_fetch_assoc($result)) {
                $loginOK= false;
            } else {
                $loginOK=true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $pwd;
                $sql = "SELECT * FROM Student WHERE studentemail='$username' AND studentpwrd='$pwd'";
                $result = $mydb->query($sql);
                if ($row = $result->fetch_assoc()) {
                    $_SESSION["name"] = $row['studentname'];
                    $_SESSION["class1"] = $row['class1'];
                    $_SESSION["class2"] = $row['class2'];
                }

                $_SESSION["accounttype"] = "student";
                header("HTTP/1,1 307 Temparay Redirect");
                header("Location: QuestionDashJO.php");
            }
        } else {
            $sql = "SELECT * FROM Tutor WHERE tutoremail='$username' AND tutorpwd='$pwd'";
            $result = $mydb->query($sql);
            if (!$row = mysqli_fetch_assoc($result)) {
                $loginOK= false;
            } else {
                $loginOK= true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $pwd;
                $sql = "SELECT * FROM Tutor WHERE tutoremail='$username' AND tutorpwd='$pwd'";
                $result = $mydb->query($sql);
                if ($row = $result->fetch_assoc()) {

                    $_SESSION["name"] = $row['tutorname'];
                    $_SESSION["class1"] = $row['class1'];
                    $_SESSION["class2"] = $row['class2'];
                    $_SESSION["rating"] = $row['tutorrating'];
                    $_SESSION["numberofmeetings"] = $row['numberofmeetings'];
                }

                $_SESSION["accounttype"] = "tutor";
                header("HTTP/1,1 307 Temparay Redirect");
                header("Location: QuestionDashJO.php");
            }
        }

    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">-->
    <style>
        .error {
            color: red;
            font-size: small;
        }
    </style>
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <h2>&nbsp; &nbsp; &nbsp; <img src="assets/img/vt%20tutorR.png">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Login</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-person">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                    </path>
                                </svg></div>
                            <form class="text-center" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <div class="mb-3"><input class="form-control" type="text" name="email"
                                        placeholder="Email" value="<?php echo $username; ?>"></div>
                                <?php
                                if ($error && empty($username)) {
                                    echo "<div class='error'> <p>please enter your email</p></div>";
                                }
                                ?>
                                <br>
                                <div class="mb-3"><input class="form-control" type="password" name="pname"
                                        placeholder="Password" value="<?php echo $pwd; ?>"></div>
                                <?php
                                if ($error && empty($pwd)) {
                                    echo "<div class='error'><p>please enter your password</p> </div>";
                                }
                                ?>
                                <br>
                                <strong>What type of account?</strong><br>
                                <label>
                                    <input type="radio" name="account" value="student">Student
                                </label>
                                <br>
                                <label>
                                    <input type="radio" name="account" value="tutor">Tutor
                                </label>
                                <?php
                                if ($error && empty($accounttype)) {
                                    echo "<div class='error'> <p>please select account type</p> </div>";
                                }
                                ?>
                                <br>
                                <?php if (!is_null($loginOK) && ($loginOK==false)) echo "<div class='error'> <p>Username and password do not match</p> </div>"; ?>
                                <br>
                                <input class="btn btn-primary d-block w-100" name="submit" type="submit" value="Login">
                                <p class="text-muted"></p>
                            </form>
                            <a href="createProfIB.php">Sign up</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>