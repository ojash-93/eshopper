<?php session_start(); ?>
<?php include 'includes/connection.php' ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>uapdate Category</title>

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
                        <h1 class="page-head-line">uapdate Category</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <?php
                $id = $_GET["id"];
                $uresult = mysqli_query($conn, "select * from category where category_id='$id'") or die(mysqli_error($conn));
                $urow = mysqli_fetch_assoc($uresult);
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="master-title">
                                    <p>uapdate Category</p>
                                    <a href="category.php" class="btn btn-sm btn-primary">All Category</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" id="categoryname" value="<?php echo $urow["category_name"] ?>" name="categoryname" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" class="form-control" id="CategoryImage" name="CategoryImage" aria-describedby="emailHelp">
                                        <input class="form-control" id="oldImage" value="<?php echo $urow["category_image"] ?>" name="oldImage" type="hidden">
                                        <img src="uploads/<?php echo $urow["category_image"] ?>" width="100" />
                                    </div>



                                    <button type="submit" name="btn" class="btn btn-info">Submit</button>

                                </form>



                                <?php
                                if (isset($_POST["btn"])) {
                                    $name = $_POST["categoryname"];
                                    $Image = $_FILES["CategoryImage"];

                                    $id = $_GET["id"];
                                    $imagename = "";

                                    if (empty($_FILES["CategoryImage"]["name"])) {
                                        $imagename = $_POST["oldimage"];
                                    } else {
                                        // unlink('uploads/' . $_POST["oldimage"]);
                                        $img = $_FILES["CategoryImage"]["name"];
                                        $ext = pathinfo($img, PATHINFO_EXTENSION);
                                        $newname = rand(1111, 9999) . rand(1111, 9999) . "." . $ext;
                                        move_uploaded_file($_FILES["CategoryImage"]["tmp_name"], "uploads/" . $newname);
                                    }



                                    $result = mysqli_query($conn, "update category set category_name='$name',category_image='$newname' where category_id ='$id'") or die(mysqli_error($conn));

                                    if ($result == true) {
                                        echo "<script>window.location='category.php';</script>";
                                    } else {
                                        echo "Error";
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