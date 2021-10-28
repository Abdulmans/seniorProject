<?php
session_start();
$username = $_SESSION['username'];
$ID = $_SESSION['id'];
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


<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-4">
		<div class="brand-wrap">
		<a href="../../index.php">USED BOOKS</a> |
		</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-12 order-3 order-lg-2">
		 <!-- empty div to maintain the header -->
	</div> <!-- col.// -->
	<div class="col-lg-4 col-sm-6 col-8 order-2 order-lg-3">
		<div class="float-md-right">
			<div class="widget-header  mr-3">
			</div>
			<div class="widget-header icontext">
				<div class="text">
					<span class="text-muted">Welcome!</span>
					<div> 
						<a href="sign_in.php">Sign in</a> |  
						<a href="sign_up.php"> Register</a>
					</div>
				</div>
			</div>

		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4">Authentication</h4>
      <form action="../PHP/Authenticate.php" method="post">
          <div class="form-group">
          <Label>Please enter the code sent to your email.</label> <br>
          </div> <!-- form-group// -->
          <div class="form-group">
			<input id="code" name="code" class="form-control" placeholder="Code" type="text"> <br>
          </div> <!-- form-group// -->
          
          <div class="form-group">
          </div> <!-- form-group form-check .// -->
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Login  </button>
          </div> <!-- form-group// -->    
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

     
     <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->

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