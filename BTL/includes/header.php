<?php
// /includes/header.php
// Đảm bảo session đã được bắt đầu (từ db.php)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Chăm sóc Thú cưng</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/BTL/css/style.css">
</head>
<body>
    <header>
        <div class="container-header">
            <h1 class="logo"><a href="/BTL/index.php">PetCare</a></h1>
            <nav>
                <ul>
                    <li><a href="/BTL/services.php">Dịch vụ</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        
                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                            <li><a href="/BTL/admin/index.php">Quản lý Lịch hẹn</a></li>
                            <li><a href="/BTL/admin/manage_services.php">Quản lý Dịch vụ</a></li>
                            <li><a href="/BTL/admin/manage_pets.php">Quản lý Thú cưng</a></li> 
                        <?php else: ?>
                            <li><a href="/BTL/new_booking.php">Đặt lịch</a></li>
                            <li><a href="/BTL/my_bookings.php">Lịch hẹn</a></li>
                        <?php endif; ?>

                        <li class="user-greeting">Chào, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</li>
                        <li><a href="/BTL/logout.php" class="btn-logout">Đăng xuất</a></li>
                    <?php else: ?>
                        <li><a href="/BTL/login.php">Đăng nhập</a></li>
                        <li><a href="/BTL/register.php" class="btn-register">Đăng ký</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">