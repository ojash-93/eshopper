<?php session_start(); ?>
<?php include 'includes/connection.php' ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>add_product</title>

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

                <div class="row">
                    <div class="col-md-12">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="master-title">
                                    <p>Add Category</p>
                                    <a href="product.php" class="btn btn-sm btn-primary">All product</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="txtcategory" class="form-label">Category</label>
                                        <select class="form-control" id="txtcategory" name="txtcategory" aria-describedby="emailHelp">
                                            <option>Please select category</option>
                                            <?php
                                            $result = mysqli_query($conn, "select * from category ") or dir(mysqli_error($conn));
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                                            <?php
                                            } ?>
                                        </select>


                                        <div class="mb-3">
                                            <label for="txttital" class="form-label">
                                            title</label>
                                            <input type="text" class="form-control" id="txttital" name="txttital" aria-describedby="emailHelp">
                                        </div>

                                        <div class="mb-3">
                                            <label for="txtprice" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="txtprice" name="txtprice" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>

                                        <div>
                                            Is available <br>
                                            <input type="radio" id="Is_available" name="Is_available" value="Yas" checked> Yes
                                            <input type="radio" id="Is_available" name="Is_available" value="NO"> No

                                        </div>
                                        <div>
                                            is displaye <br>
                                            <input type="radio" name="is_displaye" value="Yas" checked> Yes
                                            <input type="radio" name="is_displaye" value="No">No

                                        </div>
                                        <div class="mb-3">
                                            <label for="txtimage" class="form-label">Large image</label>
                                            <input type="file" class="form-control" id="x" name="large_image" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtimage" class="form-label">Thumbnail image</label>
                                            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image" aria-describedby="emailHelp">
                                        </div>

                                        <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                                </form>



                                <?php
                                if (isset($_POST["btnsubmit"])) {
                                 
                                    $Tital = $_POST["txttital"];
                                    $Price = $_POST["txtprice"];
                                    $Description = $_POST["description"];
                                    $Is_available = $_POST["Is_available"];
                                    $is_displaye = $_POST["is_displaye"];
                                    $category_id = $_POST["txtcategory"];


                                    $large_image = $_FILES["large_image"]["name"];
                                   
                                    $ext = pathinfo($large_image, PATHINFO_EXTENSION);
                                    $newname = rand(1111, 9999) . rand(1111, 9999) . "." . $ext;
                                    move_uploaded_file($_FILES["large_image"]["tmp_name"], "uploads/" . $newname);


                                    $thumbnail_image = $_FILES["thumbnail_image"]["name"];

                                    $ext = pathinfo($thumbnail_image, PATHINFO_EXTENSION);
                                    $newname2 = rand(4444, 9449) . rand(1222,14149) . "." . $ext;
                                    move_uploaded_file($_FILES["thumbnail_image"]["tmp_name"], "uploads/" . $newname2);



                                    $result = mysqli_query($conn, "insert into product (title,price,Description,Is_available,is_displaye,large_image,thumbnail_image,Category_id)  values ('$Tital','$Price','$Description','$Is_available','$is_displaye','$newname','$newname2','$category_id')") or dir(mysqli_error($conn));

                                    if ($result == true) {
                                        echo "insert saccess";
                                    } else {
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