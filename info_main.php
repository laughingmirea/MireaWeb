<?php
if (isset($_GET["catalog_link"]) && isset($_GET["catalog_detail_link"])) {
    $catalog_link = $_GET["catalog_link"];
    $catalog_detail_link = $_GET["catalog_detail_link"];

    $sql_catalog = "SELECT * FROM catalog WHERE catalog_link='$catalog_link'";
    $query_catalog = mysqli_query($connect, $sql_catalog);

    $sql_catalog_detail_full = "SELECT * FROM catalog_detail WHERE catalog_detail_link='$catalog_detail_link'";
    $query_catalog_detail_full = mysqli_query($connect, $sql_catalog_detail_full);

    if (mysqli_num_rows($query_catalog) > 0) {
        $row_catalog = mysqli_fetch_array($query_catalog);
        $catalog_id = $row_catalog["catalog_id"];

        ?>
   <!-- BREADCRUMB
    ================================================== -->
        <?php
if (mysqli_num_rows($query_catalog_detail_full) > 0) {
            $row_catalog_breadcrumb = mysqli_fetch_array($query_catalog_detail_full);
            ?>
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
            <?php echo $row_catalog_breadcrumb["catalog_detail_name"]; ?>
            </h5>

          </div>
          <div class="col-auto">

            <!-- Breadcrumb -->
            <span class="breadcrumb-item">
              <a href="index.php">Home</a>
            </span>
            <span class="breadcrumb-item">
              <a href="#"><?php echo $row_catalog["catalog_name"]; ?></a>
            </span>
            <span class="breadcrumb-item active">
            <?php echo $row_catalog_breadcrumb["catalog_detail_name"]; ?>
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
<?php
}
        echo $row_catalog["catalog_name"];
        ?>
            </h6>

            <!-- List -->
            <ul class="sidenav list-unstyled mb-5 mb-md-0">
<?php
$sql_catalog_detail = "SELECT * FROM catalog_detail WHERE catalog_id='$catalog_id'";
        $query_catalog_detail = mysqli_query($connect, $sql_catalog_detail);
        if (mysqli_num_rows($query_catalog_detail) > 0) {
            while ($row_catalog_detail = mysqli_fetch_array($query_catalog_detail)) {
                echo '
                    <li class="text-xs text-uppercase mb-2">
                        <a href="info.php?catalog_link=', $row_catalog["catalog_link"], '&catalog_detail_link=', $row_catalog_detail["catalog_detail_link"], '">', $row_catalog_detail["catalog_detail_name"], '</a>
                    </li>
                ';
            }
        }
    }

    ?>
            </ul>

          </div>
          <div class="col-md-10">


            <!-- CONTENT -->
            <div class="pb-5 mb-5 border-bottom">

<?php
$sql_catalog_detail_content = "SELECT * FROM catalog_detail WHERE catalog_detail_link='$catalog_detail_link'";
    $query_catalog_detail_content = mysqli_query($connect, $sql_catalog_detail_content);
    if (mysqli_num_rows($query_catalog_detail_content) > 0) {
        $row_catalog_detail_content = mysqli_fetch_array($query_catalog_detail_content);
        echo '
            <h3 class="mb-4">
            ', $row_catalog_detail_content["catalog_detail_name"], '
            </h3>

            <div>
            ', $row_catalog_detail_content["catalog_detail_content"], '
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