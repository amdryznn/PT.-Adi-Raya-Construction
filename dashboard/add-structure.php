<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Structure</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">

                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                        aria-selected="false">
                                        <i class="fas fa-home"></i> Add Structure
                                    </a>
                                </li>


                            </ul>
                        </div>



                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        if (isset($_POST['save'])) {
                            $port_title = mysqli_real_escape_string($con, $_POST['port_title']);
                            $port_desc = mysqli_real_escape_string($con, $_POST['port_desc']);
                            $port_detail = mysqli_real_escape_string($con, $_POST['port_detail']);
                            $tw_link = mysqli_real_escape_string($con, $_POST['tw_link']);
                            $fb_link = mysqli_real_escape_string($con, $_POST['fb_link']);
                            $li_link = mysqli_real_escape_string($con, $_POST['li_link']);

                            if (strlen($port_title) < 5) {
                                $msg = $msg . "Structure Title Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }
                            if (strlen($port_desc) > 150) {
                                $msg = $msg . "Structure description Must Be Less Than 150 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($port_detail) < 15) {
                                $msg = $msg . "Structure Detail Must Be More Than 15 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($tw_link) < 15) {
                                $msg = $msg . "Incorrect Twitter link.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($fb_link) < 15) {
                                $msg = $msg . "Incorrect Facebook link.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($li_link) < 15) {
                                $msg = $msg . "Incorrect LinkedIn link.<BR>";
                                $status = "NOTOK";
                            }



                            $uploads_dir = 'uploads/portfolio';

                            $tmp_name = $_FILES["ufile"]["tmp_name"];
                            // basename() may prevent filesystem traversal attacks;
                            // further validation/sanitation of the filename may be appropriate
                            $name = basename($_FILES["ufile"]["name"]);
                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $name;

                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $qb = mysqli_query($con, "INSERT INTO portfolio (port_title, port_desc, port_detail,ufile, tw_link, fb_link, li_link) VALUES ('$port_title', '$port_desc', '$port_detail', '$new_file_name', '$tw_link',  '$fb_link', '$li_link')");


                                if ($qb) {
                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                  Structure has been added successfully.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
 "; //printing error if found in validation
                        
                                }
                            } elseif ($status !== "OK") {
                                $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                     " . $msg . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>"; //printing error if found in validation
                        

                            } else {
                                $errormsg = "
      <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                 Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>"; //printing error if found in validation
                        

                            }
                        }
                        ?>



                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        print $errormsg;
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">



                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Name</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        name="port_title" placeholder="Enter  Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="facebookLinkInput" class="form-label"> Facebook
                                                        Link</label>
                                                    <input type="text" class="form-control" id="facebookLinkInput"
                                                        name="fb_link" placeholder="https://facebook.com/...">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Jabatan</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="port_desc" rows="1"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="twitterLinkInput" class="form-label"> Twitter
                                                        Link</label>
                                                    <input type="text" class="form-control" id="twitterLinkInput"
                                                        name="tw_link" placeholder="https://twitter.com/...">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">
                                                        Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="port_detail" rows="3"></textarea>
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="linkedinLinkInput" class="form-label"> Linkedin
                                                        Link</label>
                                                    <input type="text" class="form-control" id="linkedinLinkInput"
                                                        name="li_link" placeholder="https://www.linkedin.com/in/...">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Photo</label>
                                                    <input type="file" class="form-control" id="firstnameInput"
                                                        name="ufile">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Add
                                                        Structure</button>

                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->

                                <!--end tab-pane-->

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>