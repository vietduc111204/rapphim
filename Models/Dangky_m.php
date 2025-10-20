<?php
class Dangky_m extends connectDB {

    // Kiểm tra email đã tồn tại chưa
    public function checkEmail($email) {
        $query = "SELECT * FROM khachhang WHERE Email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    // Thêm tài khoản mới (có mã hóa mật khẩu)
    public function insertTaiKhoan($hoten, $email, $sdt, $matkhau) {
        $maThanhvien = uniqid("TV_");

        // ✅ Mã hóa mật khẩu tại model
        $matKhauMoi = password_hash($matkhau, PASSWORD_DEFAULT);

        $query = "INSERT INTO khachhang (maThanhvien, soDienthoai, Email, tenThanhvien, matKhau)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("sssss", $maThanhvien, $sdt, $email, $hoten, $matKhauMoi);
        return $stmt->execute();
    }
}
?>
