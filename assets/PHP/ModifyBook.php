<?php
    session_start();
	include 'db.php';
    $ID = $_SESSION['id'];
    $Name = mysqli_real_escape_string($conn, $_REQUEST['bookName']);
	$Description = mysqli_real_escape_string($conn, $_REQUEST['description']);
	$Picture = mysqli_real_escape_string($conn, $_REQUEST['bookPicture']);
    $Price = mysqli_real_escape_string($conn, $_REQUEST['price']);
	$Condition = mysqli_real_escape_string($conn, $_REQUEST['condition']);
    $bookID = $_SESSION['Book_ID'];
	
    $sql = "UPDATE books SET bookName ='$Name', bookDescription = '$Description', bookPrice ='$Price', bookCover= '$Picture', bookCondition ='$Condition' WHERE Book_ID = '$bookID'";
    
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Book has been modified successfully.")</script>';
        header("refresh:0;url= ../pages/manageBook.php");
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }
?>