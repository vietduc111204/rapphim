<?php
class Qlitaikhoannhanvien_m extends connectDB {
    function hienthi() {
        return mysqli_query($this->con, "SELECT * FROM nhanvien");
    }
    function timkiem($keyword) {
        $keyword = mysqli_real_escape_string($this->con, $keyword);

        $sql = "SELECT * FROM nhanvien 
                WHERE maNhanvien LIKE '%$keyword%' 
                OR tenNhanvien LIKE '%$keyword%' 
                OR Email LIKE '%$keyword%'";

        return mysqli_query($this->con, $sql);
    }

    function sua($data) {
        $sql = "UPDATE nhanvien SET 
                    maNhanvien = '{$data['maNhanvien']}', 
                    tenNhanvien = '{$data['tenNhanvien']}', 
                    soDienthoai = '{$data['soDienthoai']}', 
                    diaChi = '{$data['diaChi']}', 
                    Email = '{$data['Email']}', 
                    matKhau = '{$data['matKhau']}'
                WHERE maNhanvien = '{$data['maNhanvienCu']}'";
        return mysqli_query($this->con, $sql);
    }

    function them($data) {
        // 1️⃣ Kiểm tra email đã tồn tại chưa
        $email = mysqli_real_escape_string($this->con, $data['Email']);
        $check = "SELECT * FROM nhanvien WHERE Email = '$email'";
        $result = mysqli_query($this->con, $check);
    
        if (mysqli_num_rows($result) > 0) {
            // 2️⃣ Báo lỗi và không thêm
            echo "<script>alert('Email này đã được sử dụng cho một nhân viên khác!');</script>";
            return false;
        }
    
        // 3️⃣ Mã hóa mật khẩu (nếu bạn muốn bảo mật hơn)
        $matKhauHash = password_hash($data['matKhau'], PASSWORD_DEFAULT);
    
        // 4️⃣ Thực hiện thêm dữ liệu
        $sql = "INSERT INTO nhanvien(maNhanvien, tenNhanvien, soDienthoai, diaChi, Email, matKhau)
                VALUES (
                    '{$data['maNhanvien']}', 
                    '{$data['tenNhanvien']}', 
                    '{$data['soDienthoai']}', 
                    '{$data['diaChi']}', 
                    '{$data['Email']}', 
                    '$matKhauHash')";
    
        return mysqli_query($this->con, $sql);
    }
    

    function xoa($maNhanvien) {
        $sql = "DELETE FROM nhanvien WHERE maNhanvien = '$maNhanvien'";
        return mysqli_query($this->con, $sql);
    }

    function Checkdl($data) {
        foreach ($data as $key => $value) {
            if (trim($value) === '') {
                echo "<script>alert('Không được để trống!')</script>";
                echo "<script>window.history.back()</script>";
                return false;
            }
        }
        return true;
    }

    function layTheoEmail($email) {
        $email = mysqli_real_escape_string($this->con, $email);
        $sql = "SELECT * FROM nhanvien WHERE Email = '$email'";
        return mysqli_query($this->con, $sql);
    }
}
?>
