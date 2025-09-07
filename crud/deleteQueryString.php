<?php
require('dbconnect.php');

$id = $_GET['idemp'];
$sql = "DELETE FROM employee WHERE id = $id";
$result = mysqli_query($con , $sql);

if($result) {
    header("location:index.php");
    exit(0);
} else {
    echo "เกิดข้อผิดพลาด <br>";
    echo "<a href='index.php'>กลับหน้าแรก</a>";
}


?>