<?php

include "../sns/connection.php";
$database = 'user';

$conn = mysqli_connect($servername, $username, $password, $database);


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$message = $_POST['message'];


$insert_query = "INSERT INTO messages (firstname,lastname,email,message) VALUES('$firstname', '$lastname', '$email', '$message')";

$exe_insert = mysqli_query($conn, $insert_query);
header('location: ../sns/index.php');














?>