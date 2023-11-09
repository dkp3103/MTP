<?php
// Replace with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "events"; 

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from the seminar table
// $sql = "SELECT event_id, name,date, starttime, endtime FROM seminar";
$sql = "SELECT title, start,end FROM seminar";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $seminars = array();
    while ($row = $result->fetch_assoc()) {
        $seminars[] = $row;
    }
    // Convert the result to JSON and send it to the client
    echo json_encode($seminars);
} else {
    echo "No seminars found";
}

// Close the database connection
$conn->close();
?>
