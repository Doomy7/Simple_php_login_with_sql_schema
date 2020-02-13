<?php
  if(isset($_GET['signup'])){
    header("Location: ../Welcome.php");
  }

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
    <form class="" action="validate.php" method="post">
      <input type="text" name="userName" placeholder="UserName" value=""><br />
      <input type="text" name="email" placeholder="Email" value=""><br />
      <input type="passWord" name="password" placeholder="Password" value=""><br />
      <input type="password" name="password2" placeholder="Repeat Password" value=""><br />
      <input type="text" name="reminder" placeholder="pass reminder" value=""><br />
      <input type="submit" name="submitsignup" value="Sign up">
    </form>
  </body>
</html>
