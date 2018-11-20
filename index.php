<?php
require('connect.php');
$username='';
$pass='';
$err=0;
if($err==1){
    echo"Wrong ID or Password,Please try again.";
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network</title>
    <link rel="stylesheet" type="text/css" href="loginPage.css">
</head>
<body>
    <div class="formBox" >
        <img src="ultFinal.jpg" alt="logo" class="image">
        <h1 data-text="ENTER JIIT NETWORK">ENTER JIIT NETWORK</h1>
        <form action="index.php" method="POST">
            <div class="inputBox">
                <input type="text" name="username" placeholder=" ">
                <label name="l-username">
                    UserName
                </label>
            </div>
            <div class="inputBox">
                <input type="password" name="pass" placeholder=" ">
                <label name="l-pass">
                    Password
                </label>
            </div>
            <div class="inputBox">
                <a href="/">Forgot Password ?</a>
                <button type="submit" name="login">Login</button>
                <button type="submit" name="signup">Sign Up</button>
                <?php
                if($err==1){
                    echo"Wrong ID or Password,Please try again.";
                }?>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["login"])){
            $username=$_POST["username"];
            $pass=$_POST["pass"];
            $pass_md5=md5($pass);
            $sql="select * from users where username='$username' and pass='$pass_md5'";
            $res=$conn->query($sql);
            if($res->num_rows!=0){
                $_SESSION['username']=$username;
                header('Location: home.php');
                exit();
            }
            else{
                $err=1;
            }
        }
        if(isset($_POST["signup"])){
            header("Location: signup.php");
            exit();
        }
    }