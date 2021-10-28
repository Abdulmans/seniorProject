<?php
if(isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];

    $mysqli = NEW mysqli('localhost','root','','bookstore');

    $resultSet = $mysqli->query("SELECT verified,vkey FROM user WHERE verified = 0 AND
    vkey = '$vkey' LIMIT 1");
    if($resultSet->num_rows == 1){
        $update = $mysqli->query("UPDATE USER SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        if($update){
            echo "Your account has been verified. You may now Login.";
        }else {
            echo "Error";
        }
    }else {
        echo "This account is invalid or already verified";
    }

}else {
    echo "Somthing went wrong";
}
?>