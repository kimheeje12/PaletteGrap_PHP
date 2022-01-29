<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email'];
$member_pw = $_POST['member_pw'];

$sql = "SELECT * FROM member WHERE member_email = '$member_email'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);

$emparray = array();

if($row['member_email']==$member_email && $row['member_pw']==$member_pw){ 
    echo "success";
}else{
    echo "fail";
}


?>