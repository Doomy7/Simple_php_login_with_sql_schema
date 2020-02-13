<?php
  if(isset($_GET['error'])){
    $error = $_GET['error'];
    $file = fopen("../includes/errors.txt","r");
    while($row = fgets($file)) {
      list( $erNo, $type ) = explode( ",", $row );
      if($erNo == $error){
        echo 'No:' . $erNo . '<br />';
        echo 'Type:' . $type . '<br />';
      }
    }
    fclose($file);
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="newpass.php" method="post">
      <input type="passWord" name="password" placeholder="New Password" value=""><br />
      <input type="password" name="password2" placeholder="Repeat New Password" value=""><br />
      <input type="text" name="reminder" placeholder="pass reminder change ?" value=""><br />
      <input type="submit" name="submitreset" value="Change">
    </form>
  </body>
</html>
