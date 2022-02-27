<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
</head>
<body>
  <?php
    $password = $_GET["password"];
    if($password == "1111"){
        header('Location: /index_login.php');
    } else {
      echo
        header('Location: /index.php');
    }
   ?>
</body>
</html>
