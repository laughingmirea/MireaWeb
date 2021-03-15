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
              CREATE POST
            </h5>

          </div>
          <div class="col-auto">
            <div class="text-md-right">
                <a href="news_your_posts.php" class="btn btn-primary btn-sm mb-2">
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
              <input type="text" class="form-control form-control-sm" placeholder="Your title" name="post_title" id="post_title">
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
            <textarea name="post_content" id="post_content" rows="80" cols="80">
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

            <!-- Title -->
            <h6 class="title">
              Cover photo
            </h6>

          </div>
          <div class="col-md-10">
                    <div class="avatar avatar-ultra">
                      <img src="images/design/upload.jpg" id="imagePreview" alt="..." class="img-cover">
                    </div>

                    <label for="file-upload" class="btn btn-primary btn-sm" id="file-name" style="width: 100%;" >
                        UPLOAD PHOTO  <i class="fas fa-upload"></i>
                    </label>
                    <input id="file-upload" type="file">

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
    document.getElementById("file-upload").onchange = function () {

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            document.getElementById("imagePreview").src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        };
        var filePath = this.value;
        if (filePath) {
        var fileName = filePath.replace(/^.*?([^\\\/]*)$/, '$1');
        document.getElementById("file-name").innerHTML = fileName;
        }
    };

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
        var post_title = $('#post_title').val();
        var post_content = CKEDITOR.instances.post_content.getData();
        var post_author = $('#post_author').val();
        var post_time = new Date().toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'});
        var post_link = convertToSlug(post_title);
        var post_image = $('#file-upload').prop('files')[0];
        var action = "create";
        if( !post_title
                || !post_content
                || !post_image) {
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

                    form_data.append("post_title", post_title);
                    form_data.append("post_content", post_content);
                    form_data.append("post_author", post_author);
                    form_data.append("post_time", post_time);
                    form_data.append("post_link", post_link);
                    form_data.append("post_image", post_image);
                    form_data.append("action", action);

                    $.ajax({
                        url: "action_for_news_post.php",
                        type: "POST",
                        dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(data){
                          Toastify({
                            text: "A post created!",
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

