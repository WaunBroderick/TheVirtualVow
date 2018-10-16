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
$sql = "SELECT user_data.user_id, user_data.full_name as fullName, user_data.wed_id, wedding_contribution.amount as contribution, user_data.RSVP as rsvp FROM user_data LEFT JOIN wedding_contribution on user_data.user_id = wedding_contribution.user_id WHERE wed_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo "<table>
<thead>
    <tr>
      <th>Name</th>
      <th>Color</th>
      <th>Description</th>
    </tr>
  </thead>";
    while($row = $result->fetch_assoc()) {
            $fullName = $row["user_data.user_id"] ;
            if ($row["rsvp"] == 0){
                $rsvp = "RSPV'd";
            }else{
                $rsvp = " ";
            }
        echo '<div><tr><th>
        '. $row["fullName"] .'</th><th>
        '. $row["contribution"] .'</th><th>
        '. $rsvp .'</th><th>
        '. $row[""] .'</th>
        </div><tr>';
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

echo $row["user_data.user_id"] ;

?>