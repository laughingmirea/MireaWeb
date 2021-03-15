<?php
if (isset($_GET["coronavirus_post_link"])) {
    $coronavirus_post_link = $_GET["coronavirus_post_link"];

    $sql_coronavirus_full = "SELECT * FROM coronavirus WHERE coronavirus_post_link='$coronavirus_post_link'";
    $query_coronavirus_full = mysqli_query($connect, $sql_coronavirus_full);

    ?>
   <!-- BREADCRUMB
    ================================================== -->
        <?php
if (mysqli_num_rows($query_coronavirus_full) > 0) {
        $row_coronavirus_breadcrumb = mysqli_fetch_array($query_coronavirus_full);
        ?>
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
            <?php echo $row_coronavirus_breadcrumb["coronavirus_post_name"]; ?>
            </h5>

          </div>
          <div class="col-auto">

            <!-- Breadcrumb -->
            <span class="breadcrumb-item">
              <a href="index.php">Home</a>
            </span>
            <span class="breadcrumb-item">
              <a href="#">Coronavirus</a>
            </span>
            <span class="breadcrumb-item active">
            <?php echo $row_coronavirus_breadcrumb["coronavirus_post_name"];} ?>
            </span>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </nav>

    <!-- CONTENT
    ================================================== -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-2">

            <!-- Title -->
            <h6 class="title">
                CORONAVIRUS
            </h6>

            <!-- List -->
            <ul class="sidenav list-unstyled mb-5 mb-md-0">
<?php
$sql_coronavirus_nav = "SELECT * FROM coronavirus";
    $query_coronavirus_nav = mysqli_query($connect, $sql_coronavirus_nav);
    if (mysqli_num_rows($query_coronavirus_nav) > 0) {
        while ($row_coronavirus_nav = mysqli_fetch_array($query_coronavirus_nav)) {
            echo '
                    <li class="text-xs text-uppercase mb-2">
                        <a href="coronavirus.php?coronavirus_post_link=', $row_coronavirus_nav["coronavirus_post_link"], '">', $row_coronavirus_nav["coronavirus_post_name"], '</a>
                    </li>
                ';
        }
    }

    ?>
            </ul>

          </div>
          <div class="col-md-10">


            <!-- CONTENT -->
            <div class="pb-5 mb-5 border-bottom">

<?php
$sql_coronavirus_content = "SELECT * FROM coronavirus WHERE coronavirus_post_link='$coronavirus_post_link'";
    $query_coronavirus_content = mysqli_query($connect, $sql_coronavirus_content);
    if (mysqli_num_rows($query_coronavirus_content) > 0) {
        $row_coronavirus_content = mysqli_fetch_array($query_coronavirus_content);
        echo '
            <h3 class="mb-4">
            ', $row_coronavirus_content["coronavirus_post_name"], '
            </h3>

            <div>
            ', $row_coronavirus_content["coronavirus_post_content"], '
            </div>
        ';
    }

    ?>

            </div>



          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

<?php
}
?>