<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo/mirea.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo/mirea.ico">
    <link rel="manifest" href="assets/ico/site.webmanifest">
    <link rel="mask-icon" href="assets/ico/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="images/logo/mirea.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="assets/ico/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/libs/flickity/dist/flickity.min.css">
    <link rel="stylesheet" href="assets/libs/flickity-fade/flickity-fade.css">
    <link rel="stylesheet" href="assets/libs/fullpage.js/dist/fullpage.min.css">
    <link rel="stylesheet" href="assets/libs/highlightjs/styles/codepen-embed.css">
    <link rel="stylesheet" href="assets/libs/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/libs/incline-icons/style.min.css">

    <!-- Link Font -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,100;1,500;1,600&family=Rajdhani:wght@500&display=swap" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>


    <title>MIREA | MAINTENANCE</title>
  </head>
  <body>

  <?php
ob_start();
session_start();

include_once './layouts/header_all.php';
?>

    <!-- BREADCRUMBS
    ================================================== -->
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
              Maintenance
            </h5>

          </div>
          <div class="col-auto">

            <!-- Breadcrumb -->
            <span class="breadcrumb-item">
              <a href="index-2.html">Home</a>
            </span>
            <span class="breadcrumb-item active">
            Maintenance
            </span>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </nav>

    <!-- ERROR
    ================================================== -->
    <section class="section">

      <!-- Content -->
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3 offset-md-1 order-md-3">

            <!-- Image -->
            <div class="text-center">
              <img src="images/design/maintenance.jpg" alt="" srcset="" width=100%>
            </div>

          </div>
          <div class="col-md-2 order-md-1">

            <!-- Title -->
            <h6 class="title">
              Maintenance
            </h6>

          </div>
          <div class="col-md-5 order-md-2">

            <!-- Heading -->
            <h2 class="mb-4">
              We are <span class="text-primary">under</span> maintenance
            </h2>

            <!-- Subheading -->
            <p class="text-muted">
              Will be Back Soon!
            </p>

            <!-- Button -->
            <a href="index.php" class="btn btn-outline-primary">
              Homepage <i class="fas fa-angle-right ml-1"></i>
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </section>

    <?php
include_once './layouts/footer.php';
?>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Global JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFE2uGzFSL41F6E-vCdUEMTxVXN_E0ihc"></script>

    <!-- Plugins JS -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/flickity/dist/flickity.pkgd.min.js"></script>
    <script src="assets/libs/flickity-fade/flickity-fade.js"></script>
    <script src="assets/libs/jquery-parallax.js/parallax.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/waypoints/lib/shortcuts/inview.min.js"></script>
    <script src="assets/libs/fullpage.js/vendors/scrolloverflow.min.js"></script>
    <script src="assets/libs/fullpage.js/dist/fullpage.min.js"></script>
    <script src="assets/libs/highlightjs/highlight.pack.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>

  </body>
</html>