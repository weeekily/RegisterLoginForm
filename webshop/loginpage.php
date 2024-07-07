<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./Login/loginpage.css">
    <link rel="stylesheet" href="./Login/cover.css">
    <link rel="stylesheet" href="./indexCss/errors.css">

</head>
<body>
    <img src="./Login/cover.jpg">
<div class="form-container">
        <h2 class="loginText">Login</h2>
        <form class="loginForm" id="loginForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email: </label><br>
            <input type="text" name="email" id="email"><br>
            <span class="error" id="emailError"></span><br>
            <label for="password">Password: </label><br>
            <input type="password" name="password" id="password"><br>
            <span class="error" id="passwordError"></span><br>
            <input type="submit" name="submit" value="Login">
            <span class="noAcc">Don't have an account? <a href="registerpage.php">Register</a></span>
        </form>
    </div>

    <script src="./Login/loginform.js"></script>
</body>
</html>

<?php
    include("./Login/loginform.php");
?>