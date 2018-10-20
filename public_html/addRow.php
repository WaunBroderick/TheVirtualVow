<?php
//Credentials for the Database being used in this specific login.php function
$servername = "localhost";
$username = "root";
$password = "tdteam2018";
$dbname = "TDVow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$var_name = $_GET['name'];
$var_decription = $_GET['description'];
$var_current = $_GET['curr'];
$var_total = $_GET['tot'];
$var_category = $_GET['categories'];


$sql = "INSERT INTO buckets (name, category, description, current_price, total_price)
VALUES ('$var_name', '$var_category', '$var_description', '$var_current', '$var_total')";
$result = $conn->query($sql);


header("Location: ./host.htm#dashboard");
    exit;
?>