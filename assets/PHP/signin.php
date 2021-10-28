<?php
	session_start();
	require '../phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username='binsaedananaif@gmail.com';
    $mail->Password='Asd123123*';
	include 'db.php';
	$user = mysqli_real_escape_string($conn, $_REQUEST['username']);
	$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
	

	$sql = "SELECT * FROM user WHERE Username ='$user' AND Password = '$password'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	$_SESSION['username']=$user;
	$_SESSION['logged_in'] = true;
	$Admin = "SELECT * FROM user WHERE Username ='$user'";
	$Admin2 = mysqli_query($conn,$Admin);
	$Admin3 = mysqli_fetch_assoc($Admin2);
	$emailV = $Admin3['emailVerify'];
	$UserType = $Admin3['User_Type'];
	$_SESSION['Admin'] = $UserType;
	$roww = mysqli_fetch_assoc($result);
	$sql2 = "SELECT Verified FROM user WHERE Username ='$user'";
	$result2 = mysqli_query($conn,$sql2);
	$row = mysqli_fetch_assoc($result2);
	if ($_SESSION['Admin'] != '4'){
	if ($row['Verified'] == '1')
	{	
		
		$jsqla = "SELECT Email FROM user WHERE Username ='$user'";
		$jsqla2 = mysqli_query($conn,$jsqla);
		$jfeta = mysqli_fetch_assoc($jsqla2);
		$email = $jfeta['Email'];
		$asdf = "SELECT User_ID FROM user WHERE Username ='$user'";
		$asdf2 = mysqli_query($conn,$asdf);
		$fdsa = mysqli_fetch_assoc($asdf2);
		$ID = $fdsa['User_ID']; 
		$_SESSION['id'] = $ID;
		$asdf3 = "SELECT City FROM user WHERE Username ='$user'";
		$asdf4 = mysqli_query($conn,$asdf3);
		$fdsa = mysqli_fetch_assoc($asdf4);
		$City = $fdsa['City']; 
		$_SESSION['City'] = $City;
		$vkey = md5(time().$user);
		if($emailV == 1){
    	$sql = "INSERT INTO verification (Code, User_ID) VALUES
    	('$vkey','$ID')";
		if(mysqli_query($conn,$sql)){
			$mail->setFrom('binsaedananaif@gmail.com');
			$mail->addAddress($email);
			$mail->addReplyTo('binsaedananaif@gmail.com');
			$mail->isHTML(true);
			$mail->Subject='Authentication';
			$mail->Body=$vkey;
			if(!$mail->send()){
				echo "failed to send";
			}
			else {
				header("refresh:0;url=../pages/Authentication.php");
			}
		}else{
			echo "Error";
		}
	} else {
		header("refresh:0;url=../../Index.php");
	} 

	}else 
	{
		echo '<script>alert("the account is not verified")</script>';
		session_destroy();
		header("refresh:0;url=../pages/sign_in.php");
	} }else {
		echo '<script>alert("User Is Blocked")</script>';
		session_destroy();
		header("refresh:0;url=../pages/sign_in.php");
	
	mysqli_close($conn);}
	
	} else{
		echo '<script>alert("Wrong Username/Password")</script>';
	session_destroy();
	header("refresh:0;url=../pages/sign_in.php");
	}
	
	mysqli_close($conn);

?>