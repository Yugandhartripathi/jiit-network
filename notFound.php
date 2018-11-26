<?php
    require("connect.php");
    echo "<span style='opacity: 0'>trigger now</span>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOT FOUND</title>
    <link rel="stylesheet" type="text/css" href="notFoundPage.css?ver=<?php echo rand(111,999);?>">
</head>
<body>
    <center>
        <h1>Error 404 : Page Not Found</h1>
        <a href="home.php">Click here to go to Home Page</a>
    </center>
</body>
</html>
