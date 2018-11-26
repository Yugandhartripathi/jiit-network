<?php
    require("connect.php");
    if(isset($_GET['username']) && isset($_GET['alterPIN'])){
        $user=$_GET['username'];
        $alterPIN=$_GET['alterPIN'];
    }
    else{
        header("Location: index.php");
    }
    echo "<span style='opacity: 0'>trigger now</span>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="loginPage.css?ver=<?php echo rand(111,999);?>">
</head>
<body>
    <div class="formBox">
        <img src="ultFinal.jpg" alt="logo" class="image">
        <h1 data-text="ENTER JIIT NETWORK">ENTER JIIT NETWORK</h1>
        <form action=<?php echo"resetPassword.php?username=$user&alterPIN=$alterPIN";?> method="POST">
            <div class="inputBox">
                <input type="password" name="pass" placeholder=" ">
                <label name="pass">
                    Password
                </label>
            </div>
            <div class="inputBox">
                <input type="password" name="cpass" placeholder=" ">
                <label name="c-pass">
                    Confirm Password
                </label>
            </div>
            <div class="inputBox">
                <button type="submit" name="reset">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["reset"])){
            $pass=$_POST["pass"];
            $cpass=$_POST["cpass"];
            if($pass==$cpass){
                $pass_md5=md5($pass);
                    $sql1="update userData set password='$pass_md5' where username='$user'";
                    if($conn->query($sql1)){
                        header("Location: index.php?success=1");
                    }
            }
            else{
                echo"<center><h3 style='color: red'>Passwords don't match!</h1></center>";
            }
        }
    }
?>