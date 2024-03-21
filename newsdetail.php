<?php include "header.php"; ?>

<?php
$qc = mysqli_query($con, "SELECT * FROM categories_news");
$todo = mysqli_real_escape_string($con, $_GET["id"]);

// Ambil berita dari database
$rt = mysqli_query($con, "SELECT * FROM news WHERE id = $todo");
$tr = mysqli_fetch_array($rt);

// Sanitasi judul dan penulis
$title = htmlspecialchars($tr['title']);
$author = htmlspecialchars($tr['author']);

// Konversi konten dari Summernote
$content = html_entity_decode($tr['content']);
$ufile = $tr['ufile'];

$qw = mysqli_query($con, "SELECT * FROM news LIMIT 3");
?>


<!-- ***** Breadcrumb Area End ***** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h2 class="text-white text-uppercase mb-3">News Detail</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">News Detail</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->


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

<!-- ***** News Area Start ***** -->
<!-- Konten Berita -->


<!-- ***** News Area Start ***** -->
<section class="section news-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <!-- Tampilkan berita -->
                <div class="single-news-item">
                    <div class="news-thumb">
                        <img src="dashboard/uploads/news/<?php echo $ufile; ?>" alt="News Image">
                    </div>
                    <div class="news-content">
                        <h2>
                            <?php echo $title; ?>
                        </h2>
                        <div class="news-info">
                            <span class="news-date">
                                <?php echo $tr['created_at']; ?>
                            </span> |
                            <span class="news-author">
                                <?php echo $author; ?>
                            </span>
                        </div>
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="box" style="margin-bottom: 20px;">
                    <input type="checkbox" id="check">
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
            <?php
            // Mengambil berita yang tidak termasuk berita yang sedang dibuka
            $exclude_id = $todo; // ID berita yang sedang dibuka
            $query = "SELECT * FROM news WHERE id != $exclude_id LIMIT 3";
            $qw_might_also_like = mysqli_query($con, $query);
            ?>
            <?php foreach ($qw_might_also_like as $news): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top mb-10" src="dashboard/uploads/news/<?php echo $news['ufile']; ?>"
                            alt="News Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $news['title']; ?>
                            </h5>
                            <div class="news-info">
                                <span class="news-date">
                                    <?php echo $news['created_at']; ?>
                                </span> |
                                <span class="news-author">
                                    <?php echo $news['author']; ?>
                                </span>
                            </div>
                            <p class="card-text">
                                <?php
                                // Memotong konten menjadi 2 baris dan menambahkan titik-titik jika perlu
                                $content = strip_tags($news['content']); // Menghapus tag HTML dari konten
                                if (strlen($content) > 100) {
                                    $content = substr($content, 0, 70);
                                    $content = substr($content, 0, strrpos($content, ' ')) . '...';
                                }
                                echo $content;
                                ?>
                            </p>
                            <a href="newsdetail.php?id=<?php echo $news['id']; ?>" class="btn btn-bordered-black mt-4">Read
                                More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


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