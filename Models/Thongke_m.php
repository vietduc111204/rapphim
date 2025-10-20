<?php
class Thongke_m extends connectDB {
    function tatca() {
        return mysqli_query($this->con, "SELECT * FROM ve");
    }

    function timkiem($filter) {
        $ngay = mysqli_real_escape_string($this->con, $filter['ngayChieu'] ?? '');
        $maPhim = mysqli_real_escape_string($this->con, $filter['maPhim'] ?? '');
        $maXuatChieu = mysqli_real_escape_string($this->con, $filter['maXuatChieu'] ?? '');

        // Nếu không nhập gì thì không tìm
        if ($ngay === '' && $maPhim === '' && $maXuatChieu === '') {
            return false;
        }

        $sql = "SELECT * FROM ve WHERE 1=1";

        if ($ngay !== '') $sql .= " AND ngayChieu = '$ngay'";
        if ($maPhim !== '') $sql .= " AND maPhim = '$maPhim'";
        if ($maXuatChieu !== '') $sql .= " AND maXuatChieu = '$maXuatChieu'";

        $sql .= " LIMIT 1";

        $result = mysqli_query($this->con, $sql);

        // Nếu không có kết quả thì trả về false
        if ($result && mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
?>
