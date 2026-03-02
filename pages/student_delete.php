<?php
    include '../db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM student_records WHERE student_id='$id'";
    mysqli_query($conn, $sql);
    header("Location: ../index.php");
    exit();
?>