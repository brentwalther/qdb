<?php
  $uAction = "Login";
  if(isset($_SESSION['id'])) {
    $uAction = "Logout";
  }
  $link = strtolower($uAction) .".php";
?>
<div class="footer">
  &copy; 2013 <a href="/">Brent Walther</a>
</div>