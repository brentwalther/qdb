<?php
  session_start();
  require('rb.php');
  require('config.php');

  R::setup("mysql:host=$dbhost;dbname=$dbname", $dbu, $dbp);
 
  $id = 0;
  $page = $_GET['page'];
  if($page < 1)
    $page = 1;

  $totalPosts = R::count('post');
  $displayedPosts = ($totalPosts < 10 ? $totalPosts : 10);
  $start = $displayedPosts * ($page - 1);
  $pageStart = $page - 2;
  $pageEnd = $page + 2;

  if(isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $posts = R::find('post', ' id = ? ', 
                array( $id )
               );
  }
  if(count($posts) == 0) {
    $posts = R::findAll('post'," ORDER BY id DESC LIMIT ". ($start > 0 ? $start."," : "") . $displayedPosts);
  }

  if($pageEnd > ceil($totalPosts / $displayedPosts)) {
    $pageEnd = ceil($totalPosts / $displayedPosts);
    if(($pageEnd - 4) > 0) {
      $pageStart = $pageEnd - 4;
    }
  }
  if($pageStart < 1)
    $pageStart = 1;

  $displayedPosts = count($posts);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Brent's QDB - View</title>
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

          <ul class="breadcrumb">
            <li class="active"><a href="view.php">View</a></li>
<?php if($id > 0) {
        echo "<li><span class='divider'>-&gt;</span>&nbsp;<a href='view.php?id=$id'>#$id</a></li>";
      }?>
            <li class="pull-right"><?php echo "Showing $displayedPosts of $totalPosts";?></li>
          </ul>
<?php if($id == 0 || $id > $displayedPosts) { ?>
          <div class="pagination pagination-centered">
            <ul>
      <?php 
      echo "<li><a href='view.php?page=". ($page-1 > 0 ? $page-1 : $page)."'>&lt;</a></li>";
      while($pageStart <= $pageEnd) {
              $button = "<li";
              if($pageStart == $page)
                $button .= " class='active'";
              $button .= "><a href='view.php?page=$pageStart'>$pageStart</a></li>";
              echo $button;
              $pageStart++;
      }
      echo "<li><a href='view.php?page=". ($page+1 <= $pageEnd ? $page+1 : $page)."'>&gt;</a></li>";
      ?>
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

    <script src="/js/jquery-1.9.0.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body></html>