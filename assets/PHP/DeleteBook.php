<?php
    session_start();
	include 'db.php';
    $ID = $_SESSION['id'];
    $bookID = $_SESSION['Book_ID'];
	
    $sql = "DELETE FROM books WHERE Book_ID = $bookID AND User_ID = $ID";
    
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Book has been Deleted successfuly")</script>';
        header("refresh:0;url= ../pages/manageBook.php");
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }
?>