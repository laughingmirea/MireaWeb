<?php
if (isset($_SESSION["email"])) {
    ?>

<!-- BREADCRUMB
    ================================================== -->
    <nav class="breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h5 class="breadcrumb-heading">
              INPUT Data
            </h5>

          </div>
          <div class="col-auto">
            <div class="text-md-right">
                <a href="your-posts.php" class="btn btn-primary btn-sm mb-2">
                    YOUR POSTS
                </a>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </nav>

    <form method="post" role="form">
    <!-- FORM
    ================================================== -->
    <section class="section pb-0" style="padding-top: 2rem;">

      <!-- Content -->
      <div class="container">
        <div class="row">
          <div class="col-md-2">

            <!-- Title -->
            <h6 class="title">
              Title
            </h6>

          </div>
          <div class="col-md-10">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" placeholder="Your title" name="catalog_detail_name" id="catalog_detail_name">
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </section>

    <!-- FORM
    ================================================== -->
    <section class="section pb-0" style="padding-top: 2rem;">

      <!-- Content -->
      <div class="container">
        <div class="row">
          <div class="col-md-2">

            <!-- Title -->
            <h6 class="title">
              ID
            </h6>

          </div>
          <div class="col-md-10">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" placeholder="Your title" name="catalog_id" id="catalog_id">
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </section>


    <input type="hidden" value="<?php echo $_SESSION["email"] ?>" id="post_author" name="post_author">
    <!-- FORM
    ================================================== -->
    <section class="section pb-0" style="padding-top: 2.5rem;">

      <!-- Content -->
      <div class="container">
        <div class="row">
          <div class="col-md-2">

            <!-- Title -->
            <h6 class="title">
              Content
            </h6>

          </div>
          <div class="col-md-10">
            <textarea name="catalog_detail_content" id="catalog_detail_content" rows="80" cols="80">
              Your <b>content</b> ...
            </textarea>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </section>

    <!-- FORM
    ================================================== -->
    <section class="section pb-0" style="padding-top: 2.5rem;">

      <!-- Content -->
      <div class="container">
        <div class="row">
          <div class="col-md-2">

          </div>
          <div class="col-md-10">

          </div>
        </div> <!-- / .row -->
        <div class="text-md-right text-white" style="margin-top: 20px">
          <a onclick="create_post()" class="btn btn-primary btn-sm mb-2">
            CREATE POST
          </a>
        </div>
      </div> <!-- / .container -->

    </section>
    </form>
    <!-- CATEGORIES
    ================================================== -->
    <div style="margin: 70px;"></div>

<?php
}
?>

<script>

    function convertToSlug(str) {

    //replace all special characters | symbols with a space
    str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

    // trim spaces at start and end of string
    str = str.replace(/^\s+|\s+$/gm,'');

    // replace space with dash/hyphen
    str = str.replace(/\s+/g, '-');

    return str;
    }

    function create_post() {
        var catalog_detail_name = $('#catalog_detail_name').val();
        var catalog_id = $('#catalog_id').val();
        var catalog_detail_content = CKEDITOR.instances.catalog_detail_content.getData();
        var catalog_detail_link = convertToSlug(catalog_detail_name);
        var action = "create";
        if( !catalog_detail_name
                || !catalog_id
                || !catalog_detail_content) {
                Toastify({
                        text: "Please enter all fields! Try again!",
                        duration: 5000,
                        close: true,
                        gravity: "bottom",
                        position: "center",
                        backgroundColor: "#F55260",
                        stopOnFocus: true,
                        }).showToast();
            } else {
                    var form_data = new FormData();

                    form_data.append("catalog_detail_name", catalog_detail_name);
                    form_data.append("catalog_id", catalog_id);
                    form_data.append("catalog_detail_content", catalog_detail_content);
                    form_data.append("catalog_detail_link", catalog_detail_link);
                    form_data.append("action", action);

                    $.ajax({
                        url: "action_for_input.php",
                        type: "POST",
                        dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(data){
                          Toastify({
                            text: "Created!",
                            duration: 5000,
                            close: true,
                            gravity: "bottom",
                            position: "center",
                            backgroundColor: "#39DA8A",
                            stopOnFocus: true,
                            }).showToast();
                        }
                    });
            }

    }

</script>

