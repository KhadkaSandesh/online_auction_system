<?php 

$pro_id = $_GET['id'];

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);

$delete_query = " DELETE FROM products WHERE ID='$pro_id'";


?>

<script type="text/javascript">
	alert('hello');
</script>


<?php

$query = mysqli_query($conn, $delete_query);

// header('location:admin.php');








?>