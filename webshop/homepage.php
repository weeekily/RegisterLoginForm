<?php
session_start(); 


// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy all sessions
    header("Location: loginpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>https://github.com/weeekily/RegisterLoginForm.git
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./Homepage/homepage.css">
</head>
<body>
    <header>
        <nav>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
            <ul class="right-menu">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <button type="submit" name="logout">Logout</button>
                    </form>
            </ul>
        </nav>
    </header>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>
