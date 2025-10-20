<?php
class QliTheloai_m extends connectDB {

    // Hiển thị tất cả thể loại
    public function hienthi() {
        $sql = "SELECT * FROM theloai ORDER BY maLoai DESC";
        $result = mysqli_query($this->con, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function taoMaTuDong() {
        // Lấy tất cả mã loại hiện có, sắp xếp theo thứ tự tăng dần
        $sql = "SELECT maLoai FROM theloai ORDER BY maLoai ASC";
        $result = mysqli_query($this->con, $sql);
        $allMa = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $allMa[] = (int)substr($row['maLoai'], 2); // chỉ lấy phần số
        }

        // Tìm số nhỏ nhất còn thiếu
        $num = 1;
        while (in_array($num, $allMa)) {
            $num++;
        }

        // Tạo mã mới
        $maMoi = "ML" . str_pad($num, 3, "0", STR_PAD_LEFT);

        return $maMoi;
    }

// Thêm thể loại
public function them($tenLoai) {
    $maLoai = $this->taoMaTuDong();
    $sql = "INSERT INTO theloai (maLoai, tenLoai) VALUES ('$maLoai', '$tenLoai')";
    return mysqli_query($this->con, $sql);
}

    // Sửa thể loại
    public function sua($maLoai, $tenLoai) {
        $sql = "UPDATE theloai SET tenLoai='$tenLoai' WHERE maLoai='$maLoai'";
        return mysqli_query($this->con, $sql);
    }

    // Xóa thể loại
    public function xoa($maLoai) {
        $sql = "DELETE FROM theloai WHERE maLoai='$maLoai'";
        return mysqli_query($this->con, $sql);
    }
    //Lấy theo mã loại  
    public function layTheoMa($maLoai) {
    $sql = "SELECT * FROM theloai WHERE maLoai = '$maLoai'";
    $result = mysqli_query($this->con, $sql);
    return mysqli_fetch_assoc($result);
}

}
?>
