<?php
class PhimDangChieu_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // ✅ Lấy toàn bộ danh sách phim
    public function getDanhSachPhim() {
        $sql = "SELECT * FROM phim";
        $result = mysqli_query($this->con, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // PhimDangChieu_m.php — chỉ phần function
public function getSuatChieuTheoPhim($maPhim) {
    $maPhim = mysqli_real_escape_string($this->con, $maPhim);

    $sql = "SELECT x.maXuatChieu, x.ngayChieu, x.thoigianchieu, x.maPhong
        FROM xuatchieu x
        INNER JOIN phim p ON x.maXuatChieu = p.maXuatChieu
        WHERE p.maPhim = '$maPhim'
        ORDER BY x.ngayChieu ASC, x.thoigianchieu ASC";


    $result = mysqli_query($this->con, $sql);
    if (!$result) return [];

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ngay = $row['ngayChieu'];
        if (!isset($data[$ngay])) $data[$ngay] = [];
            $data[$ngay][] = [
            'gioChieu' => $row['thoigianchieu'],
            'maXuatChieu' => $row['maXuatChieu'],
            'maPhong' => $row['maPhong']
        ];

    }
    return $data;
}

}
?>
