<?php
include '../includes/connection.php';
$id = $_POST["id"];

$result = mysqli_query($conn,"delete from review where review_id ='$id'") or die(mysqli_error($conn));

if($result)
{
    echo "Deleted";
}
else
{
    echo "Error";
}
