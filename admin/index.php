<?php session_start(); ?>
<?php include 'includes/connection.php' ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Offerid,title,disciunt,code -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
                    <form role="form" method="POST">
                        <hr />
                        <h5>Enter Details to Login</h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" name="Username" id="Username" class="form-control" placeholder="Your Username " />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="Password" id="Password" class="form-control" placeholder="Your Password" />
                        </div>

                        <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary ">Login Now</button>
                    </form>
                    <?php

                    if (isset($_POST["btnsubmit"])) {
                        $username = $_POST["Username"];
                        $password = $_POST["Password"];

                        $result = mysqli_query($conn, "select * from admin where username='$username' and password='$password'") or die(mysqli_error($conn));

                        if (mysqli_num_rows($result) == 0) {
                            echo "Login Fail";
                        } else {
                            $_SESSION["islogin"]="YES";
                            $row=mysqli_fetch_assoc($result);
                            $_SESSION["name"] = $row["name"];
                            $_SESSION["id"] = $row["admin_id"];
                            echo "<script>window.location='dashboard.php';</script>";
                        }

                        
                    }
                    ?>




                </div>

            </div>



        </div>
    </div>

</body>

</html>