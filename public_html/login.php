<?php
//Credentials for the Database being used in this specific login.php function
$servername = "localhost";
$username = "root";
$password = "tdteam2018";
$dbname = "TDVow";

//Recieving variables from the login page through the POST methods
$pass = $_POST["pass"];
$user = $_POST["user"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//SQL call to the database to match usernamd and password exactly
$sql = "SELECT * FROM user_login WHERE id = '".$user."' AND pass = '".$pass."'";
$result = mysqli_query($conn, $sql);


//Extract rows from the sql call to use for further operations
if (mysqli_num_rows($result) > 0) {
    // output data of each row
        $row = mysqli_fetch_row($result);
        //assign database values to variables
        $id = $row[0]; 
        $pwd = $row[1];
        $flag = $row[2]; 
        //two conditional branches used to differentiate user types for our demo; can be expanded on to be more complex
        if($flag == 0){
            //client page
            header('Location: client.htm'); 
        }
        else {
            //host page
            header('Location: host.htm'); 
        }
exit;
} 
else {
    //Calls a javascript alert box if the login cannot find anyone with the specific name and password
    echo '<script type="text/javascript">
    alert("Wrong Username or Password");
    location="index.html";
    </script>';
    mysqli_close($conn);
exit;
}

include('home_buckets.php');
?>