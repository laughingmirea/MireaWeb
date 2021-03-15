<?php
ob_start();
session_start();
include_once './connect.php';
$notify = "";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (isset($email) && isset($password)) {
        $sql = "SELECT * FROM people WHERE person_email='$email' AND person_password='$password'";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        if ($rows > 0) {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

            $_SESSION["name"] = $data["person_name"];
            $_SESSION["image"] = $data["person_image"];
            $_SESSION["dob"] = $data["person_dob"];
            $_SESSION["gender"] = $data["person_gender"];
            $_SESSION["nationality"] = $data["person_nationality"];
            $_SESSION["number"] = $data["person_number"];
            $_SESSION["institute"] = $data["person_institute"];
            $_SESSION["id"] = $data["id"];

            $_SESSION["isEditor"] = $data["isEditor"];
            $_SESSION["isStudent"] = $data["isStudent"];
            $_SESSION["isAdmin"] = $data["isAdmin"];

            header('location: index.php');
        } else {
            $notify .= '<script>
            Toastify({
                text: "The email address or password is incorrect. Please retry...! Try again!",
                duration: 5000,
                close: true,
                gravity: "bottom",
                position: "center",
                backgroundColor: "#F55260",
                stopOnFocus: true,
                }).showToast();
                </script>';
        }
    }
}
echo $notify;
?>

   <!-- BANNER
    =================================================-->
    <div class="covid-banner">
      <p >[CORONAVIRUS] <a href="coronavirus.php?coronavirus_post_link=coronavirus-live">News and Latest Update: all important information for students</a> <i class="fas fa-exclamation-circle"></i> <a href="#modal-virus" data-toggle="modal">Preventive measures</a></p>
    </div>


    <!-- MODALS Preventive measures
    ================================================== -->
    <div class="modal fade" id="modal-virus" tabindex="-1" role="dialog" aria-labelledby="modal-video-header" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-video modal-lg" role="document">
        <div class="modal-content">

          <!-- Header -->
          <div class="modal-header">

            <!-- Title -->
            <h4 class="modal-title text-white" id="modal-video-header">
              Coronavirus preventive measures
            </h4>

            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">

              <img src="images/background/poster.jpg" style="width: 100%;" alt="">

          </div>
        </div> <!-- / .modal-content -->
      </div> <!-- / .modal-dialog -->
    </div> <!-- / .modal -->

    <!-- MODALS Search
    ================================================== -->
    <div class="modal fade" id="modal-search" tabindex="-1" role="dialog" aria-labelledby="modal-video-header" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-video modal-lg" role="document">
        <div class="modal-content">

          <!-- Header -->
          <div class="modal-header">

            <!-- Title -->
            <h4 class="modal-title text-white" id="modal-video-header">
            <i class="fas fa-search"></i>  SEARCH
            </h4>

            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">

            <input type="text" name="search" class="form-control" id="search" placeholder="Type your keyword ...">
            <div class="container section pb-0" id="output-search"">
            </div>

          </div>
        </div> <!-- / .modal-content -->
      </div> <!-- / .modal-dialog -->
    </div> <!-- / .modal -->

<script>
$(document).ready(function(){
  $("#search").keyup(function(){
    if($("#search").val()){
      $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {
              keyword: $("#search").val(),
            },
            success: function(data){
              $("#output-search").html(data);
            }
          });
    }else {
      $("#output-search").html(``);
    }
  });
});

</script>


