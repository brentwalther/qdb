<?php
  session_start();
  require('rb.php');
  include('config.php');

  R::setup("mysql:host=$dbhost;dbname=$dbname", $dbu, $dbp);

  $user = R::load('users', $_SESSION['id']);

  if($user->admin == 0) {
    header("Location: /qdb/");
  }

  $posts = R::findAll('post'," ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brenet's QDB - View</title>
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
        <?php
        	$i = 0;
        	$total = count($posts)-1;
          echo "<table class='table table-striped'>";
        	foreach($posts as $post) {
        	  $text = $post->text;
            $stamp = $post->stamp;
            $author = R::load('users', $post->author)->username;
          		echo "<tr><td><a href='view.php?id=$post->id'>#$post->id</a></td><td>$author</td><td>$stamp</td><td>$text</td></tr>\n";
        	}
          echo "</table>";
          ?>
        </div>
      </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>
</body></html>