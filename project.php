<?php
include "header.php";
$todo = mysqli_real_escape_string($con, $_GET["id"]);
$cat_id = ($_GET["id"]);
?>
<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area overlay-dark d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breamcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <?php
                    $rt = mysqli_query($con, "SELECT * FROM category where cat_id='$todo'");
                    $tr = mysqli_fetch_array($rt);
                    $name = "$tr[name]"; ?>

                    <h2 class="text-white text-uppercase mb-3">
                        <?php print $name ?>
                    </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">Project</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->


<!-- ***** Tittle Category ***** -->

<section class="project ptb_50">


    <div class="container">

        <!-- Portfolio Items -->
        <div class="row items project-items">

            <?php
            $q = "SELECT * FROM  project WHERE cat_id = '$cat_id'";


            $r123 = mysqli_query($con, $q);

            while ($ro = mysqli_fetch_array($r123)) {

                $id = "$ro[id]";
                $proj_title = "$ro[proj_title]";
                $proj_desc = "$ro[proj_desc]";
                $ufile = "$ro[ufile]";


                print "
<div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
<!-- Single Case Studies -->
<div class='single-case-studies'>
    <!-- Case Studies Thumb -->
    <a href='projectdetail.php?id=$id'>
        <img src='dashboard/uploads/project/$ufile' alt=''>
    </a>
    <!-- Case Studies Overlay -->
    <a href='projectdetail.php?id=$id' class='case-studies-overlay'>
        <!-- Overlay Text -->
        <span class='overlay-text text-center p-3'>
            <h3 class='text-white mb-3'>$proj_title</h3>
            <p class='text-white'>$proj_desc.</p>
        </span>
    </a>
</div>
</div>
";
            }
            ?>
        </div>
    </div>

    <!-- ***** Portfolio Area End ***** -->



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
                        <a href="contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Call To Action Area End ======-->
    <?php include "footer.php"; ?>