<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!-- LOGIN PAGE -->

    <?php
        include("database.php");
        session_start();

        $errorMessage = '';
        // login infos coming from input
        $username = trim($_POST['username']);
        $password = $_POST['password'];


        // mysql users table infos
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $sql);

        $usernameData = "";
        $passwordData = "";

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $usernameData = $row["username"];
            $passwordData = $row["password"];
            $user_id = $row["id"];
        }
        mysqli_close($connection); 

        $_SESSION['user_id'] = $user_id;
        

        // the part where I control the login informations 
        if (isset($_POST['login'])) {
            if (empty($username) && empty($password)) {
                $errorMessage = "Please fill in all fields.";
            } else {
            if ($username === $usernameData && $password === $passwordData) {
                $_SESSION['username'] = $username;
                header('Location: pages/homepage.php');
                exit();
            }
            else {
                $errorMessage = "You are not a member. Please create an account.";
            }
            }
           
        }
    ?>
<div class="login-container">
        <h2>Welcome</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" value="">
            <input type="password" name="password" placeholder="Password" value="">
            <button type="submit" name="login">Login</button>
            <button type="submit" name="register" style="margin-top:10px;">Create an account</button>
        </form>
          <!-- error message -->
          <?php if ($errorMessage): ?>
            <div class="errorMessage"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
    </div>
    
 
    <!-- LOGIN PAGE  -->
</body>
</html>


<?php

        if(isset($_POST["register"])) {
            header('Location: pages/register.php');
        }

?>