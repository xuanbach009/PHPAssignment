<?php
if (isset ( $_POST ['update'] )) {
	// Gets from index.php
	$id = $_POST['id'];
	//var_dump($id);
	
	$name = $_POST ['name']; // string
	// var_dump($name);
	
	$desicription = $_POST ['description']; // string
	 //var_dump($desicription);
	
	$quantity = $_POST ['quantity']; // int
	 //var_dump($quatity);
	
	$status = 0;
	
	if (isset($_POST['status'])) {
		$status =1;
	}
	$category_id = $_POST['category_id'];
	
	include 'Database.php';
	$connection = new Database();
	$conn = $connection->connection();
	$database ="assignment";
	mysql_select_db($database,$conn);
	$mysql = "UPDATE product SET name='$name', description ='$desicription', quantity =$quantity , status=$status, category_id =$category_id
              WHERE idproduct =$id";
	$result = mysql_query($mysql);
	mysql_close ();
	if (! $result) {
		die ( "Update fail: " . mysql_error () );
	} else {
		// header() redirect
		header ( 'Location: http://localhost/PHPAssignment/display_product.php' );
	}
}
?>