<?php
if (!isset($_SESSION['email'])) {
    echo '
     <!-- MODALS SIGNIN
    ================================================== -->
    <div class="modal fade" id="modal-signin" tabindex="-1" role="dialog" aria-labelledby="modal-video-header" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-video modal-lg" role="document">
        <div class="modal-content">

          <!-- Header -->
          <div class="modal-header">

            <!-- Title -->
            <h4 class="modal-title text-white" id="modal-video-header">
              SIGN IN
            </h4>

            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">

              <!-- Form -->
              <form class="form-styled bg-white" method="post" role="form">

                <!-- Heading -->
                <h4 class="text-center mb-4">
                  Welcome back
                </h4>

                <!-- Subheading -->
                <p class="text-center text-muted mb-5">
                  Please fill out the form below to sign in to your account.
                </p>

                <!-- Email -->
                <div class="form-group">

                  <!-- Email -->
                  <label>Email address</label>
                  <div class="input-group">
                    <input type="email" class="form-control order-1" name="email" id="email">
                    <div class="input-group-append order-0">
                      <div class="input-group-text">
                        <svg class="input-group-icon icon-offset icon icon-envelope" viewBox="0 0 106 106" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <path transform="translate(3 3)" d="
                            M0 30 V 10 H 100 V 90 H 0 V 30 L 50 60 L 100 30">
                          </path>
                        </svg>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Password -->
                <div class="form-group">

                  <!-- Name -->
                  <label>Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control order-1" name="password" id="password">
                    <div class="input-group-append order-0">
                      <div class="input-group-text">
                        <svg class="input-group-icon icon-offset icon icon-lock" viewBox="0 0 106 106" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <path transform="translate(3 3)" d="
                            M25 50 V 20 A 25 25 0 0 1 50 0 A 25 25 0 0 1 75 20 V 50 H 90 V 100 H 10 V 50 H 75 M50 85 A 5 5 0 0 1 45 80 V 70 A 5 5 0 0 1 50 65 A 5 5 0 0 1 55 70 V 80 A 5 5 0 0 1 50 85">
                          </path>
                        </svg>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Footer -->
                <div class="form-row align-items-center">
                  <div class="col-md-auto">

                    <!-- Checkbox -->
                    <div class="custom-control custom-checkbox mb-3 mb-md-0">
                      <input type="checkbox" class="custom-control-input" id="sign-in-checkbox">
                      <label class="custom-control-label" for="sign-in-checkbox">
                        Remember me
                      </label>
                    </div>

                  </div>
                  <div class="col-md">

                    <!-- Button -->
                    <div class="text-center text-md-right">
                      <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                        Sign in now
                      </button>
                    </div>

                  </div>
                </div> <!-- / .form-row -->

                <!-- Link -->
                <p class="text-center text-muted mt-5 mb-0">
                  <small>
                    Forgotten password? Send us an email at <i>admin@mirea.ru</i>
                  </small>
                </p>

              </form>

          </div>
        </div> <!-- / .modal-content -->
      </div> <!-- / .modal-dialog -->
    </div> <!-- / .modal -->
    ';
} else {
    $signInWith;
    if ((Boolean) $_SESSION["isStudent"]) {
        $signInWith = "Student";
    }
    if ((Boolean) $_SESSION["isEditor"]) {
        $signInWith = "Editor";
    }
    if ((Boolean) $_SESSION["isAdmin"]) {
        $signInWith = "Admin";
    }
    echo '
    <!-- MODALS INFO
    ================================================== -->
    <div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="modal-video-header" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-video modal-lg" role="document">
        <div class="modal-content">

          <!-- Header -->
          <div class="modal-header">

            <!-- Title -->
            <h4 class="modal-title text-white" id="modal-info-header">
              Information
            </h4>

            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">

              <!-- Form -->
              <form class="form-styled bg-white">
                <div class="row align-self-center">
                  <div class="col">

                    <!-- Avatar -->
                    <div class="avatar avatar-ultra">
                      <img src="images/people/', $_SESSION["image"], '" alt="..." class="img-cover" id="imagePreview-avatar">
                    </div>

                    <label for="file-avatar" class="btn btn-primary btn-sm" style="width: 100%;" id="file-name-avatar">
                      CHANGE AVATAR  <i class="fas fa-upload"></i>
                    </label>
                    <input id="file-avatar" type="file">
                    <input id="person_id" type="hidden" value="', $_SESSION["id"], '">

                  </div>

                  <div class="col">

                    <!-- Full name -->
                    <div class="form-group">
                      <!-- Full name -->
                      <label>Full name</label>
                      <p style="color: #212529; font-weight: 600;">', $_SESSION["name"], '</p>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                      <!-- Email -->
                      <label>Email address</label>
                      <p style="color: #212529; font-weight: 600;">', $_SESSION["email"], '</p>
                    </div>

                    <!-- Nationality -->
                    <div class="form-group">
                      <!-- Nationality -->
                      <label>Nationality</label>
                      <p style="color: #212529; font-weight: 600;">', $_SESSION["nationality"], '</p>
                    </div>



                  </div>

                  <div class="col">

                    <!-- Gender -->
                    <div class="form-group">
                      <!-- Gender -->
                      <label>Gender</label>
                      <p style="color: #212529; font-weight: 600;">', $_SESSION["gender"], '</p>
                    </div>

                    <!-- Date of birth -->
                    <div class="form-group">
                      <!-- Date of birth -->
                      <label>Date of birth</label>
                      <p style="color: #212529; font-weight: 600;">', $_SESSION["dob"], '</p>
                    </div>

                    <!-- Sign in as  -->
                    <div class="form-group">
                      <!-- Sign in as -->
                      <label>Sign in as</label>
                      <p style="color: #212529; font-weight: 600;">', $signInWith, '</p>
                    </div>

                  </div>
                </div>






                <div class="faq readmore">
                  <!-- Item -->
                  <div class="faq-item">
                    <!-- Heading -->
                    <a href="#faq-item-content-1" class="faq-item-heading" data-toggle="collapse" aria-controls="faq-item-content-1" aria-expanded="false" role="button">
                      READ MORE (DETAIL)
                    </a>

                    <!-- Content -->
                    <div class="faq-item-content collapse" id="faq-item-content-1">
                      <div class="faq-item-content-inner">
                        <!-- Institute -->
                        <div class="form-group">
                          <!-- Institute -->
                          <label>Institute</label>
                          <p style="color: #212529; font-weight: 600;">', $_SESSION["institute"], '</p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>


                <hr class="solid-dark">

                <div class="row">
    ';
    if ((Boolean) $_SESSION["isAdmin"]) {
        echo '
                <div class="col">
                      <!-- Button -->
                      <div class="text-center text-md-right">
                        <button type="submit" class="btn btn-primary btn-sm" style="width: 100%;">
                          Go to dashboard <i class="fas fa-tachometer-alt"></i>
                        </button>
                      </div>
                  </div>

                  <div class="col">
                      <!-- Button -->
                      <div class="text-center text-md-right">
                        <a href="news_create_post.php" class="btn btn-primary btn-sm" style="width: 100%;">
                          Create a post <i class="fas fa-pen-square"></i>
                        </a>
                      </div>
                  </div>
        ';
    } else if ((Boolean) $_SESSION["isEditor"]) {
        echo '
                <div class="col">
                    <!-- Button -->
                    <div class="text-center text-md-right">
                    <a href="news_create_post.php" class="btn btn-primary btn-sm" style="width: 100%;">
                        Create a post <i class="fas fa-pen-square"></i>
                    </a>
                    </div>
                </div>
        ';
    }

    echo '
                  <div class="col">
                    <!-- Button -->
                    <div class="text-center text-md-right">
                      <a href="maintenance.php" class="btn btn-primary btn-sm" style="width: 100%;">
                        Personal email <i class="fas fa-inbox"></i>
                      </a>
                    </div>
                  </div>

                </div>

                <hr class="solid-dark">


                <!-- Footer -->
                <div class="form-row align-items-center">
                  <div class="col-md-auto">

                    <!-- Checkbox -->
                    <div class="custom-control" style="margin-top: 0.25rem; padding-left: 0rem;">
                        <ul class="list-inline list-unstyled text-md-left">
                          <li class="list-inline-item">
                            <a class="text-primary" href="https://vk.com/mirea_official">
                              <i class="fab fa-vk"></i>
                            </a>
                          </li>
                          <li class="list-inline-item ml-2">
                            <a class="text-primary" href="https://www.facebook.com/mireaofficial">
                              <i class="fab fa-facebook"></i>
                            </a>
                          </li>
                          <li class="list-inline-item ml-2">
                            <a class="text-primary" href="http://telegram.me/priem_mirea">
                              <i class="fab fa-telegram"></i>
                            </a>
                          </li>
                          <li class="list-inline-item ml-2">
                            <a class="text-primary" href="https://www.youtube.com/channel/UClVZx_AWcLq8cXViG9NSXAA">
                              <i class="fab fa-youtube"></i>
                            </a>
                          </li>
                          <li class="list-inline-item ml-2">
                            <a class="text-primary" href="https://www.instagram.com/rtu_university_official/?hl=ru">
                              <i class="fab fa-instagram"></i>
                            </a>
                          </li>

                          <li class="list-inline-item ml-2">
                            <a class="text-primary" href="https://twitter.com/mirea_ru">
                              <i class="fab fa-twitter"></i>
                            </a>
                          </li>

                          <li class="list-inline-item ml-2"></li>
                        </ul>
                    </div>

                  </div>
                  <div class="col-md">
                    <div class="row">
                      <div class="col">
                        <!-- Button -->
                        <div class="text-center text-md-right">
                          <a href="./logout.php" type="submit" class="btn btn-primary btn-sm">
                            SIGN OUT <i class="fas fa-sign-out-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>


                  </div>
                </div> <!-- / .form-row -->

              </form>

          </div>
        </div> <!-- / .modal-content -->
      </div> <!-- / .modal-dialog -->
    </div> <!-- / .modal -->
    ';
}
?>

