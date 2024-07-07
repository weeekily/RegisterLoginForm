<?php
    include("database.php");
    include("./Register/registerform.php");
    include("./Login/loginform.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="./indexCss/formstyle.css">
    <link rel="stylesheet" href="./indexCss/errors.css">
    <link rel="stylesheet" href="./Login/loginpage.css">
    <link rel="stylesheet" href="./Login/cover.css"
</head>
<body>

<img src="./Login/cover.jpg">
<div class="form-container">
        <h2 class="signupText">Create an account</h2>
        <form class="regForm" id="registerForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="fname">Full Name: </label><br>
            <input type="text" name="fullname" id="fullname"><br>
            <span class="error" id="fullnameError"></span><br>

            <label for="email">Email: </label><br>
            <input type="text" name="email" id="email" value="<?php isset($email) ? $email : ''; ?>"><br>
            <span class="error" id="emailError"></span><br> 

            <label for="username">Username: </label><br>
            <input type="text" name="username" id="username" pattern="[A-Za-z0-9]+"><br>
            <span class="error" id="usernameError"></span><br>
            
            <label for="password">Password: </label><br>
            <input type="password" name="password" id="password" minlength="8"><br>
            <span class="error" id="passwordError"></span><br>
            
            <input type="submit" name="submit" value="Register">
            <span class="haveAcc">Already have account? <a href="loginpage.php"> Login</a></span>
        </form>
    </div>

    
    <script src="./Register/registerform.js"></script>
</body>
</html>
