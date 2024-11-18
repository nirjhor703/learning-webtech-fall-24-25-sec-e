<?php
$emailError = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);

        if ($email === "") {
            $emailError = "Email cannot be empty.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Must be a valid email address (e.g., anything@example.com).";
        }

        if ($emailError) {
            echo "<p style='color: red;'>$emailError</p>";
            echo "<a href='email.html'>Go Back</a>";
        } else {
            echo "<p style='color: green;'>Email is valid: $email</p>";
        }
    } else {
        echo "<p style='color: red;'>Email input is missing from the form.</p>";
        echo "<a href='email.html'>Go Back</a>";
    }
}
?>
