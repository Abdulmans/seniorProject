<?php
    include '../pages/Authentication.php';
    $mysqli = NEW mysqli('localhost','root','','bookstore');
    $vkey = mysqli_real_escape_string($mysqli, $_REQUEST['code']);
    $resultSet = $mysqli->query("SELECT Verification_ID from verification WHERE Code = '$vkey' AND User_ID = '$ID'");
    if($resultSet->num_rows == 0){
        echo '<script>alert("Wrong code please re-enter your code.")</script>';
    }else{
        echo '<script>alert("You will be logged in shortly.")</script>';
        $sql = "DELETE FROM Verification WHERE User_ID = '$ID'";
        mysqli_query($mysqli,$sql);
        header("refresh:0;url=../../index.php");
            
    }
?>