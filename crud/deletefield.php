<?php
require('dbconnect.php');
$id = $_POST['idemployee'];
$sql = "DELETE FROM employee WHERE id = $id";
$result = mysqli_query($con , $sql);

if($result) {
    header("location:index.php");
    exit(0);
} else {
    echo "เกิดข้อผิดพลาด : ".mysqli_error($con);
}


?> 