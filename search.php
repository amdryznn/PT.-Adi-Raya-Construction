<?php
// Include header
include "header.php";

// Include database configuration
include_once "z_db.php";

// Function to clean and filter input data, excluding embed text from Summernote content
function clean_input($data) {
    // Remove Summernote embed text
    $data = preg_replace('/<img[^>]+>/', '', $data); // Remove img tags
    $data = preg_replace('/<iframe[^>]+>/', '', $data); // Remove iframe tags
    // Clean input data
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function perform_search($search_query, $con) {
    // Prepared statement to search news based on title, content, or author
    $query = "SELECT * FROM news WHERE title LIKE ? OR content LIKE ? OR author LIKE ?";
    $stmt = mysqli_prepare($con, $query);
    $search_query_with_wildcards = "%$search_query%";
    mysqli_stmt_bind_param($stmt, "sss", $search_query_with_wildcards, $search_query_with_wildcards, $search_query_with_wildcards);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Initialize filtered results array
    $filtered_results = array();

    // Filter search results
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the search query matches title, content, or author
        $title_matches = stripos($row['title'], $_GET['query']) !== false;
        $content_matches = stripos($row['content'], $_GET['query']) !== false;
        $author_matches = stripos($row['author'], $_GET['query']) !== false;

        // Add the row to filtered results if any of the fields match the search query
        if ($title_matches || $content_matches || $author_matches) {
            $filtered_results[] = $row;
        }
    }

    return $filtered_results;
}

// Check if query parameter 'query' is set and not empty
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = '%' . clean_input($_GET['query']) . '%';
} else {
    // If the query parameter is not set or empty, capture the value from the modified URL
    $parts = explode('/', $_SERVER['REQUEST_URI']);
    $search_query = '%' . clean_input(end($parts)) . '%';
}

// Initialize filtered results array
$filtered_results = array();

// Perform search
if (!empty($search_query)) { 
    $filtered_results = perform_search($search_query, $con);
}

// Update the number of filtered results
$num_results = count($filtered_results);

// Prepared statement to get categories
$stmt_category = mysqli_prepare($con, "SELECT * FROM categories_news");
mysqli_stmt_execute($stmt_category);
$result_category = mysqli_stmt_get_result($stmt_category);
?>



