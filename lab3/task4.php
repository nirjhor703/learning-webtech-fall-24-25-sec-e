<?php

$num1 = 10;  
$num2 = 25;  
$num3 = 15; 

echo "There are 3 Numbers: 10,15,25<br>";
 
if ($num1 >= $num2 && $num1 >= $num3) {
    echo $num1 . " is the largest number.";

} elseif ($num2 >= $num1 && $num2 >= $num3) {
    echo $num2 . " is the largest number.";

} else {
    echo $num3 . " is the largest number.";
}
?>
 