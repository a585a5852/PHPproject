<?php
require("dbconnect.php");
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$department = $_POST["department"];
$salary = $_POST["salary"];

$sql = "UPDATE employee SET fname = '$fname', lname = '$lname', department = '$department', salary = '$salary' WHERE id = '$id'";

$result = mysqli_query($con, $sql);

if($result) {
    header("location:index.php");
    exit(0);
} else {
    echo mysqli_error($con);
}

?>