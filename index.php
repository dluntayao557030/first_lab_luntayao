<?php 
include 'db.php';
$sql = "SELECT student_id, student_name, email, course FROM student_records WHERE status=1";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Home</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<body>
    <div class="container p-5 mb-5 card" style="max-width: 900px; margin-top: 100px; max-height: 710px;">
        <h1 class="text-center mb-5">Student Records</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["student_id"] . "</td>";
                        echo "<td>" . $row["student_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["course"] . "</td>";
                        echo "<td><a href='pages/student_edit.php?id=" . $row["student_id"] . "' class='btn btn-secondary'>Edit</a> 
                                <a href='pages/student_delete.php?id=" . $row["student_id"] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="pages/student_add.php" class="btn btn-primary">Add Student</a>
    </div>
</body>
</html>