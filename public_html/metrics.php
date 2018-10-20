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


//SQL call to the database to match usernamd and password exactly
//$sql = "SELECT buckets.name as name, buckets.description as description, buckets.image as image, buckets.current_price as curr, buckets.total_price as total FROM buckets AS INNER JOIN categories ON categories.id=buckets.category";
$sql = "SELECT COUNT(RSVP) as total FROM user_data";
$sql1 = "SELECT COUNT(RSVP) as confirmed FROM user_data WHERE RSVP = 1";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $row1 = $result1->fetch_assoc();
    echo ' There are '.$row1["confirmed"]. ' of your ' .$row["total"]. ' guests that are still yet to RSVP for your wedding!';
} else {
    echo "0 results";
}
$conn->close();
?>