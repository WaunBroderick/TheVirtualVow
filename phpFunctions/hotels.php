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
$sql = "SELECT * FROM Hotels";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

            echo '<p>' .$row["id"]. '</p>';
            echo '<p>' .$row["name"]. '</p>';
            echo '<p>' .$row["description"]. '</p>';
            echo '<p>' .$row["location"]. '</p>';
            echo '<p>' .$row["price"]. '</p>';
            echo '<p>' .$row["duration"]. '</p>';
            echo '<p>' .$row["TDPref"]. '</p>';
        
    }
}else {
    echo "NO SHIT HOMIE";
}
?>
