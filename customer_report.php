<?php
// Include the database configuration file
include("connect.php");

// Function to delete customer
function deleteCustomer($conn, $customer_id) {
    $sql = "DELETE FROM customer WHERE customer_id='$customer_id'";
    if(mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Function to update customer
function updateCustomer($conn, $customer_id, $customer_name, $city, $grade, $salesman_id) {
    $sql = "UPDATE customer SET customer_name='$customer_name', city='$city', grade='$grade', salesman_id='$salesman_id' WHERE customer_id='$customer_id'";
    if(mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Check if form is submitted
if(isset($_POST['Save'])){
    // Retrieve form data
    $customer_id = $_POST["customer_id"];
    $customer_name = $_POST["customer_name"];
    $city = $_POST["city"];
    $grade = $_POST["grade"];
    $salesman_id = $_POST["salesman_id"];
    
    // Insert data into database
    $insert = "INSERT INTO customer (customer_id, customer_name, city, grade, salesman_id) 
               VALUES ('$customer_id', '$customer_name','$city','$grade','$salesman_id')";
    $sql = mysqli_query($conn, $insert);
    
    // Check if data is inserted successfully
    if($sql){
        echo "Customer created successfully";
    } else {
        echo "Customer not created";
    }
}

// Check if form is submitted for update
if(isset($_POST['update'])){
    // Retrieve form data
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $city = $_POST['city'];
    $grade = $_POST['grade'];
    $salesman_id = $_POST['salesman_id'];

    // Update customer in database
    if(updateCustomer($conn, $customer_id, $customer_name, $city, $grade, $salesman_id)) {
        echo "Customer updated successfully!";
    } else {
        echo "Error updating customer";
    }
}

// Check if form is submitted for delete
if(isset($_POST['delete'])){
    // Retrieve form data
    $customer_id = $_POST['customer_id'];

    // Delete customer from database
    if(deleteCustomer($conn, $customer_id)) {
        echo "Customer deleted successfully!";
    } else {
        echo "Error deleting customer";
    }
}

// Fetch data from database
$query = "SELECT * FROM customer";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Report - Investment Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Customer Report</h1>
    </header>
    <main>
        <div id="formc">
            <a href="index.php">Home</a>
            <h2>Customer Page</h2>
            <form method="post">
                <label for="customer_id">Customer ID:</label>
                <input type="number" id="customer_id" name="customer_id" required><br><br>
                <label for="customer_name">Customer Name:</label>
                <input type="text" id="customer_name" name="customer_name" required><br><br>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required><br><br>
                <label for="grade">Grade:</label>
                <input type="text" id="grade" name="grade" required><br><br>
                <label for="salesman_id">Salesman ID:</label>
                <input type="number" id="salesman_id" name="salesman_id" required><br><br>
                <input type="submit" name="Save">
            </form>
        </div>
        
        <div class="customer-table">
            <h2>Customer Information</h2>
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>City</th>
                        <th>Grade</th>
                        <th>Salesman ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display fetched data
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['customer_id']."</td>";
                        echo "<td>".$row['customer_name']."</td>";
                        echo "<td>".$row['city']."</td>";
                        echo "<td>".$row['grade']."</td>";
                        echo "<td>".$row['salesman_id']."</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='customer_id' value='".$row['customer_id']."'>";
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
