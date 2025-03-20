<?php
include '../includes/connection.php';

$reviewText = $_POST["review_Text"];
$name = $_POST["name"];
$designation = $_POST["designation"];


$result = mysqli_query($conn,"insert into review (review_text,name,designation) values ('$reviewText','$name','$designation')") or die(mysqli_error($conn));

if($result)
{
    echo "Inserted";
}
else
{
    echo "Error";
}
