<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Form processing</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  
 <pre>
   <?php 
    print_r($_POST)
   ?>
 </pre>
 <br/>

<?php 
//Detect form submission.
if(isset($_POST['submit'])){
  echo "Form was submitted <br>";

  if (isset($_POST["username"])){
     $username = $_POST["username"]; 
   }
   else {
    $username = "";
   }
   
   if (isset($_POST["password"])){
     $password = $_POST["password"];
   }
   else {
    $password = "";
   }

   //set default values using ternary operator
   // boolean_test ? value_if_true : value_if_false
   $username = isset($_POST['username']) ? $_POST['username'] : "";
   $password = isset($_POST['password']) ? $_POST['password'] : "";
}
else {
  $username = "username";
  $password = "password";
}
?>

<?php
 echo "{$username} : {$password}"
 ?>

  </body>
  </html>

       