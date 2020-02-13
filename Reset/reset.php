<?php

  session_start();
  include_once '../includes/dbinc.php';
  $ID = mysqli_real_escape_string($conn, $_POST['id']);
  $rem = mysqli_real_escape_string($conn, $_POST['rem']);
  if(empty($ID) || empty($rem)){
    header("Location: resetPass.php?error=0");
    exit();
  }
  $stmt = mysqli_stmt_init($conn);
  $sqlq = "SELECT `username`, `email`,`remText` FROM `users`,`reminder` WHERE `username` = ? OR `email` = ?
      AND `users`.`id` = `reminder`.`uid`;";

  if(!mysqli_stmt_prepare($stmt, $sqlq)){
    echo 'SQL ERROR';
  }else{
    mysqli_stmt_bind_param($stmt, "ss", $ID, $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if(is_null($row['username'])){
      header("Location: resetPass.php?error=6");
      exit();
    }else if(is_null($row['email'])){
      header("Location: resetPass.php?error=6");
      exit();
    }else{
      if($row["remText"] == $rem){
        $_SESSION['name'] = $row['username'];
        header("Location: insertnewpass.php");
      }else{
        header("Location: resetPass.php?error=10");
        exit();
      }
    }
  }

 ?>
