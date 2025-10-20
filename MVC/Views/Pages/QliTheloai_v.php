<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rạp Phim</title>
    <link rel="stylesheet" href="/rapphim/Public/CSS/qlitheloai.css">
</head>
<body>
    <a href="/rapphim/HomeNhanvien" class="btnQuayLai">← Quay lại trang chủ</a>
    <h2 class="title">🎬 Quản lý Thể Loại Phim</h2>

    <!-- Form thêm/sửa -->
    <form method="POST" action="<?php echo isset($data['edit']) ? '/rapphim/QliTheloai/edit/'.$data['edit']['maLoai'] : '/rapphim/QliTheloai/add'; ?>" class="form-theloai">
        <input type="text" name="tenLoai" class="txtTenloai" placeholder="Nhập tên thể loại..." required value="<?php echo $data['edit']['tenLoai'] ?? ''; ?>">
        <button type="submit" name="submit" class="<?php echo isset($data['edit']) ? 'btnSua' : 'btnThem'; ?>">
            <?php echo isset($data['edit']) ? 'Cập nhật' : 'Thêm mới'; ?>
        </button>
    </form>

    <!-- Danh sách thể loại -->
    <table class="table-theloai">
        <thead>
            <tr>
                <th>Mã Loại</th>
                <th>Tên Thể Loại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($data["data"])): ?>
            <?php foreach ($data["data"] as $row): ?>
            <tr>
                <td><?= $row["maLoai"] ?></td>
                <td><?= $row["tenLoai"] ?></td>
                <td>
                    <a href="/rapphim/QliTheloai/edit/<?= $row["maLoai"] ?>" class="btnSua">Sửa</a>
                    <a href="/rapphim/QliTheloai/delete/<?= $row["maLoai"] ?>" class="btnXoa" onclick="return confirm('Xóa thể loại này?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3">Không có dữ liệu thể loại.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
