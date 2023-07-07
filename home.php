<?php

session_start();
if(!isset($_SESSION['user_name'])){

    header("Location: http://localhost/login_system/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .containers{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }  
    .containers h1,h3{
        margin-right:10px;
    } 
    .containers a {
        text-decoration:none;
        font-size:17px;
        color:crimson;
        padding:7px 10px;
    }
    .containers a:hover{
        background-color:crimson;
        color:#fff;
    }
    
</style>
<body>
    <div class="containers">
        <h1>Wellcome</h1>
        <h2><?php echo $_SESSION['user_name'];?></h2>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>