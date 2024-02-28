<?php
// Include the database configuration file
include 'connect.php';

// Function to add order to database
function addOrderToDatabase($orderNo, $purchaseAmount, $orderDate, $customerId, $salesmanId, $conn) {
    // Prepare SQL statement to insert order into database
    $sql = "INSERT INTO orders (order_no, purchase_amount, order_date, customer_id, salesman_id)
            VALUES ('$orderNo', '$purchaseAmount', '$orderDate', '$customerId', '$salesmanId')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $orderNo = $_POST['order-no'];
    $purchaseAmount = $_POST['purchase-amount'];
    $orderDate = $_POST['order-date'];
    $customerId = $_POST['customer-id'];
    $salesmanId = $_POST['salesman-id'];

    // Attempt to add order to database
    if (addOrderToDatabase($orderNo, $purchaseAmount, $orderDate, $customerId, $salesmanId, $conn)) {
        echo "Order added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Check if update request is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-order'])) {
    // Get form data
    $orderId = $_POST['order-id'];
    $orderNo = $_POST['order-no'];
    $purchaseAmount = $_POST['purchase-amount'];
    $orderDate = $_POST['order-date'];
    $customerId = $_POST['customer-id'];
    $salesmanId = $_POST['salesman-id'];

    // Update order in database
    $sql = "UPDATE orders SET order_no='$orderNo', purchase_amount='$purchaseAmount', order_date='$orderDate', customer_id='$customerId', salesman_id='$salesmanId' WHERE id='$orderId'";
    if ($conn->query($sql) === TRUE) {
        echo "Order updated successfully!";
    } else {
        echo "Error updating order: " . $conn->error;
    }
}

// Check if delete request is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-order'])) {
    // Get form data
    $orderId = $_POST['order-id'];

    // Delete order from database
    $sql = "DELETE FROM orders WHERE id='$orderId'";
    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully!";
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Investment Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Orders</h1>
    </header>
    <main>
	<div id="formc">
        <div class="order-form">
            <h2>Add Order</h2>
            <form id="add-order-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="order-no">Order No:</label>
                <input type="text" id="order-no" name="order-no" required><br>
                <label for="purchase-amount">Purchase Amount:</label>
                <input type="text" id="purchase-amount" name="purchase-amount" required><br>
                <label for="order-date">Order Date:</label>
                <input type="date" id="order-date" name="order-date" required><br>
                <label for="customer-id">Customer ID:</label>
                <input type="text" id="customer-id" name="customer-id" required><br>
                <label for="salesman-id">Salesman ID:</label>
                <input type="text" id="salesman-id" name="salesman-id" required><br>
                <button type="submit" id="add-order-btn">Add</button>
            </form>
			
        </div>
		</div>
        <div class="orders-list">
            <h2>Orders</h2>
            <table id="orders-table">
                <thead>
                    <tr>
                        <th>Order No</th>
                        <th>Purchase Amount</th>
                        <th>Order Date</th>
                        <th>Customer ID</th>
                        <th>Salesman ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Orders will be displayed here -->
                </tbody>
            </table>
        </div>
		
    </main>
    <footer>
        <a href="index.php">Back to Home</a>
    </footer>
    <script>
        // Function to add order to orders table
        function addOrderToTable(orderId, orderNo, purchaseAmount, orderDate, customerId, salesmanId) {
            var ordersTable = document.getElementById("orders-table").getElementsByTagName('tbody')[0];

            // Create a new row
            var newRow = ordersTable.insertRow();

            // Insert cells into the row
            var cellOrderNo = newRow.insertCell(0);
            var cellPurchaseAmount = newRow.insertCell(1);
            var cellOrderDate = newRow.insertCell(2);
            var cellCustomerId = newRow.insertCell(3);
            var cellSalesmanId = newRow.insertCell(4);
            var cellActions = newRow.insertCell(5);

            // Populate cells with data
            cellOrderNo.innerHTML = orderNo;
            cellPurchaseAmount.innerHTML = purchaseAmount;
            cellOrderDate.innerHTML = orderDate;
            cellCustomerId.innerHTML = customerId;
            cellSalesmanId.innerHTML = salesmanId;

            // Add update and delete buttons
            var updateBtn = document.createElement("button");
            updateBtn.innerHTML = "Update";
            updateBtn.addEventListener("click", function() {
                // Handle update logic here
            });

            var deleteBtn = document.createElement("button");
            deleteBtn.innerHTML = "Delete";
            deleteBtn.addEventListener("click", function() {
                // Handle delete logic here
            });

            cellActions.appendChild(updateBtn);
            cellActions.appendChild(deleteBtn);
        }

        // Event listener for add order button click
        document.getElementById("add-order-btn").addEventListener("click", function() {
            // Get form data
            var orderNo = document.getElementById("order-no").value="2";
            var purchaseAmount = document.getElementById("purchase-amount").value="200";
            var orderDate = document.getElementById("order-date").value="27/02/2024";
            var customerId = document.getElementById("customer-id").value="5";
            var salesmanId = document.getElementById("salesman-id").value="4";
			

			
			

            // Add order to orders table
            addOrderToTable(null, orderNo, purchaseAmount, orderDate, customerId, salesmanId);
        });
    </script>
</body>
</html>
