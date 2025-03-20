<?php
include '../includes/connection.php';
$id = $_POST["id"];

$result = mysqli_query($conn,"select * from offer where offer_id ='$id'") or die(mysqli_error($conn));
$response=array();
$row=mysqli_fetch_assoc($result);
$response=$row;
echo json_encode($response);