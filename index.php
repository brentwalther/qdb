<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - Home</title>
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
          <h2>Brent's Quote Database</h1>
          <p>This is where people I know submit funny quotes. It's like a scrapbook of words. You can either <a href="new.php">submit a new quote</a> (you must be logged in!) or <a href="view.php">view quotes</a> that have already been submitted.</p>
        </div>
      </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>

    <script src="/js/jquery-1.9.0.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body></html>