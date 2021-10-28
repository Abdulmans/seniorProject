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


<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sell Book</h4></header>
		<form action="../PHP/createbook.php" method="post">
					<div class="form-group">
						<label>Book name</label>
					  	<input type="text" id="bookName" name="bookName" class="form-control" placeholder="" required>
					</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Book description</label>
					<textarea type="text" id="description" name="description" class="form-control" rows="3" required></textarea>
				</div> <!-- form-group end.// -->
                <div class="form-group">
                    <label>Book pictures</label>
					<input type="file" id="bookPicture" name="bookPicture" accept=".jpg,.png" class="form-control-file" multiple required>
                </div> <!-- form-group end.// -->

				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>Price</label>
					  <input type="number" id="price" name="price"class="form-control" required>
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
                        <label>Condition</label>
					  <select name="condition" id="condition" class="form-control" required>
                        <option value="" selected disabled>Select Condition</option>
                        <option value="Very Good">Very Good</option>
                        <option value="Good">Good</option>
                        <option value="Bad">Bad</option>
                        <option value="Damaged">Damaged</option>
                      </select>
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
                <br>
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Sell </button>
			    </div> <!-- form-group// -->      
			    <div class="form-group"> 
		        </div> <!-- form-group end.// -->           
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->    
    <br>
    <br>

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