<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin khách hàng</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/qlitaikhoan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="header">
        <h2>Sửa thông tin khách hàng</h2>
    </div>

    <!-- Nút quay lại -->
    <div class="nav-buttons-left">
        <a href="http://localhost/rapphim/Qlitaikhoankhachhang">
            <button><i class="fa-solid fa-rotate-left"></i> Quay lại danh sách</button>
        </a>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/rapphim/Qlitaikhoankhachhang/suadl">
            <table>
                <?php 
                if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                    while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                ?>
                <input type="hidden" name="txtMaThanhvienCu" value="<?php echo $row['maThanhvien']; ?>">

                <tr>
                    <td>Mã khách hàng:</td>
                    <td>
                        <input type="text" name="txtMaThanhvien" class="input-field" value="<?php echo $row['maThanhvien']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên khách hàng:</td>
                    <td>
                        <input type="text" name="txtTenThanhvien" class="input-field" value="<?php echo $row['tenThanhvien']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td>
                        <input type="number" name="txtSdt" class="input-field" value="<?php echo $row['soDienthoai']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="txtEmail" class="input-field" value="<?php echo $row['Email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td>
                        <input type="text" name="txtMatkhau" class="input-field" value="<?php echo $row['matKhau']; ?>">
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="btnsua" name="btnSua">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
