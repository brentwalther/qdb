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
          <div id="errors">
            <?php
            if(isset($_SESSION['error'])) {
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            }
            ?>
          </div>
          <h3>Register</h3>
          <form class="form-horizontal" action="controllers/login.php" method="POST">
            <input type="hidden" name="action" value="register">
            <div class="control-group">
              <label class="control-label" for="email">Email</label>
              <div class="controls">
                <input type="text" name="email" placeholder="Email"><span class="help-inline">To verify unique accounts.</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="username">Username</label>
              <div class="controls">
                <input type="text" name="username" placeholder="Username">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" name="password" placeholder="Password"><span class="help-inline">Must be 8 or more characters</span>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-success">Register</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>

    <script src="/js/jquery-1.9.0.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body></html>