<script>
    document.getElementById("file-avatar").onchange = function () {

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            document.getElementById("imagePreview-avatar").src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        };
        var filePath = this.value;
        if (filePath) {
        var fileName = filePath.replace(/^.*?([^\\\/]*)$/, '$1');
        document.getElementById("file-name-avatar").innerHTML = fileName;
        }

        var action = "update-avatar";
        var person_image = $('#file-avatar').prop('files')[0];
        var person_id = $('#person_id').val();

        var form_data = new FormData();
        form_data.append("person_image", person_image);
        form_data.append("person_id", person_id);
        form_data.append("action", action);

                    $.ajax({
                        url: "action_for_person_info.php",
                        type: "POST",
                        dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(data){
                          Toastify({
                            text: "Avatar was been updated!",
                            duration: 5000,
                            close: true,
                            gravity: "bottom",
                            position: "center",
                            backgroundColor: "#39DA8A",
                            stopOnFocus: true,
                            }).showToast();
                        }
                    });
    };
</script>
    <!-- NAVBAR
    ================================================= -->
    <nav class="navbar navbar-expand-xl navbar-dark navbar-togglable fixed-top">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" id="logo-nav" href="index.php">
          <img src="images/logo/logo.png" id="nav-logo" style="width: 120px;" alt="logo">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">


