<?php
    session_start();

    include_once 'dbconnect.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `tracksystem` WHERE `id` = '$id'";
    mysqli_query($mysqli,$sql);

    

    header("Location: addvisitors.php?delete_success");
?>