<?php
session_start();
$ID = $_SESSION['id'];
$bookID = $_GET['Book_ID'];
$_SESSION['Book_ID'] = $bookID;
require_once("../php/dbcontroller.php");
$db_handle = new DBController();
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

<?php
$product_array = $db_handle->runQuery("SELECT * FROM books WHERE Book_ID = $bookID");
if(!empty($product_array)) {
	foreach($product_array as $key=>$value){
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-lg-12">
                
            <main class="col-md-12">    
                <article class="card card-product-list">
				<form action="../PHP/ModifyBook.php" method="post">
                    <div class="row no-gutters">
                        <aside class="col-md-3">
                            <a href="#" class="img-wrap">
							<input type="file" id="bookPicture" name="bookPicture" accept=".jpg,.png" class="form-control-file" multiple required >
                            </a>
                        </aside> <!-- col.// -->
                        <div class="col-md-6">
                            <div class="info-main">
                                <input type ="text" id="bookName" name="bookName" placeholder="<?php echo $product_array[$key]["bookName"];?>" href="#" class="col-9 h5 title" required></input>
								
                                <textarea type ="text" id="description" name="description" class=" col-12 h6 title" rows="5"	 placeholder="<?php echo $product_array[$key]["bookDescription"];?>" required></textarea>

                            </div> <!-- info-main.// -->
                        </div> <!-- col.// -->
                        <aside class="col-sm-3">
                            <div class="info-aside">
                                <div class="price-wrap">
									
									<input type ="number" id="price" name="price" placeholder="<?php echo "$".$product_array[$key]["bookPrice"]; ?>" href="#" class="price h5 col-8" required></input> <br>	
									
									<span class="price h5"> condition: </span>
									
									<select name="condition" id="condition" class="form-control col-8" required>
									<option value="" selected disabled>Select Condition</option>
                       				 <option value="Very Good">Very Good</option>
                        			<option value="Good">Good</option>
                       				<option value="Bad">Bad</option>
                        			<option value="Damaged">Damaged</option>
									</select>
									

									
								<button type="submit" class="btn btn-success mt-2" method="post"> Save changes </button>
								<a class="btn btn-gray mt-2" href="javascript:history.back()">Cancel changes</a>

                                    
	
                                    
                                </div> <!-- info-price-detail // -->
                                <br>

								<a href="#" onclick="deletion()" class="btn btn-danger"> Delete book </a>
								<script>
								function deletion(){
								var r = confirm("Press Ok to confirm the deletion of the book.")
								if (r == true) {
									window.location.href = "../PHP/DeleteBook.php";
								} else {
									
								} 
								
								}
								</script>



                            </div> <!-- info-aside.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </article> <!-- card-product .// -->
            </main> <!-- col.// -->

        
        </div>
        
    </div>
</div>

<?php	
		}
	}else {
?>
<p> There are no books that you are selling </p>
<?php
	}
	?>

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