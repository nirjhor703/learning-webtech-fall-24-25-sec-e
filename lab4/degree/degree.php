<?php
$degreeError = "";
$degree = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $degree = isset($_POST["degree"]) ? $_POST["degree"] : "";

    if (empty($degree)) {
        $degreeError = "At least one degree must be selected.";
    }

    if ($degreeError) {
        echo "<p style='color: red;'>$degreeError</p>";
        echo "<a href='degree.html'>Go Back</a>";
    } else {
        echo "<p style='color: green;'>Degrees selected: " . implode(", ", $degree) . "</p>";
    }
}
?>
