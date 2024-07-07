document
  .getElementById("registerForm")
  .addEventListener("submit", function (event) {
    // Clear previous error messages
    document.getElementById("fullnameError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("usernameError").textContent = "";
    document.getElementById("passwordError").textContent = "";

    // Get form values
    let fullname = document.getElementById("fullname").value;
    let email = document.getElementById("email").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    let hasError = false;

    // Full name validation
    if (fullname.trim() === "") {
      document.getElementById("fullnameError").textContent =
        "Please enter your full name";
      hasError = true;
    }

    // Email validation
    if (email.trim() === "") {
      document.getElementById("emailError").textContent =
        "Please enter an email";
      hasError = true;
    } else if (!validateEmail(email)) {
      document.getElementById("emailError").textContent = "Enter a valid email";
      hasError = true;
    }

    // Username validation
    if (username.trim() === "") {
      document.getElementById("usernameError").textContent =
        "Please enter a username";
      hasError = true;
    } else if (!/^[A-Za-z0-9]+$/.test(username)) {
      document.getElementById("usernameError").textContent =
        "Username must contain only letters and numbers";
      hasError = true;
    }

    // Password validation
    if (password.trim() === "") {
      document.getElementById("passwordError").textContent =
        "Please enter a password";
      hasError = true;
    } else if (password.length < 8) {
      document.getElementById("passwordError").textContent =
        "Password must be at least 8 characters long";
      hasError = true;
    }

    if (hasError) {
      // Prevent form submission if there are errors
      event.preventDefault();
    }
  });

function validateEmail(email) {
  var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}
