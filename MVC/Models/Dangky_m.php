<?php
class Dangky_m extends connectDB {

    public function checkEmail($email) {
        $query = "SELECT * FROM khachhang WHERE Email = ?";
        $stmt = $this->con->prepare($query); // dùng $this->con thay vì $this->conn
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function insertTaiKhoan($hoten, $email, $sdt, $matkhau) {
        $maThanhvien = uniqid("TV_");
        $matKhauMoi = password_hash($matkhau, PASSWORD_DEFAULT);

        $query = "INSERT INTO khachhang (maThanhvien, soDienthoai, Email, tenThanhvien, matKhau)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("sssss", $maThanhvien, $sdt, $email, $hoten, $matKhauMoi);
        return $stmt->execute();
    }
}
?>
