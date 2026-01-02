<?php
$names = array("Alex","Danny","John","George","Mike");
echo "Original Array: <br>";
print_r($names);
echo "<br><br>";
asort($names);
echo "Sorted Array: <br>";
print_r($names);
echo "<br><br>";
arsort($names);
echo "Reverse Sorted Array: <br>";
print_r($names);
?>
