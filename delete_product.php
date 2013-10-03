<?php
$id = $_GET ['product_id'];
include 'Database.php';
$connect = new Database();
$conn = $connect->connection ();
$database = "assignment";
// Select database
$isconnect = mysql_select_db ( $database, $conn );
// check connect data
if (! $isconnect) {
	die ( "Connect database fail: " . mysql_error () );
}
$myquery = "DELETE FROM product WHERE idproduct =" . $id;
$result = mysql_query ( $myquery );
mysql_close ();
if (! $result) {
	die ( "Delete fail: " . mysql_error () );
} else {
	// header() redirect
	header ( 'Location: http://localhost/PHPAssignment/display_product.php' );
}
?>