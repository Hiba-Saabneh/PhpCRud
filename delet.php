<?php
    include 'config.php';

    // Get the ID of the record to be deleted
    $id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM data WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Redirect to the view page
    header('location:view.php');
?>