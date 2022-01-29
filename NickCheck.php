<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_nick = $_POST['member_nick'];

$sql = "SELECT * FROM member WHERE member_nick = '$member_nick'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$nick_check = $row['member_nick']; 

if($nick_check==$member_nick){  // equals는 안된다 왜 그런가? == 과 차이는 무엇인가?
    echo "fail";
}else{
    echo "success";
}

?>