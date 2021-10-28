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

<script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

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
<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
	<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4">Sign in</h4>
      <form action="../PHP/signin.php" method="post">
          <div class="form-group">
			 <input id="username" name="username" class="form-control" placeholder="Username" type="text"> <br>
          </div> <!-- form-group// -->
          <div class="form-group">
			<input id="password" name="password" class="form-control" placeholder="Password" type="password" > <br>
          </div> <!-- form-group// -->
          
          <div class="form-group">
          </div> <!-- form-group form-check .// -->
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6LePSKwcAAAAABVy4UKOvro-DUEsZpKxlychJQS0" ></div>
              <button type="submit" class="btn btn-primary btn-block"> Login  </button>
          </div> <!-- form-group// -->    
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

     <p class="text-center mt-4">Don't have account? <a href="sign_up.php">Sign up</a></p>
     <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->
<script>
$("form").submit(function(event) {

var recaptcha = $("#g-recaptcha-response").val();
if (recaptcha === "") {
   event.preventDefault();
   alert("Please check the recaptcha");
}
});
</script>

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