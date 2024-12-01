<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'employee';

$connection = mysqli_connect($hostname, $username, $password, $db_name);

if($connection == true) {
     echo '';
} else {
     echo 'connection failed';
}

?>