<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email']; // 이메일
$feed_text = $_POST['feed_text']; //피드 내용(text)
$CntImage = $_POST['CntImage']; //이미지 갯수
$feed_category = $_POST['feed_category']; // 피드 카테고리
$feed_drawingtime = $_POST['feed_drawingtime']; // 소요시간
$feed_drawingtool = $_POST['feed_drawingtool']; // 사용도구

$file_path='./Images/';

    //DB에 넣기
    //피드 테이블 데이터 입력 쿼리를 먼저 작성하고 피드 일련번호를 빼내와서 이미지 테이블에 함께 넣기!
    $sql="INSERT INTO feed(member_email, feed_text, feed_category, feed_drawingtime, feed_drawingtool, feed_created) 
    VALUES ('$member_email','$feed_text','$feed_category','$feed_drawingtime','$feed_drawingtool',now())";
    $result=mysqli_query($con,$sql);
    mysqli_commit($result); 

    //피드 테이블에서 피드 아이디값 가져오기
    $query = "SELECT max(feed_id) FROM feed WHERE member_email='$member_email'";
    $result2=mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result2);
    $feed_id=$row['max(feed_id)'];

    //피드 테이블에서 피드 카테고리 가져오기
    $query2 = "SELECT feed_category FROM feed WHERE feed_id='$feed_id'";
    $result4=mysqli_query($con,$query2);
    $row2 = mysqli_fetch_assoc($result4);
    $feed_category2=$row2["feed_category"];

//이미지 디렉토리와 DB에 넣기!
for($i=0; $i<$CntImage; $i++){

    //20자 랜덤 문자열 생성 -> 이름이 같은 사진을 구별하기 위해 랜덤으로 텍스트를 뽑은 다음 불러오기!
    $random_str_generator=random_str_generator(20);

    $tmp_File = $_FILES['image'.$i]['tmp_name'];
    $image_File = basename($_FILES['image'.$i]['name'],'.jpeg'); 
    
    $file_path2=$file_path.basename($image_File).date("y-m-d").$random_str_generator.'.jpeg'; 
    $DB_imagefile=basename($image_File).date("y-m-d").$random_str_generator.'.jpeg';

    move_uploaded_file($tmp_File, $file_path2); 

    //DB에 넣기
    //이미지 테이블에서 피드 아이디 값과 함께 이미지 경로 넣기
    $query2="INSERT INTO image(feed_id, image_path, feed_category, image_created) VALUES ('$feed_id','$DB_imagefile','$feed_category2',now())";
    $result3=mysqli_query($con,$query2);
    mysqli_commit($result3); 

}

//20자 랜덤 문자열 생성
function random_str_generator ($length = 20){
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $var_size = strlen($chars);
    $RandomString =""; 
    for($x = 0; $x < $length; $x++) {  
        $RandomString= $chars[ rand( 0, $var_size - 1 ) ];  
    }
    return $RandomString;
}


?>