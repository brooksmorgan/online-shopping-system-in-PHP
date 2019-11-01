<?php	
require_once "../functions/database_functions.php";
$conn = db_connect();

	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	$id = trim($_POST['id']);
	$title = trim($_POST['title']);
	$fee = trim($_POST['fee']);
	$descr = trim($_POST['descr']);
	$price = floatval(trim($_POST['price']));

    if(isset($_FILES['image1']) && $_FILES['image1']['name'] != ""){
        $image1 = $_FILES['image1']['name'];
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../../bootstrap/img/";
        $uploadDirectory .= $image1;
        move_uploaded_file($_FILES['image1']['tmp_name'], $uploadDirectory);
    }

	
	$query = "UPDATE items SET  
	product_name = '$title', 
	deleivey_fee = '$fee', 
	product_descr = '$descr', 
    product_image1 = '$image1', 
    product_price = '$price'";
   

	if(isset($product_image1)){
		$query .= ",  WHERE product_id = '$id'";
	} else {
		$query .= " WHERE product_id = '$id'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: tables.php?bookisbn=$id");
	}
?>