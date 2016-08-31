  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>

  <?php echo find_selected_page() ?>

  <?php
   if(!$current_page) {
    //subject ID was missing or invalid or
    //subject couldn't be found in database
    redirect_to("manage_content.php");
   }
  ?>

  <?php
    if(isset($_POST['submit'])) {
       //process the form
       $id = $current_page["id"];
       $menu_name = mysql_prep($_POST["menu_name"]);
       $position = (int) $_POST["position"];
       $visible = (int) $_POST["visible"];
       //be sure to escape the content
       $content = mysql_prep($_POST["content"]);  
      
      //validations
       $required_fields = array("menu_name", "position", "visible");
       validate_presences($required_fields);

       $fields_with_max_lengths = array("menu_name" => 30);
       validate_max_lengths($fields_with_max_lengths);

       if(empty($errors)){
         //perform update
         $query  = "UPDATE pages SET ";
         $query .= "menu_name = '{$menu_name}', ";
         $query .= "position = {$position}, ";
         $query .= "visible = {$visible}, ";
         $query .= "content = '{$content}' ";
         $query .= "WHERE id = {$id} "; 
         $query .= "LIMIT 1";
         $result = mysqli_query($connection, $query);

         

         if($result && mysqli_affected_rows($connection) >= 0) {
          //Success 
          $_SESSION["message"] = "Page updated";
          redirect_to("manage_content.php");
          }
         else {
          //failure
          $message = "Page update failed";
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
                 <?php echo navigation($current_subject, $current_page); ?> 
                </div>
              </aside>
            </div>

            <div class="col-md-9">
            
            <?php
               // $message is just a variable, doesn't use  the SESSION
               if(!empty($message)){
                echo "<div class=\"message\">" . htmlentities($message) . "</div>";
               }  
            ?>
            <?php echo form_errors($errors); ?>


              <h2>Edit page : <?php echo htmlentities($current_page["menu_name"]); ?></h2><br/>
              <form action="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>" method="post">
                <p>
                  Subject name :
                  <input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>">
                </p>
                <p>Position:
                  <select name="position">
                  <?php 
                       $page_set = find_pages_for_subjects($current_page["subject_id"]);
                       $page_count = mysqli_num_rows($page_set);
                       for($count=1; $count<= $page_count; $count++){
                        echo "<option value=\"{$count}\"";
                         if ($current_page["position"] == $count) {
                              echo " Selected";
                            } 
                        echo ">{$count}</option>";
                       } 
                  ?>
                  </select> 
                </p> 
                <p>Visiblle:
                   <input type="radio" name="visible" value="0" <?php if($current_page["visible"] == 0) { echo "checked"; } ?> > No
                    &nbsp;
                   <input type="radio" name="visible" value="1" <?php if($current_page["visible"] == 1) { echo "checked"; } ?> > Yes
                </p>
                <p>Content: <br/>
                    <textarea name="content" row="20" col="80"><?php echo htmlentities($current_page["content"]); ?></textarea>
                </p>
                <input type="submit" name="submit" value="Edit Page">
              </form>
              <br />
              <a href="manage_content.php">Cancel</a>
              &nbsp;
              &nbsp;
              <a href="delete_page.php?page=<?php echo $current_page["id"]; ?>" onclick="return confirm('delete? <?php echo urlencode($current_page["menu_name"]); ?> '); ">Delete page</a>
            </div>
         </div> 
    </div>    
    </section>
  <?php include("../includes/layouts/footer.php"); ?>
  
  
  

