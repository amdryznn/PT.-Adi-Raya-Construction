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
                    <h2 class="text-white text-uppercase mb-3">Project Details</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="/arcon/home">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="/arcon/project/">Project</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-uppercase text-white" href="#">Project Detail</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->


<?php
$todo = mysqli_real_escape_string($con, $todo); // Sanitize input to prevent SQL injection

// Fetch project details and join with category table
$rt = mysqli_query($con, "SELECT project.id, project.proj_title, proj_detail, project.code, project.client, project.date, project.location, 
project.ufile, category.name, status.st_name FROM project 
JOIN category ON project.cat_id = category.cat_id 
JOIN status ON project.st_id = status.st_id
                          WHERE project.id='$todo'");
$tr = mysqli_fetch_array($rt);
$proj_title = htmlspecialchars($tr['proj_title']);
$proj_detail = htmlspecialchars($tr['proj_detail']);
$ufile = htmlspecialchars($tr['ufile']);
?>

<!-- ***** About Area Start ***** -->
<section class="section portfolio-area ptb_100">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-6">
                <!-- About Thumb -->
                <div class="portfolio-thumb text-center">
                    <img src="/arcon/dashboard/uploads/project/<?php echo $ufile; ?>" alt="img">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- About Content -->
                <div class="portfolio-content section-heading text-center text-lg-left pl-md-4 mt-5 mt-lg-0 mb-0">
                    <h2 class="mb-3">
                        <?php echo $proj_title; ?>
                    </h2>

                    <p style="text-align: justify;">
                        <?php echo $proj_detail; ?>
                    </p>

                    <section class="section portfolio-area ptb_50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="example"
                                        class="table table-bordered dt-responsive nowrap table align-middle">
                                        <tbody>
                                            <tr>
                                                <td><strong>ID Project</strong>
                                                <td colspan="2">
                                                    <?php echo $tr['code']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date</strong>
                                                <td colspan="2">
                                                    <?php echo $tr['date']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Client</strong>
                                                <td colspan="2">
                                                    <?php echo $tr['client']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location</strong>
                                                <td colspan="2">
                                                    <?php echo $tr['location']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Category</strong>
                                                <td colspan="2">
                                                    <?php echo $tr['name']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong>
                                                <td colspan="2">
                                                    <?php echo $tr['st_name']; ?>
                                                </td>
                                            </tr>
                                            <!-- Add more columns as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
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