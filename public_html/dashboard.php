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
            echo '<div class="bucketItem" >';
        }
        else{
            echo '<div class="bucketItem" >';
        }
        echo '<div class="bucketItem">
        ' . $row["name"]. " " . $row["category"]. '<br>
        <div
        data-preset="fan"
        class="ldBar label-center",
        style="width:100%;height:90px",
        data-stroke="#163D22",
        data-value="' .$percentint. '"
      >
      </div>
      </div><form action="deleteRow.php"><button type="submit" name= "delete" value="'. $row["name"]. '">Delete Item</button></form></div>';
    }
} else {
    echo "";
}
$conn->close();



function dropRow($param1) {
    echo "Hello world!";
    echo $param1;
}


?>




<!-- <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" id="pic" /> -->