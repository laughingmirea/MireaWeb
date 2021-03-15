<!-- BREADCRUMB
    ================================================== -->
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
              YOUR POSTS
            </h5>

          </div>
          <div class="col-auto">
            <div class="text-md-right">
                <a href="news_create_post.php" class="btn btn-primary btn-sm mb-2">
                    CREATE POST
                </a>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </nav>


    <!-- LATEST
    ================================================== -->
    <section>
      <div class="container section pb-0">

<?php
if (isset($_SESSION["email"])) {
    if ((Boolean) $_SESSION["isEditor"]) {

        $post_author = $_SESSION["email"];

        $sql_post_third = "SELECT * FROM post_news WHERE post_author='$post_author'";
        $query_post_third = mysqli_query($connect, $sql_post_third);
        if (mysqli_num_rows($query_post_third) > 0) {
            while ($row_post_third = mysqli_fetch_array($query_post_third)) {
                echo '
                <div id="post_', $row_post_third["id"], '">
                    <div class="row align-items-center" >
                        <div class="col-12 col-md-10">
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
                        </div>
                        <div class="col-12 col-md-1">
                            <a href="news_edit_post.php?id=', $row_post_third["id"], '" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                        </div>
                        <div class="col-12 col-md-1">
                            <a onclick="delete_post(', $row_post_third["id"], ')" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <hr class="my-4">
                </div>
            ';
            }
        }
    } else if ((Boolean) $_SESSION["isAdmin"]) {

        $sql_post_third = "SELECT * FROM post_news";
        $query_post_third = mysqli_query($connect, $sql_post_third);

        if (mysqli_num_rows($query_post_third) > 0) {
            while ($row_post_third = mysqli_fetch_array($query_post_third)) {
                echo '
                <div id="post_', $row_post_third["id"], '">
                    <div class="row align-items-center" >
                        <div class="col-12 col-md-10">
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
                        </div>
                        <div class="col-12 col-md-1">
                            <a href="news_edit_post.php?id=', $row_post_third["id"], '" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                        </div>
                        <div class="col-12 col-md-1">
                            <a onclick="delete_post(', $row_post_third["id"], ')" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <hr class="my-4">
                </div>
            ';
            }
        }
    }

}
?>
          </div>
    </section>

    <div style="margin: 100px"></div>

<script>

function delete_post(id){
        var action = "delete";
        var post_id = id;
        $.ajax({
                url: "action_for_news_post.php",
                type: "POST",
                data: {
                    action: action,
                    post_id: post_id
                },
                success: function(data){
                    Toastify({
                        text: "Posts has been deleted!",
                        duration: 5000,
                        close: true,
                        gravity: "bottom",
                        position: "center",
                        backgroundColor: "#39DA8A",
                        stopOnFocus: true,
                        }).showToast();
                    $("#post_"+id).remove();
                }
        });
}
</script>