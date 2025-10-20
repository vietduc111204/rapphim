
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rạp Phim</title>
    <script src="/rapphim/Public/JS/qlipdc.js"></script>
    <link rel="stylesheet" href="/rapphim/Public/CSS/qlipdc.css">
</head>
<body>
    <a href="/rapphim/HomeNhanvien" class="btnQuayLai">← Quay lại trang chủ</a>

    <h2 class="title">🎬 Quản lý Phim Đang Chiếu</h2>

    <!-- Khung thêm phim -->
  <div class="card">
    <h3>➕ Thêm phim mới</h3>
        <form method="POST" action="/rapphim/QliPDC/them" enctype="multipart/form-data" class="form-pdc">
            <div class="form-row">
                <div class="form-group">
                    <label>Mã phim:</label>
                    <input type="text" name="txtMaphim" value="<?= $data['maPhimMoi'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tên phim:</label>
                    <input type="text" name="txtTenphim" placeholder="Nhập tên phim..." required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Mã loại:</label>
                    <select name="txtMaloai" required>
                        <option value="">-- Chọn mã loại --</option>
                        <?php foreach ($data["dsLoai"] as $loai): ?>
                            <option value="<?= $loai['maLoai'] ?>">
                                <?= $loai['maLoai'] ?> (<?= $loai['tenLoai'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mã xuất chiếu:</label>
                    <select name="txtMaxuatchieu" required>
                        <option value="">-- Chọn mã xuất chiếu --</option>
                        <?php foreach ($data["dsXuat"] as $xuat): ?>
                            <option value="<?= $xuat ?>"><?= $xuat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Ngày chiếu:</label>
                    <input type="date" name="txtNgaychieu" required readonly>
                </div>
                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" name="fileHinhanh" accept="image/*" required>
                </div>
            </div>

            <button type="submit" name="btnThem" class="btnThem">
                <i class="fa-solid fa-plus"></i> Thêm phim
            </button>
        </form>
    </div>

    <div class="card">
        <h3>📋 Danh sách phim đang chiếu</h3>
        <table class="table-pdc">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã phim</th>
                    <th>Tên phim</th>
                    <th>Hình ảnh</th>
                    <th>Mã loại</th>
                    <th>Mã xuất chiếu</th>
                    <th>Ngày chiếu</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($data["dulieu"])): ?>
                <?php $i=1; foreach ($data["dulieu"] as $row): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row["maPhim"] ?></td>
                    <td><?= $row["tenPhim"] ?></td>
                    <td><img src="/rapphim/Public/IMG/<?= $row["hinhAnh"] ?>" class="imgPhim"></td>
                    <td><?= $row["maLoai"] ?></td>
                    <td><?= $row["maXuatchieu"] ?></td>
                    <td><?= $row["ngayChieu"] ?></td>
                    <td>
                        <button class="btnSua" 
                            onclick="loadPhim('<?= $row['maPhim'] ?>','<?= $row['tenPhim'] ?>','<?= $row['maLoai'] ?>','<?= $row['maXuatchieu'] ?>','<?= $row['ngayChieu'] ?>')">
                            ✏️ Sửa
                        </button>
                        <a href="/rapphim/QliPDC/xoa/<?= $row['maPhim'] ?>" 
                            onclick="return confirm('Bạn có chắc muốn xóa phim này không?')" 
                            class="btnXoa">
                            🗑️ Xóa
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">Không có dữ liệu phim đang chiếu.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>


</body>
</html>
