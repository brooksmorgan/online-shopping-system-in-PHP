<?php
	function db_connect(){
		$conn = mysqli_connect("localhost", "root", "", "brooksshop");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}

	
	function select1LatestBook($conn){
		$row = array();
		$query = "SELECT product_id, product_image,product_name, product_price FROM items ORDER BY product_id ASC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 6; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	

	function select2LatestBook($conn){
		$row = array();
		$query = "SELECT product_id, product_image,product_name ,product_price, deleivey_fee FROM items ORDER BY product_id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 8; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	function select3LatestBook($conn){
		$row = array();
		$query = "SELECT product_id, product_image,product_name FROM items ORDER BY product_id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 6; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	function slide1Latestpost($conn){
		$row = array();
		$query = "SELECT  product_image FROM items ORDER BY product_id ASC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 1; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	function slide2Latestpost($conn){
		$row = array();
		$query = "SELECT  product_image FROM items ORDER BY product_id ASC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 1; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	function getBookByIsbn($conn, $isbn){
		$query = "SELECT product_name, product_image,product_image1,product_id,deleivey_fee ,product_price FROM items WHERE product_id = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getOrderId($conn, $customerid){
		$query = "SELECT orderid FROM orders WHERE customerid = '$customerid'";
		$result = mysqli_query($conn, $query);
		
		$row = mysqli_fetch_assoc($result);
		return $row['orderid'];
	}

	function insertIntoOrder($conn, $customerid, $total_price, $date, $ship_name, $ship_address, $ship_city, $ship_zip_code, $ship_country){
		$query = "INSERT INTO orders VALUES 
		('', '" . $customerid . "', '" . $total_price . "', '" . $date . "', '" . $ship_name . "', '" . $ship_address . "', '" . $ship_city . "', '" . $ship_zip_code . "', '" . $ship_country . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert orders failed " . mysqli_error($conn);
			exit;
		}
	}

	function getbookprice($isbn){
		$conn = db_connect();
		$query = "SELECT product_price FROM items WHERE product_id = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "get product price failed! " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['product_price'];
	}
	

	function getCustomerId($name, $address, $city, $tel,$zip_code, $country,$pay){
		$conn = db_connect();
		$query = "SELECT customerid from customers WHERE 
		name = '$name' AND 
		tel = '$tel' AND 
		city = '$city' AND 
		tel = '$tel' AND 
		zip_code = '$zip_code' AND 
		country = '$country' AND 
		pay = '$pay'";
		$result = mysqli_query($conn, $query);
		// if there is customer in db, take it out
		if($result){
			$row = mysqli_fetch_assoc($result);
			return $row['customerid'];
		} else {
			return null;
		}
	}

	function setCustomerId($name, $address, $city, $tel, $zip_code, $country,$pay){
		$conn = db_connect();
		$query = "INSERT INTO customers VALUES 
			('', '" . $name . "', '" . $address . "', '" . $city . "','" . $tel . "', '" . $zip_code . "', '" . $country . "','" . $pay . "')";

		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "insert false !" . mysqli_error($conn);
			exit;
		}
		$customerid = mysqli_insert_id($conn);
		return $customerid;
	}

	

	function getPubName($conn, $pubid){
		$query = "SELECT publisher_name FROM publisher WHERE publisherid = '$pubid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result) == 0){
			echo "Empty books ! Something wrong! check again";
			exit;
		}

		$row = mysqli_fetch_assoc($result);
		return $row['publisher_name'];
	}

	function getAll($conn){
		$query = "SELECT * from items ORDER BY product_id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}


	function getAllOrders($conn){
		$query = "SELECT * from items ORDER BY product_id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getAllOrders1($conn){
		$query = "SELECT * from orders ORDER BY orderid DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
		

	}

	function getAllOrders2($conn){
		$query = "SELECT * from customers ORDER BY customerid DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getAllOrders3($conn){
		$query = "SELECT * from order_items ORDER BY orderid DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getAllUsers($conn){
		$query = "SELECT * from users ORDER BY id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
?>