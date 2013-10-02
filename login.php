<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - Login</title>
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
          <h3>Login</h3>
          <form class="form-horizontal" action="controllers/login.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="control-group">
              <label class="control-label" for="username">Username</label>
              <div class="controls">
                <input type="text" name="username" placeholder="Username"><span class="help-inline">Don't have a username? <a href="register.php">Register.</a></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" name="password" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-success">Log in</button>
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