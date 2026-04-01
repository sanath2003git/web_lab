<?php

// Step 1: Create an array
$players = array(
    "Virat Kohli",
    "Rohit Sharma",
    "MS Dhoni",
    "Jasprit Bumrah",
    "Hardik Pandya",
    "KL Rahul"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>
</head>
<body>

<h2>List of Indian Cricket Players</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Sl. No</th>
        <th>Player Name</th>
    </tr>

    <?php
    // Step 2: Display array in table
    $i = 1;
    foreach ($players as $player) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $player . "</td>";
        echo "</tr>";
        $i++;
    }
    ?>

</table>

</body>
</html>