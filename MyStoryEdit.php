<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$feed_id = $_POST['feed_id']; // 피드 일련번호
$member_email = $_POST['member_email']; // 이메일
$feed_text = $_POST['feed_text']; //피드 내용(text)
$CntImage = $_POST['CntImage']; //이미지 갯수
$feed_category = $_POST['feed_category']; // 피드 카테고리
$feed_drawingtime = $_POST['feed_drawingtime']; // 소요시간
$feed_drawingtool = $_POST['feed_drawingtool']; // 사용도구
$image_path = $_POST['image_path']; // 기존 이미지 경로

$image_path_split = explode('///',$image_path);

$array0=$image_path_split[1]; 
$array1=$image_path_split[4]; 
$array2=$image_path_split[7]; 
$array3=$image_path_split[10];
$array4=$image_path_split[13]; 
$array5=$image_path_split[16]; 
$array6=$image_path_split[19]; 
$array7=$image_path_split[22]; 
$array8=$image_path_split[25];
$array9=$image_path_split[28];

if(strpos($array0, 'http://3.35.11.53/Images/')!==false){
    $image0=basename($array0,'http://3.35.11.53/Images/');

}if(strpos($array0, '/data/user/0/com.example.palettegrap/')!==false){
    $image00=basename($array0,'/data/user/0/com.example.palettegrap/');

}if(strpos($array1, 'http://3.35.11.53/Images/')!==false ){
    $image1=basename($array1,'http://3.35.11.53/Images/');    

}if(strpos($array1, '/data/user/0/com.example.palettegrap/')!==false){
    $image01=basename($array1,'/data/user/0/com.example.palettegrap/');

}if(strpos($array2, 'http://3.35.11.53/Images/')!==false ){
    $image2=basename($array2,'http://3.35.11.53/Images/');    

}if(strpos($array2, '/data/user/0/com.example.palettegrap/')!==false){
    $image02=basename($array2,'/data/user/0/com.example.palettegrap/');

}if(strpos($array3, 'http://3.35.11.53/Images/')!==false ){
    $image3=basename($array3,'http://3.35.11.53/Images/');    

}if(strpos($array3, '/data/user/0/com.example.palettegrap/')!==false){
    $image03=basename($array3,'/data/user/0/com.example.palettegrap/');

}if(strpos($array4, 'http://3.35.11.53/Images/')!==false ){
    $image4=basename($array4,'http://3.35.11.53/Images/');    

}if(strpos($array4, '/data/user/0/com.example.palettegrap/')!==false){
    $image04=basename($array4,'/data/user/0/com.example.palettegrap/');

}if(strpos($array5, 'http://3.35.11.53/Images/')!==false ){
    $image5=basename($array5,'http://3.35.11.53/Images/');   

}if(strpos($array5, '/data/user/0/com.example.palettegrap/')!==false){
    $image05=basename($array5,'/data/user/0/com.example.palettegrap/');

}if(strpos($array6, 'http://3.35.11.53/Images/')!==false ){
    $image6=basename($array6,'http://3.35.11.53/Images/'); 

}if(strpos($array6, '/data/user/0/com.example.palettegrap/')!==false){
    $image06=basename($array6,'/data/user/0/com.example.palettegrap/');

}if(strpos($array7, 'http://3.35.11.53/Images/')!==false ){
    $image7=basename($array7,'http://3.35.11.53/Images/'); 

}if(strpos($array7, '/data/user/0/com.example.palettegrap/')!==false){
    $image07=basename($array7,'/data/user/0/com.example.palettegrap/');
      
}if(strpos($array8, 'http://3.35.11.53/Images/')!==false ){
    $image8=basename($array8,'http://3.35.11.53/Images/');  

}if(strpos($array8, '/data/user/0/com.example.palettegrap/')!==false){
    $image08=basename($array8,'/data/user/0/com.example.palettegrap/');

}if(strpos($array9, 'http://3.35.11.53/Images/')!==false ){
    $image9=basename($array9,'http://3.35.11.53/Images/');  

}if(strpos($array9, '/data/user/0/com.example.palettegrap/')!==false){
    $image09=basename($array9,'/data/user/0/com.example.palettegrap/');    
}

$file_path='./Images/';

    //DB UPDATE!
    //피드 테이블 데이터 입력 쿼리를 먼저 작성하고 피드 일련번호를 빼내와서 이미지 테이블에 함께 넣기!
    $sql="UPDATE feed SET feed_category=$feed_category, feed_text='$feed_text', feed_drawingtool='$feed_drawingtool', 
    feed_drawingtime='$feed_drawingtime' WHERE feed_id=$feed_id";
    $result=mysqli_query($con,$sql);
    mysqli_commit($result); 

    // //피드 테이블에서 피드 아이디값 가져오기
    $query = "SELECT max(feed_id) FROM feed WHERE member_email='$member_email'";
    $result2=mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result2);
    $feed_id2=$row['max(feed_id)'];

    // // //피드 테이블에서 피드 카테고리 가져오기
    // $query2 = "SELECT feed_category FROM feed WHERE feed_id='$feed_id2'";
    // $result4=mysqli_query($con,$query2);
    // $row2 = mysqli_fetch_assoc($result4);
    // $feed_category2=$row2["feed_category"];

