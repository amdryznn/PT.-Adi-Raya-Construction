<?php include "header.php"; ?>
<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <!-- Welcome Intro Start -->
            <div class="col-12 col-md-7">
                <?php
                $rr = mysqli_query($con, "SELECT * FROM static");
                $r = mysqli_fetch_row($rr);
                $stitle = $r[1];
                $stext = $r[2];
                ?>

                <div class="welcome-intro">
                    <h1 class="text-white">
                        <?php print $stitle ?>
                    </h1>
                    <p class="text-white my-4">
                        <?php print $stext ?>
                    </p>
                    <!-- Buttons -->
                    <div class="button-group">
                        <a href="#" class="btn btn-bordered-white">Engineering</a>
                        <a href="#" class="btn btn-bordered-white d-none d-sm-inline-block">Procurement</a>
                        <a href="#" class="btn btn-bordered-white d-none d-sm-inline-block">Construction</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <!-- Welcome Thumb -->
                <div class="welcome-thumb-wrapper mt-5 mt-md-0">
                    <span class="welcome-thumb-1">
                        <img class="welcome-animation d-block ml-auto" src="assets/img/welcome/center.png" alt="">
                    </span>

                </div>
            </div>
        </div>
    </div>
    <!-- Shape Bottom -->
    <div class="shape shape-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
            <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
        c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
        c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
        </svg>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Promo Area Start ***** -->
<section class="section promo-area ptb_100">

    <div class="section-heading text-center">
        <h2> Our Services

        </h2>
        <p class="d-none d-sm-block mt-4">
            lorem
        </p>
    </div>

    <div class="container">
        <div class="row">


            <?php
            $q = "SELECT * FROM  why_us ORDER BY id DESC LIMIT 4";


            $r123 = mysqli_query($con, $q);

            while ($ro = mysqli_fetch_array($r123)) {
                $title = "$ro[title]";
                $detail = nl2br("$ro[detail]");

                print "
<div class='col-16 col-md-8 col-lg-6 res-margin'>
<!-- Single Promo -->
<div class='single-promo color-1 bg-hover hover-bottom text-center p-5'>
    <h3 class='mb-3'>$title</h3>
    <p>$detail</p>
</div>
</div>
";
            }
            ?>




        </div>
    </div>
</section>
<!-- ***** Promo Area End ***** -->

<!-- ***** Content Area Start ***** -->

<!-- ***** Content Area End ***** -->

<!-- ***** Content Area Start ***** -->

<!-- ***** Content Area End ***** -->

<!-- ***** Service Area End ***** -->
<section id="service" class="section service-area bg-grey ptb_150">
    <!-- Shape Top -->
    <div class="shape shape-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
            <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
        </svg>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>
                        <?php print $service_title ?>
                    </h2>
                    <p class="d-none d-sm-block mt-4">
                        <?php print $service_text ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            $qs = "SELECT * FROM  service ORDER BY id DESC LIMIT 6";


            $r1 = mysqli_query($con, $qs);

            while ($rod = mysqli_fetch_array($r1)) {
                $id = "$rod[id]";
                $serviceg = "$rod[service_title]";
                $service_desc = "$rod[service_desc]";

                print "
<div class='col-12 col-md-6 col-lg-4'>
<!-- Single Service -->
<div class='single-service p-4'  style='border: solid 1px #788282;'>
    <h3 class='my-3'>$serviceg</h3>
    <p>$service_desc</p>
    <a class='service-btn mt-3' href='servicedetail.php?id=$id'>Learn More</a>
</div>
</div>

";
            }
            ?>
        </div>
    </div>
    <!-- Shape Bottom -->
    <div class="shape shape-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
            <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
        c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
        c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
        </svg>
    </div>
</section>
<!-- ***** Service Area End ***** -->

