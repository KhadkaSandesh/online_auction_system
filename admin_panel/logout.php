<?php

session_start();
unset($_SESSION['IS_LOGIN']);
header('location:admin_acc.php');
die();


?>