<?php 
	require "../functions/database_functions.php";
	$conn = db_connect();
	
	if(isset($_POST['save_change'])){
	$id = trim($_POST['id']);
	$id = mysqli_real_escape_string($conn, $id);
	
	$title = trim($_POST['title']);
	$title = mysqli_real_escape_string($conn, $title);

	$pfrom = trim($_POST['pfrom']);
	$pfrom = mysqli_real_escape_string($conn, $pfrom);
	
	$descr = trim($_POST['descr']);
	$descr = mysqli_real_escape_string($conn, $descr);
	
	$price = floatval(trim($_POST['price']));
	$price = mysqli_real_escape_string($conn, $price);
	
			
				// add image
if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
	$image = $_FILES['image']['name'];
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
	$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../bootstrap/img/";
	$uploadDirectory .= $image;
	move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
}
				

			
		$query = "UPDATE items SET product_name = '$title',product_type = '$author', product_descr = '$descr', product_price = '$price', product_image='$image' WHERE product_id = '$isbn'";
	
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
           
			header("Location: tables.php");
		}

		}
?>