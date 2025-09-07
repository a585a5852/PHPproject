<?php

require('dbconnect.php');
$id_arr = $_POST['idcheck'];
$multipleDelete = implode(",", $id_arr);
$sql = "DELETE FROM employee WHERE id IN ($multipleDelete)";
$result = mysqli_query($con, $sql);

if ($result) {
    header("location:index.php");
    exit(0);
} else {
    header("location:index.php");
    exit(0);
}

?>