<?php
class Qlitaikhoankhachhang extends controller {
    private $model;

    function __construct() {
        // Kiểm tra session (nếu chưa có thì khởi tạo)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Nếu chưa đăng nhập thì quay lại trang đăng nhập
        if (!isset($_SESSION['user'])) {
            header('Location: http://localhost/rapphim/Dangnhap');
            exit;
        }

        $this->model = $this->model('Qlitaikhoankhachhang_m');
    }

    // ✅ Chỉ hiển thị tài khoản của người đang đăng nhập
    function Get_data() {
        $email = $_SESSION['user']['email']; // Lấy email của người đang đăng nhập
        $dulieu = $this->model->layTheoEmail($email); // Chỉ lấy dữ liệu 1 người
        
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoankhachhang_v',
            'dulieu' => $dulieu
        ]);
    }

    function sua($maTV) {
        $dulieu = $this->model->timkiem($maTV);
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoankhachhangsua_v',
            'dulieu' => $dulieu
        ]);
    }

    function suadl() {
        if (isset($_POST['btnSua'])) {
            $data = [
                'maThanhvien' => $_POST['txtMaThanhvien'],
                'tenThanhvien' => $_POST['txtTenThanhvien'],
                'soDienthoai' => $_POST['txtSdt'],
                'Email' => $_POST['txtEmail'],
                'matKhau' => $_POST['txtMatkhau'],
                'maThanhvienCu' => $_POST['txtMaThanhvienCu']
            ];

            if (!$this->model->Checkdl($data)) return;

            if ($this->model->sua($data)) {
                echo "<script>alert('Cập nhật thành công!')</script>";
            } else {
                echo "<script>alert('Cập nhật thất bại!')</script>";
            }

            header('Location: http://localhost/rapphim/Qlitaikhoankhachhang');
        }
    }
}
?>
