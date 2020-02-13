<?php
  session_start();
  $_SESSION['log_flag'] = 0;
  $_SESSION['name'] = 'new_name';
  header("Location: ../Welcome.php");

 ?>
