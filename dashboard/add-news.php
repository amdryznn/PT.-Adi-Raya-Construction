<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php $qn = mysqli_query($con, "SELECT * FROM categories_news"); ?>



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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>
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
                                        <i class="fas fa-home"></i> Add News
                                    </a>
                                </li>


                            </ul>
                        </div>



                        <?php
                        $status = "OK"; //initial status
                        $msg = "";
                        if (isset ($_POST['save'])) {

                            $title = mysqli_real_escape_string($con, $_POST['title']);
                            $content = mysqli_real_escape_string($con, $_POST['content']);
                            $author = mysqli_real_escape_string($con, $_POST['author']);
                            $news_id = mysqli_real_escape_string($con, $_POST['news_id']);

                            if (strlen($title) < 1) {
                                $msg = $msg . "Title Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }

                            if (strlen($author) < 1) {
                                $msg = $msg . "Author Must Be More Than 5 Char Length.<BR>";
                                $status = "NOTOK";
                            }






                            $uploads_dir = 'uploads/news';

                            $tmp_name = $_FILES["ufile"]["tmp_name"];
                            // basename() may prevent filesystem traversal attacks;
                            // further validation/sanitation of the filename may be appropriate
                            $name = basename($_FILES["ufile"]["name"]);
                            $random_digit = rand(0000, 9999);
                            $new_file_name = $random_digit . $name;

                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

                            if ($status == "OK") {
                                $qb = mysqli_query($con, "INSERT INTO news (title, content, author, ufile, news_id) VALUES ('$title', '$content', '$author', '$new_file_name','$news_id')");


                                if ($qb) {
                                    $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                  News has been added successfully.
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
                                                <h6>News</h6>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="news_id">
                                                    <option selected>Select News Category</option>
                                                    <?php foreach ($qn as $row): ?>
                                                        <option value="<?= $row["news_id"] ?>">
                                                            <?= $row["news_name"] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Title</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="title" rows="1"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Author</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea5"
                                                        name="author" rows="1"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label"> Content</label>
                                                    <textarea class="form-control summernote"
                                                        id="exampleFormControlTextarea5" name="content"
                                                        rows="10"></textarea>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Percobaan',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);
            $.ajax({
                method: 'POST',
                url: 'upload_gambar.php', // Ubah sesuai dengan path ke file PHP Anda
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    $('.summernote').summernote('insertImage', img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });

            $.delete = function (src) {
                let filename = src.split('/').pop(); // Ambil nama file gambar dari URL
                $.ajax({
                    method: 'POST',
                    url: 'delete_image.php', // Ubah sesuai dengan path ke file PHP Anda
                    data: { filename: filename }, // Kirim nama file yang akan dihapus
                    success: function (response) {
                        console.log(response); // Tampilkan pesan sukses atau error jika diperlukan
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };
        };

    </script>

    <?php include "footer.php"; ?>