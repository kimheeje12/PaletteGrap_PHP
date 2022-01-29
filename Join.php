<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email']; 
$member_pw = $_POST['member_pw'];
$member_nick = $_POST['member_nick'];

//$_FILES['image']['name']   클라이언트에 존재하는 파일의 원래 이름
//$_FILES['image']['tmp_name']  서버에 저장된 임시 파일 이름


//basename - 순수 파일명만 알 수 있는 함수
//ex) $pathName='/uploadfile/sampleimage.jpg'
//$modName=basement($pathName)
//echo $modName => sampleimage.jpg

//isset() -> 변수에 값이 있고 없음을 boolean으로 반환해준다. null값이라면 true 반환!

$file_path='./ProfileImage/';

$tmp_File = $_FILES['image']['tmp_name'];
$profile_File = basename($_FILES['image']['name'],'.jpeg'); 
$file_path2=$file_path.basename($profile_File).'.jpeg'; 
$DB_imagefile=basename($profile_File).'.jpeg';

if($member_nick==null){
    move_uploaded_file($tmp_File, $file_path2); //서버로 전송된 파일을 저장할 때 사용하는 함수
    $query="UPDATE member SET member_image= '$DB_imagefile' WHERE member_email='$member_email'";
    $result=mysqli_query($con,$query);
    mysqli_commit($result);
}else{
    if($tmp_File==null){ 
        $query2="INSERT INTO member(member_email,member_pw,member_nick,member_created) VALUES ('$member_email','$member_pw','$member_nick',now())";
        $result2=mysqli_query($con,$query2);
        mysqli_commit($result2);
    }else{
        move_uploaded_file($tmp_File, $file_path2); 
        $query3="INSERT INTO member(member_email,member_pw,member_nick,member_image,member_created) VALUES ('$member_email','$member_pw','$member_nick','$DB_imagefile',now())";
        $result3=mysqli_query($con,$query3);
        mysqli_commit($result3);
    }
}

?>