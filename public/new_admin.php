  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>
	  
  
   <?php
    if(isset($_POST['submit'])) {
       
       //validations
       $required_fields = array("username", "password");
       validate_presences($required_fields);

       $fields_with_max_lengths = array("username" => 30);
       validate_max_lengths($fields_with_max_lengths);

       if(empty($errors)){
         //perform creates  
         
         $username = mysql_prep($_POST["username"]);
         $hashed_password = mysql_prep($_POST["password"]);
         
         // echo "<pre>";
         //  print_r($username);
         //  print_r($hashed_password);
         // echo "</pre>";

         $query  = "INSERT INTO admins (";
         $query .= " username, hashed_password ";
         $query .= ") VALUES (";
         $query .= " '{$username}', {$hashed_password} ";
         $query .= ")";

         $result = mysqli_query($connection, $query);

        
         
         if($result){
          //Success 
          $_SESSION["message"] = "Admin created";
          redirect_to("manage_admins.php");
          }
         else {
          //failure
          $message = "Admin creation failed";
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
              <form action="new_admin.php" method="post">
                <p>
                  Username name :
                  <input type="text" name="username" value="">
                </p>
                <p>
                  Password :
                  <input type="password" name="password" value="">
                </p>

                <input type="submit" name="submit" value="Create Admin">
              </form>
              <br />
              <a href="manage_admins.php">Cancel</a>
      	    </div>
		     </div> 
	  </div>	  
    </section>
	<?php include("../includes/layouts/footer.php"); ?>
	
	
	

     