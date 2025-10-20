<?php
class QliXuatChieu extends Controller {
    private $xc;

    function __construct() {
        $this->xc = $this->model("QliXuatChieu_m");
    }

    function Get_data() {
        $data = $this->xc->getAll();
        $maXuatMoi = $this->xc->taoMaTuDong();
        $dsPhong = $this->xc->getAllPhong();

        $this->view("Masterlayout", [
            "page" => "QliXuatChieu_v",
            "dulieu" => $data,
            "maXuatMoi" => $maXuatMoi,
            "dsPhong" => $dsPhong
        ]);
    }
    function them() {
        if (isset($_POST['btnThem'])) {
            $ma = $_POST['txtMaxuatchieu'];
            $ngay = $_POST['txtNgaychieu'];
            $gio = $_POST['txtThoigianchieu'];
            $maphong = $_POST['cboPhong'];

            // Kiểm tra ngày chiếu
            $today = date('Y-m-d');
            if ($ngay < $today) {
                $this->view('MasterLayout', [
                    'page' => 'QliXuatChieu_v',
                    'dulieu' => $this->model('QliXuatChieu_m')->getAll(),
                    'maXuatMoi' => $this->model('QliXuatChieu_m')->taoMaTuDong(),
                    'thongbao' => '❌ Ngày chiếu không được nhỏ hơn ngày hiện tại!'
                ]);
                return;
            }

            // Thêm nếu hợp lệ
            $kq = $this->model('QliXuatChieu_m')->them($ma, $ngay, $gio, $maphong);
            $this->view('MasterLayout', [
                'page' => 'QliXuatChieu_v',
                'dulieu' => $this->model('QliXuatChieu_m')->getAll(),
                'maXuatMoi' => $this->model('QliXuatChieu_m')->taoMaTuDong(),
                'thongbao' => $kq ? '✅ Thêm thành công!' : '❌ Thêm thất bại!'
            ]);
        }
    }

    function sua() {
        if (isset($_POST['btnSua'])) {
            $ma = $_POST['txtMaxuatchieu'];
            $ngay = $_POST['txtNgaychieu'];
            $gio = $_POST['txtThoigianchieu'];
            $maphong = $_POST['cboPhong'];

            $today = date('Y-m-d');
            if ($ngay < $today) {
                $this->view('MasterLayout', [
                    'page' => 'QliXuatChieu_v',
                    'dulieu' => $this->model('QliXuatChieu_m')->getAll(),
                    'maXuatMoi' => $this->model('QliXuatChieu_m')->taoMaTuDong(),
                    'thongbao' => '⚠️ Ngày chiếu không thể nhỏ hơn ngày hiện tại khi sửa!'
                ]);
                return;
            }

            $kq = $this->model('QliXuatChieu_m')->sua($ma, $ngay, $gio, $maphong);
            $this->view('MasterLayout', [
                'page' => 'QliXuatChieu_v',
                'dulieu' => $this->model('QliXuatChieu_m')->getAll(),
                'maXuatMoi' => $this->model('QliXuatChieu_m')->taoMaTuDong(),
                'thongbao' => $kq ? '💾 Cập nhật thành công!' : '❌ Cập nhật thất bại!'
            ]);
        }
    }

    function xoa($maxuatchieu) {
        try {
            $kq = $this->xc->xoa($maxuatchieu); // gọi model xóa

            if ($kq) {
                echo "<script>alert('Xóa xuất chiếu thành công!'); window.location='/rapphim/QliXuatChieu';</script>";
            } else {
                // Nếu trả về false nhưng không có exception
                echo "<script>alert('Xóa thất bại!'); window.location='/rapphim/QliXuatChieu';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            // Kiểm tra mã lỗi 1451: foreign key constraint
            if ($e->getCode() == 1451) {
                echo "<script>alert('Không thể xóa! Có phim đang sử dụng xuất chiếu này.'); window.location='/rapphim/QliXuatChieu';</script>";
            } else {
                // Lỗi khác
                echo "<script>alert('Lỗi: " . $e->getMessage() . "'); window.location='/rapphim/QliXuatChieu';</script>";
            }
        }
    }
}
?>
