<?php
  session_start();

  if(isset($_SESSION['id'])) {
    require "rb.php";
    include "config.php";
    R::setup('mysql:host=$dbhost;dbname=$dbname', $dbu, $dbp);

    $user = R::load('users', $_SESSION['id']);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - Submit a Quote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/css/qdb.css" rel="stylesheet">
  </head>

  <body>

    <?php include("menu.php"); ?>

    <div class="container">

	  <div class="row">
		<div class="span8 offset2">
		  <h2>Submit a quote.</h2>
      <?php if(!$user->id) { ?>
      <p>You can only post if you're <a href="login.php">logged in</a>. You can still <a href="view.php">view posts</a>, however.</p>
      <?php } else { ?>
      <form class="form-horizontal" action="submit.php" method="POST">
        <textarea rows="10" name="quoteText"></textarea>
        <label class="checkbox">
          <input type="checkbox" name="anon"> Post Anonymously
        </label>
        <button type="submit" class="btn btn-success">Post</button>
      </form>
      <?php } ?>
	    </div>
	  </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>

    <script src="/js/jquery-1.9.0.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body></html>


