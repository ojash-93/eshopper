<?php
include '../includes/connection.php';
//Insert Coding

$reviewText = $_POST["review_Text"];
$name = $_POST["name"];
$designation = $_POST["designation"];

$id = $_POST["id"];

$result = mysqli_query($conn,"update review set review_text='$reviewText',name='$name',designation='$designation' where review_id ='$id'") or die(mysqli_error($conn));

if($result)
{
    echo "Updated";
}
else
{
    echo "Error";
}
