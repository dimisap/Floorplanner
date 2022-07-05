<?php
session_start();

include 'dbconnect.php';

    
    $_SESSION['fileid'] = $_POST['fileid'];
    
    $fileid = $_POST['fileid'];

    $visitors=$_POST['visitors'];

    $exhibit=$_POST['exhibit'];

    $duration=$_POST['duration'];

    $date = $_POST['date'];

    $query = "INSERT INTO `visit` (`fileid`,`visitors`,`time`,`exhibit`,`arrival`) VALUES ('$fileid','$visitors','$duration','$exhibit','$date')";

    $result = mysqli_query($mysqli,$query);



    header("Location:simulation.php");



?>