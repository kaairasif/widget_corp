<?php
require_once("included_functions.php");
require_once("validation_functions.php");

$errors = array();
$message = "";

if(isset($_POST['submit'])) {
  // form was submitted
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  //validations 
  $fields_required = array("username", "password");
  foreach($fields_required as $field) {
    $value = trim($_POST[$field]);
    if (!has_presence($value)) {
     $errors[$field] = ucfirst($field) . " can't be blank";
    }
  }

  //using an assoc. array
  $fields_with_max_lengths = array ("username" => 30, "password" => 8);
  validate_max_lengths($fields_with_max_lengths);

  if(empty($errors)) {
      //try to login
      if($username == "asif" && $password == "123") {
        //successfull login
        redirect_to("basic.html");
      }else{       
        $message = "Username/password do not match.";
      } 
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
  
  <?php echo $message; ?><br />
  <?php echo form_errors($errors); ?>

  <form action="form_with_validation.php" method="post">
    Username <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br />
    Password <input type="password" name="password" value="" required><br/>
    <input type="submit" name="submit" value="submit">
  </form>


  </body>
  </html>

       