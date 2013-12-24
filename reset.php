<?php
  session_start();
  require('rb.php');
  require('config.php');

  R::setup("mysql:host=$dbhost;dbname=$dbname", $dbu, $dbp);

  $validHash = R::count('users',' reset_hash = ?', array($_GET['l'])) > 0;

  if(!$validHash)
    header("Location: /qdb/");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - Reset your password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration page for Brent's Quote Database">
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
          <div id="errors">
            <?php
            if(isset($_SESSION['error'])) {
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            }
            ?>
          </div>
          <h3>Reset your password</h3>
          <form action="controllers/login.php" method="POST">
            <input type="hidden" name="action" value="reset">
            <input type="hidden" name="hash" value="<?php echo $_GET['l']; ?>">
            <div class="form-group">
              <label for="password">New Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
              <span class="help-block">Must be 8 or more characters</span>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Reset</button>
            </div>
          </form>
        </div>
      </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>
</body></html>