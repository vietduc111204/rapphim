<?php
class QliXuatChieu_m extends connectDB {

    function getAll() {
        $sql = "SELECT * FROM xuatchieu";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function them($maxuatchieu, $ngaychieu, $thoigianchieu, $maphong) {
        $sql = "INSERT INTO xuatchieu (maXuatchieu, ngayChieu, thoiGianchieu, maPhong)
                VALUES ('$maxuatchieu', '$ngaychieu', '$thoigianchieu', '$maphong')";
        return mysqli_query($this->con, $sql);
    }

    function sua($maxuatchieu, $ngaychieu, $thoigianchieu, $maphong) {
        $sql = "UPDATE xuatchieu 
                SET ngayChieu='$ngaychieu', thoiGianchieu='$thoigianchieu', maPhong='$maphong'
                WHERE maXuatchieu='$maxuatchieu'";
        return mysqli_query($this->con, $sql);
    }


    function xoa($maxuatchieu) {
        $sql = "DELETE FROM xuatchieu WHERE maXuatchieu='$maxuatchieu'";
        return mysqli_query($this->con, $sql);
    }

    public function taoMaTuDong() {
        // Lấy tất cả mã xuất chiếu, sắp xếp tăng dần
        $sql = "SELECT maXuatchieu FROM xuatchieu ORDER BY maXuatchieu ASC";
        $result = mysqli_query($this->con, $sql);

        $allMa = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $allMa[] = (int)substr($row['maXuatchieu'], 2); // chỉ lấy số
        }

        // Tìm số nhỏ nhất còn thiếu
        $num = 1;
        while (in_array($num, $allMa)) {
            $num++;
        }

        return "XC" . str_pad($num, 3, "0", STR_PAD_LEFT);
    }
    function getAllPhong() {
        $sql = "SELECT maPhong FROM phong";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

}
?>
