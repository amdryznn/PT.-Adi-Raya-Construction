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
                    <h2 class="text-white text-uppercase mb-3">Values Details</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="/arcon/home">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="/arcon/values">Values</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">Values Detail</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->


<?php
$rt = mysqli_query($con, "SELECT * FROM service where id='$todo'");
$tr = mysqli_fetch_array($rt);
$service_title = "$tr[service_title]";
$service_detail = "$tr[service_detail]";
$upadated_at = "$tr[upadated_at]";
$ufile = "$tr[ufile]";
?>


<!-- ***** About Area Start ***** -->
<section class="section about-area ptb_100">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-6">
                <!-- About Thumb -->
                <div class="about-thumb text-center">
                    <img src="/arcon/dashboard/uploads/services/<?php print $ufile; ?>" alt="img">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- About Content -->
                <div class="about-content section-heading text-center text-lg-left pl-md-4 mt-5 mt-lg-0 mb-0">
                    <h2 class="mb-3">
                        <?php print $service_title ?>
                    </h2>
                    <p style="text-align: justify;">
                        <?php print $service_detail; ?>
                    </p>
                    <!-- Counter Area -->

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