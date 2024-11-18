<?php
$dobError = "";
$dob = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["dob"])) {
        $dob = trim($_POST["dob"]);
        
        if ($dob === "") {
            $dobError = "Date of birth cannot be empty.";
        } else {
            // Split the date into day, month, and year
            $parts = explode("-", $dob);
            
            if (count($parts) === 3) {
                $day = (int)$parts[0];
                $month = (int)$parts[1];
                $year = (int)$parts[2];
                
                if ($day < 1 || $day > 31 || $month < 1 || $month > 12 || $year < 1953 || $year > 1998) {
                    $dobError = "Invalid date of birth. Use dd-mm-yyyy format (e.g., 01-01-1980), with valid ranges.";
                }
            } else {
                $dobError = "Invalid date format. Use dd-mm-yyyy.";
            }
        }

        if ($dobError) {
            echo "<p style='color: red;'>$dobError</p>";
            echo "<a href='dob.html'>Go Back</a>";
        } else {
            echo "<p style='color: green;'>Date of birth is valid: $dob</p>";
        }
    } else {
        echo "<p style='color: red;'>Date of birth input is missing from the form.</p>";
        echo "<a href='dob.html'>Go Back</a>";
    }
}
?>
