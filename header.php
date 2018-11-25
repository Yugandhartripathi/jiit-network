<?php
require("connect.php");
session_start();
$guest='';
if(isset($_GET['username']) && isset($_SESSION['username'])){
    $user=$_GET['username'];
    $username=$_SESSION['username'];
    $sql="SELECT * from userData where username='$user'";
    $result=$conn->query($sql);
    if($result->num_rows==0){
        header('Location: notFound.php');
    }
    else{
        $row=$result->fetch_assoc();
        $category=$row['category'];
        $profilePic=$row['profilePic'];
        if($user==$username){
            $guest=0;
        }
        else{
            $guest=1;
        }
    }
    if($category=="studentFields"){
        $sql1="SELECT * from signupStudent where username='$user'";
        $res=$conn->query($sql1);
        $row=$res->fetch_assoc();
        $enrol=$row['enrol'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $batch=$row['batch'];
        $course=$row['course'];
        $gender=$row['gender'];
    }
    else if($category="teacherFields"){
        $sql1="SELECT * from signupTeacher where username='$user'";
        $res=$conn->query($sql1);
        $row=$res->fetch_assoc();
        $fname=$row['fname'];
        $lname=$row['lname'];
        $gender=$row['gender'];
        $department=$row['department'];
    }
    else{
        $sql1="SELECT * from signupHub where username='$user'";
        $res=$conn->query($sql1);
        $row=$res->fetch_assoc();
        $hubName=$row['hubName'];
        $memberCount=$row['memberCount'];
        $yearEst=$row['yearEst'];
        $description=$row['description'];
        $numPost=$row['numPost'];
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
    <link rel="stylesheet" type="text/css" href="headerStyle.css?ver=<?php echo rand(111,999);?>">
    <link rel="stylesheet" type="text/css" href="profileStyle.css?ver=<?php echo rand(111,999);?>">
    <link rel="stylesheet" type="text/css" href="homeStyle.css?ver=<?php echo rand(111,999);?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
<div class="header">
    <nav>
        <ul class="nav">
            <li><a href="/">&nbsp;JIIT NETWORK</a></li>
            <li><a href=<?php echo "home.php?username=".$username;?>><i class="far fa-comment-alt"></i>&nbsp;Discussion Forum</a></li>
            <li><a href=<?php echo "profile.php?username=".$username;?>><i class="fas fa-user-circle"></i>&nbsp;<?php echo $username; ?></a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>&nbsp;Logout</a></li>
        </ul>
    </nav>
</div>