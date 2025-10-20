<?php
class Qlitaikhoanquanly_m extends connectDB {
    function hienthi() {
        return mysqli_query($this->con, "SELECT * FROM quanly");
    }

    function timkiem($maNV) {
        $sql = "SELECT * FROM quanly WHERE maQuanly = '$maNV'";
        return mysqli_query($this->con, $sql);
    }

    function sua($data) {
        $sql = "UPDATE quanly SET 
                    maQuanly = '{$data['maQuanly']}', 
                    tenQuanly = '{$data['tenQuanly']}', 
                    soDienthoai = '{$data['soDienthoai']}', 
                    diaChi = '{$data['diaChi']}', 
                    Email = '{$data['Email']}', 
                    matKhau = '{$data['matKhau']}'
                WHERE maQuanly = '{$data['maQuanlyCu']}'";
        return mysqli_query($this->con, $sql);
    }

    function Checkdl($data) {
        foreach ($data as $key => $value) {
            if ($key !== 'maQuanlyCu' && trim($value) === '') {
                echo "<script>alert('Không được để trống!')</script>";
                echo "<script>window.history.back()</script>";
                return false;
            }
        }
        return true;
    }
}
?>
