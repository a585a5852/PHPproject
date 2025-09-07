<?php
require('dbconnect.php');
$id = intval($_GET['idemp']);
$sql = "SELECT * FROM employee WHERE id = $id";
$result = mysqli_query($con , $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Krub', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">แบบฟอร์มแก้ไขข้อมูลพนักงาน</h1>
        <form action="Update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <div class="form-group my-3">
                <label for="firstname" class="fs-4">ชื่อ</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $row["fname"]; ?>">
            </div>
            <div class="form-group my-3">
                <label for="lastname" class="fs-4">นามสกุล</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $row["lname"]; ?>">
            </div>
            <div class="form-group my-3">
                <label for="department" class="fs-4">แผนก</label>
                <input type="text" name="department" class="form-control" value="<?php echo $row["department"]; ?>">
            </div>
            <div class="form-group my-3">
                <label for="salary" class="fs-4">เงินเดือน</label>
                <input type="text" name="salary" class="form-control" value="<?php echo $row["salary"]; ?>">
            </div>
            <div class="text-center">
                <input type="submit" value="อัพเดต" class="mt-3 btn btn-success">
                <input type="reset" value="ล้างข้อมูล" class="mt-3 btn btn-danger">
                <a href="index.php" class="mt-3 btn btn-primary">กลับไปหน้าแรก</a>
            </div>
        </form>
    </div>
</body>
</html>
