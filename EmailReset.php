<?php

header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");


$member_email = $_POST['member_email'];
$inputemail = $_POST['inputemail'];

$query = "SELECT * FROM member WHERE member_email='$inputemail'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$good=$row['member_id'];

$sql = "UPDATE member SET member_email='$member_email' WHERE member_id =$good";
$result2 = mysqli_query($con, $sql);
mysqli_commit($result2);


?>