<?php 
  //1. Create a database connection.
  define ("DB_SERVER", "localhost");
  define ("DB_USER", "root");
  define ("DB_PASS", "");
  define ("DB_NAME", "widget_corp");
  
  $connection = mysqli_connect ( DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
    
  //test if connection succeeded
  if(mysqli_connect_errno()){
    die ("database connection failed: " . 
        mysqli_connect_error() . 
       " (" . mysqli_connect_errno() . ")"      
    );
  } 
?>

<?php
   //2. perform database query.
   $query  = "SELECT * ";
   $query .= "FROM subjects ";
   $query .= "Where visible = 1 ";
   $query .= "Order By position ASC ";
   $result = mysqli_query($connection, $query);
   
   //Test if there was a query error.
   if(!$result) {
    die("Database query faild");
   }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">

    <title>Example</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
   
    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
     
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">
    <div class="wrapper">
     <div class="row">
       <div class="col-md-3">
         <div class="left_panel">
         <ul>
           <?php
             //3. Use returened data (if any)
             while($subject = mysqli_fetch_assoc($result)) {
              //output data from each row.
              ?>
              <li><?php echo $subject["menu_name"] . " (" . $subject["id"] . ") "; ?></li>
               
              <?php
               }
              ?>  
           </ul>

           <?php 
            //release returened data
            mysqli_free_result($result);
           ?> 
          </div>   
       </div>
       <div class="col-md-9">
         <div class="content_panel">

       </div>
     </div>
     
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>

<?php
  //5. Close database connection
  if (isset($connection)) {
   mysqli_close ($connection);  
  } 
?>