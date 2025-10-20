<?php
class Ghe_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // ✅ Lấy danh sách ghế theo mã suất chiếu
    public function getGheTheoXuatChieu($maXuatChieu) {
        $sql = "SELECT * FROM ghe WHERE maXuatChieu = '$maXuatChieu'";
        $result = mysqli_query($this->con, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    // ✅ Cập nhật trạng thái ghế (ví dụ: khi đặt vé)
    public function capNhatTrangThaiGhe($maGhe, $trangThai) {
        $sql = "UPDATE ghe SET trangThai = '$trangThai' WHERE maGhe = '$maGhe'";
        return mysqli_query($this->con, $sql);
    }

    // ✅ Kiểm tra ghế đã được đặt chưa
    public function kiemTraGheDaDat($maGhe) {
        $sql = "SELECT trangThai FROM ghe WHERE maGhe = '$maGhe'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return ($row && $row['trangThai'] === 'Đã đặt');
    }
}
?>
