<?php
define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'pantry_inventory');

$connect = mysqli_connect(hostname, user, password, databaseName);
?>