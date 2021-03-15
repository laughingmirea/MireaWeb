    <!-- BREADCRUMBS
    ================================================== -->
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
              NEWS
            </h5>

          </div>
          <div class="col-auto">

            <!-- Breadcrumb -->
            <span class="breadcrumb-item">
              <a href="index-2.html">Home</a>
            </span>
            <span class="breadcrumb-item active">
              News
            </span>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </nav>

    <!-- POST
    ================================================== -->


<?php
include_once './connect.php';

if (isset($_GET["post_link"])) {

    $post_link = $_GET["post_link"];
    $sql_post = "SELECT * FROM post_news WHERE post_link='$post_link'";
    $query_post = mysqli_query($connect, $sql_post);

    if (mysqli_num_rows($query_post) > 0) {
        $row_post = mysqli_fetch_array($query_post);

        ?>

    <section class="section pb-0">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">

          <!-- Meta -->
            <div class="row align-items-center justify-content-center no-gutters mb-4">
              <div class="col-auto">

                <div class="avatar mr-3">
                  <img src="images/logo/mirea.jpg" alt="..." class="img-cover rounded-circle">
                </div>

              </div>
              <div class="col-auto">

                <p class="mb-0 text-xs text-muted">
                  <strong class="text-body">RTU MIREA</strong> <?php echo $row_post["post_time"]; ?>
                </p>

              </div>
            </div> <!-- / .row -->
            <!-- Heading -->
            <h1 class="mb-5 font-weight-bold text-center">
<?php
echo $row_post["post_title"];
        ?>
            </h1>

          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-12">

            <!-- Image -->
            <img src="images/posts/<?php echo $row_post["post_image"]; ?>" alt="..." class="img-fluid mb-3" style="width: 100%">

            <!-- Caption -->
            <p class="text-center text-sm text-muted mb-5">

<?php
echo $row_post["post_title"];
        ?>

            </p>

          </div>
        </div> <!-- / .row -->
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">

<?php
echo $row_post["post_content"];
        ?>

            <!-- Social -->
            <div class="row align-items-center py-3 my-5 border-top border-bottom">
              <div class="col">

                <p class="mb-0 text-xs text-uppercase">
                  Share the post:
                </p>

              </div>
              <div class="col-auto">
                <a href="https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmireaweb.dinhcuong.me%2Fnews_read_detail.php%3Fpost_link%3D<?php echo $post_link ?>" class="text-lg text-nounderline mx-2">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet/?text=Share%20about%20MIREA&amp;url=http%3A%2F%2Fmireaweb.dinhcuong.me%2Fnews_read_detail.php%3Fpost_link%3D<?php echo $post_link ?>" class="text-lg text-nounderline mx-2">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="mailto:?subject=Share%20about%20MIREA&amp;body=http%3A%2F%2Fmireaweb.dinhcuong.me%2Fnews_read_detail.php%3Fpost_link%3D<?php echo $post_link ?>" class="text-lg text-nounderline mx-2">
                  <i class="fas fa-envelope"></i>
                </a>

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <?php
}
}
?>

    <!-- FEATURED
    ================================================== -->
    <section>
      <div class="container section pb-0">
        <div class="row align-items-stretch">

<?php
$sql_post_second = "SELECT * FROM post_news LIMIT 3";
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

<div style="margin: 100px"></div>