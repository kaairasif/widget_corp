<?php
require_once("included_functions.php");

if(isset($_POST['submit'])) {
  // form was submitted
  $username = $_POST['username'];
  $password = $_POST['password'];

  if($username == "asif" && $password == "123") {
    //successfull login
    redirect_to("basic.html");
  }else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = "Loging in : {$username}";
  }
 
}
else {
  $username = "";
  $message = "Please log in.";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Form single</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  <?php echo $message; ?>
  <form action="form_single.php" method="post">
    Username <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br />
    Password <input type="password" name="password" value=""><br/>
    <input type="submit" name="submit" value="submit">
  </form>


  </body>
  </html>

       