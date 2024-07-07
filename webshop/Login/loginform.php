<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email)) {
        echo "Please enter an email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Enter a valid email";
    } elseif (empty($password)) {
        echo "Please enter a password";
    } else {
        $sql = "SELECT * FROM webshop WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a new session
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: homepage.php"); // Redirect to the index page or any other page
                exit();
            } else {
                echo "<span class='errorPassword'>Incorrect password</span>";
            }
        } else {
            echo "<span class='errorNoAcc'>No account found with that email</span>";
        }
    }
}
?>
