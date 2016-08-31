  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?>
  <?php require_once("../includes/validation_functions.php"); ?>
	  
  <?php echo find_selected_page() ?>
  
  <?php
   if(!$current_subject) {
    //subject ID was missing or invalid or
    //subject couldn't be found in database
    redirect_to("manage_content.php");
   }
  ?>

   <?php
    if(isset($_POST['submit'])) {
             
       //be sure to escape the content
       $content = mysql_prep($_POST["content"]); 

       //validations
       $required_fields = array("menu_name", "position", "visible", "content");
       validate_presences($required_fields);

       $fields_with_max_lengths = array("menu_name" => 30);
       validate_max_lengths($fields_with_max_lengths);

       if(empty($errors)){
         //perform update  
         //process the form 
         $subject_id = $current_subject["id"];
         $menu_name = mysql_prep($_POST["menu_name"]);
         $position = (int) $_POST["position"];
         $visible = (int) $_POST["visible"];

         //2. perform database query.
         $query  = "INSERT INTO pages (";
         $query .= " subject_id, menu_name, position, visible, content";
         $query .= ") VALUES (";
         $query .= " {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}' ";
         $query .= ")";

         $result = mysqli_query($connection, $query);

         if($result){
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
              <?php echo message(); ?>
              <?php $errors = errors(); ?>
              <?php echo form_errors($errors); ?>

        		  <h2>Create page</h2><br/>
              <form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]);?>" method="post">
                <p>
                  Subject name :
                  <input type="text" name="menu_name" value="">
                </p>
                <p>Position:
                  <select name="position">
                  <?php 
                       $page_set = find_pages_for_subjects($current_subject["id"]);
                       $page_count = mysqli_num_rows($page_set);
                       for($count=1; $count<= ($page_count + 1); $count++){
                        echo "<option value=\"{$count}\">{$count}</option>";
                       } 
                  ?>
                  </select> 
               </p> 
               <p>Visible:
                   <input type="radio" name="visible" value="0" checked> No
                    &nbsp;
                   <input type="radio" name="visible" value="1"> Yes
               </p>
               <p>Content: <br/>
               <textarea name="content" row="20" col="80"></textarea>
                </p>
                <input type="submit" name="submit" value="Create Subject">
              </form>
              <br />
              <a href="manage_content.php?subject=<?php echo urldecode($current_subject["id"]); ?>">Cancel</a>
      	    </div>
		     </div> 
	  </div>	  
    </section>
	<?php include("../includes/layouts/footer.php"); ?>
	
	
	

     