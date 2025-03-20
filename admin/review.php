<?php session_start(); ?>
<?php include 'includes/connection.php' ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Offers</title>

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
                    <div class="col-md-6">
                        <h1 class="page-head-line">Manage review with ajax</h1>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <p id=""></p>
                        <form id="form1" role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>review Text</label>
                                <input class="form-control" id="reviewText" name="reviewText" type="text">
                                <input class="form-control" id="txtid" name="txtid" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" id="name" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <label>designation </label>
                                <input class="form-control" id="designation" name="designation" type="text">
                            </div>
                            <button type="submit" name="btn" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <div class="master-title">
                                    <p>All review</p>
                                    <a href="insert_review.php" class="btn btn-sm btn-primary">Add review</a>
                                </div>
                            </div>



                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> review Text </th>
                                                <th>name</th>
                                                <th>designation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result"></tbody>

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
    <script>
        function getdata() {

            $.ajax({
                url: "./webservices/getallreview.php",
                method: "GET",
                success: function(response) {
                    var op = "";
                    var data = JSON.parse(response);
                    $.each(data, function(index, obj) {
                        op = op + "<tr>";
                        op = op + "<td>" + obj.review_id + "</td>";
                        op = op + "<td>" + obj.review_text + "</td>";
                        op = op + "<td>" + obj.name + "</td>";
                        op = op + "<td>" + obj.designation + "</td>";
                        op = op + "<td><button data-id='" + obj.review_id + "' class='btndelete'>Delete</button> <button data-id='" + obj.review_id + "' class='btnedit'>Edit</button></td>";
                        op = op + "</tr>";
                    });
                    $("#result").html(op);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }



        $(document).ready(function() {

            getdata()


            $(document).on("click", ".btndelete", function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "./webservices/deletereview.php",
                    method: "POST",
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        $("#message").html("Success : " + response);
                        getdata();
                    },
                    error: function(error) {
                        alert(error);
                    }
                });
            })

            $(document).on("click", ".btnedit", function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "./webservices/getsinglereview.php",
                    method: "POST",
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        var json = JSON.parse(response);
                        $("#reviewText").val(json.review_text);
                        $("#name").val(json.name);
                        $("#designation").val(json.designation);
                        $("#txtid").val(json.review_id);
                    }, 
                    error: function(error) {
                        alert(error);
                    }
                });
            });



            //Insert
            $("#form1").submit(function(e) {
                e.preventDefault();
                if ($("#txtid").val() == "")
                    $.ajax({
                        url: "./webservices/insert_review.php",
                        method: "POST",
                        data: {
                            "review_Text": $("#reviewText").val(),
                            "name": $("#name").val(),
                            "designation": $("#designation").val(),
                            "id": $("#txtid").val()
                        },
                        success: function(response) {

                            $("#message").html("Success : " + response);
                            $('#form1').trigger("reset");
                            getdata()
                        },
                        error: function(error) {
                            alert(error);
                        }

                    });
                else {
                    $.ajax({
                        url: "./webservices/update_review.php",
                        method: "POST",
                        data: {
                            "review_Text": $("#reviewText").val(),
                            "name": $("#name").val(),
                            "designation": $("#designation").val(),
                            "id": $("#txtid").val()
                        },
                        success: function(response) {
                            $("#message").html("Success : " + response);
                            $('#form1').trigger("reset");
                            getdata();
                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                }
            });


        });
    </script>


</body>

</html>