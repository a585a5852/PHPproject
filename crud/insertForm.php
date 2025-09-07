<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Krub' , sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <h2 class="text-center">บันทึกข้อมูลพนักงาน</h2>
    <form action="showData.php" method="POST">
        <div class="form-group my-3">
            <label for="fistname" class="fs-4">ชื่อ</label>
            <input type="text" name="fname" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="lastname" class="fs-4">นามสกุล</label>
            <input type="text" name="lname" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="department" class="fs-4">แผนก</label>
            <input type="text" name="department" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="salary" class="fs-4">เงินเดือน</label>
            <input type="text" name="salary" class="form-control">
        </div>
        <div class="text-center">
            <input type="submit" value="บันทึกข้อมูล" class="mt-3 btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="mt-3 btn btn-warning">
            <a href="index.php" class="mt-3 btn btn-primary">กลับไปหน้าแรก</a>
        </div>
    </form>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</html>