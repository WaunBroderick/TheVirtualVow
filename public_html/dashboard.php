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
$sql = "SELECT buckets.id, buckets.name, buckets.category, buckets.current_price, buckets.total_price, categories.image FROM buckets JOIN categories ON buckets.category=categories.id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $curr =  $row["current_price"];
        $total = $row["total_price"];
        $percentint = intval(($curr/$total)*100);
        $percentstr = strval($percentint)+ "%";
        if ($row["category"] == 1){
            echo '<div class="bucketItem" style="background-image: url(../images/bucketBGI/AfricaTravel.jpg); background-position: center; background-repeat: no-repeat; background-size: cover; ">';
        }
        else{
            echo '<div class="bucketItem" style="background-image: url(../images/bucketBGI/AfricaTravel.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">';
        }
        echo '
        id: ' . $row["id"]. ' - Name: ' . $row["name"]. " " . $row["category"]. '<br>
        <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90"
        aria-valuemin="0" aria-valuemax="100" style="width:'.$percentint. '%">
          40% Complete (success)
        </div>
      </div></div>';
    }
} else {
    echo "0 results";
}
$conn->close();


?>




<!-- <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" id="pic" /> -->