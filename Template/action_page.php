<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', '');

if ($con) {
    echo "Connection Successful";
} else {
    echo "Connection Failed: " . mysqli_connect_error();
    exit;
}

// Select the database
mysqli_select_db($con, 'templates');

// Get form data and escape special characters to prevent SQL injection
$name = mysqli_real_escape_string($con, $_POST['Name']);
$email = mysqli_real_escape_string($con, $_POST['Email']);
$message = mysqli_real_escape_string($con, $_POST['Message']);

// Insert data into the database
$query = "INSERT INTO users (NAME, EMAIL, NUMBER) VALUES ('$name', '$email', '$message')";

if (mysqli_query($con, $query)) {
    echo "Record added successfully";
    header('location:templete.php'); // Redirect to index.php
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
