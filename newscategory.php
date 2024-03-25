<?php
// Sertakan file koneksi ke database dan header
include "header.php";

// Ambil ID kategori dari URL
$kategori_id = isset ($_GET["id"]) ? $_GET["id"] : "";

// Validasi apakah $kategori_id hanya berisi bilangan bulat positif
if (!ctype_digit($kategori_id) || $kategori_id <= 0) {
    // Handle error or redirect user
}

// Selanjutnya, pastikan untuk menghindari serangan XSS saat menampilkan nilai tersebut
$kategori_id = htmlspecialchars($kategori_id);

// Kueri untuk mengambil berita berdasarkan kategori yang dipilih, diurutkan berdasarkan tanggal pembuatan secara descending
$stmt = $con->prepare("SELECT * FROM news WHERE news_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $kategori_id);
$stmt->execute();
$result = $stmt->get_result();


// Kueri untuk mengambil daftar kategori
$qc = mysqli_query($con, "SELECT * FROM categories_news");
?>


<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <?php
                    $rt = mysqli_query($con, "SELECT * FROM categories_news where news_id='$kategori_id'");
                    $tr = mysqli_fetch_array($rt);
                    $news_name = "$tr[news_name]"; ?>
                    <h2 class="text-white text-uppercase mb-3">
                        <?php echo htmlspecialchars($news_name); ?>
                    </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="/arcon/home">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">News</a></li>
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
                                <a href="/arcon/newsdetail/<?php echo htmlspecialchars($news['id']); ?>">
                                    <img src="/arcon/dashboard/uploads/news/<?php echo htmlspecialchars($news['ufile']); ?>"
                                        alt="News Image">
                                </a>
                            </div>
                            <div class="news-content">
                                <h3>
                                    <?php echo htmlspecialchars($news['title']); ?>
                                </h3>
                                <div class="news-info">
                                    <span class="news-date">
                                    <span class="news-date">
    <?php echo date("d F, Y", strtotime($news['created_at'])); ?>
                </span>

                                    </span> |
                                    <span class="news-author">
                                        <?php echo htmlspecialchars($news['author']); ?>
                                    </span>
                                </div>
                                <p>
                                    <?php
                                    // Memotong konten menjadi 2 baris dan menambahkan titik-titik jika perlu
                                    $content = strip_tags($news['content']); // Menghapus tag HTML dari konten
                                    if (strlen($content) > 100) {
                                        $content = substr($content, 0, 200);
                                        $content = substr($content, 0, strrpos($content, ' ')) . '...';
                                    }
                                    echo htmlspecialchars($content);
                                    ?>
                                </p>
                                <a href="/arcon/newsdetail/<?php echo($news['id']); ?>"
   class="btn btn-bordered-black mt-4">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-6 col-lg-4">
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
                                        <a class="list-group-item" href="<?= htmlspecialchars($ro['news_id']) ?>">
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
<!-- Add more news items as needed -->

<!--====== Call To Action Area Start ======-->
<section class="section cta-area bg-overlay ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <!-- Section Heading -->
                <div class="section-heading text-center m-0">
                    <h2 class="text-white">
                        <?php echo htmlspecialchars($enquiry_title); ?>
                    </h2>
                    <p class="text-white d-none d-sm-block mt-4">
                        <?php echo htmlspecialchars($enquiry_text); ?>
                    </p>
                    <a href="/arcon/contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Call To Action Area End ======-->

<?php include "footer.php"; ?>