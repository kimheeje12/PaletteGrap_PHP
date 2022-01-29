<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_pw = $_POST['member_pw'];

$sql = "SELECT * FROM member WHERE member_pw = '$member_pw'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$pw_check = $row['member_pw']; 

if($pw_check==$member_pw){  // equals는 안된다 왜 그런가? == 과 차이는 무엇인가?
    echo "success";
}else{
    echo "fail";
}



?>