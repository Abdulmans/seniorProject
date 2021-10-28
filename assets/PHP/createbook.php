<?php
    session_start();
	include 'db.php';
    $ID = $_SESSION['id'];
    $Name = mysqli_real_escape_string($conn, $_REQUEST['bookName']);
	$Description = mysqli_real_escape_string($conn, $_REQUEST['description']);
	$Picture = mysqli_real_escape_string($conn, $_REQUEST['bookPicture']);
    $Price = mysqli_real_escape_string($conn, $_REQUEST['price']);
	$Condition = mysqli_real_escape_string($conn, $_REQUEST['condition']);
	
    $sql = "INSERT INTO books (bookName, bookDescription, bookPrice, bookCover, bookCondition,User_ID, Pic) VALUES
    ('$Name', '$Description', '$Price', '$Picture', '$Condition', '$ID', '$Picture')";
    
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Book has been added successfully.")</script>';
        header("refresh:0;url= ../pages/manageBook.php");
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }
?>