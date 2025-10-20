<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chọn Ghế</title>
  <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/chonGhe.css">
  <script src="http://localhost/rapphim/Public/JS/chonghe.js" defer></script>
</head>
<body>
  <div class="seat-container">
    <h2>Chọn Ghế - <?= $data['thongTin']['tenPhim'] ?></h2>
    <p><?= $data['thongTin']['ngay'] ?> | <?= $data['thongTin']['gio'] ?></p>

    <div class="screen">Màn Hình</div>

    <form id="form-thanh-toan" method="POST" action="http://localhost/rapphim/ThanhToan/Get_data_POST">
      <div class="seat-grid">
        <?php
        usort($data['dsGhe'], function ($a, $b) {
          return $a['hang'] !== $b['hang']
            ? strcmp($a['hang'], $b['hang'])
            : intval($a['cot']) - intval($b['cot']);
        });
        foreach ($data['dsGhe'] as $ghe):
          $maGhe = $ghe['maGhe'];
          $loai = $ghe['loai'];
          $trangThai = $ghe['trangThai'];
          $gia = ($loai == 'vip') ? 70000 : (($loai == 'sweetbox') ? 130000 : 50000);
          $class = "seat $loai" . ($trangThai == 'dat' ? " dat" : "");
        ?>
          <label class="<?= $class ?>" data-ghe="<?= $maGhe ?>" data-loai="<?= $loai ?>" data-price="<?= $gia ?>">
            <input type="checkbox" value="<?= $maGhe ?>" <?= ($trangThai == 'dat') ? 'disabled' : '' ?>>
            <span><?= $maGhe ?></span>
          </label>
        <?php endforeach; ?>
      </div>

      <div class="legend">
        <span class="seat thuong">Thường (50k)</span>
        <span class="seat vip">VIP (70k)</span>
        <span class="seat sweetbox">Sweetbox (130k)</span>
        <span class="seat dat">Đã đặt</span>
      </div>

      <div class="price-summary">
        <h3>Thông Tin Vé</h3>
        <ul id="selected-seats"></ul>
        <p><strong>Tổng tiền:</strong> <span id="total-price">0 ₫</span></p>

        <!-- Hidden inputs -->
        <input type="hidden" name="tenPhim" value="<?= $data['thongTin']['tenPhim'] ?>">
        <input type="hidden" name="ngay" value="<?= $data['thongTin']['ngay'] ?>">
        <input type="hidden" name="gio" value="<?= $data['thongTin']['gio'] ?>">
        <input type="hidden" name="maPhim" value="<?= $data['thongTin']['maPhim'] ?>">
        <input type="hidden" name="maXuatChieu" value="<?= $data['thongTin']['maXuatChieu'] ?>">
        <input type="hidden" name="maPhong" value="<?= $data['thongTin']['maPhong'] ?>">
        <input type="hidden" name="loai" id="loaiInput">
        <input type="hidden" name="tongTien" id="tongTienInput">
        <div id="hidden-seats"></div>

        <div class="nav-buttons">
          <button type="button" class="btn-nav prev" onclick="window.history.back()">← Quay lại</button>
          <button type="button" class="btn-nav next" id="btn-next">Tiếp tục →</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
