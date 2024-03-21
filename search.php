<?php
// Include header
include "header.php";

// Include database configuration
include_once "z_db.php";

// Check if query parameter 'query' is set
if (isset ($_GET['query'])) {
    $search_query = '%' . $_GET['query'] . '%';

    // Prepared statement to search news based on content
    $query = "SELECT * FROM news WHERE content LIKE ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $search_query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$qc = mysqli_query($con, "SELECT * FROM categories_news");
?>


<!-- ** Breadcrumb Area Start ** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb Content -->
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
<!-- ** Breadcrumb Area End ** -->

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

<!-- ** News Area Start ** -->
<section class="section news-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8">

                <?php
                if (isset ($result) && mysqli_num_rows($result) > 0) {
                    // Display search results
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Display search results in the desired format
                        ?>
                        <div class="single-news-item card mb-4">
                            <div class="card-body">
                                <div class="news-thumb">
                                    <a href="newsdetail.php?id=<?php echo $row['id']; ?>">
                                        <img src="dashboard/uploads/news/<?php echo $row['ufile']; ?>" alt="News Image">
                                    </a>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <?php echo $row['title']; ?>
                                    </h3>
                                    <div class="news-info">
                                        <span class="news-date">
                                            <?php echo $row['created_at']; ?>
                                        </span> |
                                        <span class="news-author">
                                            <?php echo $row['author']; ?>
                                        </span>
                                    </div>
                                    <p>
                                        <?php
                                        // Memotong konten menjadi 2 baris dan menambahkan titik-titik jika perlu
                                        $content = strip_tags($row['content']); // Menghapus tag HTML dari konten
                                        if (strlen($content) > 100) {
                                            $content = substr($content, 0, 200);
                                            $content = substr($content, 0, strrpos($content, ' ')) . '...';
                                        }
                                        echo $content;
                                        ?>
                                    </p>
                                    <a href="newsdetail.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-bordered-black mt-4">Read More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<h2>No results found</h2>";
                }
                ?>

            </div>

            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="search-box">
                        <form action="s" method="GET">
                            <input type="text" name="query" placeholder="Type here...">
                            <button type="submit" class="icon"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="single-news-item" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <ul class="list-group">
                                <?php foreach ($qc as $ro): ?>
                                    <li>
                                        <a class="list-group-item" href="c?id=<?= $ro['news_id'] ?>">
                                            <?= $ro['news_name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ** News Area End ** -->

<!--====== Call To Action Area Start ======-->
<section class="section cta-area bg-overlay ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <!-- Section Heading -->
                <div class="section-heading text-center m-0">
                    <h2 class="text-white">
                        <?php echo $enquiry_title; ?>
                    </h2>
                    <p class="text-white d-none d-sm-block mt-4">
                        <?php echo $enquiry_text; ?>
                    </p>
                    <a href="contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Call To Action Area End ======-->

<?php include "footer.php"; ?>

<?php
// Close the database connection
mysqli_close($con);
?>