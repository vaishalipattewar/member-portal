<?php
include('session.php');
?>
<?php
if(isset($_POST['submit']))
{
$conn=mysql_connect('localhost', 'root', '');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$name= $_POST['name'];
$email= $_POST['email'];
$contactNo= $_POST['contactNo'];
$profession=$_POST['profession'];
$location=$_POST['location'];
$sql = "UPDATE registration SET Name='$name',Email='$email',ContactNumber='$contactNo',Profession='$profession',Location='$location' WHERE username='$login_session'";
if (mysql_query($sql,$conn)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysql_error($conn);
}

mysql_close($conn);
}
?>