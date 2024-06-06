<?php
include 'koneksi.php';
if(empty($_SESSION))
   session_start();
if(isset($_SESSION['username'])) {
   header("location: home.php");
   exit;
}
?>
<html>
<head>
	<title>SParX</title>
<link rel="stylesheet" href="login-theme.css">
<link rel="shortcut icon" href="images/parkir.png">
<style>
input[type=submit] {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #DF0101;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
input[type=submit]:hover {
  background: #B40404;
}
</style>
</head>
<body>
  <div class="login-page">
    <center><a href="index.php"><img src="images/login.png"/ width="45%" height="25%"></a></center>
    <div class="form">
      <form class="login-form" action = "cek_login.php" method="POST">
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <input type = "submit" name="submit" value="Login" />
      </form>
    </div>
  </div>
    <script src='js/jquery.min.js'></script>
      <script  src="js/index.js"></script>
</body>
</html>
