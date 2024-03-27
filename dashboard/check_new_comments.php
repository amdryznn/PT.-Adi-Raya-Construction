<?php
// Include database connection
include "z_db.php";

// Start session
session_start();

// Get last check time from session or initialize if not set
$last_check_time = $_SESSION['last_check_time'] ?? '1970-01-01 00:00:00';

// Query to count new comments since the last check time
$query = "SELECT COUNT(*) AS new_comments_count FROM comments WHERE created_at > ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $last_check_time);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the result
$row = $result->fetch_assoc();
$newCommentsCount = $row['new_comments_count'];

// Return the count of new comments
echo $newCommentsCount;

// Update last check time in session
$_SESSION['created_at'] = date("Y-m-d H:i:s");

// Close the statement
$stmt->close();

// Close the connection
$con->close();
?>