<?php
include 'includes/db.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO customers (name, email, password, phone, role) VALUES (?, ?, ?, ?, 'customer')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $password, $phone]);
        $message = "Đăng ký thành công! Vui lòng <a href='login.php'>đăng nhập</a>.";
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $message = "Lỗi: Email này đã được sử dụng.";
        } else {
            $message = "Lỗi: " . $e->getMessage();
        }
    }
}
include 'includes/header.php';
?>

<h2>Đăng ký tài khoản</h2>
<?php if ($message): ?>
    <div class="message <?php echo (strpos($message, 'thành công') !== false) ? 'success' : 'error'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<form action="register.php" method="POST">
    <label>Họ tên:</label>
    <input type="text" name="name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Số điện thoại:</label>
    <input type="text" name="phone">
    
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Đăng ký</button>
</form>

<?php
include 'includes/footer.php';
?>