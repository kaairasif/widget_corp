  <?php require_once("../includes/session.php"); ?>
  <?php require_once("../includes/db_connection.php"); ?>
  <?php require_once("../includes/functions.php"); ?>
  

  <?php 
       // $x = find_all_admins();
       //  while ($a = mysqli_fetch_assoc($x)){
       //    echo '<pre>';
       //      print_r($a );
       //    echo "</pre>";  
       //  }
       $admin_set = find_all_admins();
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
            <?php echo message();?>
            <h2>Manage Admins</h2>
            <table>
              <tr>
                <th>Username </th>
                <th> Actions</th>
              </tr>
              <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                <tr>
                  <td><?php echo htmlentities($admin["username"]); ?></td>
                  <td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</td>
                  <td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure')">Delete</a></td>
                </tr>
              <?php } ?>
            </table>
            <br />
            <a href="new_admin.php">Add new admin</a>
          </div>

     </div> 
    </div>    
    </section>
  <?php include("../includes/layouts/footer.php"); ?>
  
  
  

     