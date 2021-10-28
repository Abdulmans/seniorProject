<?php
    session_start();
	include 'db.php';
    $ID = $_SESSION['id'];
    $bookID = $_SESSION['Book_ID'];
    $userID = $_SESSION['userID'];
	$Comment = mysqli_real_escape_string($conn, $_REQUEST['comment']);
	
    $sql = "INSERT INTO comments (Book_ID, User_ID, Comment) VALUES
    ('$bookID', '$ID', '$Comment')";
    
    if(mysqli_query($conn, $sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }
?>