
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

$sqlevent = "SELECT *  FROM wp_events";


$resultevent = $conn->query($sqlevent);




$events= [];
if ($resultevent->num_rows > 0) {
  // output data of each row
  while($row = $resultevent->fetch_assoc()) {
    array_push($events, $row);


  }
} else {
  echo "0 results";
}





echo json_encode($events);

$conn->close();
?>
