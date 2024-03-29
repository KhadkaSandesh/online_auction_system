<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'products';

$search_str = $_POST['search_str'];

$conn = mysqli_connect($servername, $username, $password, $database);
$str_search_query = "select * from products where ID = '$search_str'";

$query_result = mysqli_query($conn, $str_search_query);

if (mysqli_num_rows($query_result)) {
while($rows = mysqli_fetch_assoc($query_result)){
	echo $rows['ID'];
}}
else{
	echo "No records found.";
}








?>
