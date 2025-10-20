<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí tài khoản nhân viên</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/qlitaikhoan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="header">
        <h2>Tài khoản nhân viên</h2>
    </div>

    <div class="nav-buttons-left">
        <a href="http://localhost/rapphim/Homenhanvien">
            <button><i class="fa-solid fa-house"></i> Quay lại trang chủ</button>
        </a>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0): ?>
                    <?php $i = 0; ?>
                    <?php while ($row = mysqli_fetch_assoc($data['dulieu'])): ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo htmlspecialchars($row['maNhanvien']); ?></td>
                            <td><?php echo htmlspecialchars($row['tenNhanvien']); ?></td>
                            <td><?php echo htmlspecialchars($row['soDienthoai']); ?></td>
                            <td><?php echo htmlspecialchars($row['diaChi']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['matKhau']); ?></td>
                            <td>
                                <a href="http://localhost/rapphim/Qlitaikhoannhanvien/sua/<?php echo urlencode($row['maNhanvien']); ?>" class="btnsua">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Không có dữ liệu nhân viên.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
