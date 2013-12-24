<?php
  $uAction = "Login";
  $registerLink = "<li><a href=\"register.php\">Register</a></li>";
  if(isset($_SESSION['id'])) {
    $uAction = "Logout";
    $registerLink = "";
  }
  $link = strtolower($uAction) .".php";
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-links">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/qdb">Brent's QDB</a>
    </div>

    <div class="collapse navbar-collapse" id="nav-links">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="new.php">New</a></li>
        <li><a href="view.php">View</a></li>
        <?php echo $registerLink; ?>
        <?php echo "<li><a href='$link'>$uAction</a></li>"; ?>
      </ul>
    </div>
  </div>
</nav>