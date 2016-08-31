    <?php require_once("../includes/functions.php"); ?>
    <?php $layout_context = "admin"; ?>
	  <?php include("../includes/layouts/header.php"); ?>
     
      <div class="wrapper"> 
       <section class="main-content">
         <div class="row">
          <div class="col-md-3">
             <aside class="left_panel"> </aside>
          </div>
          <div class="col-md-9">
    	      <h1>Admin</h1>
      		  <ul>
      		    <li><a href="manage_content.php" title=""> Manage website content</a></li>
      		    <li><a href="manage_admins.php" title=""> Manage admin users</a></li>
      		    <li><a href="logout.php" title=""> logout</a></li>
      		  </ul>
          </div>  
      </section>
    </div>
	<?php include("../includes/layouts/footer.php"); ?>

     