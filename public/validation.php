<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Validation</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  
 <?php
   
   // * presence 
   $value = "a";
    if(!isset($value) || empty($value)) {
      echo " presence validation faild. <br />";
    }

   // * string length
   $value = "333";
   $min = 3;
   if(strlen($value) < $min) {
    echo " min string length validation faild. <br />";
   }

   $max = 6;
   if(strlen($value) > $max) {
    echo "  max string length validation faild. <br />";
   }

   // * type
   $value = "1";
   if(!is_string($value)) {
    echo "type validation faild. <br />";
   }

   // * inclusion in a set 
   $value = 5;
   $set = array("1", "2", "3", "4");
   if(in_array($value, $set)) {
    echo "inclusion validation faild. <br />";
   }
   // * uniqueness (Uses a database to check uniqueness)

   // * format
   if(preg_match("/PHPx/", "PHP is fun")) {
    echo "A match was found <br/>";
   }
   else {
    echo "A match was not found <br/>";
   }

  $value = "nobody@npwhere.com";
  if(!preg_match("/@/", $value)) {
    echo "format validation faild <br/>";
   }

  if(strpos($value, "@") === false) {
    echo "format validation failed <br/>";
  }

 ?>

</body>
</html>

       