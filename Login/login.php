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
    <form class="" action="log.php" method="post">
      <input type="text" name="id" placeholder="username/email" value="">
      <input type="text" name="password" placeholder="password" value="">
      <?php if(isset($_GET['remText'])){echo "Reminder: ".$_GET['remText'];} ?>
      <input type="submit" name="" value="Log In">
    </form>
    <form class="" action="../Reset/resetPass.php" method="post">
        <input type="submit" name="passRes" value="Reset Password">
    </form>
    </form>
  </body>
</html>
