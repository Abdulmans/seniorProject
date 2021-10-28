<?php
    session_start();
	include 'db.php';
    $ID = $_SESSION['id'];
    $fname = mysqli_real_escape_string($conn, $_REQUEST['Firstname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['Lastname']);
    $phone = mysqli_real_escape_string($conn, $_REQUEST['Mobile']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['Email']);
	$Description = mysqli_real_escape_string($conn, $_REQUEST['Description']);
	$Picture = mysqli_real_escape_string($conn, $_REQUEST['Picture']);
    $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
	$district = mysqli_real_escape_string($conn, $_REQUEST['District']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['Password']);
    if (@mysqli_real_escape_string($conn, $_REQUEST['switch1'])==true) {
        $emailV = 1;
    } else {
        $emailV = 0;
    }
    if (@mysqli_real_escape_string($conn, $_REQUEST['switch3'])==true) {
        $emailN = 1;
    } else {
        $emailN = 0;
    }
    
	
    $sql = "UPDATE user SET First_Name ='$fname', Last_Name = '$lname', Phone ='$phone', Email= '$email', City ='$city', District ='$district', Description ='$Description', profilePicture ='$Picture', emailVerify = '$emailV', emailNotif = '$emailN' WHERE Password = '$password' AND User_ID = '$ID'";
    
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("User has been modified successfully.")</script>';
        @$_SESSION['City'] = $city;
        header("refresh:0;url= ../pages/editProfile.php");
    }else {
        echo '<script>alert("Something went wrong please try again.")</script>';
    }
?>