<?php
include_once("connect.php");

$sql = "select * from registration";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('name'=>$row[0],'email'=>$row[1],'ContactNumber'=>$row[2],'Profession'=>$row[3],'Location'=>$row[4],
));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>