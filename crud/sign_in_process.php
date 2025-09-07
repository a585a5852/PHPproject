<?php
session_start();
require 'dbconnect.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
  $_SESSION['error'] = 'กรอกชื่อผู้ใช้และรหัสผ่านค่ะ';
  header('Location: sign_in.php'); exit;
}

$sql = "SELECT id, username FROM users WHERE username='$username' AND password='$password'";
$res = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($res);

if ($user) {
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  header('Location: index.php'); exit;
} else {
  $_SESSION['error'] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องค่ะ';
  header('Location: sign_in.php'); exit;

if (!empty($_POST['remember_name'])) {
  setcookie('remember_name', $username, time() + 60*60*24*30, '/', '', false, true);
} else {
  setcookie('remember_name', '', time() - 3600, '/', '', false, true); 
}
header('Location: index.php'); exit;


}

?>
