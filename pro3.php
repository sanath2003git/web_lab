<?php

// Step 1: Create an array of Indian cricket players
$players = array("Virat Kohli", "Rohit Sharma", "MS Dhoni", "KL Rahul", "Hardik Pandya");

// Step 2: Display in HTML table
echo "<h2>Indian Cricket Players</h2>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Sl. No</th><th>Player Name</th></tr>";

// Loop through array
$index = 1;
foreach ($players as $player) {
    echo "<tr>";
    echo "<td>" . $index . "</td>";
    echo "<td>" . $player . "</td>";
    echo "</tr>";
    $index++;
}

echo "</table>";

?>