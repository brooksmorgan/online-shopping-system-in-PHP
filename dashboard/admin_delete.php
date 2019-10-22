<?php
	$product_id = $_GET['bookisbn'];

	require_once "../functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM items WHERE product_id = '$product_id'";
	$result = mysqli_query($conn, $query);

	
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: tables.php");
	
?>