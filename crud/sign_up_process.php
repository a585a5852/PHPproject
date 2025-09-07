<?php
session_start();
require 'dbconnect.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
  $_SESSION['error'] = 'กรอกข้อมูลให้ครบค่ะ';
  header('Location: sign_up.php'); exit;
}

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if (mysqli_query($con, $sql)) {
  header('Location: sign_in.php'); exit;
} else {
  $_SESSION['error'] = 'สมัครไม่สำเร็จ: ' . mysqli_error($con);
  header('Location: sign_up.php'); exit;
}