<?php
$sql_catalog = "SELECT * FROM catalog";
$query_catalog = mysqli_query($connect, $sql_catalog);
?>
          <!-- Links -->
          <ul class="navbar-nav ml-auto">

<?php
if (mysqli_num_rows($query_catalog) > 0) {
    while ($row_catalog = mysqli_fetch_array($query_catalog)) {
        $catalog_id = $row_catalog["catalog_id"];
        echo '
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ', $row_catalog["catalog_name"], '
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarWelcome">
        ';
        $sql_catalog_detail = "SELECT * FROM catalog_detail WHERE catalog_id='$catalog_id'";
        $query_catalog_detail = mysqli_query($connect, $sql_catalog_detail);
        if (mysqli_num_rows($query_catalog_detail) > 0) {
            while ($row_catalog_detail = mysqli_fetch_array($query_catalog_detail)) {
                echo '
                  <a class="dropdown-item " href="info.php?catalog_link=', $row_catalog["catalog_link"], '&catalog_detail_link=', $row_catalog_detail["catalog_detail_link"], '">
                  ', $row_catalog_detail["catalog_detail_name"], '
                  </a>
                ';
            }
        }
        echo "
              </div>
            </li>
        ";
    }
}
?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              MORE
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                  <a class="dropdown-item " href="contact.php">
                    CONTACT
                  </a>
              </div>
            </li>

            <li class="nav-item">
                    <a href="#modal-search" data-toggle="modal" class="btn btn-outline-primary btn-sm nav-link" style="width: 100%; color: #f5ba4b">
                        <i class="fas fa-search"></i> SEARCH
                    </a>
            </li>


<?php
if (isset($_SESSION['email'])) {
    echo '
            <li>
              <div class="avatar avatar-lg">
                <a href="#modal-info" data-toggle="modal"><img src="images/people/', $_SESSION['image'], '" alt="..." class="img-cover"></a>
              </div>
            </li>
    ';
} else {
    echo '
            <li class="nav-item">
              <a href="#modal-signin" data-toggle="modal" class="nav-link btn btn-sm btn-primary" style="color: #fff;">
                SIGN IN <i class="fas fa-sign-in-alt"></i>
              </a>
            </li>
    ';
}
?>
          </ul>

        </div> <!-- / .navbar-collapse -->

      </div> <!-- / .container -->
    </nav>

