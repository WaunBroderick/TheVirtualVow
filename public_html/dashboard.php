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
$sql = "SELECT buckets.id, buckets.name, buckets.description, buckets.category, buckets.current_price, buckets.total_price, categories.image FROM buckets JOIN categories ON buckets.category=categories.id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $curr =  $row["current_price"];
        $total = $row["total_price"];
        $percentint = intval(($curr/$total)*100);
        $percentstr = strval($percentint)+ "%";
        if ($row["category"] == 1){
            echo '<div class="bucketItem" style="background-image:url(../images/bucketBGI/dining.png);background-repeat: no-repeat;-webkit-background-size: stretch;background-size: 100% 100%;border-radius: 25px;z-index: -1;
            -moz-background-size: stretch;
            -o-background-size: stretch;
            background-size: stretch;" >';
        }
        else if ($row["category"] == 2){
            echo '<div class="bucketItem" style="background-image:url(../images/bucketBGI/experience.png);background-repeat: no-repeat;-webkit-background-size: stretch;background-size: 100% 100%;border-radius: 25px;z-index: -1;
            -moz-background-size: stretch;
            -o-background-size: stretch;
            background-size: stretch;" >';
        }
        else if ($row["category"] == 3){
            echo '<div class="bucketItem" style="background-image:url(../images/bucketBGI/asiaTravel.png);background-repeat: no-repeat;-webkit-background-size: stretch;background-size: 100% 100%;border-radius: 25px;z-index: -1;
            -moz-background-size: stretch;
            -o-background-size: stretch;
            background-size: stretch;" >';
        } else if ($row["category"] == 4){
            echo '<div class="bucketItem" style="background-image:url(../images/bucketBGI/africaTravel.png);background-repeat: no-repeat;-webkit-background-size: stretch;background-size: 100% 100%;border-radius: 25px;z-index: -1;
            -moz-background-size: stretch;
            -o-background-size: stretch;
            background-size: stretch;" >';}
        else if ($row["category"] == 6){
                echo '<div class="bucketItem" style="background-image:url(../images/bucketBGI/southAmericaTravel.png);background-repeat: no-repeat;-webkit-background-size: stretch;background-size: 100% 100%;border-radius: 25px;z-index: -1;
                -moz-background-size: stretch;
                -o-background-size: stretch;
                background-size: stretch;" >';}
        else if ($row["category"] == 11){
            echo '<div class="bucketItem" style="background-image:url(../images/bucketBGI/oceaniaTravel.png);background-repeat: no-repeat;-webkit-background-size: stretch;background-size: 100% 100%;border-radius: 25px;z-index: -1;
            -moz-background-size: stretch;
            -o-background-size: stretch;
            background-size: stretch;" >';}

        else{
            echo '<div class="bucketItem" >';
        }
        echo '<div class="bucketItem">
        <div style="font-size:21px;color:#163D22;margin-bottom: -20px;margin-left:15px;">' . $row["name"]. '</div><br>
        <div style="font-size:11px;color:#949494;margin-left: 20px;max-width:900px;display: inline-block;">' .$row["description"]. '</div>
        <div style="color:#949494;float:right;margin-top:-10px;display: inline;display: inline-block;"class="radialPercent"><div
        data-preset="fan"
        class="ldBar label-center ",
        style="width:100%;height:90px",
        data-stroke="#163D22",
        data-value="' .$percentint. '"
      >
      </div></div>
      </div><form action="deleteRow.php"><button style="margin-top:-80px;margin-left:10px;border-radius: 15px;" class="w3-button" type="submit" name= "delete" value="'. $row["name"]. '">Delete Item</button></form></div><br>';
    }
} else {
    echo "";
}
$conn->close();


?>




<!-- <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" id="pic" /> -->