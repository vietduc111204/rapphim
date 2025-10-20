<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thống kê vé</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/thongke.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- Nút quay lại -->
    <div class="nav-buttons-left">
        <a href="http://localhost/rapphim/HomeQuanly">
            <button><i class="fa-solid fa-house"></i> Quay lại trang chủ</button>
        </a>
    </div>

    <!-- Bộ lọc thống kê -->
    <div class="search-add-container">
        <form method="post" action="http://localhost/rapphim/Thongke/Get_data">
            <input type="date" name="ngayChieu" class="input-field" placeholder="Ngày chiếu">
            <input type="text" name="maPhim" class="input-field" placeholder="Mã phim">
            <input type="text" name="maXuatChieu" class="input-field" placeholder="Mã xuất chiếu">
            <button name="btnTimkiem"><i class="fa-solid fa-search"></i> Tìm kiếm</button>
            <button type="submit" name="btnLamMoi"><i class="fa-solid fa-rotate-left"></i> Làm mới</button>
        </form>
    </div>

    <!-- Bảng thống kê -->
    <div class="content">
        <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã vé</th>
                <th>Mã phim</th>
                <th>Mã suất chiếu</th>
                <th>Thời gian đặt</th>
                <th>Ngày chiếu</th> 
                <th>Số ghế</th>                
                <th>Số lượng vé</th>
                <th>Giá vé</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
            <tbody>
            <?php 
                $tongGhe = 0;
                $tongVe = 0;
                $tongTien = 0;
                if (!empty($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0): 
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($data['dulieu'])):
                        $soLuong = isset($row['soLuong']) ? (int)$row['soLuong'] : 0;
                        $soGhe = isset($row['soGhe']) ? (int)$row['soGhe'] : 0;
                        $giaVe = isset($row['giaVe']) ? (float)$row['giaVe'] : 0;
                        $thanhTien = $soLuong * $giaVe;
                        $tongGhe += $soGhe;
                        $tongVe += $soLuong;
                        $tongTien += $thanhTien;

                ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= htmlspecialchars($row['maVe'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['maPhim'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['maXuatchieu'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['thoiGiandat'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['ngayChieu'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['soGhe'] ?? '') ?></td>
                        <td><?= $soLuong ?></td>
                        <td><?= number_format($giaVe) ?> VNĐ</td>
                        <td><?= number_format($thanhTien) ?> VNĐ</td>
                    </tr>
                <?php endwhile; ?>
                    <tr style="font-weight: bold; background-color: #f2f2f2;">
                        <td colspan="6">Tổng cộng</td>
                        <td><?= $tongGhe ?></td>
                        <td><?= $tongVe ?></td>
                        <td></td>
                        <td><?= number_format($tongTien) ?> VNĐ</td>
                    </tr>
                <?php else: ?>
                    <tr><td colspan="9">Không có dữ liệu vé.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
