<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm tài khoản nhân viên</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/qlitaikhoan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="header">
        <h2>Thêm tài khoản nhân viên</h2>
    </div>

    <!-- Nút quay lại -->
    <div class="nav-buttons-left">
        <a href="http://localhost/rapphim/Qlitaikhoanquanly">
            <button><i class="fa-solid fa-rotate-left"></i> Quay lại danh sách</button>
        </a>
    </div>

    <div class="content">
        <form method="post" action="http://localhost/rapphim/Qlitaikhoannhanvienxem/themdl">
            <table>
                <tr>
                    <td>Mã nhân viên:</td>
                    <td><input type="text" name="txtMaNhanvien" class="input-field"></td>
                </tr>
                <tr>
                    <td>Tên nhân viên:</td>
                    <td><input type="text" name="txtTenNhanvien" class="input-field"></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="number" name="txtSdt" class="input-field"></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="txtDiachi" class="input-field"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="txtEmail" class="input-field"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="text" name="txtMatkhau" class="input-field"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="btnsua" name="btnThem">
                            <i class="fa-solid fa-plus"></i> Thêm
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
