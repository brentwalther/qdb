<?php
  session_start();
  $error = "";
  if(!empty($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $_SESSION['error'] = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Brent's Quote Database Forgot Password Page">
    <meta name="author" content="Brent Walther">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/qdb.css" rel="stylesheet">
  </head>

  <body>

    <?php include("menu.php"); ?>

    <div class="container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <?php echo $error ?>
          <h3>Forgot Password</h3>
          <p>Enter your email address. You'll be sent an email with a link to reset your password.</p>
          <form role="form" action="controllers/login.php" method="POST">
            <input type="hidden" name="action" value="forgot">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" placeholder="Email Address">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>
</body></html>