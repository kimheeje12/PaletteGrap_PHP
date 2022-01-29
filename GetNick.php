<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email']; 

$sql = "SELECT member_nick FROM member WHERE member_email='$member_email'";
$result=mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

$member_nick=$row['member_nick'];

echo json_encode($member_nick);



?>