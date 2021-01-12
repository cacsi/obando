
<?php
$servername = "localhost";
$username = "root";
$password = "Clique.It!";
$dbname = "obando_wordpress";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sqlannounce = "SELECT *  FROM wp_announcement";


$resultannounce =$conn->query($sqlannounce);







$announcement = [];
if ($resultannounce->num_rows > 0) {
  // output data of each row
  while($rowa = $resultannounce->fetch_assoc()) {
    array_push($announcement, $rowa);


  }
} else {
  echo "0 results";
}



echo json_encode($announcement);
$conn->close();
?>
