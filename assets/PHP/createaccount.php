<?php
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
	$User = mysqli_real_escape_string($conn, $_REQUEST['userName']);
	$Password = mysqli_real_escape_string($conn, $_REQUEST['password']);
	$Email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $Fname = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
	$Lname = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
	$Phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
    $City = mysqli_real_escape_string($conn, $_REQUEST['city']);
	$Location = mysqli_real_escape_string($conn, $_REQUEST['location']);

    $vkey = md5(time().$user);

    $sql = "INSERT INTO user (Username, Password, Email, First_Name, Last_Name, Phone, City, District, vkey) VALUES
    ('$User' , '$Password' , '$Email', '$Fname','$Lname','$Phone','$City','$Location','$vkey')";

    if(mysqli_query($conn,$sql)){
        $mail->setFrom('binsaedananaif@gmail.com');
        $mail->addAddress($Email);
        $mail->addReplyTo('binsaedananaif@gmail.com');
        $mail->isHTML(true);
        $mail->Subject='Authentication';
        $mail->Body="<a href='http://localhost/Senior Project/assets/PHP/verify.php?vkey=$vkey'> Verify Account </a>";
        if(!$mail->send()){
            echo "failed to send";
        }
        else {
            header( "refresh:0;url=../pages/verification.php");
        }
    }else{
        echo "Error";
    }

    mysqli_close($conn);

?>