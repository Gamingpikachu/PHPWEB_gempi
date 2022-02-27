

<?php
function print_title(){
  if(isset($_GET['id'])){
    echo htmlspecialchars($_GET['id']);
  } else {
    echo "반가워요";
  }
}
function print_description(){
  if(isset($_GET['id'])){
    echo htmlspecialchars(file_get_contents("data/".$_GET['id']));
  } else {
    echo "";
  }
}
function print_list(){
  $list = scandir('./data');
  $i = 0;
  while($i < count($list)){
    $title = htmlspecialchars($list[$i]);
    if($list[$i] != '.') {
      if($list[$i] != '..') {
        echo "<li><a href=\"index.php?id=$title\">$title</a></li>\n";
      }
    }
    $i = $i + 1;
  }
}
  ?>



<!doctype HTML>
<html>
  <head>
    <meta charset = "utf-8">
    <title>겜피</title>
  </head>


  <body>

    <a href="logout.php">로그아웃</a>
    <h1><a href="index.php">겜피</a></h1>
    <aside>
      <?php
        $list = scandir('./data');
        $i = 0;
        while($i < count($list)){
        $title = htmlspecialchars($list[$i]);
        if($list[$i] != '.') {
        if($list[$i] != '..') {
        echo "<li><a href=\"index.php?id=$title\">$title</a></li>\n";
        }
      }
      $i = $i + 1;
      }
    ?>

    <br><a href=create.php>글 쓰기</a>

    <?php if(isset($_GET['id'])) {?>
      <a href="update.php?id=<?=$_GET['id']?>">글 수정</a>
        <form action="delete_process.php" method="post">
          <input type ="hidden" name="id" value="<?=$_GET['id']?>">
          <input type="submit" value="delete">
        </form>
      </aside>
      <section>
    <article>
          <?php
        } ?>
        <h2>
          <?php
          echo print_title();
          ?>
        </h2>
        <?php
        echo print_description();
        ?>
      </article>
    </section>
  </body>
</html>
