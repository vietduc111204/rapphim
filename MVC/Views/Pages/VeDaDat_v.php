<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Vé đã đặt</title>
  <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/veDadat.css">
</head>
<body>
<div class="container mt-4">
  <h2 class="text-center mb-4">Danh sách vé đã đặt</h2>
  <table class="table table-bordered table-striped text-center">
    <thead class="table-dark">
      <tr>
        <th>Mã vé</th>
        <th>Tên phim</th>
        <th>Ngày chiếu</th>
        <th>Giờ chiếu</th>
        <th>Mã ghế</th>
        <th>Tổng tiền</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($data["data"])): ?>
        <?php foreach ($data["data"] as $ve): ?>
          <tr>
            <td><?= $ve["maVe"] ?></td>
            <td><?= $ve["tenPhim"] ?></td>
            <td><?= $ve["ngayChieu"] ?></td>
            <td><?= $ve["gioChieu"] ?></td>
            <td><?= $ve["maGhe"] ?></td>
            <td><?= number_format($ve["tongTien"], 0, ',', '.') ?> đ</td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="6">Chưa có vé nào được đặt</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>