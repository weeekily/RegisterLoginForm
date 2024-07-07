document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    // Clear previous error messages
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";

    // Get form values
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let hasError = false;

    // Email validation
    if (email.trim() === "") {
      document.getElementById("emailError").textContent =
        "Please enter an email";
      hasError = true;
    } else if (!validateEmail(email)) {
      document.getElementById("emailError").textContent = "Enter a valid email";
      hasError = true;
    }

    // Password validation
    if (password.trim() === "") {
      document.getElementById("passwordError").textContent =
        "Please enter a password";
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
