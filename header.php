<?php
require("connect.php");
session_start();
if(isset($_GET['username'])){
    if($_GET['username']!=$_SESSION['username']){
        header('Location: notFound.php');
    }
    else{
        $username=$_SESSION['username'];
    }
}
else{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="headerStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
<header id="header">
    <nav>
        <ul class="nav">
            <li><a href="/">&nbsp;JIIT NETWORK</a></li>
            <li><a href="home.php"><i class="far fa-comment-alt"></i>&nbsp;Discussion Forum</a></li>
            <li><a href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;<?php echo $username; ?></a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>&nbsp;Logout</a></li>
        </ul>
    </nav>
</header>