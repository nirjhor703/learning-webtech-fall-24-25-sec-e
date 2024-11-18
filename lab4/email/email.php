<?php
$emailError = "";
$email = "";
 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $validCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
 
    // Validation: Cannot be empty
    if ($email === "") {
        $emailError = "Email cannot be empty.";
    }
    // Validation: Must start with a letter
    elseif (!ctype_alpha($email[0])) {
        $emailError = "Name must start with a letter.";
    }
    // Validation: Can only contain valid characters
    else {
        $isValid = true;
        for ($i = 0; $i < strlen($email); $i++) {
            if (strpos($validCharacters, $email[$i]) === false) {
                $isValid = false;
                break;
            }
        }
    }
    // Validation: Contains at least two words
    if (!$emailError && str_word_count($email) < 2) {
        $emailError = "Name must contain at least two words.";
    }
 
    // Display the result
    if ($emailError) {
        echo "<p style='color: red;'>$emailError</p>";
        echo "<a href='email.html'>Go Back</a>";
    } else {
        echo "<p style='color: green;'>Name is valid: $email</p>";
    }
}
?>
 