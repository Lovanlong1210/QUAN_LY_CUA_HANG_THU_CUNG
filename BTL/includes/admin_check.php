<?php
// /includes/admin_check.php
// Đảm bảo session đã bắt đầu từ db.php
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    // Nếu không phải admin, đá về trang chủ
    header("Location: /pet_care_app/index.php");
    exit;
}
?>