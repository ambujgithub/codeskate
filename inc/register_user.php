<?php 
	session_start();
	require_once("../classes/init.php");
	$objsession 	= new Session();
	$isfbuser 		= $objsession->getSession('isfbuser');
	$com = NULL;
	$fname = NULL;
	$username = NULL;
	$encpassword = NULL;
	$email = NULL;
	$timestamp = NULL;
	$dob = NULL;

	error_reporting(0);
	if(!empty($_POST['submit'])){
	
		$db 			= new Database();

		// Initialization for the encryption
		$method = base64_decode('QUVTLTEyOC1DQkM=');
		$pass = base64_decode('MTQoKWo1NzBhYm02bmMyM2RnaGkkJV4mKms4OWxvcHFyZUBmc3R1LV8rPS8qdnd4eXohIw==');
		$iv = openssl_random_pseudo_bytes(16);
		$enc 		= new Encrypt($method, $pass, $iv);

		$username	= $db::sanitize(trim($_POST['username']));
		$encpassword 	= trim($enc::secureEncrypt($_POST['password']));
		$com 		= $db->generateComCode();
		$timestamp 	= time();

		// if user is FB registered
		if($isfbuser) {
			$fname 		= $db::sanitize(trim($objsession->getSession('FULLNAME')));
			$email 		= $db::sanitize(trim($objsession->getSession('EMAIL')));
			$dob 		= $db::sanitize(trim($objsession->getSession('BIRTHDAY')));
		} else {
			// Getting POST values
			$fname 		= $db::sanitize(trim($_POST['fullname']));
			$email 		= $db::sanitize(trim($_POST['email']));
			$dob 		= $db::sanitize(trim($_POST['dob']));
		}
		
		$user 		= new Users();

		// Inserting values into the database
		if(!$user->checkUsername($username)){
			header("Location:../register.php");
		}

		if($isfbuser) {
			// User need not verify his email (Auto-verify using the link)
			$baseurl = $_SERVER['SERVER_NAME'];
			$res 		= $db->addContent(7, 'users', 'user_name', $fname, 'user_username', $username, 'user_email', $email , 'user_dob', $dob, 'user_pass', $encpassword, 'user_com_code', $com, 'timestamp', $timestamp);
			header("Location:http://{$baseurl}/codeskate/inc/verify_email.php?com_code={$com}");
		} else {
			// User needs to verify his/her email
			require_once("../sendmail.php");
		}

	}
?>