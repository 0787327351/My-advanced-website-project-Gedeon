<?php
include ("connect.php");

if(isset($_POST['Save'])){
	
	$customer_id = $_POST["customer_id"];
	$customer_name = $_POST["customer_name"];
	$city = $_POST["city"];
	$grade = $_POST["grade"];
	$salesman_id = $_POST["salesman_id"];
	
	$insert = "INSERT INTO customer (customer_id, customer_name, city, grade, salesman_id) values ('$customer_id', '$customer_name','$city','$grade','$salesman_id')";
	$sql = mysqli_query($conn, $insert);
	
	
	if($sql){
		echo "customer created";
	}else{
		
		echo "customer not created";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Investment Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

   
    <main> 
	
             
		<div id="formc">
		<a href="index.php">Home</a>
		<h2>Customer Page</h2>
        <form method="post">
        <label for="customer_id">customer_id:</label>
        <input type="number" id="customer_id" name="customer_id" required><br><br>
        <label for="customer_name">customer_name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br><br>
		<label for="city">city:</label>
        <input type="text" id="city" name="city" required><br><br>
		<label for="grade">grade:</label>
        <input type="text" id="grade" name="grade" required><br><br>
		<label for="salesman_id">salesman_id:</label>
        <input type="number" id="salesman_id" name="salesman_id" required><br><br>
		<input type="submit" name="Save" >
		
		
    </form>
	
    </main>
	
    <footer>
        <p>&copy; 2024 Investment Management System</p>
    </footer>
	</div>
</body>
</html>
