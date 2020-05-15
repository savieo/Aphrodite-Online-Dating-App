<?php 

$properties = (parse_ini_file("properties.ini"));

$servername = $properties['servername'];
$username = $properties['username'];
$dbpassword = $properties['password'];
$dbname=$properties['databasename'];

//Connecting to local MySQL with mysqli, for the database named "mydatabase"
$mysqli = new mysqli($servername, $username, $dbpassword, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    
}
?>