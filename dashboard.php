<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="dashboard"><span id="tab"><a href="#">Dashboard</a></span></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<?php
include_once("connect.php");

$sql = "select * from registration where username='$login_session'";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('name'=>$row[0],'email'=>$row[1],'contactNo'=>$row[2],'profession'=>$row[3],'location'=>$row[4],
));
}
 ?>
<form id="form1" name="form1" action="/memberportal/update.php" method="post">
<table align="center" cellspacing="10" columnspan="2">
    <tr><td>Name<span style="color:#FB0933">*</span>: </td>
    <td><input type="text" name="name" id="name" size="20" value="<?php echo $result[0]['name'];?>"></td></tr>
    <tr><td>E-mail<span style="color:#FB0933">*</span>:</td> 
    <td><input type="email" name="email" id="email" size="20" maxlength="30" value="<?php echo $result[0]['email'];?>"></td></tr>
    <tr><td>Contact No<span style="color:#FB0933">*</span>:</td> 
    <td><input type="number" name="contactNo" id="mobileNo" size="20" maxlength="10" minlength="10" value="<?php echo $result[0]['contactNo'];?>"></td></tr>
    <tr><td>Profession<span style="color:#FB0933">*</span>:</td> 
    <td><input type="text" name="profession" id="profession" size="20" value="<?php echo $result[0]['profession'];?>"></td></tr>
    <tr><td>Location<span style="color:#FB0933">*</span>:</td> 
    <td><input type="text" name="location" id="location" size="20" value="<?php echo $result[0]['location'];?>"></td></tr>
    <tr><td><center><input type="submit" name="submit" value="Update"></center></td></tr>

</table>
</form>
 <?php
mysqli_close($con);
 
?>
</body>
</html>