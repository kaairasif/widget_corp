  <footer class="footer">
     <div class="wrapper">
      <span class="whiteBorder"></span>
      <div class="row"> 
       <div class="col-sm-6">
         <p class="copyright">Copyright <?php echo date("Y"); ?> Widget Corp Inc.</p>          
       </div>
       <div class="col-sm-6">
        
       </div>
      </div> 
     </div>   
  </footer><!-- /.footer --> 
  

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>  
</body>
</html>
<?php
	//5. Close database connection
	if (isset($connection)) {
	     mysqli_close ($connection);	
	}	
?>