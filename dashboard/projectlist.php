<?php include"header.php";?>
<?php include"sidebar.php";?>



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
                                <h4 class="mb-sm-0">Project</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">All</a></li>
                                        <li class="breadcrumb-item active">Project</li>
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
                                    <h5 class="card-title mb-0">Project List</h5>
                                </div>
                                <div class="card-body">
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="max-width:50px">
                                        <thead>
                                            <tr>
                                            <th data-ordering="false">Image</th>
                                            <th data-ordering="false">ID Project</th>
                                            <th data-ordering="false">Date</th>
                                            <th data-ordering="false">Client</th>
                                                <th data-ordering="false">Project Title</th>
                                                <th data-ordering="false">Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        <?php
				   $q="SELECT project.id, project.proj_title, project.code, project.client, project.date, project.ufile, category.name FROM project JOIN category ON project.cat_id = category.cat_id ORDER BY id DESC";
                   

                   
 $r123 = mysqli_query($con,$q);
 

while($ro = mysqli_fetch_array($r123))
{

	$id="$ro[id]";
    $code="$ro[code]";
    $date="$ro[date]";
    $client="$ro[client]";
	$proj_title="$ro[proj_title]";
    $ufile="$ro[ufile]";
    $name="$ro[name]";
  
  

  print "<tr>
  <td>
  <img src='uploads/project/$ufile' alt='img' style='max-height:50px;'>
  </td>
				  <td>
				  $code
				  </td>
                  <td>
				  $date
				  </td>
                  <td>
				  $client
				  </td>
                  <td>
				  $proj_title
				  </td>
                  <td>
				  $name
				  </td>
                 
                                                <td>
                                                    <div class='dropdown d-inline-block'>
                                                        <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                            <i class='ri-more-fill align-middle'></i>
                                                        </button>
                                                        <ul class='dropdown-menu dropdown-menu-end'>
                                                        <li><a href='editproject.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit</a></li>
                                                        <li>
                                                            <li>
                                                                <a href='deleteproject.php?id=$id' class='dropdown-item remove-item-btn'>
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

            <?php include"footer.php";?>
