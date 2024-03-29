<?php

session_start();
unset($_SESSION['user_login']);
unset($_SESSION['username']);
unset($_SESSION['is_login']);
unset($_SESSION['msg']);
header('location:../sns/index.php');
die();



?>