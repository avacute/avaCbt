<?php 
include_once("header.php");
 ?>

 <body>
	
<div class="container-fluid wrapper">
		<div class="col-lg-8 col-md-8 myleft">
			<img src="images/birlogo.png" style="width: 600px; height: 400px;">
		</div>

		<div class="col-lg-4 col-md-4 myright">
			<div class="row">
					<form id="msform" action="controllers/access.php" method="POST">
						  <!-- fieldsets -->
						  <fieldset>
						    <h2 class="fs-title">Candidate Login</h2>
						    <?php 
						    if(isset($_GET['error'])){
						        echo "<div style='color:red; margin-bottom: 10px;'>" . $_GET['error'] . "</div>";
						    }
						     ?>
						    <input type="text" name="user_id" placeholder="Username" />
						    <input type="password" name="access_key" placeholder="Access Key" />
						    <input type="submit" name="action" class="next action-button" value="Login" /><br/>
						  </fieldset>
					</form>
			</div>
		</div>
</div>


<!-- <div class="alert alert-success">
  <strong>Success!</strong> Indicates a successful or positive action.
</div> -->

 <!-- load jquery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- load bootstrap javascript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>