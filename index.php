<?php 
include 'db.php';
$sql = "SELECT student_id, student_name, email, course FROM student_records";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Records</title>
    <style>
        .scroll-area {
            max-height: 60vh;
            overflow-y: auto;
            padding: 1rem;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
        }
        .card-body {
            position: relative;     
            padding-bottom: 1.5rem; 
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<body class="bg-light">
    <div class="container py-5" style="max-width: 1000px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Student Records</h1>
            <a href="pages/student_add.php" class="btn btn-primary mt-4">+ Add Student</a>
        </div>
        <div class="scroll-area">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['student_name'] ?></h5>
                            <h6 class="card-subtitle mb-3 text-muted"><?= $row['student_id'] ?></h6>
                            
                            <p class="mb-1"><strong>Course:</strong> <?= $row['course'] ?></p>
                            <p class="mb-0"><strong>Email:</strong> <?= $row['email'] ?></p>

                            <div class="position-absolute top-0 end-0 mt-2 me-2">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" 
                                            type="button" 
                                            data-bs-toggle="dropdown" 
                                            aria-expanded="false">
                                        ...
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" 
                                               href="pages/student_edit.php?id=<?= $row['student_id'] ?>">
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" 
                                               href="pages/student_delete.php?id=<?= $row['student_id'] ?>">
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-muted py-4">No students found.</p>
        <?php endif; ?>
</body>
</html>