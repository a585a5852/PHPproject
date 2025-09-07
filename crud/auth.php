<?php
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location: sign_up.php'); exit;
}