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

  public function taoMaTuDong() {
    $sql = "SELECT maTin FROM tintuc ORDER BY maTin DESC LIMIT 1";
    $result = mysqli_query($this->con, $sql);
    $lastMa = mysqli_fetch_assoc($result)["maTin"] ?? "TT000";
    $so = (int)substr($lastMa, 2);
    $maMoi = "TT" . str_pad($so + 1, 3, "0", STR_PAD_LEFT);
    return $maMoi;
  }

  public function them($tenTin, $noiDung, $ngayDang, $hinhAnh) {
    $maTin = $this->taoMaTuDong();
    $sql = "INSERT INTO tintuc (maTin, tenTin, noiDung, ngayDang, hinhAnh)
            VALUES ('$maTin', '$tenTin', '$noiDung', '$ngayDang', '$hinhAnh')";
    return mysqli_query($this->con, $sql);
  }

  public function sua($maTin, $tenTin, $noiDung, $ngayDang, $hinhAnh) {
    $sql = "UPDATE tintuc SET tenTin='$tenTin', noiDung='$noiDung', ngayDang='$ngayDang', hinhAnh='$hinhAnh'
            WHERE maTin='$maTin'";
    return mysqli_query($this->con, $sql);
  }

  public function xoa($maTin) {
    $sql = "DELETE FROM tintuc WHERE maTin='$maTin'";
    return mysqli_query($this->con, $sql);
  }

  public function layTheoMa($maTin) {
    $sql = "SELECT * FROM tintuc WHERE maTin='$maTin'";
    $result = mysqli_query($this->con, $sql);
    return mysqli_fetch_assoc($result);
  }
}
?>
