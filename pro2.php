<?php

// Step 1: Create an array of student names
$students = array("Rahul", "Anjali", "Vikram", "Sneha", "Arjun");

// Step 2: Display original array
echo "<h3>Original Array:</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 3: Sort in ascending order (asort)
asort($students);

echo "<h3>Array after asort() (Ascending Order):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 4: Sort in descending order (arsort)
arsort($students);

echo "<h3>Array after arsort() (Descending Order):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

?>