 <!-- Load Facebook SDK for JavaScript -->
 <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="143072653057871">
      </div>
 <!-- FOOTER
    ================================================== -->
    <footer class="section bg-dark" style="background-image: linear-gradient(90deg, rgba(2,0,36,0.45) 0%, rgba(9,9,121,0.45) 41%, rgba(0,212,255,0.45) 100%),
    url(images/background/footer.jpg); background-size: cover;">

      <!-- Triangles -->
      <div class="bg-triangle bg-triangle-light bg-triangle-bottom bg-triangle-left"></div>
      <div class="bg-triangle bg-triangle-light bg-triangle-bottom bg-triangle-right"></div>

      <!--Content -->
      <div class="container">
        <div class="row row-cols-4 align-self-center">
          <div class="col-md">

            <!-- Brand -->
            <p>
              <a href="#" class="footer-brand text-white">
                <img src="images/logo/logo.png" style="width: 70%;" alt="logo">
              </a>
            </p>
            <p>
             <!-- Social links -->
            <ul class="list-inline list-unstyled text-md-left">
              <li class="list-inline-item">
                <a class="icon-footer" href="https://vk.com/mirea_official">
                  <i class="fab fa-vk"></i>
                </a>
              </li>
              <li class="list-inline-item ml-2">
                <a class="icon-footer" href="https://www.facebook.com/mireaofficial">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item ml-2">
                <a class="icon-footer" href="http://telegram.me/priem_mirea">
                  <i class="fab fa-telegram"></i>
                </a>
              </li>
              <li class="list-inline-item ml-2">
                <a class="icon-footer" href="https://www.youtube.com/channel/UClVZx_AWcLq8cXViG9NSXAA">
                  <i class="fab fa-youtube"></i>
                </a>
              </li>
              <li class="list-inline-item ml-2">
                <a class="icon-footer" href="https://www.instagram.com/rtu_university_official/?hl=ru">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>

              <li class="list-inline-item ml-2">
                <a class="icon-footer" href="https://twitter.com/mirea_ru">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
            </ul>

            </p>
            <p class="text-white">
                78 Vernadsky Avenue, Moscow 119454</br>
                +7 (499) 215-65-65</br>
                rector@mirea.ru
            </p>


          </div>
          <div class="col-md">
            <!-- Links -->
            <ul class="list-unstyled list-inline text-md-left text-footer">
              <p>
                About University
              </p>
<?php

$sql_catalog_detail_footer_1 = "SELECT * FROM catalog_detail WHERE catalog_id=1";
$query_catalog_detail_footer_1 = mysqli_query($connect, $sql_catalog_detail_footer_1);
if (mysqli_num_rows($query_catalog_detail_footer_1) > 0) {
    while ($row_catalog_detail_footer_1 = mysqli_fetch_array($query_catalog_detail_footer_1)) {
        $sql_catalog_1 = "SELECT * FROM catalog WHERE catalog_id=1";
        $query_catalog_1 = mysqli_query($connect, $sql_catalog_1);
        if (mysqli_num_rows($query_catalog_1) > 0) {
            $row_catalog_1 = mysqli_fetch_array($query_catalog_1);
            echo '
              <li class="">
                <a href="info.php?catalog_link=', $row_catalog_1["catalog_link"], '&catalog_detail_link=', $row_catalog_detail_footer_1["catalog_detail_link"], '" class="text-white">
                ', $row_catalog_detail_footer_1["catalog_detail_name"], '
                </a>
              </li>
            ';
        }
    }
}

?>
            </ul>
          </div>

          <div class="col-md">


            <!-- Links -->
            <ul class="list-unstyled list-inline text-md-left text-footer">
              <p>
                Academics
              </p>

<?php

