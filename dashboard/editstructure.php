<?php
include "header.php";
$todo = mysqli_real_escape_string($con, $_GET['id']);
include "sidebar.php";

?>

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
                        <h4 class="mb-sm-0"> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                <li class="breadcrumb-item active">Structure</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            $query = "SELECT * FROM  portfolio where id='$todo' ";
            $result = mysqli_query($con, $query);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $id = "$row[id]";
                $port_title = "$row[port_title]";
                $port_desc = "$row[port_desc]";
                $port_detail = "$row[port_detail]";
                $tw_link = "$row[tw_link]";
                $fb_link = "$row[fb_link]";
                $li_link = "$row[li_link]";
                $ufile="$row[ufile]";

            }
            ?>

            <div class="row">

                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                        aria-selected="false">
                                        <i class="fas fa-home"></i> Edit Structure
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
                            
                           $uploads_dir = 'uploads/portfolio';

                                   $tmp_name = $_FILES["ufile"]["tmp_name"];
                                   // basename() may prevent filesystem traversal attacks;
                                   // further validation/sanitation of the filename may be appropriate
                                   $name = basename($_FILES["ufile"]["name"]);
                                   $random_digit=rand(0000,9999);
                                   $new_file_name=$random_digit.$name;

                                   move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $qb = mysqli_query($con, "update portfolio set port_title='$port_title', port_desc='$port_desc', port_detail='$port_detail', tw_link='$tw_link', fb_link='$fb_link', li_link='$li_link', ufile='$new_file_name' where id='$todo'");


                                if ($qb) {
                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                 Structure Updated successfully.
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
                                                    <label for="firstnameInput" class="form-label"> Work Title</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        name="port_title" value="<?php print $port_title ?>"
                                                        placeholder="Enter Portfolio Title">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Jabatan</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="port_desc" rows="2"><?php print $port_desc ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">
                                                        Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="port_detail"
                                                        rows="3"><?php print $port_detail ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Twitter Link</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="tw_link" rows="3"><?php print $tw_link ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Facebook Link</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="fb_link" rows="3"><?php print $fb_link ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">LinkedIn Link</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="li_link" rows="3"><?php print $li_link ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Photo</label>
                                                    <input type="file" class="form-control" id="firstnameInput"
                                                        name="ufile"><?php print $ufile ?></textarea>
                                                </div>
                                            </div>



                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Update
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