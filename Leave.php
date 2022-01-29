<?php

header('content-type: text/html ; charset=utf-8');

$_SERVER['REQUEST_METHOD']=='POST';

include_once("connect.php");


$member_email = $_POST['member_email']; 

$sql = "DELETE FROM member WHERE member_email='$member_email'";
$result=mysqli_query($con,$sql);
mysqli_commit($result);



?>