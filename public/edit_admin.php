  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>
    
  <?php
    $admin = find_admin_by_id($_GET["id"]);
    if(!$admin){
      //admin ID was missing or invalid or
      //admin couldn't be found in database
      redirect_to("manage_admins.php");
    }
  ?>

   <?php
    if(isset($_POST['submit'])) {
       //process the form

       //validations
       $required_fields = array("username", "password");
       validate_presences($required_fields);

       $fields_with_max_lengths = array("username" => 30);
       validate_max_lengths($fields_with_max_lengths);

       if(empty($errors)){
         //perform update  
         
         $id = $admin["id"];
         $username = mysql_prep($_POST["username"]);
         $hashed_password = mysql_prep($_POST["password"]);
         
         // echo "<pre>";
         //  print_r($username);
         //  print_r($hashed_password);
         // echo "</pre>";

         $query  = "UPDATE admins SET ";
         $query .= "username = '{$username}', ";
         $query .= "hashed_password = '{$hashed_password}' ";
         $query .= "WHERE id = {$id} ";
         $query .= "LIMIT 1";
         $result = mysqli_query($connection, $query);
         
         echo "<pre>";
          print_r($result);
         echo "</pre>";
         
         if($result && mysqli_affected_rows($connection) == 1){
            //Success 
            $_SESSION["message"] = "Admin updated to " . $username;
            redirect_to("manage_admins.php");
          }
         else {
          //failure
          $message = "Admin update failed";
         }

       }
   } else{
      // This is probably a GET request.
    }//end: if(isset($_POST['submit']))

  ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
    <section class="main-content">
        <div class="wrapper">
         <div class="row">
            <div class="col-md-3">
              <aside class="left_panel">
                <div class="navigation">
                 &nbsp;
                </div>
              </aside>
            </div>

            <div class="col-md-9">
              <?php echo message(); ?>
              <?php echo form_errors($errors); ?>

              <h2>Create page</h2><br/>
              <form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method="post">
                <p>
                  Username name :
                  <input type="text" name="username" value="<?php echo htmlentities($admin["username"]); ?>">
                </p>
                <p>
                  Password :
                  <input type="text" name="password" value="<?php echo htmlentities($admin["hashed_password"]); ?>">
                </p>

                <input type="submit" name="submit" value="Edit Admin">
              </form>
              <br />
              <a href="manage_admins.php">Cancel</a>
            </div>
         </div> 
    </div>    
    </section>
  <?php include("../includes/layouts/footer.php"); ?>
  
  
  

     