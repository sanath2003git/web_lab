<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "library");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert Book Data
if (isset($_POST['submit'])) {
    $acc = $_POST['accession_no'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO books VALUES ('$acc','$title','$authors','$edition','$publisher')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Book added successfully!</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Search Book
$search_result = null;
if (isset($_POST['search'])) {
    $search_title = $_POST['search_title'];

    $sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";
    $search_result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <style>
        body { font-family: Arial; }
        form { margin-bottom: 20px; }
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Add Book</h2>
<form method="post">
    Accession No: <input type="number" name="accession_no" required><br><br>
    Title: <input type="text" name="title" required><br><br>
    Authors: <input type="text" name="authors" required><br><br>
    Edition: <input type="text" name="edition" required><br><br>
    Publisher: <input type="text" name="publisher" required><br><br>
    <input type="submit" name="submit" value="Add Book">
</form>

<hr>

<h2>Search Book by Title</h2>
<form method="post">
    Enter Title: <input type="text" name="search_title" required>
    <input type="submit" name="search" value="Search">
</form>

<br>

<?php
// Display Search Results
if ($search_result) {
    if ($search_result->num_rows > 0) {
        echo "<h3>Search Results:</h3>";
        echo "<table>";
        echo "<tr>
                <th>Accession No</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
              </tr>";

        while ($row = $search_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['accession_no']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['authors']."</td>";
            echo "<td>".$row['edition']."</td>";
            echo "<td>".$row['publisher']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No books found.</p>";
    }
}

$conn->close();
?>

</body>
</html>