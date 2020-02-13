<?php
  session_start();
  include_once '../includes/dbinc.php';
  $ID = mysqli_real_escape_string($conn, $_POST['id']);
  $psw = mysqli_real_escape_string($conn, $_POST['password']);
  if(empty($ID) || empty($psw)){
    header("Location: login.php?error=0");
    exit();
  }
  $stmt = mysqli_stmt_init($conn);
  $sqlq = "SELECT `username`,`password`, `remText` FROM `users`, `reminder` WHERE
  `username` = ? OR `email` = ? AND `users`.`id` = `reminder`.`uid`;";

  if(!mysqli_stmt_prepare($stmt, $sqlq)){
    echo 'SQL ERROR';
  }else{
    mysqli_stmt_bind_param($stmt, "ss", $ID, $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if(is_null($row['username'])){
      header("Location: login.php?error=6");
      exit();
    }else{
      if(password_verify($psw, $row['password'])){
        $_SESSION['log_flag'] = 1;
        $_SESSION['name'] = $row['username'];
        header("Location: ../Welcome.php");
        exit();
      }else{

        header("Location: login.php?error=7&remText=".$row['remText']);
        exit();
      }
    }
  }
 ?>
