<?php
class QliTintuc_m extends connectDB {

    public function hienthi() {
        $sql = "SELECT * FROM tintuc ORDER BY ngayDang DESC";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function layTheoMa($maTin) {
        $sql = "SELECT * FROM tintuc WHERE maTin='$maTin'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
}
?>
