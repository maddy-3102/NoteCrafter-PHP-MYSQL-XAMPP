<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pesbuk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID 
$user_id =  $_POST['userid']; 

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO user_notes (user_id, title, description) VALUES ($user_id, '$title', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Note saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
