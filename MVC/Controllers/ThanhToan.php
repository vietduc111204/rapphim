<?php
class ThanhToan extends Controller {

  private $VeModel;
  private $DatGheModel;
  private $PhimModel;
  private $XuatChieuModel;

  public function __construct() {
    $this->VeModel = $this->model("Ve_m");
    $this->DatGheModel = $this->model("DatGhe_m");
    $this->PhimModel = $this->model("Phim_m");
    $this->XuatChieuModel = $this->model("XuatChieu_m");
  }

  public function Get_data() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenPhim = $_POST['tenPhim'] ?? '';
    $ngay = $_POST['ngay'] ?? '';
    $gio = $_POST['gio'] ?? '';
    $ghe = isset($_POST['ghe']) && is_array($_POST['ghe']) ? $_POST['ghe'] : explode(',', $_POST['ghe'] ?? '');
    $loai = $_POST['loai'] ?? '';
    $tongTien = is_numeric($_POST['tongTien'] ?? '') ? intval($_POST['tongTien']) : 0;

    $maPhim = $_POST['maPhim'] ?? '';
    $maXuatChieu = $_POST['maXuatChieu'] ?? '';
    $maPhong = $_POST['maPhong'] ?? '';

    if (empty($tenPhim) || empty($ngay) || empty($gio) || empty($ghe)) {
      header("Location: /rapphim/ChonGhe");
      exit;
    }

    $data = [
      'tenPhim' => $tenPhim,
      'ngay' => $ngay,
      'gio' => $gio,
      'ghe' => $ghe,
      'loai' => $loai,
      'tongTien' => $tongTien,
      'maPhim' => $maPhim,
      'maXuatChieu' => $maXuatChieu,
      'maPhong' => $maPhong
    ];

    $this->view("Masterlayout", [
      "page" => "ThanhToan_v",
      "data" => $data
    ]);
  } else {
    header("Location: /rapphim/ChonGhe");
    exit;
  }
}


  public function xacNhan() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu trực tiếp từ form (POST)
        $tenPhim    = trim($_POST['tenPhim'] ?? '');
        $ngay       = trim($_POST['ngay'] ?? '');
        $gio        = trim($_POST['gio'] ?? '');
        $tongTien   = intval($_POST['tongTien'] ?? 0);

        // DÙng trực tiếp mã gửi từ form (nếu có)
        $maPhim       = trim($_POST['maPhim'] ?? '');
        $maXuatChieu  = trim($_POST['maXuatChieu'] ?? '');
        $maPhong      = trim($_POST['maPhong'] ?? '');

        // Ghế có thể là mảng (từ form) hoặc chuỗi "A1,A2"
        $gheList = [];
        if (isset($_POST['ghe'])) {
            if (is_array($_POST['ghe'])) $gheList = $_POST['ghe'];
            else $gheList = array_filter(array_map('trim', explode(',', $_POST['ghe'])));
        }

        // Kiểm tra dữ liệu bắt buộc
        if (empty($maPhim) || empty($maXuatChieu) || empty($gheList)) {
            die("❌ Thiếu dữ liệu bắt buộc: maPhim / maXuatChieu / ghe");
        }

        // Lưu từng ghế (maGhe trong POST phải là maGhe thực trong DB)
        foreach ($gheList as $maghe) {
            $maghe = trim($maghe);
            if (empty($maghe)) continue;

            // Thêm vé -> trả về true/false
            $ok = $this->VeModel->themVe($maghe, $maXuatChieu, $maPhim, $tongTien);

            if ($ok) {
                // Cập nhật trạng thái ghế trong datghe
                $this->DatGheModel->capNhatTrangThai($maghe, $maXuatChieu, 'Dat');
            } else {
                // Debug lỗi (nên log chứ ko die)
                echo "⚠️ Lỗi khi thêm vé cho ghế $maghe: " . mysqli_error($this->VeModel->con) . "<br>";
            }
        }

        // Sau khi xử lý, chuyển hướng
        header("Location: /rapphim/VeDaDat");
        exit;
    } else {
        header("Location: /rapphim/ThanhToan");
        exit;
    }
}

}
?>
