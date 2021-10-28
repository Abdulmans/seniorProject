<?php
session_start();
require '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->Username = 'binsaedananaif@gmail.com';
$mail->Password = 'Asd123123*';
include 'db.php';
$bookID = $_SESSION['BID'];
$userID = $_SESSION['id'];
$sid = $_SESSION['sid'];

$sql = "INSERT INTO purchases (Buyer_ID, Seller_ID, Book_ID) VALUES 
    ('$userID', '$sid', '$bookID')";

//Emails 
$jsqla = "SELECT emailNotif FROM user WHERE User_ID ='$userID'";
$jsqla2 = mysqli_query($conn, $jsqla);
$jfeta = mysqli_fetch_assoc($jsqla2);
$emailn1 = $jfeta['emailNotif'];
if ($emailn1 == '1') {
    $jsqla = "SELECT Email FROM user WHERE User_ID ='$userID'";
    $jsqla2 = mysqli_query($conn, $jsqla);
    $jfeta = mysqli_fetch_assoc($jsqla2);
    $email1 = $jfeta['Email'];
    $mail->setFrom('binsaedananaif@gmail.com');
    $mail->addAddress($email1);
    $mail->addReplyTo('binsaedananaif@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Purchase Notification';
    $mail->Body = "You have bought a book/books";
    $mail->send();
} else {
} 
    $jsqla = "SELECT emailNotif FROM user WHERE User_ID ='$userID'";
    $jsqla2 = mysqli_query($conn, $jsqla);
    $jfeta = mysqli_fetch_assoc($jsqla2);
    $emailn2 = $jfeta['emailNotif'];
if ($emailn2 == '1') {
    $asdf3 = "SELECT Email FROM user WHERE User_ID ='$sid'";
	$asdf4 = mysqli_query($conn,$asdf3);
	$fdsa = mysqli_fetch_assoc($asdf4);
    $email23 = $fdsa['Email'];
    $mail->ClearAllRecipients();
    $mail->setFrom('binsaedananaif@gmail.com');
    $mail->addAddress($email23);
    $mail->addReplyTo('binsaedananaif@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Sell Notification';
    $mail->Body = "You have sold a book";
    $mail->send();
} else {
}

if (mysqli_query($conn, $sql)) {

    header("refresh:0;url= ../../index.php");
} else {
    echo '<script>alert("An error occured")</script>';
    header("refresh:0;url= ../../index.php");
}
