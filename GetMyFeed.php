<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email']; 

$contentArr=array();
$response=array();

// $query2= "SELECT * FROM feed AS f JOIN member AS m on f.member_email=m.member_email JOIN image AS i on f.feed_id=i.feed_id WHERE f.member_email='$member_email'";         

$query= "SELECT * FROM feed AS f JOIN member AS m on f.member_email=m.member_email JOIN image AS i on f.feed_id=i.feed_id, 
        (SELECT MIN(image_id) tmp_imageid, feed_id FROM image GROUP BY feed_id) tmp 
        WHERE f.feed_id=tmp.feed_id and tmp.tmp_imageid=i.image_id and f.member_email = '$member_email'";  
$result= mysqli_query($con,$query);

$i=0;
while ($row= mysqli_fetch_array($result)){
    $i++;
    
    $contentArr["feed_category"]=$row["feed_category"]; //피드 카테고리
    $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
    $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
    $image_path="http://3.35.11.53/ProfileImage/".$row["member_image"]; //프로필 이미지 최종 경로 설정
    $contentArr["member_image"]=$image_path; // 프로필 이미지 
    $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
    $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
    $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
    $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일

    $image_path2 ="http://3.35.11.53/Images/".$row["image_path"]; //피드 이미지 최종 경로 설정
    $contentArr["image_path"]= $image_path2;  // 피드 이미지

    $response[]=$contentArr;

}

echo json_encode($response);



?>