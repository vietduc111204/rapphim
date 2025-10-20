<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin quản lý</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/qlitaikhoan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="header">
        <h2>Sửa thông tin quản lý</h2>
    </div>

    <!-- Nút quay lại -->
    <div class="nav-buttons-left">
        <a href="http://localhost/rapphim/Qlitaikhoanquanly">
            <button><i class="fa-solid fa-rotate-left"></i> Quay lại danh sách</button>
        </a>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/rapphim/Qlitaikhoanquanly/suadl">
            <table>
                <?php 
                if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                    $row = mysqli_fetch_assoc($data['dulieu']);
                ?>
                <input type="hidden" name="txtMaQuanlyCu" value="<?php echo htmlspecialchars($row['maQuanly']); ?>">

                <tr>
                    <td>Mã quản lý:</td>
                    <td><input type="text" name="txtMaQuanly" class="input-field" value="<?php echo htmlspecialchars($row['maQuanly']); ?>"></td>
                </tr>
                <tr>
                    <td>Tên quản lý:</td>
                    <td><input type="text" name="txtTenQuanly" class="input-field" value="<?php echo htmlspecialchars($row['tenQuanly']); ?>"></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="number" name="txtSdt" class="input-field" value="<?php echo htmlspecialchars($row['soDienthoai']); ?>"></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="txtDiachi" class="input-field" value="<?php echo htmlspecialchars($row['diaChi']); ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="txtEmail" class="input-field" value="<?php echo htmlspecialchars($row['Email']); ?>"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="text" name="txtMatkhau" class="input-field" value="<?php echo htmlspecialchars($row['matKhau']); ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="btnsua" name="btnSua">
                            <i class="fa-solid fa-pen"></i> Sửa
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </form>
    </div>

</body>
</html>
