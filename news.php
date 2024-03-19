<?php include "header.php"; ?>
<?php
$qc = mysqli_query($con, "SELECT * FROM categories_news");
?>

<?php
$qn = mysqli_query($con, "SELECT * FROM news");
?>


<!-- ** Breadcrumb Area Start ** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h2 class="text-white text-uppercase mb-3">News</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">News</a></li>
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

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        border-radius: 0;
    }

    .news-info {
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
    }
</style>

<!-- ** News Area Start ** -->
<!-- Konten Berita -->
<?php
$rt = mysqli_query($con, "SELECT * FROM news");
$tr = mysqli_fetch_array($rt);

$title = "$tr[title]";
$content = "$tr[content]";
$author = "$tr[author]";
$created_at = $tr['created_at'];
$ufile = "$tr[ufile]";
?>

<?php
            $q = "SELECT * FROM  news WHERE id = '$id'";


            $r123 = mysqli_query($con, $q);

            while ($ro = mysqli_fetch_array($r123)) {

                $id = "$ro[id]";
                $title = "$tr[title]";
$content = "$tr[content]";
$author = "$tr[author]";
$created_at = $tr['created_at'];
$ufile = "$tr[ufile]";  }
                ?>

<!-- ** About Area Start ** -->
<section class="section news-area ptb_100">
    <div class="container">
        <div class="row">
            <!-- Loop untuk menampilkan setiap berita -->
            <div class="col-md-6 col-lg-8">
                <?php foreach ($qn as $news): ?>
                    <div class="single-news-item">
                        <div class="news-thumb">
                            <a href="#">
                                <img src="dashboard/uploads/news/<?php echo $news['ufile']; ?>" alt="News Image">
                            </a>
                        </div>
                        <div class="news-content">
                            <h3>
                                <?php echo $news['title']; ?>
                            </h3>
                            <div class="news-info">
                                <span class="news-date">
                                    <?php echo $news['created_at']; ?>
                                </span> |
                                <span class="news-author">
                                    <?php echo $news['author']; ?>
                                </span>
                            </div>
                            <p>
                                <?php
                                // Memotong konten menjadi 2 baris dan menambahkan titik-titik jika perlu
                                $content = $news['content'];
                                if (strlen($content) > 100) {
                                    $content = substr($content, 0, 200);
                                    $content = substr($content, 0, strrpos($content, ' ')) . '...';
                                }
                                echo $content;
                                ?>
                            </p>
                            <a href="newsdetail.php?id=<?php echo $news['id']; ?>" class="btn btn-primary">Read More</a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- Categories div -->
            <div class="col-md-6 col-lg-4">
                <div class="single-news-item">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <ul class="list-group">
                                <?php foreach ($qc as $ro): ?>
                                    <li>
                                        <a class="list-group-item" href="newscategory.php?id=<?= $ro['news_id'] ?>">
                                            <?= $ro['news_name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End row -->
    </div>
</section>








<!-- Add more news items as needed -->

<!-- ** You Might Also Like Section Start ** -->
<section class="section news-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>You Might Also Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="single-news-item">
                    <div class="news-thumb">
                        <a href="#">
                            <img src="dashboard\uploads\blog\40801427about.jpg" alt="News Image">
                        </a>
                    </div>
                    <div class="news-content">
                        <h3>News Title 3</h3>
                        <div class="news-info">
                            <span class="news-date">March 12, 2024</span> | <span class="news-author">Adam
                                Johnson</span>
                        </div>
                        <p>This is a short description of news 3. It could be a brief summary of the
                            news.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-news-item">
                    <div class="news-thumb">
                        <a href="#">
                            <img src="dashboard\uploads\blog\40801427about.jpg" alt="News Image">
                        </a>
                    </div>
                    <div class="news-content">
                        <h3>News Title 4</h3>
                        <div class="news-info">
                            <span class="news-date">March 11, 2024</span> | <span class="news-author">Emily
                                Brown</span>
                        </div>
                        <p>This is a short description of news 4. It could be a brief summary of the
                            news.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-news-item">
                    <div class="news-thumb">
                        <a href="#">
                            <img src="dashboard\uploads\blog\40801427about.jpg" alt="News Image">
                        </a>
                    </div>
                    <div class="news-content">
                        <h3>News Title 5</h3>
                        <div class="news-info">
                            <span class="news-date">March 10, 2024</span> | <span class="news-author">Michael
                                Davis</span>
                        </div>
                        <p>This is a short description of news 5. It could be a brief summary of the
                            news.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ** You Might Also Like Section End ** -->
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
                        <?php print $enquiry_title; ?>
                    </h2>
                    <p class="text-white d-none d-sm-block mt-4">
                        <?php print $enquiry_text; ?>
                    </p>
                    <a href="contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Call To Action Area End ======-->
<?php include "footer.php"; ?>