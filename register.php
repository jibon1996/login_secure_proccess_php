<?php
if(isset($_POST['register'])){
    $conn= mysqli_connect("localhost","root","","registration") or die("connection failed");

    $name = mysqli_real_escape_string($conn, $_POST['name']) ;
    $email = mysqli_real_escape_string($conn, $_POST['email']) ;
    $pass = md5($_POST['password']) ;
    $cpass = md5($_POST['cpassword']) ;

    $query = "SELECT * FROM user_info WHERE email ='{$email}'";
    $result = mysqli_query($conn,$query)or die("query failed");

    if(mysqli_num_rows($result) > 0){
        $error[] = "User already exist!";
    }else{

        if($pass != $cpass){
            $error[] = "Password and cofirm Password not match!";
        }else{
            $query2 = "INSERT INTO user_info(name,email,password)
                  VALUES('{$name}','{$email}','{$pass}')";
             mysqli_query($conn,$query2) or die("query failed");

             header("Location: http://localhost/login_system/login.php"); 
        }
           
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form_contener">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <h3>Register Now</h3>
            <?php
              if(isset($error)){
                foreach($error as $error){
                    echo "<span class='error_msg'>$error</span>";
                }
              }
            ?>
            <input type="text" name="name" placeholder=" name" required>
            <input type="email" name="email" placeholder=" email" required>
            <input type="password" name="password" placeholder=" password" required>
            <input type="password" name="cpassword" placeholder=" confirm password" required>
            <input type="submit" name="register" value="Register" class="btn">
            <span>already have an account? <a href="login.php" >Login</a></span>
        </form>
    </div>
</body>
</html>