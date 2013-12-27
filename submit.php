<?php
	session_start();
	require('rb.php');
	include('config.php');

    R::setup("mysql:host=$dbhost;dbname=$dbname", $dbu, $dbp);

	$user = R::load('users', $_SESSION['id']);

	if(isset($_SESSION['id']) && isset($_POST['quoteText'])) {
		$post = R::dispense('post');
		$post->text = htmlspecialchars($_POST['quoteText']);
		$post->stamp = date("F jS, Y,  H:ia T");
		$post->author = $user->id;
		$post->anon = (isset($_POST['anon']) ? "yes" : "no");
		$post->deleted = 0;
		R::store($post, 'post');
		header( "Location: view.php?id=$post->id" ) ;
	}
	else {
		echo "You can't post if you aren't logged in!";
	}
?>




