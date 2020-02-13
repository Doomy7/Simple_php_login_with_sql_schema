<?php
  session_start();
  include_once '../includes/dbinc.php';
  $pass1 = mysqli_real_escape_string($conn, $_POST['password']);
  $pass2 = mysqli_real_escape_string($conn, $_POST['password2']);
  if(empty($pass1) || empty($pass2)){
    header("Location: insertnewpass.php?error=0");
    exit();
  }else if ($pass1 !== $pass2){
    header("Location: insertnewpass.php?error=3");
    exit();
  }

  $stmt = mysqli_stmt_init($conn);
  $sqlq = "UPDATE `users`
          SET `password` = ?
          WHERE `userName` = ?;";

  if(!mysqli_stmt_prepare($stmt, $sqlq)){
    echo 'SQL ERROR';
  }else{
    $pswhash = passWord_hash($pass1, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ss", $pswhash, $_SESSION['name']);
    mysqli_stmt_execute($stmt);
    $_SESSION['name'] = 'new_name';
    header("Location: ../Welcome.php");
  }
 ?>
