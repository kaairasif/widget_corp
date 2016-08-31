<?php
// Remember : Setting cookies must be before *any* HTML output 
// unless output buffering is turned on.

$name = "test";
$value = "hello";
$expire = time() + (60*60*24*7); //add seconds
setcookie($name, $value, $expire);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cookies</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  <pre>
  
  <?php 
  //print_r($_COOKIE);
  // if(isset($_COOKIE["test2"])){
  //   $test = $_COOKIE["test"];  
  // }else{
  //   $test = "Cookies has not been set";
  // }
  //ternary operator.
   $test = isset($_COOKIE["test"]) ? $_COOKIE["test"] : "Cookies has not been set";
   echo $test;
   ?>

  </pre>
 

</body>
</html>

       