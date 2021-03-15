<?php
session_start();
if (!isset($_SESSION["email"])) {
    header('location: index.php');
}
include_once './connect.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "create") {

        $catalog_detail_name = $_POST["catalog_detail_name"];
        $catalog_id = $_POST["catalog_id"];
        $catalog_detail_content = $_POST["catalog_detail_content"];
        $catalog_detail_link = $_POST["catalog_detail_link"];

        if (isset($catalog_detail_name)
            && isset($catalog_id)
            && isset($catalog_detail_content)
            && isset($catalog_detail_link)) {
            $sql = "INSERT INTO catalog_detail (
                    catalog_detail_name,
                    catalog_id,
                    catalog_detail_content,
                    catalog_detail_link
                    )
                    VALUES (
                    '$catalog_detail_name',
                    '$catalog_id',
                    '$catalog_detail_content',
                    '$catalog_detail_link'
                    )";
            $query = mysqli_query($connect, $sql);
        }
    }
}
