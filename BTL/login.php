<?php
include 'includes/db.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM customers WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Đăng nhập thành công, lưu session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        
        // Điều hướng dựa trên vai trò
        // **PHẦN TÁCH BIỆT NẰM Ở ĐÂY**
    if ($user['role'] == 'admin') {
        // Nếu là admin, mở cửa admin
        header("Location: admin/index.php"); 
    } else {
        // Nếu là khách, mở cửa trang Đặt Lịch
        header("Location: new_booking.php"); // <--- ĐÃ SỬA
    }
    exit;
    } else {
        $message = "Email hoặc mật khẩu không chính xác.";
    }
}
include 'includes/header.php';
?>

<h2>Đăng nhập</h2>
<?php if ($message): ?>
    <div class="message error"><?php echo $message; ?></div>
<?php endif; ?>

<form action="login.php" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Đăng nhập</button>
</form>

<?php
include 'includes/footer.php';
?>