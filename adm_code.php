<?php
  if($_POST['code']!='admin')
  {
    header('Location: adm_verify.php');
  }
  else
  {
    session_start();
    $_SESSION['id']='admin';
  }
?>
<!DOCTYPE html>
<html>
<head>
<style>
  body {
  background-image: url('admin.jpg');background-repeat:no-repeat;background-size: 1550px 780px;
 }
</style>
  <title>Admin | Home</title>
</head>
<body>

  <a href="a_user.php">USERS</a><br>
  <a href="adm_pro.php">PRODUCTS</a><br>
  <a href="adm_pay.php">PAYMENT</a><br>
</body>
</html>