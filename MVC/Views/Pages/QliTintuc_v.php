<link rel="stylesheet" href="/rapphim/Public/CSS/qlitintuc.css">
<a href="/rapphim/HomeNhanvien" class="btnQuayLai">← Quay lại trang chủ</a>
<h2 class="title">📰 Quản lý Tin Tức</h2>

<!-- Form thêm/sửa tin tức -->
<form method="POST" enctype="multipart/form-data"
      action="<?php echo isset($data['edit']) ? '/rapphim/QliTintuc/edit/'.$data['edit']['maTin'] : '/rapphim/QliTintuc/add'; ?>"
      class="form-tintuc">

  <input type="text" name="tenTin" placeholder="Tiêu đề tin tức" required
         value="<?php echo $data['edit']['tenTin'] ?? ''; ?>">

  <textarea name="noiDung" placeholder="Nội dung tin tức" required><?php echo $data['edit']['noiDung'] ?? ''; ?></textarea>

  <input type="date" name="ngayDang" required
         value="<?php echo $data['edit']['ngayDang'] ?? ''; ?>">

  <input type="file" name="hinhAnh" accept="image/*">

  <?php if (isset($data['edit']['hinhAnh'])): ?>
    <input type="hidden" name="hinhAnhCu" value="<?= $data['edit']['hinhAnh'] ?>">
    <img src="/rapphim/Public/img/<?= $data['edit']['hinhAnh'] ?>" width="100" style="margin-top:10px;">
  <?php endif; ?>

  <button type="submit" name="submit" class="<?php echo isset($data['edit']) ? 'btnSua' : 'btnThem'; ?>">
    <?php echo isset($data['edit']) ? 'Cập nhật' : 'Thêm mới'; ?>
  </button>
</form>

<!-- Bảng danh sách tin tức -->
<table class="table-tintuc">
  <thead>
    <tr>
      <th>STT</th>
      <th>Mã Tin</th>
      <th>Tiêu đề</th>
      <th>Hình ảnh</th>
      <th>Ngày đăng</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($data["data"])): $i = 1; ?>
      <?php foreach ($data["data"] as $row): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $row["maTin"] ?></td>
          <td><?= $row["tenTin"] ?></td>
          <td>
            <?php if ($row["hinhAnh"]): ?>
              <img src="/rapphim/Public/img/<?= $row["hinhAnh"] ?>" width="100">
            <?php else: ?>
              Không có ảnh
            <?php endif; ?>
          </td>
          <td><?= $row["ngayDang"] ?></td>
          <td>
            <a href="/rapphim/QliTintuc/edit/<?= $row["maTin"] ?>" class="btnSua">Sửa</a>
            <a href="/rapphim/QliTintuc/delete/<?= $row["maTin"] ?>" class="btnXoa" onclick="return confirm('Xóa tin này?')">Xóa</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="6">Không có tin tức nào.</td></tr>
    <?php endif; ?>
  </tbody>
</table>
