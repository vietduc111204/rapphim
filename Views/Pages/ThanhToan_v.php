<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Xác Nhận Thanh Toán</title>
  <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/thanhToan.css">
  
</head>
<body>
  <div class="payment-container">
    <h2>Xác Nhận Thanh Toán</h2>

    <?php
      // ✅ Lấy dữ liệu truyền từ controller (đúng cách)
      $info = isset($data["data"]) ? $data["data"] : [];

      $tenPhim = $info['tenPhim'] ?? '';
      $ngay = $info['ngay'] ?? '';
      $gio = $info['gio'] ?? '';
      $loai = $info['loai'] ?? '';
      $tongTien = is_numeric($info['tongTien'] ?? '') ? intval($info['tongTien']) : 0;
      $ghe = $info['ghe'] ?? [];

      // Đảm bảo $ghe luôn là mảng
      if (!is_array($ghe)) {
        $ghe = array_map('trim', explode(',', $ghe));
      }
    ?>

    <div class="ticket-info">
      <p><strong>Phim:</strong> <?= htmlspecialchars($tenPhim) ?></p>
      <p><strong>Ngày:</strong> <?= htmlspecialchars($ngay) ?></p>
      <p><strong>Giờ:</strong> <?= htmlspecialchars($gio) ?></p>
      <p><strong>Ghế:</strong> <?= htmlspecialchars(implode(', ', $ghe)) ?> (<?= strtoupper($loai) ?>)</p>
      <p><strong>Tổng tiền:</strong> <?= number_format($tongTien, 0, ',', '.') ?> ₫</p>
    </div>

    <form method="POST" action="/rapphim/ThanhToan/xacNhan">
      <!-- Các input ẩn -->
       <!-- Các input ẩn -->
      <input type="hidden" name="maPhim" value="<?= htmlspecialchars($info['maPhim'] ?? '') ?>">
      <input type="hidden" name="maXuatChieu" value="<?= htmlspecialchars($info['maXuatChieu'] ?? '') ?>">
      <input type="hidden" name="maPhong" value="<?= htmlspecialchars($info['maPhong'] ?? '') ?>">
      <input type="hidden" name="tenPhim" value="<?= htmlspecialchars($tenPhim) ?>">
      <input type="hidden" name="ngay" value="<?= htmlspecialchars($ngay) ?>">
      <input type="hidden" name="gio" value="<?= htmlspecialchars($gio) ?>">
      <input type="hidden" name="ghe" value="<?= htmlspecialchars(implode(',', $ghe)) ?>">
      <input type="hidden" name="loai" value="<?= htmlspecialchars($loai) ?>">
      <input type="hidden" name="tongTien" value="<?= htmlspecialchars($tongTien) ?>">

      <div class="payment-method">
        <h3>Chọn hình thức thanh toán</h3>
        <div class="payment-methods">
          <label class="method">
            <input type="radio" name="method" value="momo" checked>
            <img src="/rapphim/Public/IMG/momo.png" alt="MoMo">
            <span>Thanh toán qua MoMo</span>
          </label>

          <label class="method">
            <input type="radio" name="method" value="zalopay">
            <img src="/rapphim/Public/IMG/zalopay.png" alt="ZaloPay">
            <span>Thanh toán qua ZaloPay</span>
          </label>

          <label class="method">
            <input type="radio" name="method" value="qrpay">
            <img src="/rapphim/Public/IMG/qr.png" alt="QRPay">
            <span>Thanh toán qua QRPay</span>
          </label>

          <label class="method">
            <input type="radio" name="method" value="cod">
            <span>Thanh toán tại quầy</span>
          </label>
        </div>
      </div>

      <button type="submit" class="btn-pay">Thanh Toán</button>
    </form>
  </div>
  <script src="http://localhost/rapphim/Public/JS/thanhtoan.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
