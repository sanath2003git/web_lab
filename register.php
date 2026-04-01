<?php
// Initialize variables
$name = $email = $password = $confirm_password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $name = clean_input($_POST["name"]);
    $email = clean_input($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Name validation
    if (empty($name)) {
        $errors['name'] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors['name'] = "Only letters and spaces allowed";
    }

    // Email validation
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Password validation
    if (empty($password)) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    // Confirm password
    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    // If no errors
    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        echo "<h3 style='color:green;'>Registration Successful!</h3>";

        // Normally you would insert into database here
        // Example:
        // mysqli_query($conn, "INSERT INTO users ...");

        // Clear values
        $name = $email = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<h2>Register</h2>

<form method="POST" action="">

    Name:<br>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $errors['name'] ?? ''; ?></span>
    <br><br>

    Email:<br>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span>
    <br><br>

    Password:<br>
    <input type="password" name="password">
    <span style="color:red;"><?php echo $errors['password'] ?? ''; ?></span>
    <br><br>

    Confirm Password:<br>
    <input type="password" name="confirm_password">
    <span style="color:red;"><?php echo $errors['confirm_password'] ?? ''; ?></span>
    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>