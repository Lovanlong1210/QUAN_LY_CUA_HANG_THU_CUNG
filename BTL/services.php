<?php
include 'includes/db.php';

// Lấy danh sách dịch vụ
$stmt = $pdo->query("SELECT * FROM services ORDER BY price ASC");
$services = $stmt->fetchAll();

include 'includes/header.php';
?>

<h2>Các dịch vụ của chúng tôi</h2>
<p>Dưới đây là các dịch vụ chúng tôi cung cấp để chăm sóc thú cưng của bạn.</p>

<table>
    <thead>
        <tr>
            <th>Tên dịch vụ</th>
            <th>Mô tả</th>
            <th>Giá (VND)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?php echo htmlspecialchars($service['service_name']); ?></td>
                <td><?php echo htmlspecialchars($service['description']); ?></td>
                <td><?php echo number_format($service['price'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include 'includes/footer.php';
?>