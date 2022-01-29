<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$member_email = $_POST['member_email']; 

$category10 = $_POST['category10']; //전체
$category0 = $_POST['category0']; //일러스트
$category1 = $_POST['category1']; //소묘
$category2 = $_POST['category2']; //만화
$category3 = $_POST['category3']; //유화
$category4 = $_POST['category4']; //캐리커쳐
$category5 = $_POST['category5']; //이모티콘
$category6 = $_POST['category6']; //낙서
$category7 = $_POST['category7']; //민화
$category8 = $_POST['category8']; //캘리그래피
$category9 = $_POST['category9']; //기타

$contentArr = array();
$response=array();

$query= "SELECT * FROM feed AS f JOIN member AS m on f.member_email=m.member_email JOIN image AS i on f.feed_id=i.feed_id, 
        (SELECT MIN(image_id) tmp_imageid, feed_id FROM image GROUP BY feed_id) tmp 
        WHERE f.feed_id=tmp.feed_id and tmp.tmp_imageid=i.image_id";     
$result= mysqli_query($con,$query);

$i=0;
while($row= mysqli_fetch_array($result)){
        $i++;
//전체  
        if($category10==10){
        $contentArr['member_email']=$row['member_email']; //이메일
        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
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
        
// 일러스트           
        }else if($row['feed_category']==$category0){
        $contentArr['member_email']=$row['member_email']; //이메일
        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//소묘        
        }else if($row['feed_category']==$category1){
        $contentArr['member_email']=$row['member_email']; //이메일
        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
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
//만화        
        }else if($row['feed_category']==$category2){
        $contentArr['member_email']=$row['member_email']; //이메일
        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//유화        
        }else if($row['feed_category']==$category3){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//캐리커쳐        
        }else if($row['feed_category']==$category4){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//이모티콘        
        }else if($row['feed_category']==$category5){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//낙서       
        }else if($row['feed_category']==$category6){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//민화       
        }else if($row['feed_category']==$category7){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//캘리그래피       
         }else if($row['feed_category']==$categor8){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
//기타        
        }else if($row['feed_category']==$category9){
                $contentArr['member_email']=$row['member_email']; //이메일

        $contentArr['feed_category']=$row['feed_category']; //피드 카테고리        
        $contentArr["feed_id"]=$row["feed_id"]; // 피드 일련번호 
        $contentArr["member_nick"]=$row["member_nick"]; // 회원 nick 
        $image_path ="http://3.35.11.53/ProfileImage/".$row["member_image"];
        $contentArr["member_image"]=$image_path; // 프로필 이미지 
        $contentArr["feed_text"]=$row["feed_text"]; // 피드 text 
        $contentArr["feed_drawingtool"]=$row["feed_drawingtool"]; // 사용도구
        $contentArr["feed_drawingtime"]=$row["feed_drawingtime"]; // 소요시간 
        $contentArr["feed_created"]=$row["feed_created"]; // 피드 작성일
    
        $image_path2 ="http://3.35.11.53/Images/".$row["image_path"];
        $contentArr["image_path"]= $image_path2;  // 피드 이미지
    
        $response[]=$contentArr;
        
    }
}

echo json_encode($response);






?>