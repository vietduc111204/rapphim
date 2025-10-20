<?php
class ChonGhe extends Controller {
    private $chonGheModel;

    public function __construct() {
        $this->chonGheModel = $this->model('ChonGhe_m');
    }

    public function Get_data() {
        // ✅ Lấy dữ liệu từ URL
        $maPhim = isset($_GET['phim']) ? trim($_GET['phim']) : '';
        $maPhong = isset($_GET['maPhong']) ? trim($_GET['maPhong']) : '';
        $maXuatChieu = isset($_GET['maXuatChieu']) ? trim($_GET['maXuatChieu']) : '';

        // ✅ Kiểm tra dữ liệu đầu vào
        if (empty($maPhim) || $maPhim === 'undefined') {
            die("Thiếu mã phim! Hãy quay lại chọn phim.");
        }

        // ✅ Lấy tên phim
        $tenPhim = $this->chonGheModel->layTenPhim($maPhim);
        if ($tenPhim === 'Không rõ') {
            die("Không tìm thấy phim có mã: $maPhim");
        }

        // ✅ Lấy thông tin suất chiếu (ngày + giờ)
        $thongTinXuat = $this->chonGheModel->layThongTinXuatChieu($maPhim);
        if (!$thongTinXuat) {
            die("Không tìm thấy suất chiếu của phim này!");
        }

        // Nếu chưa có mã suất chiếu trong URL thì lấy từ DB
        if (empty($maXuatChieu) || $maXuatChieu === 'undefined') {
            $maXuatChieu = $thongTinXuat['maXuatChieu'];
        }

        $ngay = $thongTinXuat['ngayChieu'];
        $gio = $thongTinXuat['thoigianChieu'] ?? $thongTinXuat['tgianChieu'] ?? '';

        // ✅ Nếu chưa truyền phòng → tạo phòng mới và gán vào suất chiếu
        // ✅ Nếu chưa truyền phòng hoặc suất chiếu chưa có phòng → tạo mới
        $maPhong = $thongTinXuat['maPhong'] ?? null;

        if (empty($maPhong)) {
            // ❗Nếu suất chiếu chưa có phòng → tạo mới và gán luôn
            $maPhong = $this->taoPhongMoi();
            $this->ganPhongChoXuatChieu($maXuatChieu, $maPhong);
        }



        // ✅ Nếu phòng chưa có ghế → tạo tự động
        if (!$this->chonGheModel->phongDaCoGhe($maPhong)) {
            $this->chonGheModel->taoGheChoPhong($maPhong);
        }

        // ✅ Nếu suất chiếu chưa có trạng thái ghế → tạo mới toàn bộ trạng thái
        if (!$this->chonGheModel->kiemTraGheDaTao($maXuatChieu)) {
            $dsGhe = $this->chonGheModel->layGheTheoPhong($maPhong);
            foreach ($dsGhe as $ghe) {
                $this->chonGheModel->themTrangThaiGhe($maXuatChieu, $ghe['maGhe']);
            }
        }

        // ✅ Lấy danh sách ghế và trạng thái
        $dsGhe = $this->chonGheModel->layTrangThaiGhe($maXuatChieu, $maPhong);

        // ✅ Chuẩn bị dữ liệu view
        $thongTin = [
            'tenPhim' => $tenPhim,
            'ngay' => $ngay,
            'gio' => $gio,
            'maPhong' => $maPhong,
            'maXuatChieu' => $maXuatChieu,
            'maPhim' => $maPhim // ✅ Thêm dòng này để truyền qua trang thanh toán
        ];

        // ✅ Render ra view chọn ghế
        $this->view('Masterlayout', [
            'page' => 'ChonGhe_v',
            'dsGhe' => $dsGhe,
            'thongTin' => $thongTin
        ]);
    }

    // ✅ Tạo phòng mới nếu chưa có
    private function taoPhongMoi() {
        $conn = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($conn, "utf8");

        $result = mysqli_query($conn, "SELECT maPhong FROM phong");
        $dsMaPhong = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $dsMaPhong[] = $row['maPhong'];
        }

        $i = 1;
        do {
            $maPhong = 'P' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $i++;
        } while (in_array($maPhong, $dsMaPhong));

        $tenPhong = "Phòng " . ($i - 1);
        $soHang = 10;
        $soCot = 10;
        $sql = "INSERT INTO phong (maPhong, tenPhong, sohang, socot)
                VALUES ('$maPhong', '$tenPhong', $soHang, $soCot)";
        mysqli_query($conn, $sql);

        return $maPhong;
    }

    // ✅ Gán phòng cho suất chiếu
    private function ganPhongChoXuatChieu($maXuatChieu, $maPhong) {
        $conn = mysqli_connect("localhost", "root", "", "rapphim");
        mysqli_set_charset($conn, "utf8");
        mysqli_query($conn, "UPDATE xuatchieu SET maPhong = '$maPhong' WHERE maXuatChieu = '$maXuatChieu'");
    }
}
?>
