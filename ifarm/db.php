<?php


// /* Database credentials. Assuming you are running MySQL
// server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost:3306');
// define('DB_USERNAME', 'aavpubli');
// define('DB_PASSWORD', 'jatinr33');
// define('DB_NAME', 'aavpubli_home');
 
// /* Attempt to connect to MySQL database */
// $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
$dbcon=mysqli_connect("localhost:3306","jatinr","jatinr33");  
mysqli_select_db($dbcon,"aavpubli_farm");  
?>