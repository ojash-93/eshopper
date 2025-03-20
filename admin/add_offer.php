<?php session_start(); ?>
<?php include 'includes/connection.php'?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add offer</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
    <?php include 'includes/header.php' ?>
        <!-- /. NAV TOP  -->
        <?php include 'includes/menu.php' ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Manage offer</h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                  <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="master-title">
                                    <p>Add Category</p>
                                    <a href="offer.php" class="btn btn-sm btn-primary">All offer</a>
                                </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>tital</label>
                                            <input class="form-control" id="textital" name="textital" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>disciunt</label>
                                            <input class="form-control" id="texdisciunt" name="texdisciunt" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>code </label>
                                            <input class="form-control" id="texcode" name="texcode" type="text">
                                        </div>
                                        
                           
                                  
                                 
                                        <button type="submit" name="btn" class="btn btn-info">Submit</button>

                                    </form>



                                    <?php
                                    if(isset($_POST["btn"]))
                                    {
                                        $title = $_POST["textital"];
                                        $disciunt =$_POST["texdisciunt"];
                                        $code =$_POST["texcode"];


                                       

                                        $result = mysqli_query($conn,"insert into offer (title,disciunt,code)  values ('$title','$disciunt','$code')")or dir(mysqli_error($conn));

                                        if($result== true)
                                        {
                                            echo "insert saccess";
                                        }
                                        else
                                        {
                                            echo "insert error";
                                        }
                        
        
                                    }
                                    
                                    
                                    ?>
                            </div>
                        </div>
                     <!-- End  Kitchen Sink -->
                </div>
               
            </div>
            

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php include 'includes/footer.php' ?>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
