<?php
class Dangnhap extends Controller {
    public $dn;

    function __construct() {
        $this->dn = $this->model('Dangnhap_m');
        // Đảm bảo session đã bật
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function Get_data() {
        $this->view('space', [
            'page' => 'Dangnhap_v'
        ]);
    }

    function dangnhap() {
        if (isset($_POST["dangnhap"])) {
            $email = $_POST["Email"];
            $matkhau = $_POST["matKhau"];

            // ---- KHÁCH HÀNG ----
            if ($this->dn->dangnhapKhachHang($email, $matkhau)) {
                $this->view('Masterlayout', [
                    'page' => 'HomeKhachhang_v'
                ]);
            } elseif ($this->dn->dangnhapNhanVien($email, $matkhau)) {
                $this->view('Masterlayout', [
                    'page' => 'HomeNhanvien_v'
                ]);
            } elseif ($this->dn->dangnhapQuanly($email, $matkhau)) {
                $this->view('Masterlayout', [
                    'page' => 'HomeNhanvien_v'
                ]);
            } else {
                $this->view('space', [
                    'page' => 'Dangnhap_v',
                    'result' => false
                ]);
            }
        }
    }

    function dangxuat() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: http://localhost/rapphim/home");
        exit;
    }
}
?>
