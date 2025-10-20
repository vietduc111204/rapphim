<?php
class DatGhe_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // ✅ Cập nhật hoặc thêm mới trạng thái ghế
    public function capNhatTrangThai($maGhe, $maXuatChieu, $trangThai) {
        // Kiểm tra xem ghế đó đã tồn tại trong datghe chưa
        $check = "SELECT * FROM datghe WHERE maGhe='$maGhe' AND maXuatChieu='$maXuatChieu'";
        $result = mysqli_query($this->con, $check);

        if (mysqli_num_rows($result) > 0) {
            // Nếu có rồi thì UPDATE
            $sql = "UPDATE datghe 
                    SET trangThai = '$trangThai' 
                    WHERE maGhe = '$maGhe' AND maXuatChieu = '$maXuatChieu'";
        } else {
            // Nếu chưa có thì INSERT mới
            $sql = "INSERT INTO datghe(maGhe, maXuatChieu, trangThai) 
                    VALUES('$maGhe', '$maXuatChieu', '$trangThai')";
        }

        if (!mysqli_query($this->con, $sql)) {
            echo "❌ Lỗi SQL capNhatTrangThai: " . mysqli_error($this->con);
            return false;
        }
        return true;
    }
}
?>
