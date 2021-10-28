<?php
    session_start();
	include 'db.php';
    $bookID = $_GET['Book_ID'];
    $_SESSION['BID'] = $bookID;
	$userID = $_SESSION['id'];
    $jsqla = "SELECT User_ID FROM books WHERE BooK_ID ='$bookID'";
	$jsqla2 = mysqli_query($conn,$jsqla);
	$jfeta = mysqli_fetch_assoc($jsqla2);
    $sid = $jfeta['User_ID'];

    if ($userID != $sid){
    $_SESSION['sid'] = $sid;
    $sql = "UPDATE books SET Book_Status ='1' WHERE Book_ID = '$bookID'";
    

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Book has been purchased successfully.")</script>';
        header("refresh:0;url= Purchase.php");
    }}else {
        echo '<script>alert("You cant buy your own book!")</script>';
        header("refresh:0;url= ../../index.php");
    }
