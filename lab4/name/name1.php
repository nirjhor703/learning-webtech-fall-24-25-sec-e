<?php
$nameError = "";
$name = "";
 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $validCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
 
    // Validation: Cannot be empty
    if ($name === "") {
        $nameError = "Name cannot be empty.";
    }
    // Validation: Must start with a letter
    elseif (!ctype_alpha($name[0])) {
        $nameError = "Name must start with a letter.";
    }
    // Validation: Can only contain valid characters
    else {
        $isValid = true;
        for ($i = 0; $i < strlen($name); $i++) {
            if (strpos($validCharacters, $name[$i]) === false) {
                $isValid = false;
                break;
            }
        }
        if (!$isValid) {
            $nameError = "Name can only contain letters, periods, and dashes.";
        }
    }
    // Validation: Contains at least two words
    if (!$nameError && str_word_count($name) < 2) {
        $nameError = "Name must contain at least two words.";
    }
 
    // Display the result
    if ($nameError) {
        echo "<p style='color: red;'>$nameError</p>";
        echo "<a href='name.html'>Go Back</a>";
    } else {
        echo "<p style='color: green;'>Name is valid: $name</p>";
    }
}
?>
 