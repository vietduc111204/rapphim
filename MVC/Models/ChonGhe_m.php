<?php
class ChonGhe_m {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($this->con, "utf8");
    }

    // ✅ Lấy tên phim từ maPhim
    public function layTenPhim($maPhim) {
        $sql = "SELECT tenPhim FROM phim WHERE maPhim = '$maPhim'";
        $result = mysqli_query($this->con, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['tenPhim'];
        }
        return 'Không rõ';
    }

    // ✅ Lấy mã suất chiếu, ngày chiếu và giờ chiếu từ maPhim
  public function layThongTinXuatChieu($maPhim) {
    $sql = "SELECT x.maXuatChieu, x.ngayChieu, x.thoigianChieu, x.maPhong
            FROM phim p
            JOIN xuatchieu x ON p.maXuatChieu = x.maXuatChieu
            WHERE p.maPhim = '$maPhim'
            LIMIT 1";
    $result = mysqli_query($this->con, $sql);
    if (!$result) die('Lỗi SQL: ' . mysqli_error($this->con));
    return mysqli_fetch_assoc($result);
}


    // ✅ Kiểm tra xem suất chiếu đã có trạng thái ghế chưa
    public function kiemTraGheDaTao($maXuatChieu) {
        $sql = "SELECT COUNT(*) as total FROM datghe WHERE maXuatChieu = '$maXuatChieu'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] > 0;
    }

    // ✅ Lấy danh sách ghế của phòng
    public function layGheTheoPhong($maPhong) {
        $sql = "SELECT * FROM ghe WHERE maPhong = '$maPhong'";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // ✅ Thêm trạng thái ghế (khi tạo mới suất chiếu)
    public function themTrangThaiGhe($maXuatChieu, $maGhe) {
        $sql = "INSERT INTO datghe (maXuatChieu, maGhe, trangThai) VALUES ('$maXuatChieu', '$maGhe', 'trong')";
        return mysqli_query($this->con, $sql);
    }

    // ✅ Lấy danh sách ghế kèm trạng thái
    public function layTrangThaiGhe($maXuatChieu, $maPhong) {
        $sql = "SELECT g.*, d.trangThai
                FROM ghe g
                JOIN datghe d ON g.maGhe = d.maGhe
                WHERE g.maPhong = '$maPhong' AND d.maXuatChieu = '$maXuatChieu'";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // ✅ Tạo ghế cho phòng (10x10)
    public function taoGheChoPhong($maPhong) {
        $hangs = range('A', 'J');
        $soCot = 10;

        foreach ($hangs as $hangIndex => $hang) {
            for ($cot = 1; $cot <= $soCot; $cot++) {
                $maGhe = $hang . $cot;
                $loai = 'thuong';
                if ($hangIndex >= 2 && $hangIndex <= 7) $loai = 'vip';
                elseif ($hangIndex >= 8) $loai = 'sweetbox';

                $sql = "INSERT INTO ghe (maGhe, maPhong, hang, cot, loai)
                        VALUES ('$maGhe', '$maPhong', '$hang', $cot, '$loai')";
                mysqli_query($this->con, $sql);
            }
        }
    }

    // ✅ Kiểm tra phòng có ghế chưa
    public function phongDaCoGhe($maPhong) {
        $sql = "SELECT COUNT(*) as total FROM ghe WHERE maPhong = '$maPhong'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] > 0;
    }

    // ✅ Tạo phòng mới
    public function taoPhongMoi() {
        $result = mysqli_query($this->con, "SELECT maPhong FROM phong");
        $dsMaPhong = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $dsMaPhong[] = $row['maPhong'];
        }

        $i = 1;
        do {
            $maPhong = 'P' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $i++;
        } while (in_array($maPhong, $dsMaPhong));

        $tenPhong = "Phòng " . $i;
        $soHang = 10;
        $soCot = 10;
        $sql = "INSERT INTO phong (maPhong, tenPhong, sohang, socot)
                VALUES ('$maPhong', '$tenPhong', $soHang, $soCot)";
        mysqli_query($this->con, $sql);

        return $maPhong;
    }
}
?>
