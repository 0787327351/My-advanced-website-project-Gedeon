<?php
	$conn = mysqli_connect("localhost","root","", "inventory");
	if($conn){
		
		echo "db joined ";
	}else{
		
		die("db not joined". mysqli_connect_error());
	}
?>
