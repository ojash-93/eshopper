<?php
include '../includes/connection.php';
$result = mysqli_query($conn,"select * from review") or die(mysqli_error($conn));
$data=array();
while($row=mysqli_fetch_assoc($result))
{
    $data[]=$row;
}
echo json_encode($data);