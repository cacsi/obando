
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

$sql = "SELECT *  FROM wp_news";


$result = $conn->query($sql);




$article = [];
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($article, $row);


  }
} else {
  echo "0 results";
}





echo json_encode($article);

$conn->close();
?>
