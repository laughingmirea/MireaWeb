<?php
ob_start();
session_start();
include_once './connect.php';
if (isset($_POST['keyword'])) {
    $search_key = $_POST['keyword'];
    $sql = "SELECT * FROM post_news WHERE post_title LIKE '%$search_key%' OR post_content LIKE '%$search_key%'";
    $query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo '
                <a class="row align-items-center text-nounderline" href="news_read_detail.php?post_link=', $row["post_link"], '">
                    <div class="col-12 col-md-3">

                    <!-- Image -->
                    <img src="images/posts/', $row["post_image"], '" alt="..." class="img-fluid mb-3 mb-md-0">

                    </div>
                    <div class="col-12 col-md-9">

                    <!-- Meta -->
                    <p class="mb-2 text-xs text-muted">
                        <strong>RTU MIREA</strong> ', $row["post_time"], '
                    </p>

                    <!-- Heading -->
                    <h4 class="text-white">
                    ', $row["post_title"], '
                    </h4>


                    </div>
                </a> <!-- / .row -->

                <hr class="my-4">
            ';
        }
    } else {
        echo '
                <p>Not found with key "<i>', $_POST['keyword'], '</i>"</p>
            ';
    }
} else {
    echo '<p>Not found with key "<i>', $_POST['keyword'], '</i>"</p>';
}
