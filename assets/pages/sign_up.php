<?php
session_start();
?><!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>USED BOOKS</title>


<!-- jQuery -->
<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="../fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="../css/ui.css" rel="stylesheet" type="text/css"/>
<link href="../css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="../js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>

</head>
<body>


<?php include 'navigation.php'?>



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sign up</h4></header>
		<form action="../PHP/createaccount.php" method="post">
				<div class="form-row">
					<div class="col form-group">
						<label>First name</label>
					  	<input type="text" id="firstName" name="firstName" class="form-control" placeholder="">
					</div> <!-- form-group end.// -->
					<div class="col form-group">
						<label>Last name</label>
					  	<input type="text" id="lastName" name="lastName" class="form-control" placeholder="">
					</div> <!-- form-group end.// -->
				</div> <!-- form-row end.// -->
				<div class="form-group">
					<label>Username</label>
					<input type="username" id="userName" name="userName" class="form-control" placeholder=""> 
					<label>Email</label>
					<input type="email" id="email" name="email"class="form-control" placeholder="">
					<label>Phone number</label>
					<input type="tel" id="phone" name="phone"class="form-control" placeholder="">
				</div> <!-- form-group end.// -->

				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>District</label>
					  <input type="text" id="location" name="location"class="form-control">
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
						<label>City</label>
						<select name="city" id="city" class="mr-2 form-control" required>
							<option>cities</option>
							<option value="Riyadh">Riyadh</option>
							<option value="Jeddah">Jeddah</option>
							<option value="Qassim">Qassim</option>
						</select>

					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Create password</label>
					    <input class="form-control" id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
					</div> <!-- form-group end.// --> 
  
				</div>
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
			    </div> <!-- form-group// -->      
			    <div class="form-group"> 
		        </div> <!-- form-group end.// -->           
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="sign_in.php">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top padding-y">
	<div class="container">
		<p class="float-md-right"> 
			&copy Copyright 2021 All rights reserved
		</p>
		<p class="float-md-left"> 
			Contact number: 0509358368	
		</p>		
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>