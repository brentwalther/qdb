<?php
  session_start();
  require('rb.php');
  require('config.php');

  R::setup("mysql:host=$dbhost;dbname=$dbname", $dbu, $dbp);

  $id = 0;
  if(isset($_GET['page']))
    $page = max($_GET['page'], 1);
  else
    $page = 1;

  $totalPosts = R::count('post');
  $displayedPosts = min($totalPosts, 10);
  $offset = $displayedPosts * ($page - 1);

  $firstPage = 1;
  $lastPage = ceil($totalPosts / $displayedPosts);
  $pageEnd = min($page + 3, $lastPage);
  $pageStart = max($firstPage, $lastPage - 7);

  $posts = array();
  if(isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $posts = R::find('post', ' id = ? ', array( $id ) );
  }
  if(count($posts) == 0) {
    $posts = R::findAll('post'," ORDER BY id DESC LIMIT ". $displayedPosts ." OFFSET ". $offset);
  }

  $displayedPosts = count($posts);
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

    <?php include("menu.php"); ?>

    <div class="container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">

          <div class="well well-sm">
            <a href="view.php">View</a><?php if($id > 0) { echo "&nbsp;&rarr;&nbsp;<a href='view.php?id=$id'>#$id</a>"; }?>
            <span class="pull-right"><?php echo "Showing $displayedPosts of $totalPosts";?></span>
          </div>

<?php
          if($id == 0) { ?>
            <div class="text-center">
              <ul class="pagination">
<?php
                echo "<li><a href='view.php?page=". max(1, $page-1)."'>&lt;</a></li>";
                while($pageStart <= $pageEnd) {
                  $button = "<li";
                  if($pageStart == $page)
                    $button .= " class='active'";
                  $button .= "><a href='view.php?page=$pageStart'>$pageStart</a></li>";
                  echo $button;
                  $pageStart++;
                }
                echo "<li><a href='view.php?page=". min($page+1, $pageEnd) ."'>&gt;</a></li>"; ?>
              </ul>
            </div>
<?php
          }
          $i = 0;
          $total = count($posts)-1;
          foreach($posts as $post) {
            $text = $post->text;
            $stamp = $post->stamp;
            $author = ($post->anon == "yes" ? "Anonymous" : R::load('users', $post->author)->username);
            $anon = $post->anon;
            echo "<pre>$text</pre>\n";
                echo "<h6><a href='view.php?id=$post->id'>#$post->id</a> <small>Posted by $author on $stamp</small></h6>\n";
                if($i++ != $total) {
                  echo "<hr>\n";
                }
          } ?>
        </div>
      </div>

      <hr>

      <?php include("footer.php"); ?>

    </div>
</body></html>