<!-- ***** Portfolio Area Start ***** -->
<section id="portfolio" class="portfolio-area overflow-hidden ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>
                        <?php print $port_title ?>
                    </h2>
                    <p class="d-none d-sm-block mt-4">
                        <?php print $port_text ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Portfolio Items -->
        <div class="row items portfolio-items">

            <?php
            $q = "SELECT * FROM  project ORDER BY id DESC LIMIT 6";


            $r123 = mysqli_query($con, $q);

            while ($ro = mysqli_fetch_array($r123)) {

                $id = "$ro[id]";
                $proj_title = "$ro[proj_title]";
                $proj_desc = "$ro[proj_desc]";
                $ufile = "$ro[ufile]";


                print "
<div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
<!-- Single Case Studies -->
<div class='single-case-studies'>
    <!-- Case Studies Thumb -->
    <a href='#'>
        <img src='dashboard/uploads/project/$ufile' alt=''>
    </a>
    <!-- Case Studies Overlay -->
    <a href='#' class='case-studies-overlay'>
        <!-- Overlay Text -->
        <span class='overlay-text text-center p-3'>
            <h3 class='text-white mb-3'>$proj_title</h3>
            <p class='text-white'>$proj_desc.</p>
        </span>
    </a>
</div>
</div>
";
            }
            ?>
        </div>

        <div class="row justify-content-center">
            <a href="allproject" class="btn btn-bordered mt-4">View All</a>
        </div>
</section>

<!-- ***** Portfolio Area End ***** -->

<!-- ***** Logo Slider Area ***** -->
<!-- CSS Logo Slider -->
<style>
    body {
        align-items: center;
        justify-content: center;
    }

    $animationSpeed: 40s;

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-250px * 7))
        }
    }

    .slider {
        height: 100px;
        margin: auto;
        overflow: hidden;
        position: relative;
        width: 64%;

        .slide-track {
            animation: scroll $animationSpeed linear infinite;
            display: flex;
            width: calc(250px * 14);
        }

        .slide {
            height: 100px;
            width: 250px;
        }
    }
</style>

<section id="logoslider" class="portfolio-area overflow-hidden ptb_100">
    <div class="section-heading text-center">
        <h2> Our Brand Partner

        </h2>
        <p class="d-none d-sm-block mt-4">
            lorem
        </p>
    </div>
    <div class="slider">
        <div class="slide-track">
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
            </div>
        </div>
    </div>

</section>
<!-- Javascript Logo Slider -->

<script>
    // Ambil elemen-elemen yang diperlukan
    const slider = document.querySelector('.slide-track');
    const slides = document.querySelectorAll('.slide');

    // Buat variabel untuk mengontrol animasi
    let currentPosition = 0;
    let lastTimestamp = null;
    const animationDuration = 2000; // Durasi animasi dalam milidetik

    // Fungsi untuk menggerakkan slider
    function moveSlider(timestamp) {
        if (!lastTimestamp) {
            lastTimestamp = timestamp;
        }

        const deltaTime = timestamp - lastTimestamp;

        // Geser posisi berdasarkan waktu yang berlalu
        const distance = 250 * (deltaTime / animationDuration);
        currentPosition -= distance;

        // Atur transformasi CSS
        slider.style.transform = `translateX(${currentPosition}px)`;

        // Jika sudah mencapai batas akhir, kembali ke awal
        if (currentPosition <= -(slides.length - 7) * 250) {
            currentPosition = 0;
        }

        // Panggil requestAnimationFrame lagi untuk animasi yang mulus
        if (currentPosition > -(slides.length - 7) * 250) {
            requestAnimationFrame(moveSlider);
        }

        lastTimestamp = timestamp;
    }

    // Panggil requestAnimationFrame untuk memulai animasi
    requestAnimationFrame(moveSlider);
</script>



