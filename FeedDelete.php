<?php
header('content-type: text/html; charset=utf-8');

$_SERVER['REQUEST_METHOD'] == 'POST';

include_once("connect.php");

$feed_id = $_POST['feed_id']; 

$query= "DELETE FROM image WHERE feed_id = '$feed_id'";     
$result= mysqli_query($con,$query);
mysqli_commit($result); 

$query2 = "DELETE FROM feed WHERE feed_id = '$feed_id'";   
$result2= mysqli_query($con,$query2);
mysqli_commit($result2); 


?>