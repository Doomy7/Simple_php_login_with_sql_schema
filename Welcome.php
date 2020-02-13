<?php

    session_start();

    if(!isset($_SESSION['log_flag'])){
        $_SESSION['log_flag'] = 0;
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>WELCOME <?php
    if (isset($_SESSION['name'])){
      if($_SESSION['name'] != "new_name"){
        echo ($_SESSION['name']);}}?></h1>
  <?php if($_SESSION['log_flag'] == 0){ ?>
        <form class="" action="Login/login.php" method="post">
          <input type="submit" name="login" value="LogIn">
        </form>
      <form class="" action="Register/register.php" method="post">
          <input type="submit" name="register" value="Register">
      </form>
        <?php
      }else{
        ?>
        <form class="" action="Logout/logout.php" method="post">
          <input type="submit" name="logout" value="Logout">
        </form>
      <?php
      }
      ?>
  </body>
</html>
