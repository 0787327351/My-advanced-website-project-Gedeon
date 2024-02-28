<?php
// Include the database configuration file
include 'connect.php';

// Check if the form is submitted for adding a salesman
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Get form data
    $salesmanId = $_POST['salesman-id'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $commission = $_POST['commission'];

    // Prepare SQL statement to insert salesman into database
    $sql = "INSERT INTO salesman (salesman_id, name, city, commission)
            VALUES ('$salesmanId', '$name', '$city', '$commission')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Salesman added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Check if the form is submitted for updating a salesman
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get form data
    $salesmanId = $_POST['salesman-id'];
    $city = $_POST["city"];
    $commission = $_POST['commission'];

    // Prepare SQL statement to update salesman in the database
    $sql = "UPDATE salesman SET city='$city', commission='$commission' WHERE salesman_id='$salesmanId'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Salesman updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Check if the form is submitted for deleting a salesman
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Get form data
    $salesmanId = $_POST['salesman-id'];

    // Prepare SQL statement to delete salesman from the database
    $sql = "DELETE FROM salesman WHERE salesman_id='$salesmanId'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Salesman deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch existing salesmen data
$query = "SELECT * FROM salesman";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salesman - Investment Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Salesman</h1>
    </header>
    <main>
        <div id="formc">
            <a href="index.php">Back to Home</a>
            <h2>Add Salesman</h2>
           
                <form method="post">
    <label for="salesman-id">Salesman ID:</label>
    <input type="text" id="salesman-id" name="salesman-id" required><br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="city">City:</label>
    <input type="text" id="city" name="city" required><br>
    <label for="commission">Commission:</label>
    <input type="text" id="commission" name="commission" required><br>
    <button type="submit" name="save">Add</button>

            </form>
        </div>
        
        <div class="salesman-table">
            <h2>Salesman Information</h2>
            <table id="salesmen-list">
                <thead>
                    <tr>
                        <th>Salesman ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Commission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display existing salesmen data
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['salesman_id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['city']."</td>";
                        echo "<td>".$row['commission']."</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='salesman-id' value='".$row['salesman_id']."'>";
                        echo "<button type='submit' name='update'>Update</button>";
                        echo "<button type='submit' name='delete'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Investment Management System</p>
    </footer>
</body>
</html>
