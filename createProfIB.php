<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>create prof</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<?php
require_once('db.php');
$accountType = "";
$name= "";
$email="";
$passwd="";
$class1=0;
$class2=0;
$error=false;

if (isset($_POST["submit"])) {
    if (isset($_POST["accountType"]))
        $accountType = $_POST["accountType"];
    if (isset($_POST["name"]))
        $name = $_POST["name"];
    if (isset($_POST["email"]))
        $email = $_POST["email"];
    if (isset($_POST["passwd"]))
        $passwd = $_POST["passwd"];
    if (isset($_POST["class1"]))
        $class1 = $_POST["class1"];
    if (isset($_POST["class2"]))
        $class2 = $_POST["class2"];
    if ($accountType==NULL || empty($name) || empty($email)|| empty($passwd)) {
        $error = true;
    }

    if (!$error) {

        if ($accountType == "Student") {
            $sql = "INSERT INTO `Student` VALUES ('$email','$name','$passwd',$class1,$class2)";

            $result = $mydb->query($sql);
            if($result==1) {
                echo "<p>A new Student record has been added</p>";
            }
            header("HTTP/1,1 307 Temporary Redirect");
            header("Location: loginIB.php");
        }
        else {
            $sql = "INSERT INTO `Tutor` VALUES ('$email','$name','$passwd',0,$class1,$class2,0)";

            $result = $mydb->query($sql);
            //if($result==1) {
            //    echo "<p>A new Tutor record has been added</p>";
            //}
            header("HTTP/1,1 307 Temporary Redirect");
            header("Location: loginIB.php"); 
        }
    }
}
?>
<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5"><img src="assets/img/vt%20tutorR.png">
                            <h2 class="text-center mb-4">Sign up&nbsp;</h2>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                                <div class="mb-3"></div>
                                <div class="form-group">
                                <select class="form-control" name="accountType" placeholder = "Account type:" value="<?php echo $accountType; ?>">>
                                    <option value = NULL>Choose Account Type</option>    
                                    <option> Student</option>
                                    <option> Tutor</option>
                                    </select>
                                </div>
                                <?php
                                if ($error && $accountType==NULL) {
                                    echo "<div class='error'> <p>please select account type</p></div>";
                                }
                                ?>
                                <br>
                                <div class="mb-3"></div><input class="form-control" type="text" id="name-2" name="name" placeholder="Name:" value="<?php echo $name; ?>">
                                <?php
                                if ($error && empty($name)) {
                                    echo "<div class='error'> <p>please enter your name</p></div>";
                                }
                                ?>
                                <br>
                                <div class="mb-3"><input class="form-control" type="email" id="email-2" name="email" placeholder="Email:" value="<?php echo $email; ?>">
                                <?php
                                if ($error && empty($email)) {
                                    echo "<div class='error'> <p>please enter your email</p></div>";
                                }
                                ?>
                                <br>
                                <div class="mb-3"><input class="form-control" type="password" name="passwd" placeholder="Password:"value="<?php echo $passwd; ?>">
                                <?php
                                if ($error && empty($passwd)) {
                                    echo "<div class='error'> <p>please enter your password</p></div>";
                                }
                                ?>
                                <br>
                                <div class="mb-3"></div>
                                <div class="form-group">
                                <select class="form-control" name="class1" value="<?php echo $class1; ?>">>
                                    <option value = NULL>Choose Class 1</option>    
                                    <option value = "1">BIT4444</option>
                                    <option value = "2">BIT3444</option>
                                    <option value = "3">MKTG3104</option>
                                    <option value = "4">MKTG3164</option>
                                    <option value = "5">MKTG3504</option>
                                    <option value = "6">BIT3524</option>
                                    <option value = "7">MGT3604</option>
                                    <option value = "8">MGT3614</option>
                                    <option value = "9">MGT2104</option>
                                    </select>
                                </div>

                                <br>
                                <div class="mb-3"></div>
                                <div class="form-group">
                                <select class="form-control" name="class2" value="<?php echo $class2; ?>">>
                                    <option value=NULL>Choose Class 2</option>    
                                    <option value = "1">BIT4444</option>
                                    <option value = "2">BIT3444</option>
                                    <option value = "3">MKTG3104</option>
                                    <option value = "4">MKTG3164</option>
                                    <option value = "5">MKTG3504</option>
                                    <option value = "6">BIT3524</option>
                                    <option value = "7">MGT3604</option>
                                    <option value = "8">MGT3614</option>
                                    <option value = "9">MGT2104</option>
                                    </select>
                                </div>
                                <div class="mb-3"></div>
                                <input class="btn btn-primary d-block w-100" name="submit" type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>