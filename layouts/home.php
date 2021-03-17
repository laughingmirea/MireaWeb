<?php
$sql_slider_image = "SELECT * FROM slider";
$query_slider_image = mysqli_query($connect, $sql_slider_image);

$sql_slider_content = "SELECT * FROM slider";
$query_slider_content = mysqli_query($connect, $sql_slider_content);
?>

    <!-- HERO
    ================================================== -->
    <section class="section section-top section-full">

      <!-- Slider -->
      <div class="bg-slider">
        <div class="slider slider-no-controls slider-no-draggable slider-fade" id="hero-slider-bg">

<?php
if (mysqli_num_rows($query_slider_image) > 0) {
    while ($row_slider_image = mysqli_fetch_array($query_slider_image)) {
        echo '
            <div class="slider-item">
                <!-- Cover -->
                <div class="bg-cover" style="background-image: linear-gradient(90deg, rgba(2,0,36,0.85) 0%, rgba(9,9,121,0.65) 41%, rgba(0,212,255,0.65) 100%),
                url(images/slider/', $row_slider_image["image"], ')"></div>

            </div>
        ';
    }
}
?>
        </div>
      </div>

      <!-- Overlay -->
      <div class="bg-overlay"></div>

      <!-- Triangles -->
      <div class="bg-triangle bg-triangle-light bg-triangle-bottom bg-triangle-left"></div>
      <div class="bg-triangle bg-triangle-light bg-triangle-bottom bg-triangle-right"></div>

      <!-- Content -->
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-8 col-lg-7 order-md-2">

            <!-- Slider -->
            <div id="hero-slider" class="slider slider-no-controls slider-no-draggable slider-fade mb-5 mb-md-0" data-bind="slider" data-target="#hero-slider-bg">

<?php
if (mysqli_num_rows($query_slider_content) > 0) {
    while ($row_slider_content = mysqli_fetch_array($query_slider_content)) {
        echo '
                <div class="slider-item">

                    <!-- Heading -->
                    <h1 class="text-white text-center mb-4" style="font-family: \'Marcellus SC\', serif;">
                    MIREA - Russian Technological University
                    </h1>

                    <!-- Subheading -->
                    <p class="lead text-white text-muted text-center mb-5" style="font-family: \'Rajdhani\', sans-serif;">', $row_slider_content["content"], '</p>


                </div>
        ';
    }
}
?>


            </div>

          </div>
          <div class="col-6 col-md-2 order-md-1">

            <!-- Controls -->
            <div class="text-left">
              <a href="#hero-slider" class="slider-control" data-slide="previous">
                <span class="icon-arrow-left icon-2x"></span>
              </a>
            </div>

          </div>
          <div class="col-6 col-md-2 order-md-3">

            <!-- Controls -->
            <div class="text-right">
              <a href="#hero-slider" class="slider-control" data-slide="next">
                <span class="icon-arrow-right icon-2x"></span>
              </a>
            </div>

          </div>
          <div class="icon-scroll"></div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </section>

    <!-- SECTIONS
    ================================================== -->





          <!-- NEWS
    ================================================== -->
    <section class="section bg-light">


      <!-- Triangles -->
      <div class="bg-triangle bg-triangle-dark bg-triangle-top bg-triangle-left"></div>
      <div class="bg-triangle bg-triangle-dark bg-triangle-bottom bg-triangle-right"></div>

      <!-- Content -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">

            <!-- Heading -->
            <h2 class="mb-4 text-center">
              Latest news & events
            </h2>

            <p class="text-muted text-center mb-5">
              All the latest information is always updated.
            </p>


          </div>
        </div> <!-- / .row -->
        <div class="row">
<?php
$sql_post = "SELECT * FROM post_news ORDER BY id DESC LIMIT 3";
$query_post = mysqli_query($connect, $sql_post);

if (mysqli_num_rows($query_post) > 0) {
    while ($row_post = mysqli_fetch_array($query_post)) {
        echo '
          <div class="col-md-4">

                <!-- Card -->
                <div class="card border-0 mb-3 mb-md-0">

                  <!-- Image -->
                    <img src="images/posts/', $row_post["post_image"], '" class="card-img-top fix-image" alt="...">


                  <!-- Body -->
                  <div class="card-body">

                    <!-- Time -->
                    <p class="card-text text-muted">
                      <i class="far fa-calendar-alt"></i> ', $row_post["post_time"], '
                    </p>

                    <!-- Title -->
                    <h4 class="card-title">
                      ', $row_post["post_title"], '
                    </h4>

                    <!-- Link -->
                    <a href="news_read_detail.php?post_link=', $row_post["post_link"], '">
                      Read more...
                    </a>

                  </div>

                </div> <!-- / .card -->

              </div>
      ';
    }
    ;
}
?>

        </div> <!-- / .row -->
        <div class="text-center">
            <a href="news_all_posts.php" class="btn btn-sm btn-primary">VIEW ALL NEWS</a>
        </div>
      </div> <!-- / .container -->

    </section>


    <!-- HEADERS
    ================================================== -->
    <section class="section bg-light">

      <!-- Triangles -->
      <div class="bg-triangle bg-triangle-dark bg-triangle-top bg-triangle-left"></div>
      <div class="bg-triangle bg-triangle-dark bg-triangle-bottom bg-triangle-right"></div>

      <!-- Content -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">

            <!-- Heading -->
            <h2 class="text-center mb-4">
              RTU MIREA today
            </h2>

            <!-- Subheading -->
            <p class="text-muted text-center">
              Recognized in Russia and abroad modern educational and research center, combining in its work the classical university traditions and modern educational technologies.
            </p>

          </div>
        </div> <!-- / .row -->

        <!-- Educational and Scientific Units
        =============================================-->
        <div class="heading-content">
          <div class="title-content">
            <p>Educational and Scientific Units</p>
          </div>
        </div>

        <div class="row">
