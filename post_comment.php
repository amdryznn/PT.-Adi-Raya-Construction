<?php
// Include database connection
include "z_db.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve comment data from form
    $comment_name = $_POST["comment_name"];
    $comment_description = $_POST["comment_description"];

    // Sanitize inputs
    $comment_name = mysqli_real_escape_string($con, $comment_name);
    $comment_description = mysqli_real_escape_string($con, $comment_description);

    // Insert comment into database
    $insert_query = "INSERT INTO comments (name, description) VALUES ('$comment_name', '$comment_description')";
    mysqli_query($con, $insert_query);

    // Redirect to the news detail page or refresh the current page as per your requirement
    $todo = $_GET["id"];
    header("Location: /arcon/newsdetail/$todo");
    exit();

}
?>