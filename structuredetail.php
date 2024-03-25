<?php
include "header.php";
$todo = mysqli_real_escape_string($con, $_GET["id"]);
?>
<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h2 class="text-white text-uppercase mb-3">Structure Details</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="/arcon/home">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white"
                                href="/arcon/structure">Structure</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">Structure Detail</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->


<?php
$rt = mysqli_query($con, "SELECT * FROM portfolio where id='$todo'");
$tr = mysqli_fetch_array($rt);
$port_title = "$tr[port_title]";
$port_detail = "$tr[port_detail]";
$tw_link = "$tr[tw_link]";
$fb_link = "$tr[fb_link]";
$li_link = "$tr[li_link]";
$ufile = "$tr[ufile]";
?>

<!-- ***** About Area Start ***** -->
<section class="section portfolio-area ptb_100">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-6">
                <!-- About Thumb -->
                <div class="portfolio-thumb text-center">
                    <img src="/arcon/dashboard/uploads/portfolio/<?php echo htmlspecialchars($ufile); ?>" alt="img">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- About Content -->
                <div class="portfolio-content section-heading text-center text-lg-left pl-md-4 mt-5 mt-lg-0 mb-0">
                    <h2 class="mb-3">
                        <?php echo htmlspecialchars($port_title); ?>
                    </h2>

                    <p style="text-align: justify;">
                        <?php echo htmlspecialchars($port_detail); ?>
                    </p>

                    <!-- Social Media Icons within Portfolio Details -->
                    <style>
                        .social-icons2 img {
                            width: 27px;
                            /* Sesuaikan ukuran lebar gambar */
                            height: 27px;
                            /* Sesuaikan ukuran tinggi gambar */
                            margin-right: 5px;
                        }

                        .social-icons2 img:hover {
                            transform: scale(1.2);
                            /* Mengubah skala gambar saat hover */
                        }
                    </style>

                    <section class="section portfolio-area ptb_50">
                        <div class="social-icons2">
                            <?php if ($tw_link): ?>
                                <a href="<?php echo htmlspecialchars($tw_link); ?>" target="_blank" class="twitter">
                                    <img src="/arcon/dashboard/uploads/icon/twitter1.png" alt="Twitter">
                                </a>
                            <?php endif; ?>
                            <?php if ($fb_link): ?>
                                <a href="<?php echo htmlspecialchars($fb_link); ?>" target="_blank" class="facebook">
                                    <img src="/arcon/dashboard/uploads/icon/facebook1.png" alt="Facebook">
                                </a>
                            <?php endif; ?>
                            <?php if ($li_link): ?>
                                <a href="<?php echo htmlspecialchars($li_link); ?>" target="_blank" class="linkedin">
                                    <img src="/arcon/dashboard/uploads/icon/linkedin1.png" alt="LinkedIn">
                                </a>
                            <?php endif; ?>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** About Area End ***** -->





<!-- ***** Our Goal Area End ***** -->

<!-- ***** Team Area Start ***** -->

<!-- ***** Team Area End ***** -->

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
                    <a href="/arcon/contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Call To Action Area End ======-->
<?php include "footer.php"; ?>