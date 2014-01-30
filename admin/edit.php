<?php
  session_start();
  require('../rb.php');
  require('../config.php');

  R::setup("mysql:host=$dbhost;dbname=$dbname", $dbu, $dbp);

  if(isset($_POST['id']) && $_POST['id'] > 0) {
    $id = $_POST['id'];
    $posts = R::find('post', ' id = ? ', array( $id ) );
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="View funny quotes from the life of Brent">
    <meta name="author" content="Brent Walther">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/qdb.css" rel="stylesheet">
  </head>

  <body>

    <?php include("../menu.php"); ?>

    <div class="container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">

          <div class="well well-sm">
            <a href="view.php">Editing</a><?php if($id > 0) { echo "&nbsp;<a href='edit.php?id=$id'>#$id</a>"; }?>
          </div>
<?php
          $i = 0;
          $total = count($posts)-1;
          foreach($posts as $post) {
            if($post->deleted == 1) {
              continue;
            }
            $text = $post->text;
            $stamp = $post->stamp;
            $author = ($post->anon == "yes" ? "Anonymous" : R::load('users', $post->author)->username);
            $anon = $post->anon;
            echo "<textarea>$text</textarea>\n";
            echo "<h6><a href='view.php?id=$post->id'>#$post->id</a> <small>Posted by $author on $stamp</small></h6>\n";
          } ?>
        </div>
      </div>

      <hr>

      <?php include("../footer.php"); ?>

    </div>
</body></html>