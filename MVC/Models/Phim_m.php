<?php
class Phim_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // Lấy danh sách tất cả phim
    public function getDanhSachPhim() {
        $sql = "SELECT * FROM phim ORDER BY maPhim DESC";
        $result = mysqli_query($this->con, $sql);

        if (!$result) {
            echo "Lỗi SQL: " . mysqli_error($this->con);
            return [];
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Lấy thông tin 1 phim theo mã
    public function getPhimById($maPhim) {
        $sql = "SELECT * FROM phim WHERE maPhim = '$maPhim'";
        $result = mysqli_query($this->con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }
    // ✅ Lấy mã phim theo tên phim (dùng cho thanh toán)
public function getMaPhimTheoTen($tenPhim) {
    $sql = "SELECT maPhim FROM phim WHERE tenPhim = '$tenPhim' LIMIT 1";
    $result = mysqli_query($this->con, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['maPhim'];
    }
    return null;
}

  
}
?>
