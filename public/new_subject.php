  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?>
  <?php $layout_context = "admin"; ?>
  <?php include("../includes/layouts/header.php"); ?>
	  
  <?php echo find_selected_page() ?>
    
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

        		  <h2>Create subject</h2><br/>
              <form action="create_subject.php" method="post">
                <p>
                  Subject name :
                  <input type="text" name="menu_name" value="">
                </p>
                <p>Position:
                  <select name="position">
                  <?php 
                       $subject_set = find_all_subjects();
                       $subject_count = mysqli_num_rows($subject_set);
                       for($count=1; $count<= $subject_count; $count++){
                        echo "<option value=\"{$count}\">{$count}</option>";
                       } 
                  ?>
                  </select> 
                </p> 
                <p>Visiblle:
                   <input type="radio" name="visible" value="0"> No
                    &nbsp;
                   <input type="radio" name="visible" value="1"> Yes
                </p>
                <input type="submit" name="submit" value="Create Subject">
              </form>
              <br />
              <a href="manage_content.php">Cancel</a>
      	    </div>
		     </div> 
	  </div>	  
    </section>
	<?php include("../includes/layouts/footer.php"); ?>
	
	
	

     