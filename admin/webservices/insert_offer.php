<?php
include '../includes/connection.php';
//Insert Coding
$title = $_POST["title"];
$discount = $_POST["discount"];
$code = $_POST["code"];


$result = mysqli_query($conn,"insert into offer (title,disciunt,code) values ('$title','$discount','$code')") or die(mysqli_error($conn));

if($result)
{
    echo "Inserted";
}
else
{
    echo "Error";
}
