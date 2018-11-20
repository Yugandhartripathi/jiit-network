<?php
$conn= new mysqli('localhost','root','','dbwProj');
if($conn->connect_error){
    die("Unable to connect". $conn->connect_error);
}
?>