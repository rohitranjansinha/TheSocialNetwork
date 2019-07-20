<!DOCTYPE html>
<html>
<head>
	<title>SUCCESS</title>
	<link rel="icon" type="image/png" href="./images/logo.png">
</head>
<body>

<?php

$connect = mysqli_connect('127.0.0.1','root','');
if(!$connect)
{
	echo "Not connected";
}

if(!mysqli_select_db($connect,'Social'))
{
	echo "Nd database";
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$photoName = addslashes($_FILES["photo"]["name"]);
$photoTmpName = addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
$photoType = addslashes($_FILES["photo"]["type"]);

if(substr($photoType,0,5) == 'image')
{
	echo "Working";
	echo "<br>";
	echo(strlen($photoTmpName));
	echo("<br>");
}
else
{
	echo "Not Image";
	echo "<br>";
}

$encrypt = sha1($password);

$check = "SELECT * FROM User_Login_Details WHERE username='$username' ";
$search = mysqli_query($connect,$check);
$rows = mysqli_fetch_array($search);
//echo($rows);
//echo "<br>hy<br>";
if($rows)
{
	echo "<script type='text/javascript'>alert('username already exsists');</script>";
	header("refresh:0.1; url=home.php");
}
else
{
	echo $encrypt;
	$insert = "INSERT INTO User_Login_Details (username,password,email,photo) VALUES ('$username','$encrypt','$email', '$photoTmpName')";
//	echo($insert);
	$execute = mysqli_query($connect,$insert);
	echo($execute);
	echo("<br>hey<br>");
	if($execute)
	{
		echo "<script type='text/javascript'>alert('Registered Successfuly');</script>";
		header("refresh:0.1; url=home.php"); 
	}
	else
	{
		echo "<script type='text/javascript'>alert('Some problem has occured');</script>";
		header("refresh:0.1; url=home.php");
	}
}
?>
<br>

<?php

echo $username;?> <br>
<?php
echo $email;?> <br>
<?php
echo $password;
?> <br>
</body>
</html>