<?php
include "../z_db.php";
$username = $_SESSION['username'];
?>
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <?php
        $rr = mysqli_query($con, "SELECT ufile FROM logo");
        $r = mysqli_fetch_row($rr);
        $ufile = $r[0];
        ?>

        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="30">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>


                <li class="nav-item">
                    <a href="dashboard" class="nav-link" data-key="t-analytics"> <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards"> Dashboard </span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarq" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">About</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarq" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createabout" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="about" class="nav-link" data-key="t-nft-landing">About lists </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLgl" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-rhythm-fill"></i> <span data-key="t-landing">Legality</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarLgl" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createlegality" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="legality" class="nav-link" data-key="t-nft-landing"> Legality List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarB" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Vision & Mission</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarB" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createvision" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="vision" class="nav-link" data-key="t-nft-landing">List </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-checkbox-multiple-line"></i> <span data-key="t-landing">Values</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarLanding" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createservice" class="nav-link" data-key="t-one-page"> Add Values </a>
                            </li>
                            <li class="nav-item">
                                <a href="services" class="nav-link" data-key="t-nft-landing"> List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarStr" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-rhythm-fill"></i> <span data-key="t-landing">Structure</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarStr" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createstructure" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="structure" class="nav-link" data-key="t-nft-landing"> List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarU" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-bar-chart-grouped-fill"></i> <span data-key="t-landing">Category</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarU" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createcategory" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="categorylist" class="nav-link" data-key="t-nft-landing">List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGU" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-task-line"></i> <span data-key="t-landing">Project</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarGU" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createproject" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="projectlist" class="nav-link" data-key="t-nft-landing">List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSl" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-image-fill"></i> <span data-key="t-landing">Manage Slider</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarSl" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createslide" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="static" class="nav-link" data-key="t-nft-landing"> Static Sliders</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarX" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-chrome-fill"></i> <span data-key="t-landing">Social Media</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarX" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="createsocial" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="social" class="nav-link" data-key="t-nft-landing">List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarT" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-message-line"></i> <span data-key="t-landing">Testimony</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarT" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="newtestimony" class="nav-link" data-key="t-one-page">New Testimony</a>
                            </li>
                            <li class="nav-item">
                                <a href="testimony" class="nav-link" data-key="t-nft-landing"> All Testimonies </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarW" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing"> Why Choose Us</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarW" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="addwhy" class="nav-link" data-key="t-one-page"> Add New </a>
                            </li>
                            <li class="nav-item">
                                <a href="why" class="nav-link" data-key="t-nft-landing"> All lists </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarK" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-tools-fill"></i> <span data-key="t-landing"> Site Configuration </span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarK" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="settings" class="nav-link" data-key="t-one-page"> Site Settings </a>
                            </li>
                            <li class="nav-item">
                                <a href="sections" class="nav-link" data-key="t-nft-landing"> Section Titles </a>
                            </li>
                            <li class="nav-item">
                                <a href="logo" class="nav-link" data-key="t-nft-landing"> Update Logo </a>
                            </li>
                            <li class="nav-item">
                                <a href="contact" class="nav-link" data-key="t-nft-landing"> Update Contact </a>
                            </li>
                        </ul>
                    </div>
                </li>









            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>