<?php
// Include database connection
include "z_db.php";

// Start session
session_start();

// Check if the avatar is clicked
if (isset($_POST['avatar_clicked'])) {
    // Update new_comments_count to 1 in the database
    $update_query = "UPDATE comments SET new_comments_count = 1 WHERE new_comments_count = 0";
    if ($con->query($update_query) === TRUE) {
        echo "New comments count updated successfully.";
    } else {
        echo "Error updating new comments count: " . $con->error;
    }
}

// Get last check time from session or initialize if not set


// Close the statement
$stmt->close();

// Close the connection
$con->close();

// Return the output
echo $output;
?>
