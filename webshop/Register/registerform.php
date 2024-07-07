<?php
// Function to sanitize the full name
function sanitize_full_name($full_name) {
    // Remove any character that is not a letter or space
    return preg_replace("/[^a-zA-Z\s]/", "", $full_name);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Now we need to filter username and password from malicious script
    // First sanitize username (INPUT_POST, attr name, FILTER)
    $fullname = filter_input(INPUT_POST, "fullname", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    // Further sanitize the full name to allow only letters and spaces
    $fullname = sanitize_full_name($fullname);

    // Now we check if input fields are empty
    if (empty($username)) {
        echo "<span class='error'>Please enter a username</span>";
    } elseif (!preg_match("/^[A-Za-z0-9]+$/", $username)) {
        echo "<span class='error'>Username must contain only letters and numbers</span>";
    } elseif (empty($password)) {
        echo "<span class='error'>Please enter a password</span>";
    } elseif (strlen($password) < 8) {
        echo "<span class='error'>Password must be at least 8 characters long</span>";
    } elseif (empty($fullname)) {
        echo "<span class='error'>Please enter your full name</span>";
    } elseif (empty($email)) {
        echo "<span class='error'>Please enter an email</span>";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<span class='error'>Enter a valid email</span>";
    } else {
        // If everything is filled out then do this below
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO webshop (fullname, username, email, password) 
                VALUES ('$fullname', '$username', '$email', '$hash')";

        if (mysqli_query($connection, $sql)) {
            // Successful registration
            header("Location: homepage.php"); // Redirect to the homepage or any other page
            exit();
        } else {
            if (mysqli_errno($connection) == 1062) { // Error code for duplicate entry
                // Check if the duplicate is for username or email
                $duplicate_entry = mysqli_error($connection);
                if (strpos($duplicate_entry, 'username') !== false) {
                    echo "<span class='error'>That username is taken</span>";
                } elseif (strpos($duplicate_entry, 'email') !== false) {
                    echo "<span class='errorEmail'>That email is taken</span>";
                } else {
                    echo "<span class='errorUsername'>Username is taken</span>";
                }
            } else {
                echo "<span class='error'>An error occurred: " . mysqli_error($connection) . "</span>";
            }
        }
    }
}
?>
