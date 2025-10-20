<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí tài khoản</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/qlitaikhoan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="header">
        <h2>Tài khoản khách hàng</h2>
    </div>

    <!-- Nút quay lại trang chủ -->
    <div class="nav-buttons-left">
        <a href="http://localhost/rapphim/Qlitaikhoanquanly">
            <button><i class="fa-solid fa-house"></i> Quay lại trang chủ</button>
        </a>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo htmlspecialchars($row['maThanhvien']); ?></td>
                        <td><?php echo htmlspecialchars($row['tenThanhvien']); ?></td>
                        <td><?php echo htmlspecialchars($row['soDienthoai']); ?></td>
                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                        <td><?php echo htmlspecialchars($row['matKhau']); ?></td>
                        <td>
                            <a href="http://localhost/rapphim/Qlitaikhoankhachhangxem/sua/<?php echo urlencode($row['maThanhvien']); ?>" class="btnsua">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="http://localhost/rapphim/Qlitaikhoankhachhangxem/xoa/<?php echo urlencode($row['maThanhvien']); ?>" class="btnsua" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                    <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="8" style="text-align:center;">Không có dữ liệu khách hàng.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
