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
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .error
        {
            color:red;
        }
    </style>
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
                        <h1 class="page-head-line">Manage Offers with ajax</h1>
                       
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                    <p id="message"></p>
                    <form id="form1" role="form" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" id="textital" name="textital" type="text">
                                <input class="form-control" id="txtid" name="txtid" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input class="form-control" id="texdisciunt" name="texdisciunt" type="text">
                            </div>
                            <div class="form-group">
                                <label>Code </label>
                                <input class="form-control" id="texcode" name="texcode" type="text">
                            </div>
                            <button type="submit" name="btn" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <div class="master-title">
                                    <p>All offer</p>
                                    <a href="add_offer.php" class="btn btn-sm btn-primary">Add offer</a>
                                </div>
                            </div>



                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> tital </th>
                                                <th>disciunt</th>
                                                <th>code</th>
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
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>

        function getdata()
        {
            $.ajax({
                url:"./webservices/getAllOffer.php",
                method:"GET",
                success:function(response)
                {
                    var op="";
                   var data = JSON.parse(response);
                    $.each(data, function(index,obj) {
                       op=op+"<tr>";
                       op=op+"<td>"+obj.offer_id+"</td>";
                       op=op+"<td>"+obj.title+"</td>";
                       op=op+"<td>"+obj.disciunt+"</td>";
                       op=op+"<td>"+obj.code+"</td>";
                       op=op+"<td><button data-id='"+obj.offer_id+"' class='btndelete'>Delete</button><button data-id='"+obj.offer_id+"' class='btnedit'>Edit</button></td>";
                       op=op+"</tr>";
                    });
                    $("#result").html(op);
                    new DataTable('#mytable');
                },
                error:function(error)
                {
                    console.log(error);
                }
            });
        }

        $(document).ready(function(){

            //validations
            $("#form1").validate({
                rules:
                {
                    textital:
                    {
                        required:true
                    },
                    texdisciunt:
                    {
                        required:true
                    },
                    texcode:
                    {
                        required:true
                    },
                },
                success: function() {
                    //alert('valid!')
                }
            });
            

              //View
              getdata();

              //delete

              $(document).on("click",".btndelete",function(){
                var id = $(this).attr("data-id");
                $.ajax({
                    url:"./webservices/deleteOffer.php",
                    method:"POST",
                    data:{"id":id},
                    success:function(response)
                    {
                        $("#message").html("Success : "+ response);
                        getdata();
                    },
                    error:function(error)
                    {
                        alert(error);
                    }
                });
              });

              //Edit

              $(document).on("click",".btnedit",function(){
                var id = $(this).attr("data-id");
                $.ajax({
                    url:"./webservices/getsingleoffer.php",
                    method:"POST",
                    data:{"id":id},
                    success:function(response)
                    {
                       var json=JSON.parse(response);
                      $("#textital").val(json.title);
                      $("#texdisciunt").val(json.disciunt);
                      $("#texcode").val(json.code);
                      $("#txtid").val(json.offer_id);
                    },
                    error:function(error)
                    {
                        alert(error);
                    }
                });
              });

           


            $("#form1").submit(function(e){
                e.preventDefault();
                if($("#form1").valid())
                {
                    if($("#txtid").val()=="")
                    {
                        $.ajax({
                            url:"./webservices/insert_offer.php",
                            method:"POST",
                            data:{
                                "title":$("#textital").val(),
                                "discount":$("#texdisciunt").val(),
                                "code":$("#texcode").val(),
                            },
                            success:function(response)
                            {
                                $("#message").html("Success : "+ response);
                                $('#form1').trigger("reset");
                                getdata();
                            },
                            error:function(error)
                            {
                                alert(error);
                            }
                        });
                    }
                    else
                    {
                        $.ajax({
                            url:"./webservices/update_offer.php",
                            method:"POST",
                            data:{
                                "title":$("#textital").val(),
                                "discount":$("#texdisciunt").val(),
                                "code":$("#texcode").val(),
                                "id":$("#txtid").val()
                            },
                            success:function(response)
                            {
                                $("#message").html("Success : "+ response);
                                $('#form1').trigger("reset");
                                getdata();
                            },
                            error:function(error)
                            {
                                alert(error);
                            }
                        });
                    }
                }
                
               
            });



        });
    </script>


</body>

</html>