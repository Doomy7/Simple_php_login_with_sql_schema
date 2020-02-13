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
    <form class="" action="reset.php" method="post">
      <input type="text" name="id" placeholder="username/email" value="">
      <input type="text" name="rem" placeholder="password reminder" value="">
      <input type="submit" name="" value="Reset">
    </form>
    </form>
  </body>
</html>
