<?php

$connect = mysqli_connect('127.0.0.1','root','');
if(!$connect)
{
	echo "<script type='text/javascript'>alert('Some problem has occured');</script>";
	header("refresh:0; url=home.php");
}
if(!mysqli_select_db($connect,'Social'))
{
	echo "<script type='text/javascript'>alert('Some problem has occured');</script>";
	header("refresh:0; url=home.php");
}


//echo($encrypt);
session_start();
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$encrypt  = sha1($password);
}
else
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$encrypt = sha1($password);
}

$query = "SELECT * FROM User_Login_Details WHERE username='$username' AND password='$encrypt' ";
$result = mysqli_query($connect,$query);
$rows = mysqli_fetch_array($result);

if(mysqli_num_rows($result)==0)
{
	echo "<script type='text/javascript'>alert('Invalid username or password');</script>";
	header("refresh:0; url=home.php");
}
else
{
	//echo("<br>Entering while<br>");
	$row = mysqli_fetch_array($result);
	$rows[] = $row;
	//echo(mysqli_num_rows($result));
	//echo('<br>'.$rows['username']);
	$username = $rows['username'];
	$photo = $rows['photo'];
	//echo(strlen($photo));
	?>

	<?php

	
	if(!isset($_SESSION['username']))
	{
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['photo'] = $photo;
	}

	?>

	<br>
	<center>
		<?php
	//		echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['photo'] ).'" width="250" height="250"/>'
		?>
	</center>
<?php
	
	//echo("Outside while");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $username; ?></title>
	<link rel="icon" type="image/png" href="./images/logo.png">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	
	<style type="text/css">
		span{
    font-size:15px;
}
a{
  text-decoration:none; 
  color: #0062cc;
  border-bottom:2px solid #0062cc;
}
.box{
    padding:60px 0px;
}

.box-part{
    background:#FFF;
    border-radius:0;
    padding:60px 10px;
    margin:30px 0px;
}
.text{
    margin:20px 0px;
}

.fa{
     color:#4183D7;
}
	</style>

</head>
<body  style="background-image: linear-gradient(to right bottom, #4cc9e7, #51bff4, #70b3f9, #97a3f4, #bb91e3, #df84cb, #f67cab, #ff7b87, #ff905e, #eeb03c, #c0cf3b, #72eb6c);">
<link rel="stylesheet" type="text/css" href="./sidenav_css.css">
<div>
<img src="./images/final_name.png" alt="The Social Network" style="width: 90%; height: 20%;">
	<a href="./home.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
 	</a>
</div>

<div>
<center>
		<?php
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['photo'] ).'" width="250" height="250" class="img-circle"/>'
		?>
</center>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="box">
    <div class="container">
     	<div class="row">
			 
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                        
						<div class="title">
							<h4>Instagram</h4>
						</div>
                        
						<div class="text">
							<span>
								Seize the moment !!
							</span>
						</div>
                        
						<a href="#">Get Access Toke</a> <br><br>
						<a href="#">See Profile</a>
                        
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
					    
					    <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
                    
						<div class="title">
							<h4>Twitter</h4>
						</div>
                        
						<div class="text">
							<span>
								See whats happening on the planet !!
							</span>
						</div>
                        
						<a href="#">Get Access Toke</a> <br><br>
						<a href="#">See Profile</a>
                        
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <i class="fa fa-facebook fa-3x" aria-hidden="true"></i>
                        
						<div class="title">
							<h4>Facebook</h4>
						</div>
                        
						<div class="text">
							<span>
								Staying Connected !!
							</span>
						</div>
                        
						<a href="#">Get Access Toke</a> <br><br>
						<a href="login.php">See Profile</a>
                        
					 </div>
				</div>	 
				 
		</div>		
    </div>
</div>


</body>
</html>