<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Report - Investment Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Date Report</h1>
    </header>
    <main class="customers">
        <div>
		
            <h2>Enter Report Details</h2>
            <label for="report-no">Report No:</label>
            <input type="number" id="report-no" required>
            <label for="order-date">Order Date:</label>
            <input type="date" id="order-date" required>
            <label for="customer-name">Customer Name:</label>
            <input type="text" id="customer-name" required>
            <label for="purchase-amount">Purchase Amount:</label>
            <input type="text" id="purchase-amount" required>
            <label for="salesman">Salesman:</label>
            <input type="text" id="salesman" required><br><br><br><br>
            <button onclick="generateReport()">Generate Report</button>
        </div>
        <div id="report-results" class="report-results">
            <!-- Report results will be displayed here -->
        </div>
    </main>
    <footer>
        <a href="index.php">Back to Home</a>
    </footer>
    <script>
        function generateReport() {
            // Get report details
            var reportNo = document.getElementById("report-no").value="2";
            var orderDate = document.getElementById("order-date").value="27/02/2024";
            var customerName = document.getElementById("customer-name").value="john";
            var purchaseAmount = document.getElementById("purchase-amount").value="500";
            var salesman = document.getElementById("salesman").value="4";

            // Validate if all fields are provided
            if (!reportNo || !orderDate || !customerName || !purchaseAmount || !salesman) {
                alert("Please enter all report details.");
                return;
            }

            // For demonstration purposes, let's populate a table with the entered data
            var tableContent = "<h2>Report Details</h2><table><thead><tr><th>Report No</th><th>Order Date</th><th>Customer Name</th><th>Purchase Amount</th><th>Salesman</th></tr></thead><tbody>";
            tableContent += "<tr>";
            tableContent += "<td>" + reportNo + "</td>";
            tableContent += "<td>" + orderDate + "</td>";
            tableContent += "<td>" + customerName + "</td>";
            tableContent += "<td>" + purchaseAmount + "</td>";
            tableContent += "<td>" + salesman + "</td>";
            tableContent += "</tr>";
            tableContent += "</tbody></table>";

            // Show the report details
            document.getElementById("report-results").innerHTML = tableContent;
        }
    </script>
</body>
</html>
