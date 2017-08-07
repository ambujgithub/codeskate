<?php
	session_start();
	// Requiring the classes
	require_once "../classes/init.php";

	$objsession 	= new Session();
	$fbid 			= $objsession->getSession('FBID');
	$fbemail 		= $objsession->getSession('EMAIL');
	
	if(!empty($fbid) && !empty($fbemail)) {

		// User has been verified by the FB login
		$db 	= new Database();

		// Check if user has already signed up with that email
		$res 	= $db->searchContent(0, 'user_email', $fbemail, 'users');
		$row	= mysqli_fetch_array($res);
	
		$email		= $row['user_email'];
		$objsession->setSession('isfbuser', true);

		if($row['user_email']=='') {
			header("Location:../register.php");
		} else {
			// User has authenticated himself for - (email, fullname, DOB). Redirect to registration procedure (with fb priviliges).
			header("Location:../inc/login.php");
		} 

	} else {

		// Send back unauthorized users (Users without fb login)
		header("Location:../");

	}