<!-- ***** Review Area Start ***** -->
<section id="review" class="section review-area bg-overlay ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <!-- Section Heading -->


                <div class="section-heading text-center">
                    <h2 class="text-white">
                        <?php print $test_title; ?>
                    </h2>
                    <p class="text-white d-none d-sm-block mt-4">
                        <?php print $test_text; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Client Reviews -->
            <div class="client-reviews owl-carousel">
                <!-- Single Review -->



                <?php
                $q = "SELECT * FROM  testimony ORDER BY id DESC";
                $r123 = mysqli_query($con, $q);

                while ($ro = mysqli_fetch_array($r123)) {

                    $name = "$ro[name]";
                    $position = "$ro[position]";
                    $message = "$ro[message]";
                    $ufile = "$ro[ufile]";

                    print "

<div class='single-review p-5'>
<!-- Review Content -->
<div class='review-content'>
    <!-- Review Text -->
    <div class='review-text'>
        <p>$message</p>
    </div>
    <!-- Quotation Icon -->

</div>
<!-- Reviewer -->
<div class='reviewer media mt-3'>
    <!-- Reviewer Thumb -->
    <div class='reviewer-thumb'>
        <img class='avatar-lg radius-100' src='dashboard/uploads/testimony/$ufile' alt='img'>
    </div>
    <!-- Reviewer Media -->
    <div class='reviewer-meta media-body align-self-center ml-4'>
        <h5 class='reviewer-name color-primary mb-2'>$name</h5>
        <h6 class='text-secondary fw-6'>$position</h6>
    </div>
</div>
</div>


";
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- ***** Review Area End ***** -->

<!--====== Contact Area Start ======-->
<section id="contact" class="contact-area ptb_100">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-3">
                    <h2>
                        <?php print $contact_title ?>
                    </h2>
                    <p class="d-none d-sm-block mt-4">
                        <?php print $contact_text ?>
                    </p>
                </div>
                <!-- Contact Us -->
                <div class="contact-us">
                    <ul>
                        <!-- Contact Info -->
                        <li class="contact-info color-1 bg-hover active hover-bottom text-center p-5 m-3">
                            <span><i class="fas fa-mobile-alt fa-3x"></i></span>
                            <a class="d-block my-2" href="tel:<?php print $phone1 ?>">
                                <h3>
                                    <?php print $phone1 ?>
                                </h3>
                            </a>

                        </li>
                        <!-- Contact Info -->
                        <li class="contact-info color-1 bg-hover active hover-bottom text-center p-5 m-3">
                            <span><i class="fas fa-envelope-open-text fa-3x"></i></span>
                            <a class="d-none d-sm-block my-2" href="mailto:<?php print $email1 ?>">
                                <h3>
                                    <?php print $email1 ?>
                                </h3>
                            </a>
                            <a class="d-block d-sm-none my-2" href="mailto:<?php print $email1 ?>">
                                <h3>
                                    <?php print $email1 ?>
                                </h3>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-6 pt-4 pt-lg-0">
                <!-- Contact Box -->
                <div class="contact-box text-center">
                    <!-- Contact Form -->
                    <?php
                    $status = "OK"; //initial status
                    $msg = "";
                    if (isset($_POST['save'])) {
                        $name = mysqli_real_escape_string($con, $_POST['name']);
                        $email = mysqli_real_escape_string($con, $_POST['email']);
                        $phone = mysqli_real_escape_string($con, $_POST['phone']);
                        $message = mysqli_real_escape_string($con, $_POST['message']);

                        if (strlen($name) < 5) {
                            $msg = $msg . "Name Must Be More Than 5 Char Length.<BR>";
                            $status = "NOTOK";
                        }
                        if (strlen($email) < 9) {
                            $msg = $msg . "Email Must Be More Than 10 Char Length.<BR>";
                            $status = "NOTOK";
                        }
                        if (strlen($message) < 10) {
                            $msg = $msg . "Message Must Be More Than 10 Char Length.<BR>";
                            $status = "NOTOK";
                        }

                        if (strlen($phone) < 8) {
                            $msg = $msg . "Phone Must Be More Than 8 Char Length.<BR>";
                            $status = "NOTOK";
                        }

                        if ($status == "OK") {

                            $recipient = "awolu_faith@live.com";

                            $formcontent = "NAME:$name \n EMAIL: $email  \n PHONE: $phone  \n MESSAGE: $message";

                            $subject = "New Enquiry from Vogue Website";
                            $mailheader = "From: noreply@vogue.com \r\n";
                            $result = mail($recipient, $subject, $formcontent);

                            if ($result) {
                                $errormsg = "
  <div class='alert alert-success alert-dismissible alert-outline fade show'>
                   Enquiry Sent Successfully. We shall get back to you ASAP.
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
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        print $errormsg;
                    }
                    ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-bordered active btn-block mt-3" name="save"><span
                                        class="text-white pr-3"><i class="fas fa-paper-plane"></i></span>Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Contact Area End ======-->

<!--====== Call To Action Area Start ======-->
<section class="section cta-area bg-overlay ptb_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <!-- Section Heading -->
                <div class="section-heading text-center m-0">
                    <h2 class="text-white">
                        <?php print $enquiry_title; ?>
                    </h2>
                    <p class="text-white d-none d-sm-block mt-4">
                        <?php print $enquiry_text; ?>
                    </p>
                    <a href="contact" class="btn btn-bordered-white mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Call To Action Area End ======-->

<?php include "footer.php"; ?>