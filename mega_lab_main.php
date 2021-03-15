<?php
if (isset($_GET["mega_lab_link"])) {
    $mega_lab_link = $_GET["mega_lab_link"];

    $sql_mega_lab_full = "SELECT * FROM mega_lab WHERE mega_lab_link='$mega_lab_link'";
    $query_mega_lab_full = mysqli_query($connect, $sql_mega_lab_full);

    ?>
   <!-- BREADCRUMB
    ================================================== -->
        <?php
if (mysqli_num_rows($query_mega_lab_full) > 0) {
        $row_mega_lab_breadcrumb = mysqli_fetch_array($query_mega_lab_full);
        ?>
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
            <?php echo $row_mega_lab_breadcrumb["mega_lab_name"]; ?>
            </h5>

          </div>
          <div class="col-auto">

            <!-- Breadcrumb -->
            <span class="breadcrumb-item">
              <a href="index.php">Home</a>
            </span>
            <span class="breadcrumb-item">
              <a href="#">Mega-Laboratories</a>
            </span>
            <span class="breadcrumb-item active">
            <?php echo $row_mega_lab_breadcrumb["mega_lab_name"];} ?>
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
          <div class="col-md-3">

            <!-- Title -->
            <h6 class="title">
            MEGA-LABORATORIES
            </h6>

            <!-- List -->
            <ul class="sidenav list-unstyled mb-5 mb-md-0">
<?php
$sql_mega_lab_nav = "SELECT * FROM mega_lab";
    $query_mega_lab_nav = mysqli_query($connect, $sql_mega_lab_nav);
    if (mysqli_num_rows($query_mega_lab_nav) > 0) {
        while ($row_mega_lab_nav = mysqli_fetch_array($query_mega_lab_nav)) {
            echo '
                    <li class="text-xs text-uppercase mb-2">
                        <a href="mega_lab.php?mega_lab_link=', $row_mega_lab_nav["mega_lab_link"], '">', $row_mega_lab_nav["mega_lab_name"], '</a>
                    </li>
                ';
        }
    }

    ?>
            </ul>

          </div>
          <div class="col-md-9">


            <!-- CONTENT -->
            <div class="pb-5 mb-5 border-bottom">

<?php
$sql_mega_lab_content = "SELECT * FROM mega_lab WHERE mega_lab_link='$mega_lab_link'";
    $query_mega_lab_content = mysqli_query($connect, $sql_mega_lab_content);
    if (mysqli_num_rows($query_mega_lab_content) > 0) {
        $row_mega_lab_content = mysqli_fetch_array($query_mega_lab_content);
        echo '
            <h3 class="mb-4">
            ', $row_mega_lab_content["mega_lab_name"], '
            </h3>

            <div>
            ', $row_mega_lab_content["mega_lab_content"], '
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