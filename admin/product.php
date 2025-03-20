<?php session_start(); ?>
<?php include 'includes/connection.php' ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>product</title>

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
                        <h1 class="page-head-line">Manage product</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <?php
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $imgname = $_GET["imgname"];
                    unlink("uploads/" . $imgname);
                    $result = mysqli_query($conn, "delete from product where product_id = '$id' ") or die(mysqli_errno($conn));
                    if ($result) {
                        header('Location: product.php');
                    } else {
                        echo "Delete Error";
                    }
                }
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="master-title">
                                    <p>All Category</p>
                                    <a href="add_product.php" class="btn btn-sm btn-primary">Add product</a>
                                </div>
                            </div>



                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>category</th>
                                                <th>title</th>
                                                <th>Price</th>
                                                <th>Description </th>
                                                <th> Is available </th>
                                                <th>is_displaye</th>
                                                <th>large_image</th>
                                                <th>thumbnail_image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <?php


                                        $result = mysqli_query($conn, "select * from product") or die(mysqli_error($conn));
                                        $num =  mysqli_num_rows($result);
                                        echo "Total Record = " . $num;
                                        while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                           
                                        ?>
                                            <tr>
                                                <td><?php echo $row["product_id"] ?> </td>
                                                <td><?php echo $row["product_id"] ?> </td>
                                                <td><?php echo $row["title"] ?> </td>
                                                <td><?php echo $row["price"] ?> </td>
                                                <td><?php echo $row["Description"] ?> </td>
                                                <td><?php echo $row["Is_available"] ?> </td>
                                                <td><?php echo $row["is_displaye"] ?> </td>
                                                <td> <img src="uploads/<?php echo $row["large_image"] ?>" width="100" /></td>
                                                <td>
                                                    <img src="uploads/<?php echo $row["thumbnail_image"] ?>" width="100" />
                                                </td>


                                                <td>
                                                    <a href="updatecategory.php?id=<?php echo $row["product_id"] ?>" class="btn btn-sm btn-info">Edit</a><br><br>
                                                    <a href="?id=<?php echo $row["product_id"] ?>&imgname=<?php echo $row["large_image"] ?>" class="btn btn-sm btn-danger">delet</a>
                                                    <a target="_blank" href="http://localhost/eshopper/shop-detail.php?id=<?php echo $row["product_id"] ?>">Show</a>

                                                </td>
                                        </tr>

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