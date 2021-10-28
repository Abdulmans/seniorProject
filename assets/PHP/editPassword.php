<?php
    session_start();
	include 'db.php';
    $ID = $_SESSION['id'];
    $password1 = mysqli_real_escape_string($conn, $_REQUEST['Password1']);
    $password2 = mysqli_real_escape_string($conn, $_REQUEST['Password2']);
    $password3 = mysqli_real_escape_string($conn, $_REQUEST['Password3']);
    
    if($password2==$password3){
    $sql = "UPDATE user SET Password ='$password2' WHERE Password = '$password1' AND User_ID = '$ID'";
    

    

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("User has been modified successfully.")</script>';
        header("refresh:0;url= ../pages/PasswordandSecurity.php");
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }}
    else{
        echo '<script>alert("Something went wrong please try again.")</script>';
        header("refresh:0;url= ../pages/PasswordandSecurity.php");
    };
?>