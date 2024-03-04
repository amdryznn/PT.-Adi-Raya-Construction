<?php include "header.php"; ?>
<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h2 class="text-white text-uppercase mb-3">Corporate Structure</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Home</a></li>

                        <li class="breadcrumb-item text-white active">Corporate Structure</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<section id="portfolio" class="portfolio-area overflow-hidden ptb_100">
    <div class="container">

        <!-- Portfolio Items -->
        <div class="row items portfolio-items">

            <?php
            $q = "SELECT * FROM  portfolio ORDER BY id DESC";


            $r123 = mysqli_query($con, $q);

            while ($ro = mysqli_fetch_array($r123)) {

                $id = "$ro[id]";
                $port_title = "$ro[port_title]";
                $port_desc = "$ro[port_desc]";
                $ufile = "$ro[ufile]";

                print "
<div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
<!-- Single Case Studies -->
<div class='single-case-studies'>
    <!-- Case Studies Thumb -->
    <a href='structuredetail.php?id=$id'>
        <img src='dashboard/uploads/portfolio/$ufile' alt=''>
    </a>
    <!-- Case Studies Overlay -->
    <a href='structuredetail.php?id=$id' class='case-studies-overlay'>
        <!-- Overlay Text -->
        <span class='overlay-text text-center p-3'>
            <h3 class='text-white mb-3'>$port_title</h3>
            <p class='text-white'>$port_desc</p>
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


<!-- ***** Our Goal Area End ***** -->

<!-- ***** Team Area Start ***** -->

<!-- ***** Team Area End ***** -->

<!--====== Contact Area Start ======-->



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