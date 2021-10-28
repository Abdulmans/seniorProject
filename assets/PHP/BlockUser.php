<?php
    session_start();
	include 'db.php';
    $User_ID = $_GET['UserID'];
	
    $sql = "UPDATE user SET User_Type ='4' WHERE User_ID = '$User_ID'";
    
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("User has been Blocked.")</script>';
        header("refresh:0;url= ../dashboard/dashboard.php");
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }
?>