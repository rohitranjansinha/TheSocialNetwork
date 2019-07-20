<!DOCTYPE html>
<style type="text/css">
	body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #01579b !important;
		}

</style>
<html>
<head>
	<title>HOME</title>
	<link rel="icon" type="image/png" href="./images/logo.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body id="div1">
<?php 
  
  session_start();
  session_destroy();

?>
<div>
	<img src="./images/name.png" style="width:100%;">
</div>
<link rel="stylesheet" type="text/css" href="./login.css">
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b>Sign In</b></h5>
            <form class="form-signin" method="post" action="./login_success.php">
              <div class="form-label-group">
                <input type="text" id="inputUsename" class="form-control" placeholder="Username" name="username" required autofocus>
                <label for="inputUsename">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
            	<a href="#register" data-toggle="modal" data-target="#register">Not a member? Sign Up</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="./register_success.php" enctype="multipart/form-data">
        	<label for="emailID"><b>Email address</b></label>
            <input type="email" class="form-control" id="emailID" placeholder="Email ID" name="email">

			<label for="username"><b>Username</b></label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">            

            <label for="password"><b>Password</b></label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">

            <br>
            
            <label for="profile_photo"><b>Profile Photo</b></label>
            <input type="file" name="photo">

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
  </form>
    </div>
  </div>
</div>

</body>
</html>