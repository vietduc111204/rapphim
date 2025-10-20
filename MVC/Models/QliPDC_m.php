<?php
class QliPDC_m extends connectDB {
    function getAll() {
        $sql = "SELECT * FROM phim";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function them($maphim, $tenphim, $hinhanh, $maloai, $maxuatchieu, $ngaychieu) {
        $sql = "INSERT INTO phim (maPhim, tenPhim, hinhAnh, maLoai, maXuatchieu, ngayChieu)
                VALUES ('$maphim', '$tenphim', '$hinhanh', '$maloai', '$maxuatchieu', '$ngaychieu')";
        return mysqli_query($this->con, $sql);
    }

    function sua($maphim, $tenphim, $hinhanh, $maloai, $maxuatchieu, $ngaychieu) {
        // Nếu có hình ảnh mới
        if ($hinhanh != "") {
            $sql = "UPDATE phim 
                    SET tenPhim='$tenphim', hinhAnh='$hinhanh', maLoai='$maloai', 
                        maXuatchieu='$maxuatchieu', ngayChieu='$ngaychieu'
                    WHERE maPhim='$maphim'";
        } else {
            // Nếu không đổi ảnh
            $sql = "UPDATE phim 
                    SET tenPhim='$tenphim', maLoai='$maloai', 
                        maXuatchieu='$maxuatchieu', ngayChieu='$ngaychieu'
                    WHERE maPhim='$maphim'";
        }
        return mysqli_query($this->con, $sql);
    }

    function xoa($maphim) {
        $sql = "DELETE FROM phim WHERE maPhim='$maphim'";
        return mysqli_query($this->con, $sql);
    }

    public function taoMaTuDong() {
        // Lấy tất cả mã phim đã có
        $sql = "SELECT maPhim FROM phim ORDER BY maPhim ASC";
        $result = mysqli_query($this->con, $sql);
        $allMa = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $allMa[] = (int)substr($row['maPhim'], 2); // chỉ lấy số
        }

        // Tìm số nhỏ nhất còn thiếu
        $num = 1;
        while (in_array($num, $allMa)) {
            $num++;
        }

        return "MP" . str_pad($num, 3, "0", STR_PAD_LEFT);
    }


    public function getAllMaLoai() {
        $sql = "SELECT maLoai, tenLoai FROM theloai";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                "maLoai" => $row["maLoai"],
                "tenLoai" => $row["tenLoai"]
            ];
        }
        return $data;
    }

    public function getAllMaXuatChieu() {
        $sql = "SELECT maXuatchieu FROM xuatchieu";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row["maXuatchieu"];
        }
        return $data;
    }

    public function getPhimDangChieu() {
        $sql = "SELECT * FROM phim WHERE ngayChieu >= CURDATE()";
        $result = mysqli_query($this->con, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}
?>
