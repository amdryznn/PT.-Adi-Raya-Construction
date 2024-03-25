<?php include "header.php"; ?>
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content text-center">
                    <h2 class="text-white text-uppercase mb-3">Legality</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="home">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">Legality</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Portfolio Area Start ***** -->
<section id="legality" class="legality-area overflow-hidden ptb_100">
    <div class="container">

        <!-- Portfolio Items -->
        <div class="row items legality-items">

            <?php
            $q = "SELECT * FROM  legality ORDER BY id DESC";


            $r123 = mysqli_query($con, $q);

            while ($ro = mysqli_fetch_array($r123)) {

                $id = "$ro[id]";
                $legality_title = "$ro[legality_title]";
                $legality_desc = "$ro[legality_desc]";
                $ufile = "$ro[ufile]";

                print "
<div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
<!-- Single Case Studies -->
<div class='single-case-studies'>
    <!-- Case Studies Thumb -->
    <a href='/arcon/legalitydetail/$id'>
        <img src='/arcon/dashboard/uploads/legality/$ufile' alt=''>
    </a>
    <!-- Case Studies Overlay -->
    <a href='/arcon/legalitydetail/$id' class='case-studies-overlay'>
        <!-- Overlay Text -->
        <span class='overlay-text text-center p-3'>
            <h3 class='text-white mb-3'>$legality_title</h3>
            <p class='text-white'>$legality_desc.</p>
        </span>
    </a>
</div>
</div>
";
            }
            ?>

        </div>

    </div>
</section>
<!-- ***** Portfolio Area End ***** -->

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