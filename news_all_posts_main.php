    <!-- HERO
    ================================================== -->
<?php
$sql_post_first = "SELECT * FROM post_news ORDER BY id DESC LIMIT 1";
$query_post_first = mysqli_query($connect, $sql_post_first);

if (mysqli_num_rows($query_post_first) > 0) {
    $row_post_first = mysqli_fetch_array($query_post_first);
    echo '
        <section>
            <div class="container section section-top pb-0">
                <div class="row align-items-center">
                <div class="col-12 col-md-6 offset-xl-1 order-md-2">

                    <!-- Image -->
                    <img src="images/posts/', $row_post_first["post_image"], '" alt="..." class="img-fluid img-incline-left mb-5 mb-md-0">

                </div>
                <div class="col-12 col-md-6 col-xl-5 order-md-1">

                    <!-- Meta -->
                    <div class="row align-items-center no-gutters mb-4">
                    <div class="col-auto">

                        <div class="avatar mr-3">
                        <img src="images/logo/mirea.jpg" alt="..." class="img-cover rounded-circle">
                        </div>

                    </div>
                    <div class="col">

                        <p class="mb-0 text-xs text-muted">
                        <strong class="text-body">RTU MIREA</strong> ', $row_post_first["post_time"], '
                        </p>

                    </div>
                    </div> <!-- / .row -->

                    <!-- Heading -->
                    <h1 class="mb-4 font-weight-bold">
                    ', $row_post_first["post_title"], '
                    </h1>

                    <!-- Text -->
                    <p class="mb-5 text-muted">
                    ', substr($row_post_first["post_content"], 0, 200), '...
                    </p>

                    <!-- Button -->
                    <a href="news_read_detail.php?post_link=', $row_post_first["post_link"], '" class="btn btn-outline-primary">
                    Read more <i class="fas fa-arrow-right ml-2"></i>
                    </a>

                </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>

    ';
}
?>


    <!-- FEATURED
    ================================================== -->
    <section>
      <div class="container section pb-0">
        <div class="row align-items-stretch">

<?php
$sql_post_second = "SELECT * FROM post_news ORDER BY id DESC LIMIT 1,3";
$query_post_second = mysqli_query($connect, $sql_post_second);

if (mysqli_num_rows($query_post_second) > 0) {
    while ($row_post_second = mysqli_fetch_array($query_post_second)) {
        echo '
                <div class="col-12 col-lg-4 mb-3 mb-lg-0">

                    <a class="card h-100" href="news_read_detail.php?post_link=', $row_post_second["post_link"], '">
                    <div class="card-body">

                        <!-- Meta -->
                        <div class="row align-items-center no-gutters mb-4">
                        <div class="col-auto">

                            <div class="avatar mr-3">
                            <img src="images/logo/mirea.jpg" alt="..." class="img-cover rounded-circle">
                            </div>

                        </div>
                        <div class="col">

                            <p class="mb-0 text-xs text-muted">
                            <strong>RTU MIREA</strong> ', $row_post_second["post_time"], '
                            </p>

                        </div>
                        </div> <!-- / .row -->

                        <!-- Heading -->
                        <h4>
                        ', $row_post_second["post_title"], '
                        </h4>

                    </div>
                    </a>

                </div>
        ';
    }
}

?>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- LATEST
    ================================================== -->
    <section>
      <div class="container section pb-0">

<?php
$sql_post_third = "SELECT * FROM post_news ORDER BY id DESC LIMIT 4,100";
$query_post_third = mysqli_query($connect, $sql_post_third);

if (mysqli_num_rows($query_post_third) > 0) {
    while ($row_post_third = mysqli_fetch_array($query_post_third)) {
        echo '
            <a class="row align-items-center text-nounderline" href="news_read_detail.php?post_link=', $row_post_third["post_link"], '">
              <div class="col-12 col-md-3">

                <!-- Image -->
                <img src="images/posts/', $row_post_third["post_image"], '" alt="..." class="img-fluid mb-3 mb-md-0">

              </div>
              <div class="col-12 col-md-9">

                <!-- Meta -->
                <p class="mb-2 text-xs text-muted">
                  <strong class="text-body">RTU MIREA</strong> ', $row_post_third["post_time"], '
                </p>

                <!-- Heading -->
                <h4>
                ', $row_post_third["post_title"], '
                </h4>


              </div>
            </a> <!-- / .row -->

            <hr class="my-4">
        ';
    }
}
?>
          </div>
    </section>

    <div style="margin: 100px"></div>