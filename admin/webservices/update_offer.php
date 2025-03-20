<?php
include '../includes/connection.php';
//Insert Coding
$title = $_POST["title"];
$discount = $_POST["discount"];
$code = $_POST["code"];
$id = $_POST["id"];

$result = mysqli_query($conn,"update offer set title='$title',disciunt='$discount',code='$code' where offer_id='$id'") or die(mysqli_error($conn));

if($result)
{
    echo "Updated";
}
else
{
    echo "Error";
}