// if(!empty($image0)){
//     $sql2="UPDATE image SET image_path='$image0' WHERE feed_id=$feed_id2 order by image_id";
//     $result5=mysqli_query($con,$sql2);
//     mysqli_commit($result5); 
// }if(!empty($image00)){
//     $sql3="UPDATE image SET image_path='$image00.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result6=mysqli_query($con,$sql3);
//     mysqli_commit($result6); 
// }if(!empty($image1)){
//     $sql4="UPDATE image SET image_path='$image1' WHERE feed_id=$feed_id2 order by image_id";
//     $result7=mysqli_query($con,$sql4);
//     mysqli_commit($result7); 
// }if(!empty($image01)){
//     $sql5="UPDATE image SET image_path='$image01.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result8=mysqli_query($con,$sql5);
//     mysqli_commit($result8); 
// }if(!empty($image2)){
//     $sql6="UPDATE image SET image_path='$image2' WHERE feed_id=$feed_id2 order by image_id";
//     $result9=mysqli_query($con,$sql6);
//     mysqli_commit($result9); 
// }if(!empty($image02)){
//     $sql7="UPDATE image SET image_path='$image02.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result10=mysqli_query($con,$sql7);
//     mysqli_commit($resut10); 
// }if(!empty($image3)){
//     $sql8="UPDATE image SET image_path='$image3' WHERE feed_id=$feed_id2 order by image_id";
//     $result11=mysqli_query($con,$sql8);
//     mysqli_commit($result11); 
// }if(!empty($image03)){
//     $sql9="UPDATE image SET image_path='$image03.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result12=mysqli_query($con,$sql9);
//     mysqli_commit($result12); 
// }if(!empty($image4)){
//     $sql10="UPDATE image SET image_path='$image4' WHERE feed_id=$feed_id2 order by image_id";
//     $result13=mysqli_query($con,$sql10);
//     mysqli_commit($result13); 
// }if(!empty($image04)){
//     $sql11="UPDATE image SET image_path='$image04.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result14=mysqli_query($con,$sql11);
//     mysqli_commit($result14); 
// }if(!empty($image5)){
//     $sql12="UPDATE image SET image_path='$image5' WHERE feed_id=$feed_id2 order by image_id";
//     $result15=mysqli_query($con,$sql12);
//     mysqli_commit($result15); 
// }if(!empty($image05)){
//     $sql13="UPDATE image SET image_path='$image05.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result16=mysqli_query($con,$sql13);
//     mysqli_commit($result16); 
// }if(!empty($image6)){
//     $sql14="UPDATE image SET image_path='$image6' WHERE feed_id=$feed_id2 order by image_id";
//     $result17=mysqli_query($con,$sql14);
//     mysqli_commit($result17); 
// }if(!empty($image06)){
//     $sql15="UPDATE image SET image_path='$image06.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result18=mysqli_query($con,$sql15);
//     mysqli_commit($result18); 
// }if(!empty($image7)){
//     $sql16="UPDATE image SET image_path='$image7' WHERE feed_id=$feed_id2 order by image_id";
//     $result19=mysqli_query($con,$sql16);
//     mysqli_commit($result19); 
// }if(!empty($image07)){
//     $sql17="UPDATE image SET image_path='$image07.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result20=mysqli_query($con,$sql17);
//     mysqli_commit($result20); 
// }if(!empty($image8)){
//     $sql18="UPDATE image SET image_path='$image8' WHERE feed_id=$feed_id2 order by image_id";
//     $result21=mysqli_query($con,$sql18);
//     mysqli_commit($result21); 
// }if(!empty($image08)){
//     $sql19="UPDATE image SET image_path='$image08.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result22=mysqli_query($con,$sql19);
//     mysqli_commit($result22); 
// }if(!empty($image9)){
//     $sql20="UPDATE image SET image_path='$image9' WHERE feed_id=$feed_id2 order by image_id";
//     $result23=mysqli_query($con,$sql20);
//     mysqli_commit($result23); 
// }if(!empty($image09)){
//     $sql21="UPDATE image SET image_path='$image09.jpeg' WHERE feed_id=$feed_id2 order by image_id";
//     $result24=mysqli_query($con,$sql21);
//     mysqli_commit($result24); 
// }

$cnt = 0;

for($i=0; $i<$CntImage; $i++){

//20자 랜덤 문자열 생성 -> 이름이 같은 사진을 구별하기 위해 랜덤으로 텍스트를 뽑은 다음 불러오기!
    $random_str_generator=random_str_generator(20);

    $tmp_File = $_FILES['image'.$i]['tmp_name'];
    $image_File = basename($_FILES['image'.$i]['name'],'.jpeg'); 
    
    $file_path2=$file_path.basename($image_File).date("y-m-d").$random_str_generator.'.jpeg'; 
    $DB_imagefile=basename($image_File).date("y-m-d").$random_str_generator.'.jpeg';

    move_uploaded_file($tmp_File, $file_path2); 

//DB 이미지 UPDATE! 
//이미지 테이블에서 피드 아이디 값과 함께 이미지 경로 넣기
    $query2="UPDATE image SET image_path='$DB_imagefile', feed_category=$feed_category WHERE feed_id=$feed_id2)";
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