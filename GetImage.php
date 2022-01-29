<?php
header('content-type: text/html ; charset=utf-8');

$_SERVER['REQUEST_METHOD']=='POST';

include_once("connect.php");

$member_email = $_POST['member_email']; 

$sql = "SELECT member_image FROM member WHERE member_email='$member_email'";
$result=mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

$profile_image=$row['member_image'];

$image_path = "http://3.35.11.53/ProfileImage/".$profile_image;

echo json_encode($image_path);


?>