<?php
$sql_institutes = "SELECT * FROM institutes";
$query_institutes = mysqli_query($connect, $sql_institutes);

if (mysqli_num_rows($query_institutes) > 0) {
    while ($row_institutes = mysqli_fetch_array($query_institutes)) {
        echo '
                <div class="col-6 col-md-4">
                  <div class="card-institute" style="background-image: url(images/Institute/Final/', $row_institutes["institutes_image"], '.jpg); background-size: cover;">
                    <div class="card-institute-image">
                      <img src="images/Institute/', $row_institutes["institutes_image"], '.png" alt="">
                    </div>
                      <div class="text-center">
                        <a href="institutes.php?institutes_link=', $row_institutes["institutes_link"], '&institutes_detail_link=about-the-institute" class="text-institute">
                          ', $row_institutes["institutes_name"], '
                        </a>
                      </div>
                    </div>
                </div>
        ';
    }
}
?>

        </div>

        <!--------------------------------------------->

        <!-- The most important information
        =============================================-->
        <div class="heading-content">
          <div class="title-content">
            <p>Mega-Laboratories</p>
          </div>
          <div class="btn-readmore">
            <a href="info.php?catalog_link=academics&catalog_detail_link=mega-laboratories" class="btn btn-sm btn-primary">Read more</a>
          </div>
        </div>

        <div class="slider slider-hightlight" data-slider-binded=".slider">

        <?php
$sql_mega_lab = "SELECT * FROM mega_lab LIMIT 5";
$query_mega_lab = mysqli_query($connect, $sql_mega_lab);
if (mysqli_num_rows($query_mega_lab) > 0) {
    while ($row_mega_lab = mysqli_fetch_array($query_mega_lab)) {
        echo '
          <div class="slider-item col-6 col-md-3">
             <!-- Card -->
            <div class="card card-tall card-stretch border-0 mb-3 md-md-0">

              <!-- Image -->
              <div class="bg-cover" style="background-image: url(images/mega_lab/', $row_mega_lab["mega_lab_image"], ')"></div>

              <!-- Overlay -->
              <div class="bg-overlay"></div>

              <!-- Body -->
              <div class="card-body">

                <!-- Title -->
                <a href="mega_lab.php?mega_lab_link=', $row_mega_lab["mega_lab_link"], '" class="card-title text-white text-center" style="font-weight: 700; font-size:18px">
                  ', $row_mega_lab["mega_lab_name"], '
                </a>


              </div>

            </div> <!-- / .card -->
          </div>
          ';
    }
}
?>


        </div>

        <!--------------------------------------------->

        <!-- Students Life
        =============================================-->
        <div class="heading-content">
          <div class="title-content">
            <p>Interesting</p>
          </div>
        </div>

        <div class="slider slider-hightlight" data-slider-binded=".slider">

<?php
$sql_interesting = "SELECT * FROM interesting";
$query_interesting = mysqli_query($connect, $sql_interesting);
if (mysqli_num_rows($query_interesting) > 0) {
    while ($row_interesting = mysqli_fetch_array($query_interesting)) {
        echo '

        <div class="slider-item col-6 col-md-3">
             <!-- Card -->
            <div class="card card-tall card-stretch border-0 mb-3 md-md-0">

              <!-- Image -->
              <div class="bg-cover" style="background-image: url(', $row_interesting["interesting_image"], ')"></div>

              <!-- Overlay -->
              <div class="bg-overlay"></div>

              <!-- Body -->
              <div class="card-body" style="justify-content: flex-start">

                <!-- Title -->
                <a href="', $row_interesting["interesting_link"], '" class="card-title text-white text-center" style="font-weight: 700; font-size:20px">
                ', $row_interesting["interesting_name"], '
                </a>


              </div>

            </div> <!-- / .card -->
          </div>

      ';
    }
}
?>


        </div>

        <!--------------------------------------------->



      </div> <!-- / .container -->

    </section>


      <!-- LINKS
    ================================================== -->
    <section class="section">
      <div class="container">
        <div class="slider slider-hightlight" data-slider-binded=".slider">

<?php

$sql_link = "SELECT * FROM link";
$query_link = mysqli_query($connect, $sql_link);
if (mysqli_num_rows($query_link) > 0) {
    while ($row_link = mysqli_fetch_array($query_link)) {
        echo '

          <div class="slider-item col-3">

            <!-- Card -->
            <a href="https://', $row_link["link"], '" class="card">

              <!-- Body -->
              <div class="card-body">

                <!-- Title -->
                <h5 class="card-title" style="font-weight: 700">
                ', $row_link["name"], '
                </h5>

                <!-- Text -->
                <p class="card-text text-muted">
                ', $row_link["link"], '
                </p>

              </div>

            </a> <!-- / .card -->

          </div>

      ';
    }
}
?>

        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>