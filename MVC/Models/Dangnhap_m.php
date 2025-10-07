<?php
class Dangnhap_m extends connectDB {

    public function dangnhapKhachHang($email, $matkhau) {
        $sql = "SELECT * FROM khachhang WHERE Email='$email'";
        $dl = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($dl) > 0) {
            $row = mysqli_fetch_assoc($dl);

            // Kiểm tra cả 2 trường hợp: mã hóa hoặc thường
            if (password_verify($matkhau, $row['matKhau']) || $matkhau == $row['matKhau']) {
                return true;
            }
        }
        return false;
    }

    public function dangnhapNhanVien($email, $matkhau) {
        $sql = "SELECT * FROM nhanvien WHERE Email='$email'";
        $dl = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($dl) > 0) {
            $row = mysqli_fetch_assoc($dl);

            // Kiểm tra cả 2 trường hợp
            if (password_verify($matkhau, $row['matKhau']) || $matkhau == $row['matKhau']) {
                return true;
            }
        }
        return false;
    }

    public function dangnhapQuanly($email, $matkhau) {
        $sql = "SELECT * FROM quanly WHERE Email='$email'";
        $dl = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($dl) > 0) {
            $row = mysqli_fetch_assoc($dl);

            // Kiểm tra cả 2 trường hợp
            if (password_verify($matkhau, $row['matKhau']) || $matkhau == $row['matKhau']) {
                return true;
            }
        }
        return false;
    }
}
?>
