<?php

header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");


$member_nick = $_POST['member_nick'];
$inputemail = $_POST['inputemail'];

$query = "SELECT * FROM member WHERE member_email='$inputemail'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$good=$row['member_id'];

$sql = "UPDATE member SET member_nick='$member_nick' WHERE member_id =$good";
$result2 = mysqli_query($con, $sql);
mysqli_commit($result2);


?>