<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php $qc = mysqli_query($con, "SELECT * FROM category");?>

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
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
                                        <i class="fas fa-home"></i> Add Project
                                    </a>
                                </li>


                            </ul>
                        </div>



                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        if (isset($_POST['save'])) {
                            $code = mysqli_real_escape_string($con, $_POST['code']);
                            $date = mysqli_real_escape_string($con, $_POST['date']);
                            $client = mysqli_real_escape_string($con, $_POST['client']);
                            $proj_title = mysqli_real_escape_string($con, $_POST['proj_title']);
                            $proj_desc = mysqli_real_escape_string($con, $_POST['proj_desc']);
                            $proj_detail = mysqli_real_escape_string($con, $_POST['proj_detail']);
                            $cat_id = mysqli_real_escape_string($con, $_POST['cat_id']);


                            
                            if (strlen($code) < 1) {
                                $msg = $msg . "Portfolio Title Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($date) < 3) {
                                $msg = $msg . "Portfolio Title Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($client) < 7) {
                                $msg = $msg . "Portfolio Title Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($proj_title) < 5) {
                                $msg = $msg . "Portfolio Title Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }
                            if (strlen($proj_desc) > 150) {
                                $msg = $msg . "Portfolio description Must Be Less Than 150 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($proj_detail) < 15) {
                                $msg = $msg . "Portfolio Detail Must Be More Than 15 Char Length.<BR>";
                                $status = "NOTOK";
                            }
                            



                            $uploads_dir = 'uploads/project';

                            $tmp_name = $_FILES["ufile"]["tmp_name"];
                            // basename() may prevent filesystem traversal attacks;
                            // further validation/sanitation of the filename may be appropriate
                            $name = basename($_FILES["ufile"]["name"]);
                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $name;

                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $qb = mysqli_query($con, "INSERT INTO project (code, date, client, proj_title, proj_desc, proj_detail, ufile, cat_id) VALUES ('$code', '$date', '$client', '$proj_title', '$proj_desc', '$proj_detail', '$new_file_name','$cat_id')");


                                if ($qb) {
                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                  Project has been added successfully.
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
                                        
                                        <div class="mb-3">
                            <h6>Select Category</h6>
                            <select class="form-select" aria-label="Default select example" name="cat_id">
                                <option selected>Select Category</option>
                                <?php foreach ($qc as $row): ?>
                                    <option value="<?= $row["cat_id"] ?>">
                                        <?= $row["name"] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Project Id</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="code" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Date</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="date" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Client</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="client" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Project Title</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        name="proj_title" placeholder="Enter Portfolio Title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Short Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="proj_desc" rows="2"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Project Detail</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="proj_detail" rows="3"></textarea>
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
                                                        Project</button>

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