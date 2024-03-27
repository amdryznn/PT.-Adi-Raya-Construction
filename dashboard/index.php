<?php
include "header.php";
$username = $_SESSION['username'];
?>
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
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">Hello,
                                            <?php print $username; ?>!
                                        </h4>
                                        <p class="text-muted mb-0">Welcome back to your dashboard.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">

                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row h-100">


                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <a href=services>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span
                                                        class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-server-line"></i>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM service");
                                                $rowx = mysqli_fetch_row($result);
                                                $nux = $rowx[0];
                                                ?>
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total
                                                    Values</p>
                                                <h4 class="mb-0"><span class="counter-value"
                                                        data-target="<?php print $nux; ?>"></span></h4>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <a href=projectlist>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span
                                                        class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                        <i class="ri-server-line"></i>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="flex-grow-1 ms-3">
                                                <?php
                                                $result = mysqli_query($con, "SELECT count(*) FROM project");
                                                $rowx = mysqli_fetch_row($result);
                                                $nux = $rowx[0];
                                                ?>
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total
                                                    Project</p>
                                                <h4 class="mb-0"><span class="counter-value"
                                                        data-target="<?php print $nux; ?>"></span></h4>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                           <div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <a href="comments">
                    <div class="avatar-sm flex-shrink-0 position-relative avatar-total-comments">
                        <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                            <i class="ri-server-line"></i>
                        </span>
                        <!-- Badge count notification -->
                        <?php
                        $result = mysqli_query($con, "SELECT count(*) FROM comments WHERE new_comments_count = 0");
                        $rowx = mysqli_fetch_row($result);
                        $new_comments_count = $rowx[0];
                        ?>
                        
                        <span class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle">
                            <span class="visually-hidden">New comments</span>
                            <span class="badge-count"><?php echo $new_comments_count; ?></span>
                        </span>
                    </div>
                </a>
                 <?php
                        $result = mysqli_query($con, "SELECT count(*) FROM comments");
                        $rowy = mysqli_fetch_row($result);
                        $total = $rowy[0];
                        ?>
                <div class="flex-grow-1 ms-3">
                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Comments</p>
                    <h4 class="mb-0"><span class="counter-value" data-target="<?php print $total; ?>"></span></h4>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->




                        </div>

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->


            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php include "footer.php"; ?>

    <script>
    $(document).ready(function () {
        // Function to periodically check for new comments and show badge
        function checkNewComments() {
            $.ajax({
                url: 'check_new_comments.php',
                success: function (response) {
                    // Show badge if there are new comments
                    var newCommentsCount = parseInt(response);
                    if (newCommentsCount > 0) {
                        // Show badge
                        $('.avatar-total-comments').addClass('has-new-comments');
                    }
                }
            });
        }

  // Event handler untuk saat avatar komentar diklik
        $('.avatar-total-comments').click(function() {
            // Menghapus kelas 'has-new-comments' dari elemen
            $(this).removeClass('has-new-comments');

            // Mengatur ulang new_comments_count menjadi 0 di database
            $.ajax({
                url: 'reset_new_comments_count.php',
                success: function(response) {
                    // Jika sukses, perbarui tampilan badge count menjadi 0
                    $('.badge-count').text('0');
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika terjadi
                    console.error(error);
                }
            });

            // Mengirimkan permintaan POST ke skrip PHP untuk menandai avatar diklik
            $.post('check_new_comments.php', { avatar_clicked: true }, function(response) {
                // Handle response if needed
                console.log(response);
            });
        });
    });

</script>