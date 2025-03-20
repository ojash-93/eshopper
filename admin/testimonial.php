<?php session_start(); ?>
<?php include 'includes/connection.php' ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>testimonial</title>

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
                        <h1 class="page-head-line">Manage testimonial</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <!-- <?php
                // if (isset($_GET["id"])) {
                //     $id = $_GET["id"];
                //     $imgname = $_GET["imgname"];
                //     unlink("uploads/". $imgname);
                //     $result = mysqli_query($conn, "delete from category where category_id = '$id'") or die(mysqli_errno($conn));
                //     if ($result) {
                //         header('Location: category.php');
                //     } else {
                //         echo "Delete Error";
                //     }
                // }
                ?> -->

                <div class="row">
                    <div class="col-md-12">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <div class="master-title">
                                    <p>All testimonial</p>
                                    <a href="add_testimonial.php" class="btn btn-sm btn-primary">Add testimonial</a>
                                </div>
                            </div>



                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>testimonial text </th>
                                                <th>name</th>
                                                <th>designation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php


                                        $result = mysqli_query($conn, "select * from testimonial") or die(mysqli_error($conn));
                                        $num =  mysqli_num_rows($result);
                                        echo "Total Record = " . $num;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>



                                                <td><?php echo $row["testimonial_id"] ?> </td>
                                                <td><?php echo $row["text"] ?> </td>
                                                <td><?php echo $row["name"] ?> </td>
                                                <td><?php echo $row["designation"] ?> </td>
                                               
                                                <td><a href="../testimonial.php">Details</a></td>
                                              

                                            <?php
                                        }
                                            ?>
                                    </table>

                                </div>
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