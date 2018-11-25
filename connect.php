<?php
$conn= new mysqli('localhost','root','','jiit-network');
if($conn->connect_error){
    die("Unable to connect". $conn->connect_error);
}
?>