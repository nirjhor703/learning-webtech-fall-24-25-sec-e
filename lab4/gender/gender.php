<?php
$genderError = "";
$gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = isset($_POST["gender"]) ? trim($_POST["gender"]) : "";

    if ($gender === "") {
        $genderError = "At least one gender option must be selected.";
    }

    if ($genderError) {
        echo "<p style='color: red;'>$genderError</p>";
        echo "<a href='gender.html'>Go Back</a>";
    } else {
        echo "<p style='color: green;'>Gender selected: $gender</p>";
    }
}
?>
