<?php
if (isset($_GET["institutes_link"]) && isset($_GET["institutes_detail_link"])) {
    $institutes_link = $_GET["institutes_link"];
    $institutes_detail_link = $_GET["institutes_detail_link"];

    $sql_institutes = "SELECT * FROM institutes WHERE institutes_link='$institutes_link'";
    $query_institutes = mysqli_query($connect, $sql_institutes);

    $sql_institutes_detail_full = "SELECT * FROM institutes_detail WHERE institutes_detail_link='$institutes_detail_link'";
    $query_institutes_detail_full = mysqli_query($connect, $sql_institutes_detail_full);

    if (mysqli_num_rows($query_institutes) > 0) {
        $row_institutes = mysqli_fetch_array($query_institutes);
        $institutes_id = $row_institutes["institutes_id"];

        ?>
   <!-- BREADCRUMB
    ================================================== -->
        <?php
if (mysqli_num_rows($query_institutes_detail_full) > 0) {
            $row_institutes_breadcrumb = mysqli_fetch_array($query_institutes_detail_full);
            ?>
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
            <?php echo $row_institutes_breadcrumb["institutes_detail_name"]; ?>
            </h5>

          </div>
          <div class="col-auto">

            <!-- Breadcrumb -->
            <span class="breadcrumb-item">
              <a href="index.php">Home</a>
            </span>
            <span class="breadcrumb-item">
              <a href="#"><?php echo $row_institutes["institutes_name"]; ?></a>
            </span>
            <span class="breadcrumb-item active">
            <?php echo $row_institutes_breadcrumb["institutes_detail_name"]; ?>
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
        echo $row_institutes["institutes_name"];
        ?>
            </h6>

            <!-- List -->
            <ul class="sidenav list-unstyled mb-5 mb-md-0">
<?php
$sql_institutes_detail = "SELECT * FROM institutes_detail WHERE institutes_id='$institutes_id'";
        $query_institutes_detail = mysqli_query($connect, $sql_institutes_detail);
        if (mysqli_num_rows($query_institutes_detail) > 0) {
            while ($row_institutes_detail = mysqli_fetch_array($query_institutes_detail)) {
                echo '
                    <li class="text-xs text-uppercase mb-2">
                        <a href="institutes.php?institutes_link=', $row_institutes["institutes_link"], '&institutes_detail_link=', $row_institutes_detail["institutes_detail_link"], '">', $row_institutes_detail["institutes_detail_name"], '</a>
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
$sql_institutes_detail_content = "SELECT * FROM institutes_detail WHERE institutes_detail_link='$institutes_detail_link'";
    $query_institutes_detail_content = mysqli_query($connect, $sql_institutes_detail_content);
    if (mysqli_num_rows($query_institutes_detail_content) > 0) {
        $row_institutes_detail_content = mysqli_fetch_array($query_institutes_detail_content);
        echo '
            <h3 class="mb-4">
            ', $row_institutes_detail_content["institutes_detail_name"], '
            </h3>

            <div>
            ', $row_institutes_detail_content["institutes_detail_content"], '
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