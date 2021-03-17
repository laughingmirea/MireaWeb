<?php
ob_start();

session_start();
if (!isset($_SESSION["email"])) {
    header('location: index.php');
}
include_once './connect.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "update-avatar") {

        $person_image = $_POST["person_image"];
        $person_id = $_POST["person_id"];

        $upload_dir = "images/people/";
        $fileName = basename($_FILES["person_image"]["name"]);
        $targetFilePath = $upload_dir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["person_image"]["tmp_name"], $targetFilePath)) {
                $person_image = $fileName;
            }
        }

        if (isset($person_image)) {
            $sql = "UPDATE people SET person_image='$person_image' WHERE id='$person_id'";
            $query = mysqli_query($connect, $sql);
        }
    }

    if ($_POST["action"] == "update-password") {

        $person_password = $_POST["password"];
        $person_id = $_POST["id"];

        if (isset($person_password) && isset($person_id)) {
            $sql = "UPDATE people SET person_password='$person_password' WHERE id='$person_id'";
            $query = mysqli_query($connect, $sql);
        }
    }
}
