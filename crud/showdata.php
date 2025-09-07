<?php
//connect
require('dbconnect.php');
//input data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$department = $_POST["department"];
$salary = $_POST["salary"];
//insert data to database
$sql = "INSERT INTO employee(fname, lname , department , salary)
    VALUES('$fname' , '$lname' , '$department' , '$salary')";
$result = mysqli_query($con , $sql);

if($result) {
    header("location:index.php");
    exit(0);
} else {
    echo "เกิดข้อผิดพลาด <br>";
    echo "<a href='index.php'>กลับหน้าแรก</a>";
}



?>