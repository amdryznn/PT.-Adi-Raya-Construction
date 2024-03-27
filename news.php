<?php
// Include header
include "header.php";

// Include database configuration
include_once "z_db.php";

// Tentukan jumlah berita yang akan ditampilkan per halaman
$limit = 3;

// Hitung jumlah total berita
$total_news_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM news");
$total_news_row = mysqli_fetch_assoc($total_news_query);
$total_news = $total_news_row['total'];

// Hitung jumlah total halaman berdasarkan jumlah berita dan jumlah berita per halaman
$total_pages = ceil($total_news / $limit);

// Tentukan halaman yang sedang aktif
$page = isset ($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Query untuk menampilkan berita sesuai dengan halaman yang dipilih
$qn = mysqli_prepare($con, "SELECT *, DATE_FORMAT(created_at, '%e %M, %Y') AS formatted_created_at FROM news ORDER BY created_at DESC LIMIT ?, ?");
mysqli_stmt_bind_param($qn, "ii", $start, $limit);
mysqli_stmt_execute($qn);
$result = mysqli_stmt_get_result($qn);
$qc = mysqli_query($con, "SELECT * FROM categories_news");
?>


<!-- * Breadcrumb Area Start * -->
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
<!-- * Breadcrumb Area End * -->

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

    a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
    }

    .pagination-link:hover {
        background-color: #ddd;
        color: black;
    }

    .previous:hover {
        background-color: #ddd;
        color: black;
    }

    .next:hover {
        background-color: #ddd;
        color: black;
    }

    .previous {
        background-color: #f1f1f1;
        color: black;

    }

    .next {
        background-color: #697882;
        color: white;
    }

    .round {
        border-radius: 50%;
    }

    .pagination {
        display: flex;
        /* Gunakan flexbox untuk mengatur tata letak */
        justify-content: center;
        /* Memposisikan elemen secara horizontal ke tengah */
        margin-top: 20px;
        /* Sesuaikan margin atas sesuai kebutuhan */
    }

    .pagination a {
        margin: 0 5px;
        /* Menambahkan margin horizontal di antara tautan */
    }

    .pagination-link.active {

        background-color: #ddd;
        color: black;
        /* Contoh: menambahkan sudut yang melengkung */
    }
</style>

<!-- * About Area Start * -->
<section class="section news-area ptb_100">
    <div class="container">
        <div class="row">
            <!-- News Content -->
            <div class="col-md-6 col-lg-8">
                <?php foreach ($result as $news): ?>
                    <!-- Tampilkan berita berdasarkan kategori yang dipilih -->
                    <div class="single-news-item card mb-4">
                        <div class="card-body">
                            <div class="news-thumb">
                                <a href="newsdetail/<?php echo $news['id']; ?>">
                                    <img src="dashboard/uploads/news/<?php echo $news['ufile']; ?>" alt="News Image">
                                </a>
                            </div>
                            <div class="news-content">
                                <h3>
                                    <?php echo $news['title']; ?>
                                </h3>
                                <div class="news-info">
                                    <span class="news-date">
                                        <?php echo $news['formatted_created_at']; ?>
                                    </span>
                                    |
                                    <span class="news-author">
                                        <?php echo $news['author']; ?>
                                    </span>
                                </div>
                                <p>
                                    <?php
                                    // Memotong konten menjadi 2 baris dan menambahkan titik-titik jika perlu
                                    $content = htmlspecialchars(strip_tags($news['content']));
                                    // Menghapus tag HTML dari konten
                                    if (strlen($content) > 100) {
                                        $content = substr($content, 0, 200);
                                        $content = substr($content, 0, strrpos($content, ' ')) . '...';
                                    }
                                    echo $content;
                                    ?>
                                </p>
                                <a href="newsdetail/<?php echo $news['id']; ?>" class="btn btn-bordered-black mt-4">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                <!-- Pagination -->
                <div class="pagination mt-4 text-center">
                    <!-- Tautan Previous -->
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo ($page - 1); ?>" class="previous">&laquo; Prev</a>
                    <?php endif; ?>

                    <!-- Tautan Halaman -->
                    <?php
                    $show_pages = 3; // Batasan jumlah tautan halaman yang ingin ditampilkan
                    $start_page = max(1, $page - floor($show_pages / 2));
                    $end_page = min($total_pages, $start_page + $show_pages - 1);
                    for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a class="pagination-link <?php echo ($i == $page) ? 'active' : ''; ?>"
                            href="?page=<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>

                    <!-- Tautan Next -->
                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo ($page + 1); ?>" class="next">Next &raquo;</a>
                    <?php endif; ?>
                </div>


            </div>
            <div class="col-md-6 col-lg-4">
                <!-- Sidebar Content -->
                <div class="box" style="margin-bottom: 20px;">
                    <input type="checkbox" id="check">
                    <div class="search-box">
                        <form action="/arcon/?" method="GET">
                            <input type="text" name="s" placeholder="Type here...">
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
                                        <a class="list-group-item"
                                            href="newscategory/<?= htmlspecialchars($ro['news_id']) ?>">
                                            <?= htmlspecialchars($ro['news_name']) ?>
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
<!-- * About Area End * -->


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