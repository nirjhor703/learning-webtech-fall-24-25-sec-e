<?php
$bloodGroupError = "";
$bloodGroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bloodGroup = isset($_POST["bloodGroup"]) ? trim($_POST["bloodGroup"]) : "";

    if ($bloodGroup === "") {
        $bloodGroupError = "Blood group must be selected.";
    }

    if ($bloodGroupError) {
        echo "<p style='color: red;'>$bloodGroupError</p>";
        echo "<a href='blood_group.html'>Go Back</a>";
    } else {
        echo "<p style='color: green;'>Blood group selected: $bloodGroup</p>";
    }
}
?>