$sql_catalog_detail_footer_2 = "SELECT * FROM catalog_detail WHERE catalog_id=2";
$query_catalog_detail_footer_2 = mysqli_query($connect, $sql_catalog_detail_footer_2);
if (mysqli_num_rows($query_catalog_detail_footer_2) > 0) {
    while ($row_catalog_detail_footer_2 = mysqli_fetch_array($query_catalog_detail_footer_2)) {
        $sql_catalog_2 = "SELECT * FROM catalog WHERE catalog_id=2";
        $query_catalog_2 = mysqli_query($connect, $sql_catalog_2);
        if (mysqli_num_rows($query_catalog_2) > 0) {
            $row_catalog_2 = mysqli_fetch_array($query_catalog_2);
            echo '
              <li class="">
                <a href="info.php?catalog_link=', $row_catalog_2["catalog_link"], '&catalog_detail_link=', $row_catalog_detail_footer_2["catalog_detail_link"], '" class="text-white">
                ', $row_catalog_detail_footer_2["catalog_detail_name"], '
                </a>
              </li>
            ';
        }
    }
}

?>
          </ul>

          <!-- Links -->
          <ul class="list-unstyled list-inline text-md-left text-footer">
              <p>
                Admission
              </p>

<?php

$sql_catalog_detail_footer_3 = "SELECT * FROM catalog_detail WHERE catalog_id=3";
$query_catalog_detail_footer_3 = mysqli_query($connect, $sql_catalog_detail_footer_3);
if (mysqli_num_rows($query_catalog_detail_footer_3) > 0) {
    while ($row_catalog_detail_footer_3 = mysqli_fetch_array($query_catalog_detail_footer_3)) {
        $sql_catalog_3 = "SELECT * FROM catalog WHERE catalog_id=3";
        $query_catalog_3 = mysqli_query($connect, $sql_catalog_3);
        if (mysqli_num_rows($query_catalog_3) > 0) {
            $row_catalog_3 = mysqli_fetch_array($query_catalog_3);
            echo '
              <li class="">
                <a href="info.php?catalog_link=', $row_catalog_3["catalog_link"], '&catalog_detail_link=', $row_catalog_detail_footer_3["catalog_detail_link"], '" class="text-white">
                ', $row_catalog_detail_footer_3["catalog_detail_name"], '
                </a>
              </li>
            ';
        }
    }
}

?>
          </ul>

          </div>

          <div class="col-md">

            <!-- Links -->
            <ul class="list-unstyled list-inline text-md-left text-footer">
              <p>
                International
              </p>

<?php

$sql_catalog_detail_footer_4 = "SELECT * FROM catalog_detail WHERE catalog_id=4";
$query_catalog_detail_footer_4 = mysqli_query($connect, $sql_catalog_detail_footer_4);
if (mysqli_num_rows($query_catalog_detail_footer_4) > 0) {
    while ($row_catalog_detail_footer_4 = mysqli_fetch_array($query_catalog_detail_footer_4)) {

        $sql_catalog_4 = "SELECT * FROM catalog WHERE catalog_id=4";
        $query_catalog_4 = mysqli_query($connect, $sql_catalog_4);
        if (mysqli_num_rows($query_catalog_4) > 0) {
            $row_catalog_4 = mysqli_fetch_array($query_catalog_4);
            echo '
              <li class="">
                <a href="info.php?catalog_link=', $row_catalog_4["catalog_link"], '&catalog_detail_link=', $row_catalog_detail_footer_4["catalog_detail_link"], '" class="text-white">
                ', $row_catalog_detail_footer_4["catalog_detail_name"], '
                </a>
              </li>
            ';
        }

    }
}

?>
          </ul>
          <ul class="list-unstyled list-inline text-md-left text-footer">
              <p>
                More
              </p>
              <li class="">
                <a href="contact.php" class="text-white">
                Contact
                </a>
              </li>
          </ul>

          </div>

        </div> <!-- / .row -->
        <hr class="solid">
        <p class="copyright">© 2021 MIREA - Russian Technological University</p>
      </div> <!-- / .container -->
    </footer>
