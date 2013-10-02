<?php
	if(!isset($_POST['action'])) {
		exit();
	}

	require "../rb.php";
	require "AlertBuilder.php";
	include "../config.php";
	R::setup('mysql:host=$dbhost;dbname=$dbname', $dbu, $dbp);

	$action = $_POST['action'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	session_start();

	if($action == "login") {
		$user = R::findOne('users', ' username = ? ', array($username));
		if(!$user->id) {
			$_SESSION['error'] = AlertBuilder::buildAlert("Username and/or password are invalid.", AlertBuilder::ERROR);
			header("Location: /qdb/login.php");
			exit();
		}

		$salt = $user->salt;
		$hash = hash("sha256", $salt . $password . $secret);
		if(strcmp($hash, $user->password) != 0) {
			$_SESSION['error'] = AlertBuilder::buildAlert("Username and/or password are invalid.", AlertBuilder::ERROR);
			header("Location: /qdb/login.php");
			exit();
		}

		$_SESSION['id'] = $user->id;

		header("Location: /qdb/");
	}
	else if($action == "register") {

		$emailCheck = R::findOne('users', ' email = ? ', array($email));
		$nameCheck = R::findOne('users', ' username = ? ', array($username));

		$failed = false;
		if($emailCheck->id) {
			$_SESSION['error'] .= AlertBuilder::buildAlert("A user is already registered with that email.", AlertBuilder::ERROR);
			$failed = true;
		}
		if($nameCheck->id) {
			$_SESSION['error'] .= AlertBuilder::buildAlert("A user is already registered with that username.", AlertBuilder::ERROR);
			$failed = true;
		}
		if(strlen($password) < 8) {
			$_SESSION['error'] .= AlertBuilder::buildAlert("That password is too short.", AlertBuilder::ERROR);
			$failed = true;
		}

		if($failed) {
			header("Location: /qdb/register.php");
			exit();
		}

		// Register the user
		$user = R::dispense('users');

		$salt = hash("sha256", mt_rand(1000000000,9999999999));
		$hash = hash("sha256", $salt . $password . $secret);

		$user->email = $email;
		$user->username = $username;
		$user->salt = $salt;
		$user->password = $hash;
		$user->enabled = 1;

		R::store($user, 'users');
		session_start();
		$_SESSION['id'] = $user->id;
		header("Location: /qdb/");
	}
?>