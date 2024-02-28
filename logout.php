<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Dummy username and password for demonstration
        $dummy_username = "gedeon";
        $dummy_password = "g@123";

        // Get the entered username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if username and password are correct
        if ($username == $dummy_username && $password == $dummy_password) {
            // Redirect to home page or any other page after successful login
            header("Location: index.php");
            exit;
        } elseif ($username != $dummy_username && $password != $dummy_password) {
            $error_msg = "Both username and password are incorrect";
        } elseif ($username != $dummy_username) {
            $error_msg = "Username is not correct";
        } elseif ($password != $dummy_password) {
            $error_msg = "Password is not correct";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Investment Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <?php
        // Display error message if any
        if (isset($error_msg)) {
            echo "<p>$error_msg</p>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
			
			<p>Don't have an account? <a href="create.php">Create one here</a>.</p><br>
            <button type="submit">Login</button>
        </form>
        
    </main>
    
    
</body>
</html>
