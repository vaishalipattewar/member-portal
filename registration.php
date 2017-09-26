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
$username=$_POST['username'];
$password=$_POST['password'];
$query="Insert into registration"."(Name,Email,ContactNumber,Profession,Location,username,password)".
"VALUES"."('$name','$email','$contactNo','$profession','$location','$username','$password')";
mysql_select_db('registration');
$result = mysql_query($query,$conn);
if(! $result )
{
  die('Could not enter data: ' . mysql_error());
}

<a href="/memberportal/index.php">
echo "Registered Succuessfully\n";

mysql_close($conn);
}

?>
