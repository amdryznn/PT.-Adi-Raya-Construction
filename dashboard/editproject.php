<?php
include "header.php";
$todo = mysqli_real_escape_string($con, $_GET['id']);
include "sidebar.php";
?>
<?php $qc = mysqli_query($con, "SELECT * FROM category"); ?>
<?php $qs = mysqli_query($con, "SELECT * FROM status"); ?>
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            $query = "SELECT * FROM project where id='$todo' ";


            $result = mysqli_query($con, $query);
            $i = 0;
            while ($ro = mysqli_fetch_array($result)) {
                $id = "$ro[id]";
                $code = "$ro[code]";
                $date = "$ro[date]";
                $client = "$ro[client]";
                $proj_title = "$ro[proj_title]";
                $proj_desc = "$ro[proj_desc]";
                $proj_detail = "$ro[proj_detail]";
                $location = "$ro[location]";
                $cat_id = "$ro[cat_id]";
                $st_id = "$ro[st_id]";
                $ufile = "$ro[ufile]";
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
                                        <i class="fas fa-home"></i> Edit Project
                                    </a>
                                </li>


                            </ul>
                        </div>



                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        if (isset ($_POST['save'])) {

                            $code = mysqli_real_escape_string($con, $_POST['code']);
                            $date = mysqli_real_escape_string($con, $_POST['date']);
                            $client = mysqli_real_escape_string($con, $_POST['client']);
                            $proj_title = mysqli_real_escape_string($con, $_POST['proj_title']);
                            $proj_desc = mysqli_real_escape_string($con, $_POST['proj_desc']);
                            $proj_detail = mysqli_real_escape_string($con, $_POST['proj_detail']);
                            $location = mysqli_real_escape_string($con, $_POST['location']);
                            $cat_id = mysqli_real_escape_string($con, $_POST['cat_id']);
                            $st_id = mysqli_real_escape_string($con, $_POST['st_id']);



                            if ($status == "OK") {
                                $qb = mysqli_query($con, "update project set code='$code', date='$date', client='$client', proj_title='$proj_title', 
proj_desc='$proj_desc', proj_detail='$proj_detail', location='$location', cat_id='$cat_id', st_id='$st_id' where id='$todo'");


                                if ($qb) {
                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                 Project Updated successfully.
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

                                            <!-- Select Category -->
                                            <div class="mb-3">
                                                <h6>Category</h6>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="cat_id">
                                                    <option>Select Category</option>
                                                    <?php foreach ($qc as $row): ?>
                                                        <option value="<?= $row["cat_id"] ?>" <?php echo ($row["cat_id"] == $cat_id) ? 'selected' : ''; ?>>
                                                            <?= $row["name"] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <!-- Select Status -->
                                            <div class="mb-3">
                                                <h6>Status</h6>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="st_id">
                                                    <option>Select Status</option>
                                                    <?php foreach ($qs as $row): ?>
                                                        <option value="<?= $row["st_id"] ?>" <?php echo ($row["st_id"] == $st_id) ? 'selected' : ''; ?>>
                                                            <?= $row["st_name"] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Project Id</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="code" rows="1"><?php print $code ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
    <div class="mb-3">
        <label for="dateInput" class="form-label"> Date</label>
        <input type="date" class="form-control" id="dateInput" name="date" value="<?php echo $date; ?>">
    </div>
</div>



                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Client</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="client" rows="1"><?php print $client ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Project
                                                        Title</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        name="proj_title" value="<?php print $proj_title ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Short
                                                        Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="proj_desc" rows="1"> <?php print $proj_desc ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Location</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="location" rows="1"><?php print $location ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Project
                                                        Detail</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="proj_detail"
                                                        rows="3"><?php print $proj_detail ?></textarea>
                                                </div>
                                            </div>

                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Update
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