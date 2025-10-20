<?php
class Qlitaikhoankhachhang_m extends connectDB {
    function hienthi() {
        return mysqli_query($this->con, "SELECT * FROM khachhang");
    }

    function timkiem($maTV) {
        $sql = "SELECT * FROM khachhang WHERE maThanhvien = '$maTV'";
        return mysqli_query($this->con, $sql);
    }

    function sua($data) {
        $sql = "UPDATE khachhang SET 
                    maThanhvien = '{$data['maThanhvien']}', 
                    tenThanhvien = '{$data['tenThanhvien']}', 
                    soDienthoai = '{$data['soDienthoai']}', 
                    Email = '{$data['Email']}', 
                    matKhau = '{$data['matKhau']}'
                WHERE maThanhvien = '{$data['maThanhvienCu']}'";
        return mysqli_query($this->con, $sql);
    }

    function xoa($maThanhvien) {
        $sql = "DELETE FROM khachhang WHERE maThanhvien = '$maThanhvien'";
        return mysqli_query($this->con, $sql);
    }

    function Checkdl($data) {
        foreach ($data as $key => $value) {
            if ($key !== 'maThanhvienCu' && trim($value) === '') {
                echo "<script>alert('Không được để trống!')</script>";
                echo "<script>window.history.back()</script>";
                return false;
            }
        }
        return true;
    }

    function layTheoEmail($email) {
        $email = mysqli_real_escape_string($this->con, $email);
        $sql = "SELECT * FROM khachhang WHERE Email = '$email'";
        return mysqli_query($this->con, $sql);
    }
}
?>
