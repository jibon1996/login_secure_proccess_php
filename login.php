<?php
if(isset($_POST['login'])){
    $conn= mysqli_connect("localhost","root","","registration") or die("connection failed");

   
    $email = mysqli_real_escape_string($conn,$_POST['email']) ;
    $pass = $_POST['password'];
    $cpass = md5($pass) ;

    $query = "SELECT * FROM user_info WHERE email ='{$email}'";
    $result = mysqli_query($conn,$query)or die("query failed");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
        if($row['password'] === $cpass){
            session_start();
            $_SESSION['user_name'] = $row['name'];
            header("Location: http://localhost/login_system/home.php"); 
        }else{
            $error[] = "Password not match!";
        }
    }else{
        $error[] = "Email not match!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="form_contener">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <h3>Login Now</h3>
            <?php
              if(isset($error)){
                foreach($error as $error){
                    echo "<span class='error_msg'>$error</span>";
                }
              }
            ?>
            
            <input type="email" name="email" placeholder=" email" required>
            <input type="password" name="password" placeholder=" password" required>
            <input type="submit" name="login" value="Login" class="btn">
            <span>don't have an account? <a href="register.php" >Register</a></span>
        </form>
    </div>
</body>
</html> 
   
</body>
</html>