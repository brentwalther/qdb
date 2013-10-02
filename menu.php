<?php
  $uAction = "Login";
  if(isset($_SESSION['id'])) {
    $uAction = "Logout";
  }
  $link = strtolower($uAction) .".php";
?>
<div class="navbar navbar-static-top">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <a class="brand" href="/qdb">Brent's QDB</a>
 
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li><a href="new.php">New</a></li>
          <li><a href="view.php">View</a></li>
          <?php echo "<li><a href='$link'>$uAction</a></li>"; ?>
        </ul>
      </div>
 
    </div>
  </div>
</div>