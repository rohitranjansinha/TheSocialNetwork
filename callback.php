<?php

	session_start();

	require 'Facebook/autoload.php';

	$fb = new Facebook\Facebook([
	  'app_id' => '619990641795261', // Replace {app-id} with your app id
	  'app_secret' => '39a342778fac86051c089befe626b6e6',
	  'default_graph_version' => 'v3.2',
	  ]);

	$helper = $fb->getRedirectLoginHelper();

	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (! isset($accessToken)) {
	  if ($helper->getError()) {
	    header('HTTP/1.0 401 Unauthorized');
	    echo "Error: " . $helper->getError() . "\n";
	    echo "Error Code: " . $helper->getErrorCode() . "\n";
	    echo "Error Reason: " . $helper->getErrorReason() . "\n";
	    echo "Error Description: " . $helper->getErrorDescription() . "\n";
	  } else {
	    header('HTTP/1.0 400 Bad Request');
	    echo 'Bad request';
	  }
	  exit;
	}

	// Logged in
	//echo '<h3>Access Token</h3>';
	$_SESSION['fb_access'] = $accessToken->getValue();

	//header("url=fb_profile.php");
	echo ($_SESSION['fb_access'] . '<BR>');
	//echo($accessToken->getValue() . '<br>');
//	header('location: fb_profile.php');
	//echo "<script type='text/javascript'>location.href = 'fb_profile.php';</script>";


	?>
	<script type="text/javascript">
	window.location.href = 'http://localhost:8080/SocialNetwork/fb_profile.php';
	</script>
<?php


?>