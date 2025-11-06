<?php
// /includes/auth_check.php
// Đảm bảo session đã bắt đầu từ db.php
if (!isset($_SESSION['user_id'])) {
    header("Location: /pet_care_app/login.php");
    exit;
}
?>