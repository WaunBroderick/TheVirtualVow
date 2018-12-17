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

$sql = "SELECT name, id FROM categories";
$result = $conn->query($sql);

echo '<select name="categories">'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while($row = $result->fetch_assoc()) {
    $name =  $row["name"];
    $id =  $row["id"];
   echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

echo '</select>';// Close your drop down box

?>