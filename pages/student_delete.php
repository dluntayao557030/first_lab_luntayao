<?php
include '../db.php';

$id = $_GET['id'];

if ($id === '' || !is_numeric($id)) {
    die("Missing or invalid ID");
}

$sql = "DELETE FROM student_records WHERE student_id = '" . mysqli_real_escape_string($conn, $id) . "'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: ../index.php?msg=Deleted successfully");
    } else {
        header("Location: ../index.php?msg=No record found with ID $id");
    }
} else {
    header("Location: ../index.php?error=" . urlencode(mysqli_error($conn)));
}
exit();