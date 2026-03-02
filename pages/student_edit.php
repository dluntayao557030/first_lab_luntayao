<?php
include '../db.php';

$id = $_GET['id'];
$sql = "SELECT student_id, student_name, email, course FROM student_records WHERE student_id = '$id'";
$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$message = "";

$id_number = "";
$full_name = "";
$email = "";
$course = "";

if(isset($_POST['update'])) {
    $id_number = $_POST['id_number'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if(empty($id_number) || empty($full_name) || empty($email) || empty($course)) {
        $message = "All fields are required.";
    } else {
        $sql = "UPDATE student_records SET student_id='$id_number', student_name='$full_name', email='$email', course='$course' WHERE student_id='$id'";
        mysqli_query($conn, $sql);
        header("Location: ../index.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Edit Student Record</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<body>
   <div class="container p-5 mb-5 card" style="max-width: 600px; margin-top: 100px; max-height: 710px;"> 
    <h2 class="text-center">Edit Student Record</h2>
    <p class="text-danger text-center"><?php echo $message; ?></p>
    <form method="POST">
        <div class="mb-4">
            <label>ID Number</label><br>
            <input type="text" name="id_number" value="<?php echo $result["student_id"]; ?>" class="form-control" required><br><br>
            
            <label>Full Name</label><br>
            <input type="text" name="full_name" value="<?php echo $result["student_name"]; ?>" class="form-control" required><br><br>
            
            <label>Email</label><br>
            <input type="email" name="email" value="<?php echo $result["email"]; ?>" class="form-control"><br><br>
            
            <label>Course</label><br>
            <input type="text" name="course" value="<?php echo $result["course"]; ?>" class="form-control" required><br><br>
            
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary" type="submit" name="update" style="width: 100%;">Update</button>
                <a href="../index.php" class="btn btn-secondary" style="width: 100%;">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>