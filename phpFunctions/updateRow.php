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

$var_name = $_GET['items'];
$var_offer = $_GET['offer'];



$sql = "UPDATE buckets SET current_price = (current_price + '$var_offer') WHERE id = '$var_name';";
$result = $conn->query($sql);


header("Location: ../client.htm#dashboard");
    exit;
?>