<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Delete prof</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<?php
require_once('db.php');
session_start();
$accounttype = "";
$email="";

if (isset($_SESSION["username"]))
    $email = $_SESSION["username"];
if (isset($_SESSION["accounttype"]))
    $accounttype = $_SESSION["accounttype"];


if ($accounttype == "student") {
        $sql = "delete from Student where studentemail='$email'";
        $result = $mydb->query($sql);
        echo "<b> Student record deleted ! </b>";
        unset($_SESSION["username"]);
        session_destroy(); 
}
else {
        $sql = "delete from Tutor where tutoremail='$email'";
        $result = $mydb->query($sql);
        echo "<b> Tutor record deleted ! </b>";
        unset($_SESSION["username"]);
        session_destroy();
}

?>
<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5"><img src="assets/img/vt%20tutorR.png">
                            <h2 class="text-center mb-4">Profile Delete&nbsp;</h2>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                                <div class="mb-3"></div>
                                <div class="form-group">
                                <div class="mb-3"></div><input class="form-control" style="background-color:#FCF5D8" type="text" id="acctype" name="accounttype"  value="<?php echo $accounttype; ?>" readonly>
                                <br>
                                <div class="mb-3"></div><input class="form-control" style="background-color:#FCF5D8" type="text" id="email" name="email"  value="<?php echo $email; ?>" readonly>
                                <br>
                                
                            </form>
                            <br>
                            <br>
                            <a href="LoginIB.php">Back to Login/Sign Up Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>