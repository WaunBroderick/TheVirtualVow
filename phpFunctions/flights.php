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
$sql = "SELECT * FROM Flights";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            if ($row["TDPref"] == 0){
                echo'<div class="selectionOption" id="'.$row["flightname"]. '">';
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                echo 'Trip: <p>' .$row["flightname"]. '</p>';
                echo '<p>Leaving: ' .$row["leaving"]. '</p>';
                echo '<p>Destination: ' .$row["destination"]. '</p>';
                echo '<p>Total Price: ' .$row["price"]. '</p>';
                echo '<p>' .$row["TDPref"]. '</p>';
                echo'</div>';
    } else{
        echo'<style type="text/css">
        #' .$row["flightname"].' {
            background-color:black;
            color=green;
        }
        </style>';
        echo'<div class="selectionOption" id="'.$row["flightname"]. '">';
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                echo 'Trip: <p>' .$row["flightname"]. '</p>';
                echo '<p>Leaving: ' .$row["leaving"]. '</p>';
                echo '<p>Destination: ' .$row["destination"]. '</p>';
                echo '<p>Total Price: ' .$row["price"]. '</p>';
                echo '<p>' .$row["TDPref"]. '</p>';
                echo'</div>';
    }
}
}else {
    echo "NO SHIT HOMIE";
}
?>
