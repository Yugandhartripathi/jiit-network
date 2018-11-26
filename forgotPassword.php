<?php
    require("connect.php");
    echo "<span style='opacity: 0'>trigger now</span>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="loginPage.css?ver=<?php echo rand(111,999);?>">
</head>
<body>
    <div class="formBox">
        <img src="ultFinal.jpg" alt="logo" class="image">
        <h1 data-text="ENTER JIIT NETWORK">ENTER JIIT NETWORK</h1>
        <form action="forgotPassword.php" method="POST">
            <div class="inputBox">
                <input type="text" name="username" placeholder=" ">
                <label name="l-username">
                    UserName
                </label>
            </div>
            <div class="inputBox">
                <input type="password" name="alterPIN" placeholder=" ">
                <label name="l-pass">
                    Alternate PIN
                </label>
            </div>
            <div class="inputBox">
                <a href="index.php">Go Back ?</a>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["submit"])){
            $username=$_POST["username"];
            $alterPIN=$_POST["alterPIN"];
            $sql="select * from userData where username='$username' and alterPIN='$alterPIN'";
            $res=$conn->query($sql);
            if($res->num_rows!=0){
                header("Location: resetPassword.php?username=$username&alterPIN=$alterPIN");
            }
            else{
                echo"<center><h3 style='color: red'>Wrong ID or Alternate PIN please try again!</h1></center>";
            }
        }
    }
?>