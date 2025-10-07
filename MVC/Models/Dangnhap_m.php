<?php 
class Dangnhap_m extends connectDB {

    public function dangnhapKhachHang($email, $matkhau) {
        $sql = "SELECT * FROM khachhang WHERE Email='$email' AND matKhau='$matkhau'";
        $dl = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($dl) > 0) {
            $kq = true;
        }
        return $kq;
    }

    public function dangnhapNhanVien($email, $matkhau) {
        $sql = "SELECT * FROM nhanvien WHERE Email='$email' AND matKhau='$matkhau'";
        $dl = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($dl) > 0) {
            $kq = true;
        }
        return $kq;
    }

    public function dangnhapQuanly($email, $matkhau) {
        $sql = "SELECT * FROM quanly WHERE Email='$email' AND matKhau='$matkhau'";
        $dl = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($dl) > 0) {
            $kq = true;
        }
        return $kq;
    }
}
?>
