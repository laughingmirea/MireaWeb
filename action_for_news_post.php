<?php
session_start();
if (!isset($_SESSION["email"])) {
    header('location: index.php');
}
include_once './connect.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "create") {

        $post_title = $_POST["post_title"];
        $post_content = $_POST["post_content"];
        $post_author = $_POST["post_author"];
        $post_time = $_POST["post_time"];
        $post_link = $_POST["post_link"];

        $upload_dir = "images/posts/";
        $fileName = basename($_FILES["post_image"]["name"]);
        $targetFilePath = $upload_dir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $targetFilePath)) {
                $post_image = $fileName;
            }
        }

        if (isset($post_title)
            && isset($post_content)
            && isset($post_author)
            && isset($post_time)
            && isset($post_link)
            && isset($post_image)) {
            $sql = "INSERT INTO post_news (
                    post_title,
                    post_content,
                    post_author,
                    post_time,
                    post_link,
                    post_image
                    )
                    VALUES (
                    '$post_title',
                    '$post_content',
                    '$post_author',
                    '$post_time',
                    '$post_link',
                    '$post_image'
                    )";
            $query = mysqli_query($connect, $sql);
        }
    }
}

if ($_POST["action"] == "update") {

    $post_title = $_POST["post_title"];
    $post_content = $_POST["post_content"];
    $post_time = $_POST["post_time"];
    $post_link = $_POST["post_link"];
    $post_id = $_POST["id"];

    if (isset($_FILES["post_image"]["name"])) {
        $upload_dir = "images/posts/";
        $fileName = basename($_FILES["post_image"]["name"]);
        $targetFilePath = $upload_dir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $targetFilePath)) {
                $post_image = $fileName;
            }
        }
        if (isset($post_title)
            && isset($post_content)
            && isset($post_time)
            && isset($post_link)
            && isset($post_image)) {
            $sql_update = "UPDATE post_news SET
                                post_title = '$post_title',
                                post_content = '$post_content',
                                post_time = '$post_time',
                                post_link = '$post_link',
                                post_image = '$post_image'
                                WHERE id='$post_id'";
            $query_update = mysqli_query($connect, $sql_update);
        }
    } else {
        if (isset($post_title)
            && isset($post_content)
            && isset($post_time)
            && isset($post_link)) {
            $sql_update = "UPDATE post_news SET
                                post_title = '$post_title',
                                post_content = '$post_content',
                                post_time = '$post_time',
                                post_link = '$post_link'
                                WHERE id='$post_id'";
            $query_update = mysqli_query($connect, $sql_update);
        }
    }
}

if ($_POST["action"] == "delete") {
    if (isset($_SESSION["email"]) && !(Boolean) $_SESSION["isStudent"]) {
        $post_id = $_POST['post_id'];
        $sql_delete = "DELETE FROM post_news WHERE id='$post_id'";
        $query_delete = mysqli_query($connect, $sql_delete);
    } else {
        header('location: index.php');
    }
}
