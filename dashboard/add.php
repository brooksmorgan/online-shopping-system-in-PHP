<?php
	session_start();
	$title = "Add new book";

	require "../functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$id = trim($_POST['id']);
		$id = mysqli_real_escape_string($conn, $id);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$fee = trim($_POST['fee']);
		$fee = mysqli_real_escape_string($conn, $fee);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
			
		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../bootstrap/img/";
			$uploadDirectory .= $image1;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}
	
		if(isset($_FILES['image1']) && $_FILES['image1']['name'] != ""){
			$image1 = $_FILES['image1']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../bootstrap/img/";
			$uploadDirectory .= $image1;
			move_uploaded_file($_FILES['image1']['tmp_name'], $uploadDirectory);
		}
    
       


		$query = "INSERT INTO items (product_id , product_name , deleivey_fee , product_image , product_image1 , product_descr , product_price) VALUES  ('" . $id . "', '" . $title . "', '" . $fee . "', '" . $image . "' , '" . $image1 . "','" . $descr . "', '" . $price . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
           
			header("Location: tables.php");
		}
	}
?>
