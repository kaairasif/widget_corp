<!DOCTYPE html>
<html lang="en">
  <head>
    <title>False positive</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
 <?php
  function is_equal ($value1, $value2) {
     $output = "{$value1} == {$value2}: ";
     if ($value1 == $value2) {
      $output .= "true <br/>";
     }
     else {
      $output .= "false <br />";
     }
     return $output;
  }
  echo is_equal(0, false);
  echo is_equal(4, true);
  echo is_equal(0, null);
  echo is_equal(0, "0");
  echo is_equal(0, "");
  echo is_equal(0, "a");
  echo is_equal("1", "01");
  echo is_equal("", null);
  echo is_equal(3, "3 dogs");
  echo is_equal(100, "le2");
  echo is_equal(100, 100.00);
  echo is_equal("abc", true);
  echo is_equal("123", "   123");
  echo is_equal("123", "+0123");

  ?>
 <br>

 <?php
  function is_exat ($value1, $value2) {
     $output = "{$value1} === {$value2}: ";
     if ($value1 === $value2) {
      $output .= "true <br/>";
     }
     else {
      $output .= "false <br />";
     }
     return $output;
  }
  echo is_exat(0, false);
  echo is_exat(4, true);
  echo is_exat(0, null);
  echo is_exat(0, "0");
  echo is_exat(0, "");
  echo is_exat(0, "a");
  echo is_exat("1", "01");
  echo is_exat("", null);
  echo is_exat(3, "3 dogs");
  echo is_exat(100, "le2");
  echo is_exat(100, 100.00);
  echo is_exat("abc", true);
  echo is_exat("123", "   123");
  echo is_exat("123", "+0123");

  ?>
</body>
</html>

       