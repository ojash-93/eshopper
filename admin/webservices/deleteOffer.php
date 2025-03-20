<?php
include '../includes/connection.php';
$id = $_POST["id"];

$result = mysqli_query($conn,"delete from offer where offer_id='$id'") or die(mysqli_error($conn));

if($result)
{
    echo "Deleted";
}
else
{
    echo "Error";
}
