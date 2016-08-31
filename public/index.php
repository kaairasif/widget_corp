  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  <?php $layout_context = "public"; ?>
  <?php include("../includes/layouts/header.php"); ?>
    
  <?php echo find_selected_page(true) ?>
    
    <section class="main-content">
        <div class="wrapper">
         <div class="row">
           <div class="col-md-3">
              <aside class="left_panel">
                <div class="navigation">
                   <a href="admin.php">&laquo; Main menu</a> <br/>
                   <?php echo public_navigation($current_subject, $current_page); ?>                  
                </div>
              </aside>
           </div>
         <div class="col-md-9">
              <?php if ($current_page) { ?>
              <h2><?php echo htmlentities($current_page["menu_name"]); ?> </h2>
              <?php echo nl2br(htmlentities($current_page["content"])); ?> 
              
              <?php } else { ?>
                <h4>Welcome</h4>
              <?php } ?>
          </div>
     </div> 
    </div>    
    </section>
  <?php include("../includes/layouts/footer.php"); ?>
  
  
  

     