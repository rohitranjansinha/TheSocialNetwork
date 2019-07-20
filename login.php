<?php
	

	session_start();

	require 'Facebook/autoload.php';

	$fb = new Facebook\Facebook([
	  'app_id' => '619990641795261', // Replace {app-id} with your app id
	  'app_secret' => '39a342778fac86051c089befe626b6e6',
	  'default_graph_version' => 'v3.2',
	  ]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('http://localhost:8080/SocialNetwork/callback.php', $permissions);

	header("location:" . $loginUrl); // . '">Log in with Facebook!</a>';

?>