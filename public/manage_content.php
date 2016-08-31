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
                 <a href="admin.php">&laquo; Main menu</a> <br/>
      				   <?php echo navigation($current_subject, $current_page); ?> 
                 &nbsp; <a href="new_subject.php" title="new subject">+ Add new subject</a>
      			    </div>
			        </aside>
            </div>
    	   <div class="col-md-9">
            <?php echo message();?>

      			<?php if($current_subject) { ?>
              <h2>Manage subject</h2>
              Menu name: <?php echo htmlentities($current_subject["menu_name"]); ?> <br />
              position : <?php echo $current_subject["position"]; ?><br/>
              visible : <?php echo $current_subject["visible"] == 1 ? 'yes' : 'no'; ?><br/>
              
              content:<br/>
              <div class="view-content">
                <?php echo htmlentities($current_subject["content"]); ?> 
              </div>

              <a class="edit" href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Edit Subject</a>
              <div class="related_pages">
                <h3>Pages in this subject</h3>
                <ul>
                    <?php
                      $subject_pages = find_pages_for_subjects($current_subject["id"]); 
                      while($page = mysqli_fetch_assoc($subject_pages)){
                        echo "<li>";
                        $safe_page_id = urldecode($page["id"]);
                        echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
                        echo htmlentities($page["menu_name"]);
                        echo "</a>";
                        echo "</li>";
                      }  
                    ?>
                </ul>
                <br />
                +<a href="new_page.php?subject=<?php echo urldecode($current_subject["id"]); ?>">Add a new page to this subject</a>
              </div>

              <?php } elseif ($current_page) { ?>
      		    <h2>Manage page</h2>
              Menu name: <?php echo htmlentities($current_page["menu_name"]); ?> <br /> 
              position : <?php echo $current_page["position"]; ?><br/>
              visible : <?php echo $current_page["visible"] == 1 ? 'yes' : 'no'; ?><br/>          
              content:<br/>
              <div class="view-content">
                <?php echo htmlentities($current_page["content"]); ?> 
              </div>
              <br/>
              <br/> 
              <a class="edit" href="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>">Edit Page</a>
      			  
              <?php } else { ?>
      				  Please select a subject or a page
      			  <?php }?>
    	    </div>
		    </div> 
	    </div>	  
    </section>
	<?php include("../includes/layouts/footer.php"); ?>
	
	
	

     