
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
		session_start();
		echo ($_SESSION['username']);
		?>
		
	</title>
	<link rel="icon" type="image/png" href="./images/logo.png">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

	<style type="text/css">
			
				.fb-profile-block {
		  margin: auto;
		  position: relative;
		  width: 100%;
		}
		.cover-container{
		    background: #1E90FF;
		    background: -webkit-radial-gradient(bottom, #73D6F5 12%, #1E90FF);
		    background: radial-gradient(at bottom, #73D6F5 12%, #1E90FF)
		}
		.fb-profile-block-thumb{
		  display: block;
		  height: 315px;
		  overflow: hidden;
		  position: relative;
		  text-decoration: none;
		}
		.fb-profile-block-menu {
		  border: 1px solid #d3d6db;
		  border-radius: 0 0 3px 3px;
		}
		.profile-img a{
		    bottom: 15px;
		    box-shadow: none;
			display: block;
			left: 15px;
			padding:1px;
			position: absolute;
			height: 160px;
			width: 160px;
			background: rgba(0, 0, 0, 0.3) none repeat scroll 0 0;
			z-index:9;
		}
		.profile-img img {
		  background-color: #fff;
		  border-radius: 2px;
		  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.07);
		  height:200px;
		  padding: 5px;
		  width: 200px;
		}
		.profile-name {
		  bottom: 60px;
		  left: 200px;
		  position: absolute;
		}
		.profile-name h2 {
		  color: #fff;
		  font-size: 24px;
		  font-weight: 600;
		  line-height: 30px;
		  max-width: 275px;
		  position: relative;
		  text-transform: uppercase;
		}
		.fb-profile-block-menu{
		  height: 44px;
		  position: relative;
		  width:100%;
		  overflow:hidden;
		 }
		.block-menu {
		  clear: right;
		  padding-left: 205px;
		}
		.block-menu ul{
			margin:0;
			padding:0;
		}
		.block-menu ul li{
			display:inline-block;
		}
		.block-menu ul li a {
		  border-right: 1px solid #e9eaed;
		  float: left;
		  font-size: 14px;
		  font-weight: bold;
		  height: 42px;
		  line-height: 3.0;
		  padding: 0 17px;
		  position: relative;
		  vertical-align: middle;
		  white-space: nowrap;
		  color:#4b4f56;
		  text-transform:capitalize;
		}
		.block-menu ul li:first-child a{
		  border-left: 1px solid #e9eaed;
		}




	</style>

</head>


<body style="background-image: linear-gradient(to right top, #9e6bd1, #3d8cee, #00a4e9, #00b3cc, #00bda6, #11c39e, #2ac994, #41ce88, #1dd6a6, #00dcc2, #00e2dc, #18e7f2);">

	<div>
<img src="./images/final_name.png" alt="The Social Network" style="width: 90%; height: 20%;">
	<a href="login_success.php" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>


<?php

	//session_start();

	require 'Facebook/autoload.php';

	$fb = new Facebook\Facebook([
	  'app_id' => '619990641795261', // Replace {app-id} with your app id
	  'app_secret' => '39a342778fac86051c089befe626b6e6',
	  'default_graph_version' => 'v3.2',
	  ]);


	try {
	  // Returns a `Facebook\FacebookResponse` object
	  $responseUser = $fb->get('/me?fields=id,name,email,picture,gender,link,friends', $_SESSION['fb_access']);

	  $responseImage = $fb->get('/me/picture?redirect=false&width=300&height=300', $_SESSION['fb_access']);

	  $responseUserFriend = $fb->get('/me?fields=friends', $_SESSION['fb_access']);

	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	$user = $responseUser->getGraphUser();
	$image = $responseImage->getGraphUser();
	$friends = $responseUserFriend->getDecodedBody();
	//$sub_dir = $friends['friends']->getGraphEdge();
	//json_decode(json_decode($friends['friends']['summary'],true)['summary'],true);//['total_count'];
	//echo "<pre>";
	//print_r(($friends['friends']['summary']['total_count']));
//	print_r($image);
//	echo 'Name: ' . $user['name'];
	// OR
	// echo 'Name: ' . $user->getName();
    

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="fb-profile-block">
                <div class="fb-profile-block-thumb cover-container">
                	<img src="./images/rohit2.jpg" alt="coverphoto" style="margin-left: 16%;">
                </div>
                <div class="profile-img" style="margin-top: -3%;">
                    <a href="#">
                        <img src="<?php echo($image['url'])?>" alt="" title="">        
                    </a>
                </div>
                <div class="profile-name" style="margin-left: 3%; margin-bottom: -5%;">
                    <h2><?php echo($user['name']); ?></h2>
                </div>
            </div>
                
                <link rel="stylesheet" type="text/css" href="profile_style.css">
                <div style="margin-top: 3%;">
				<div class="tabs">
				  <div class="tab-button-outer">
				    <ul id="tab-button">
				      <li><a href="#tab01">About</a></li>
				      <li><a href="#tab02">Posts</a></li>
				      <li><a href="#tab03">Album</a></li>
				     
				    
				    </ul>
				  </div>
				  <div class="tab-select-outer">
				    <select id="tab-select">
				      <option value="#tab01">About</option>
				      <option value="#tab02">Posts</option>
				      <option value="#tab03">Album</option>
				      
				      
				    </select>
				  </div>

				  <div id="tab01" class="tab-contents">
				   
				  	
				  		<h2><?php echo($user['name']); ?></h2> <br>
				  	<p style="font-size: 25px; font-family: Comic Sans MS;"> 
				  		Email: <?php echo($user['email']); ?> <br>
				  		Gender: <?php echo($user['gender']); ?> <br>
				  		Facebook: <a href="<?php echo($user['link']); ?>">Click Here</a><br>
				  		Friends: <?php echo($friends['friends']['summary']['total_count']); ?> <br>
				  	</p>

				  </div>
				  <div id="tab02" class="tab-contents">
				    
				    <p>POSTS</p>
				  </div>
				  <div id="tab03" class="tab-contents">
				    
				    <p>ALBUM</p>
				  </div>
				  
				</div>

			</div>
            </div>
            
        
    </div>
</div>
		


		<script type="text/javascript">
						$(function() {
			  var $tabButtonItem = $('#tab-button li'),
			      $tabSelect = $('#tab-select'),
			      $tabContents = $('.tab-contents'),
			      activeClass = 'is-active';

			  $tabButtonItem.first().addClass(activeClass);
			  $tabContents.not(':first').hide();

			  $tabButtonItem.find('a').on('click', function(e) {
			    var target = $(this).attr('href');

			    $tabButtonItem.removeClass(activeClass);
			    $(this).parent().addClass(activeClass);
			    $tabSelect.val(target);
			    $tabContents.hide();
			    $(target).show();
			    e.preventDefault();
			  });

			  $tabSelect.on('change', function() {
			    var target = $(this).val(),
			        targetSelectNum = $(this).prop('selectedIndex');

			    $tabButtonItem.removeClass(activeClass);
			    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
			    $tabContents.hide();
			    $(target).show();
			  });
			});
		</script>
</body>
</html>