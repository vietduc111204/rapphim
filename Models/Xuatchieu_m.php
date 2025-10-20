<?php
class XuatChieu_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // ✅ Lấy danh sách các suất chiếu kèm phim
    public function getDanhSachXuatChieu() {
        $sql = "SELECT 
                    xc.maXuatChieu,
                    xc.ngayChieu,
                    xc.thoiGianChieu,
                    p.tenPhim,
                    ph.tenPhong
                FROM xuatchieu xc
                INNER JOIN phim p ON xc.maPhim = p.maPhim
                INNER JOIN phong ph ON xc.maPhong = ph.maPhong
                ORDER BY xc.maXuatChieu DESC";

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

    // ✅ Lấy chi tiết 1 suất chiếu
    public function getXuatChieuById($maXuatChieu) {
        $sql = "SELECT * FROM xuatchieu WHERE maXuatChieu = '$maXuatChieu'";
        $result = mysqli_query($this->con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    // ✅ Thêm suất chiếu mới
    public function themXuatChieu($maPhim, $ngayChieu, $thoiGianChieu, $maPhong) {
        $sql = "INSERT INTO xuatchieu(maPhim, ngayChieu, thoiGianChieu, maPhong)
                VALUES ('$maPhim', '$ngayChieu', '$thoiGianChieu', '$maPhong')";
        return mysqli_query($this->con, $sql);
    }

    // ✅ Xóa suất chiếu
    public function xoaXuatChieu($maXuatChieu) {
        $sql = "DELETE FROM xuatchieu WHERE maXuatChieu = '$maXuatChieu'";
        return mysqli_query($this->con, $sql);
    }

    // ✅ Sửa suất chiếu
    public function suaXuatChieu($maXuatChieu, $maPhim, $ngayChieu, $thoiGianChieu, $maPhong) {
        $sql = "UPDATE xuatchieu 
                SET maPhim = '$maPhim',
                    ngayChieu = '$ngayChieu',
                    thoiGianChieu = '$thoiGianChieu',
                    maPhong = '$maPhong'
                WHERE maXuatChieu = '$maXuatChieu'";
        return mysqli_query($this->con, $sql);
    }

    // ✅ Lấy mã suất chiếu dựa theo phim, ngày và giờ chiếu (dùng trong ThanhToan)
    public function getMaXuatChieu($ngayChieu, $thoiGianChieu, $tenPhim) {
    $sql = "SELECT xc.maXuatChieu 
            FROM xuatchieu xc
            INNER JOIN phim p ON xc.maPhim = p.maPhim
            WHERE p.tenPhim = '$tenPhim'
              AND xc.ngayChieu = '$ngayChieu'
              AND xc.thoiGianChieu = '$thoiGianChieu'
            LIMIT 1";

    $result = mysqli_query($this->con, $sql);

    if (!$result) {
        die("❌ Lỗi SQL getMaXuatChieu: " . mysqli_error($this->con) . "<br>⚙️ Câu truy vấn: $sql");
    }

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['maXuatChieu'];
    }
    return null;
}


}
?>
