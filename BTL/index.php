<?php
include 'includes/db.php';
include 'includes/header.php';

/*
 * ===================================================
 * LOGIC NÚT "BẮT ĐẦU" (START BUTTON LOGIC)
 * ===================================================
 * 1. Khách (chưa đăng nhập): Trỏ đến trang Đăng nhập.
 * 2. User (customer): Trỏ đến trang Đặt lịch mới.
 * 3. Admin: Trỏ đến trang Quản lý (dashboard).
 */

// Mặc định: Chế độ cho khách (chưa đăng nhập)
$cta_link = "/BTL/login.php"; 
$cta_text = "Bắt đầu ngay";

if (isset($_SESSION['user_id'])) {
    // ---- 1. ĐÃ ĐĂNG NHẬP ----
    
    if ($_SESSION['user_role'] == 'admin') {
        // 1a. Nếu là Admin -> Trỏ đến trang Quản lý Lịch hẹn
        $cta_link = "/BTL/admin/index.php";
        $cta_text = "Vào trang Quản lý"; // Yêu cầu "giữ nguyên" của bạn -> trỏ về admin
    } else {
        // 1b. Nếu là User (customer) -> Trỏ đến trang Đặt lịch
        $cta_link = "/BTL/new_booking.php";
        $cta_text = "Đặt lịch ngay"; // Theo yêu cầu của bạn
    }
    
} else {
    // ---- 2. CHƯA ĐĂNG NHẬP ----
    // Trỏ đến trang đăng nhập/đăng ký
    $cta_link = "/BTL/login.php"; // Theo yêu cầu của bạn
    $cta_text = "Bắt đầu ngay";
}
?>

<div class="hero-slider">
    
    <div class="hero-content">
        <h2>Chuyên gia Chăm sóc, Bạn đồng hành Tin cậy</h2>
        <p>Đội ngũ chuyên nghiệp của chúng tôi cung cấp dịch vụ toàn diện, từ spa, cắt tỉa đến trông giữ, đảm bảo an toàn và sự thoải mái cho thú cưng của bạn.</p>

        <a href="<?php echo $cta_link; ?>" class="cta-button">
            <?php echo $cta_text; ?>
        </a>
        
    </div>

    <div class="slide" style="background-image: url('https://images.pexels.com/photos/4588065/pexels-photo-4588065.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');"></div>
    <div class="slide" style="background-image: url('https://images.pexels.com/photos/4056462/pexels-photo-4056462.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');"></div>
    <div class="slide" style="background-image: url('https://images.pexels.com/photos/5749137/pexels-photo-5749137.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');"></div>
    <div class="slide" style="background-image: url('https://images.pexels.com/photos/6233543/pexels-photo-6233543.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');"></div>

</div>
<main class="container">
    
    <div class="homepage-grid">

        <aside class="sidebar-box">
            <h3>Dịch vụ chính</h3>
            <ul>
                <li><a href="#">Tắm rửa & Vệ sinh</a></li>
                <li><a href="#">Cắt tỉa lông</a></li>
                <li><a href="#">Khách sạn thú cưng</a></li>
                <li><a href="#">Khám sức khỏe</a></li>
            </ul>
            <img src="https://images.pexels.com/photos/59523/pexels-photo-59523.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Mèo" class="sidebar-image">
        </aside>

        <div class="homepage-content" style="text-align: center;">
            <h2>Chuyên gia Chăm sóc, Bạn đồng hành Tin cậy</h2>
            <p>Đội ngũ chuyên nghiệp của chúng tôi cung cấp dịch vụ toàn diện, từ spa, cắt tỉa đến trông giữ, đảm bảo an toàn và sự thoải mái cho thú cưng của bạn.</p>
            <p>
                <a href="/BTL/new_booking.php" class="cta-button">Bắt đầu ngay</a>
            </p>
            <img src="https://images.pexels.com/photos/5749137/pexels-photo-5749137.jpeg" alt="Chăm sóc thú cưng" style="width: 100%; border-radius: 8px;">
        </div>

        <aside class="sidebar-box">
            <h3>Tin tức</h3>
            <p>Mẹo chăm sóc lông cho chó Poodle vào mùa hè.</p>
            <p>Giảm 10% dịch vụ tắm rửa khi đặt lịch online!</p>
            <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Chó" class="sidebar-image">
        </aside>

    </div> </main>

<?php
include 'includes/footer.php';
?>