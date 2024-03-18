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
                        <h4 class="mb-sm-0">News</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">All</a></li>
                                <li class="breadcrumb-item active">News</li>
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
                <h5 class="card-title mb-0">News List</h5>
            </div>
            <div class="card-body" style="overflow-x: auto;">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Image</th>
                                        <th data-ordering="false">News Title</th>
                                        <th data-ordering="false">Content</th>
                                        <th data-ordering="false">Author</th>
                                        <th data-ordering="false">Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $q = "SELECT news.id, news.title, news.content, news.author, news.ufile, categories_news.news_name FROM news 
                   JOIN categories_news ON news.news_id = categories_news.news_id ORDER BY news.id DESC;";



                                    $r123 = mysqli_query($con, $q);


                                    while ($ro = mysqli_fetch_array($r123)) {

                                        $id = "$ro[id]";
                                        $title = "$ro[title]";
                                        $content = "$ro[content]";
                                        $author = "$ro[author]";
                                        $ufile = "$ro[ufile]";
                                        $news_name = "$ro[news_name]";



                                        print "<tr>
    <td>
        <img src='uploads/news/$ufile' alt='img' style='max-height:50px;'>
    </td>
    <td>
        $title
    </td>
    <td>
        $content
    </td>
    <td style='word-wrap: break-word;'>
        $author
    </td>
    <td style='word-wrap: break-word;'>
        $news_name
    </td>
   
    <td>
        <div class='dropdown d-inline-block'>
            <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='ri-more-fill align-middle'></i>
            </button>
            <ul class='dropdown-menu dropdown-menu-end'>
                <li><a href='editproject.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit</a></li>
                <li><a href='editphotoproject.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-image-edit-fill align-bottom me-2 text-muted'></i> Edit Photo</a></li>
                <li><a href='deleteproject.php?id=$id' class='dropdown-item remove-item-btn'><i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete</a></li>
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