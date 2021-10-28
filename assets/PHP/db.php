<?php
$user = 'root';
$pass = '';
$db = 'bookstore';

$conn = new mysqli('localhost', $user, $pass,$db) or die("unable to connect");
?>