<!-- Breadcrumb Area Start -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <!-- Breadcrumb Content -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h2 class="text-white text-uppercase mb-3">Search Results</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">News</a></li>
                        <li class="breadcrumb-item active text-white">Search</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<style>
    .single-news-item {
        margin-bottom: 30px;
    }

    .single-news-item .news-thumb {
        margin-bottom: 10px;
    }

    .single-news-item .news-content {
        margin-bottom: 10px;
    }

    .single-news-item .news-content p {
        margin-bottom: 10px;
    }

    .single-news-item .btn {
        margin-top: 10px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }


    .card-title {
        color: #333;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .list-group-item {
        border: none;
        border-bottom: 1px solid #ddd;
        padding: 10px 15px;
        transition: background-color 0.3s ease;
    }

    .list-group-item:hover {
        background-color: #f4f4f4;
    }

    .search-bar-container {
        margin-bottom: 20px;
        width: 100%;
        display: flex;
        justify-content: flex-end;
        /* Posisikan ke ujung kanan */
        align-items: center;
    }

    .search-bar {
        width: auto;
        /* Sesuaikan lebar sesuai kebutuhan */
        max-width: 250px;
        /* Batasi lebar maksimum */
    }

    .search-bar .form-control {
        border-radius: 5px;
    }

    .news-info {
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
    }



    .box {
        max-width: 400px;
        width: 100%;
    }

    .box .search-box {
        position: relative;
        height: 50px;
        max-width: 400px;
        /* Atur maksimum lebar yang Anda inginkan */
        margin: auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        /* Hapus transisi */
    }

    .search-box input {
        position: absolute;
        height: 100%;
        width: 100%;
        border-radius: 5px;
        background: #fff;
        outline: none;
        border: none;
        padding-left: 20px;
        font-size: 14px;
        font-family: 'poppins', sans-serif;
        color: #222;
    }

    .search-box .icon {
        position: absolute;
        right: -2px;
        top: 0;
        width: 60px;
        background: linear-gradient(-45deg, #a8bfce 0%, #3D474D 100%);
        height: 100%;
        text-align: center;
        line-height: 50px;
        color: #fff;
        font-size: 20px;
        border: none;
        border-radius: 5px;
    }

    .search-box .icon:hover {
        background: linear-gradient(-45deg, #a8bfce 0%, #3D474D 100%);
        /* Warna latar belakang saat hover */
        color: #FFF;
        /* Warna teks saat hover */
        border-radius: 5px;
        /* Ubah ke bentuk bulat saat hover */
    }

    .search-box .icon:focus {
        outline: none;
    }

    #check:checked~.search-box .icon {
        background: linear-gradient(-45deg, #a8bfce 0%, #3D474D 100%);
    }

    #check {
        display: none;
    }

    /* Styling untuk button */
    .search-box .icon button {
        background: linear-gradient(-45deg, #a8bfce 0%, #3D474D 100%);
        height: 100%;
        width: 60px;
        text-align: center;
        line-height: 50px;
        color: #fff;
        font-size: 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .search-box .icon button:hover {
        background: linear-gradient(-45deg, #a8bfce 0%, #3D474D 100%);
        /* Warna latar belakang saat hover */
        color: #FFF;
        /* Warna teks saat hover */
        border-radius: 5px;
        /* Ubah ke bentuk bulat saat hover */
    }
</style>



<!-- News Area Start -->
<section class="section news-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <!-- Displaying search results info -->
                <div class="col-12">
                    <div class="search-results-info text-center mb-4">
                        <?php if (!empty($_GET['query']) || !empty($_GET['s'])): ?>
                            <p>Search results for <strong><?php echo htmlspecialchars($_GET['query'] ?? $_GET['s'] ?? ''); ?></strong></p>
                            <p><?php echo $num_results; ?> results found</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($num_results > 0): ?>
                    <?php foreach ($filtered_results as $row): ?>
                        <div class="single-news-item card mb-4">
                            <div class="card-body">
                                <div class="news-thumb">
                                    <a href="newsdetail/<?php echo htmlspecialchars($row['id']); ?>">
                                        <img src="dashboard/uploads/news/<?php echo htmlspecialchars($row['ufile']); ?>" alt="News Image">
                                    </a>
                                </div>
                                <div class="news-content">
                                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                                    <div class="news-info">
                                    <span class="news-date"><?php echo date("d F, Y", strtotime($row['created_at'])); ?></span> |
                                        <span class="news-author"><?php echo htmlspecialchars($row['author']); ?></span>
                                    </div>
                                    <p><?php echo htmlspecialchars(substr(strip_tags($row['content']), 0, 200)); ?>...</p>
                                    <a href="newsdetail/<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-bordered-black mt-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h2 style='margin-bottom: 20px;' class='text-center'>No results found</h2>
                <?php endif; ?>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="search-box">
                        <form action="/arcon/?" method="GET">
                            <input type="text" name="s" placeholder="Type here">
                            <button type="submit" class="icon"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="single-news-item" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <ul class="list-group">
                                <?php while ($row_category = mysqli_fetch_assoc($result_category)): ?>
                                    <li>
                                        <a class="list-group-item" href="newscategory/<?php echo htmlspecialchars($row_category['news_id']); ?>">
                                            <?php echo htmlspecialchars($row_category['news_name']); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Area End -->

<!-- Call To Action Area Start -->
<section class="section cta-area bg-overlay ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="section-heading text-center m-0">
                    <h2 class="text-white"><?php echo htmlspecialchars($enquiry_title); ?></h2>
                    <p class="text-white d-none d-sm-block mt-4"><?php echo htmlspecialchars($enquiry_text); ?></p>
                    <a href="contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action Area End -->

<?php include "footer.php"; ?>

<?php
// Close the database connection
mysqli_close($con);
?>