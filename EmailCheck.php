<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email'];

$sql = "SELECT * FROM member WHERE member_email = '$member_email'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$email_check = $row['member_email']; 

$member_nick = $row['member_nick']; 

if($email_check==$member_email){  // equals는 안된다 왜 그런가? == 과 차이는 무엇인가?
    echo "fail";
}else{
    echo "success";
}


//이메일 체크 후 nickname 반환(프로필 설정)
echo json_encode($member_nick);



?>