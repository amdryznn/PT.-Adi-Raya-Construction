<?php
include "header.php";
$todo = mysqli_real_escape_string($con, $_GET['id']);
include "sidebar.php";
?>
<?php $qn = mysqli_query($con, "SELECT * FROM categories_news"); ?>

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">News</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            $query = "SELECT * FROM news where id='$todo' ";


            $result = mysqli_query($con, $query);
            $i = 0;
            while ($ro = mysqli_fetch_array($result)) {
                $id = "$ro[id]";
                $title = "$ro[title]";
                $content = "$ro[content]";
                $author = "$ro[author]";
                $news_id = "$ro[news_id]";
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
                                        <i class="fas fa-home"></i> Edit News
                                    </a>
                                </li>


                            </ul>
                        </div>



                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        if (isset($_POST['save'])) {

                            $title = mysqli_real_escape_string($con, $_POST['title']);
                            $content = mysqli_real_escape_string($con, $_POST['content']);
                            $author = mysqli_real_escape_string($con, $_POST['author']);
                            $news_id = mysqli_real_escape_string($con, $_POST['news_id']);



                            if ($status == "OK") {
                                $qb = mysqli_query($con, "update news set title='$title', content='$content', author='$author', news_id='$news_id' where id='$todo'");


                                if ($qb) {
                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                 News Updated successfully.
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
                                                <h6>News</h6>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="news_id">
                                                    <option>Select News Category</option>
                                                    <?php foreach ($qn as $row): ?>
                                                        <option value="<?= $row["news_id"] ?>" <?php echo ($row["news_id"] == $news_id) ? 'selected' : ''; ?>>
                                                            <?= $row["news_name"] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Title</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="title" rows="1"><?php print $title ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Author</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="author" rows="1"><?php print $author ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Content</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="content" rows="10"><?php print $content ?></textarea>
                                                </div>
                                            </div>


                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" name="save" class="btn btn-primary">Update
                                                        News</button>

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