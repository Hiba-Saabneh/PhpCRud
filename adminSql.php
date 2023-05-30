<?php
 include 'config.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare the query with placeholders for the data we want to insert
$sql = "INSERT INTO admin (email, password) VALUES (?, ?)";

// Define the data we want to insert
$email = "admin@example.com";
$password = "admin";

// Encrypt the password using MD5 hash function
$encrypted_password = md5($password);

// Create a prepared statement and bind the data to the placeholders
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $encrypted_password);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
  echo "Data inserted successfully!";
} else {
  echo "Error inserting data: " . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>