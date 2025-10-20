<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Xuất Chiếu</title>
    <link rel="stylesheet" href="/rapphim/Public/CSS/qlxc.css">
    <script src="/rapphim/Public/JS/qlixc.js" defer></script>
</head>
<body>
    <a href="/rapphim/HomeNhanvien" class="btnQuayLai">← Quay lại trang chủ</a>

    <h2 class="title">🎞️ Quản lý Xuất Chiếu</h2>

    <!-- Khung thêm/sửa xuất chiếu -->
    <div class="card">
        <h3 id="form-title">➕ Thêm xuất chiếu mới</h3>
        <form id="form-xc" method="POST" action="/rapphim/QliXuatChieu/them" class="form-pdc">
            <div class="form-row">
                <div class="form-group">
                    <label>Mã xuất chiếu:</label>
                    <input type="text" name="txtMaxuatchieu" value="<?= $data['maXuatMoi'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Ngày chiếu:</label>
                    <input type="date" name="txtNgaychieu" required>
                    <?php if (isset($data['thongbao'])): ?>
                        <p class="message"><?= $data['thongbao'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Thời gian chiếu:</label>
                    <input type="time" name="txtThoigianchieu" step="1" required>
                </div>
                <div class="form-group">
                    <label>Mã phòng:</label>
                    <select name="cboPhong" required>
                        <option value="">-- Chọn phòng --</option>
                        <?php if (!empty($data['dsPhong'])): ?>
                            <?php foreach ($data['dsPhong'] as $p): ?>
                                <option value="<?= $p['maPhong'] ?>"><?= $p['maPhong'] ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <button type="submit" name="btnThem" id="btnSubmit" class="btnThem">
                ➕ Thêm xuất chiếu
            </button>
        </form>
    </div>

    <!-- Danh sách xuất chiếu -->
    <div class="card">
        <h3>📋 Danh sách xuất chiếu</h3>
        <table class="table-pdc">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã xuất chiếu</th>
                    <th>Ngày chiếu</th>
                    <th>Thời gian chiếu</th>
                    <th>Mã phòng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($data["dulieu"])): ?>
                <?php $i=1; foreach ($data["dulieu"] as $row): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row["maXuatchieu"] ?></td>
                    <td><?= $row["ngayChieu"] ?></td>
                    <td><?= $row["thoiGianchieu"] ?></td>
                     <td><?= $row["maPhong"] ?></td>
                    <td>
                        <button type="button" class="btnSua"
                            onclick="loadXuatChieu('<?= $row['maXuatchieu'] ?>','<?= $row['ngayChieu'] ?>','<?= $row['thoiGianchieu'] ?>','<?= $row['maPhong'] ?>')">
                            ✏️ Sửa
                        </button>
                         <a href="/rapphim/QliXuatChieu/xoa/<?= $row['maXuatchieu'] ?>" 
                            onclick="return confirm('Bạn có chắc muốn xóa xuất chiếu này không?')" 
                            class="btnXoa">🗑️ Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Không có dữ liệu xuất chiếu.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
