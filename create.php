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
<br><a href=create.php>글 쓰기</a>
<form action="create_process.php" method="post">
   <p>
     <input style="width:300px;height:50px;font-size:20px;font-family:'Malgun Gothic';" type="text" name="title" placeholder="제목">
   </p>
   <p>
     <textarea style="font-family:'Malgun Gothic';" rows="10" cols="100" name="description" placeholder="글쓰기"></textarea>
   </p>
   <input type="submit">
 </form>
<?php if(isset($_GET['id'])) {?>
  <a href="update.php?id=<?=$_GET['id']?>">글 수정</a>
 <form action="delete_process.php" method="post">
   <input type ="hidden" name="id" value="<?=$_GET['id']?>">
   <input type="submit" value="delete">
 </form>
<?php
} ?>

<?php
  echo print_description();
?>

</body>
</html>
