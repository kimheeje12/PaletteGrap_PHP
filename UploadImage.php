<?php
header('content-type:image/jpeg ; charset=utf-8');

$_SERVER['REQUEST_METHOD']=='POST';

include_once("connect.php");

    //$_FILES['image']['name']   클라이언트에 존재하는 파일의 원래 이름
    //$_FILES['image']['tmp_name']  서버에 저장된 임시 파일 이름


//basename - 순수 파일명만 알 수 있는 함수
//ex) $pathName='/uploadfile/sampleimage.jpg'
//$modName=basement($pathName)
//echo $modName => sampleimage.jpg


$file_path='./ProfileImage/';
$tmp_File = $_FILES['image']['tmp_name'];
 
$profile_File = $_FILES['image']['name']; 

$file_path2=$file_path.basename($profile_File).'.jpeg'; 
move_uploaded_file($tmp_File, $file_path2); //서버로 전송된 파일을 저장할 때 사용하는 함수

$query="INSERT INTO member(member_image) VALUES ('$file_path2')";
$result=mysqli_query($con,$query);
mysqli_commit($result);



?>