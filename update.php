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

<h1><a href="index.php">겜피</a></h1>
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
<br><a href=create.php>글쓰기</a>

<?php if(isset($_GET['id'])) {?>
  <a href="update.php?id=<?=$_GET['id']?>">글 수정</a>
 <form action="delete_process.php" method="post">
   <input type ="hidden" name="id" value="<?=$_GET['id']?>">
   <input type="submit" value="delete">
 </form>
<?php
} ?>
<h2>
  <form action="update_process.php" method="post">
    <input type="hidden" name="old_title" value="<?=$_GET['id']?>">
    <p>
      <input style="font-family:'Malgun Gothic';width:300px;height:50px;font-size:20px;" type="text" name="title" placeholder="Title" value="<?php print_title(); ?>">
    </p>
    <p>
      <textarea rows="10" cols="100" style="font-family:'Malgun Gothic';"name="description" placeholder="Description"><?php print_description();?></textarea>
    </p>
    <input type="submit">
  </form>

</body>
</html>
