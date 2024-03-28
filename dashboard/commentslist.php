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
                        <h4 class="mb-sm-0">Comments</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">All</a></li>
                                <li class="breadcrumb-item active">Comments</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Comments List</h5>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Name</th>
                                        <th data-ordering="false">Description</th>
                                        <th data-ordering="false">News Title</th>
                                        <th data-ordering="false">Post</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $q = "SELECT comments.c_id, comments.name, comments.description, comments.created_at, news.title FROM comments JOIN news ON comments.id = news.id ORDER by comments.c_id DESC";


                                    $r123 = mysqli_query($con, $q);

                                    while ($ro = mysqli_fetch_array($r123)) {

                                        $c_id = $ro['c_id'];
                                        $name = $ro['name'];
                                        $description = $ro['description'];
                                        $title = $ro['title']; // Mengambil kolom 'title' dari tabel 'news'
                                        $created_at = $ro['created_at'];

                                        echo "<tr>
        <td>$name</td>
        <td>$description</td>
        <td>$title</td>
        <td>$created_at</td>
        <td>
   
                                                    <div class='dropdown d-inline-block'>
                                                        <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                            <i class='ri-more-fill align-middle'></i>
                                                        </button>
                                                        <ul class='dropdown-menu dropdown-menu-end'>
 
                                                        
                                                        <li>                                                               
 <a href='deletecomments.php?id=$c_id' class='dropdown-item remove-item-btn'>
                                                                    <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>


				  </tr>";

                                    }
                                    ?>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->




        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>