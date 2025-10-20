<?php
class Ve_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // ✅ Lấy danh sách vé đã đặt
    public function getDanhSachVe() {
        $sql = "SELECT 
                    ve.maVe,
                    ve.maGhe,
                    ve.tongTien,
                    phim.tenPhim,
                    xuatchieu.ngayChieu,
                    xuatchieu.thoiGianChieu AS gioChieu
                FROM ve
                INNER JOIN phim ON ve.maPhim = phim.maPhim
                INNER JOIN xuatchieu ON ve.maXuatchieu = xuatchieu.maXuatchieu
                ORDER BY ve.maVe DESC";
        
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            echo '❌ Lỗi SQL: ' . mysqli_error($this->con);
            return [];
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    // ✅ Tạo mã vé mới dạng VE001, VE002...
    private function taoMaVeMoi() {
        $sql = "SELECT maVe FROM ve ORDER BY maVe DESC LIMIT 1";
        $result = mysqli_query($this->con, $sql);
        $lastId = "VE000";
        if ($row = mysqli_fetch_assoc($result)) {
            $lastId = $row['maVe'];
        }

        $num = intval(substr($lastId, 2)) + 1;
        return "VE" . str_pad($num, 3, "0", STR_PAD_LEFT);
    }

    // ✅ Lưu vé vào DB
    public function themVe($maGhe, $maXuatChieu, $maPhim, $tongTien) {
    $sql = "INSERT INTO ve(maGhe, tongTien, maXuatChieu, maPhim)
            VALUES ('$maGhe', '$tongTien', '$maXuatChieu', '$maPhim')";
    if (!mysqli_query($this->con, $sql)) {
        echo '❌ Lỗi thêm vé: ' . mysqli_error($this->con);
        return false;
    }
    return true;
}


}
?>
