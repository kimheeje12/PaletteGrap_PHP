<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email'];
$member_pw = $_POST['member_pw'];

$query="UPDATE member SET member_pw='$member_pw' WHERE member_email = '$member_email'";
$result2=mysqli_query($con,$query);
mysqli_commit($result2);

$sql = "SELECT * FROM member WHERE member_email = '$member_email'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$email_check = $row['member_email']; 

if($email_check==$member_email){  // equals는 안된다 왜 그런가? == 과 차이는 무엇인가?
    echo "success";
}else{
    echo "fail";
}

?>