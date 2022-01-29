<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_pw = $_POST['member_pw'];

$sql = "UPDATE member SET member_pw = '$member_pw'";
$result = mysqli_query($con, $sql);
mysqli_commit($result);
?>