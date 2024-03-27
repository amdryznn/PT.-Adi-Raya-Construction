<?php
// Include database connection
include "z_db.php";

// Reset new_comments_count to 0 in the database
$query = "UPDATE comments SET new_comments_count = 0";
if(mysqli_query($con, $query)) {
    echo "New comments count reset successfully.";
} else {
    echo "Error resetting new comments count: " . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
