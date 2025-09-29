<?php
$servername = "My Lamp Server";
$username = "admin";
$password = "joat";
$dbname = "myLampServerDb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $conn->real_escape_string($_POST['name']);
  $message = $conn->real_escape_string($_POST['message']);

  $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
  
  if ($conn->query($sql) === TRUE) {
    echo "Message saved successfully";
  } else {
    echo "Error: " . $conn->error;
  }
}

$sql = "SELECT id, name, message FROM messages";
$result = $conn->query($sql);

echo "<h2>Messages</h2>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<p><b>" . htmlspecialchars($row["name"]) . "</b>: " . htmlspecialchars($row["message"]) . "</p>";
  }
} else {
  echo "No messages found";
}

$conn->close();
?>
