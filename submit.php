<?php
	session_start();
	require('rb.php');
	include('config.php');

    R::setup('mysql:host=localhost;dbname=brentwal_db1', $dbu, $dbp);

	//Ready. Now insert a bean!
	//$user = R::dispense('user');
	//$user->username = "brentwalther";
	//$user->email = "brent@walther.io";

	//R::store($user, 'user');

	$user = R::load('users', $_SESSION['id']);

	//echo $user->username ." ". $user->email ."\n";
	if(isset($_SESSION['id']) && isset($_POST['quoteText'])) {
		$post = R::dispense('post');
		$post->text = $_POST['quoteText'];
		$post->stamp = date("F jS, Y,  H:ia T");
		$post->author = $user->id;
		$post->anon = (isset($_POST['anon']) ? "yes" : "no");
		R::store($post, 'post');
		header( "Location: view.php?id=$post->id" ) ;
	}
	else {
		echo "You can't post if you aren't logged in!";
	}
?>




