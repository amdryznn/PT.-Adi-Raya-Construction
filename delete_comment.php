<?php
// Include database connection
include "z_db.php";

// Handle comment deletion
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Retrieve comment ID from the URL
    $c_id = mysqli_real_escape_string($con, $_GET["id"]);
    
    // Retrieve news detail ID from the comments table
    $get_news_id_query = "SELECT id FROM comments WHERE c_id = $c_id";
    $result = mysqli_query($con, $get_news_id_query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        
        // Query to delete the comment from the database
        $delete_query = "DELETE FROM comments WHERE c_id = $c_id";
        mysqli_query($con, $delete_query);
        
        // Redirect back to the news detail page with the relevant news ID
        header("Location: /arcon/newsdetail/$id");
        exit();
    } else {
        // Redirect back to the news detail page if comment ID is not found
        header("Location: /arcon/newsdetail.php");
        exit();
    }
} else {
    // Redirect back to the news detail page if comment ID is not provided
    header("Location: /arcon/newsdetail.php");
    exit();
}
?>

