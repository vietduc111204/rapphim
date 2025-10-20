<?php
class Qlitaikhoannhanvien extends controller {
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

        $this->model = $this->model('Qlitaikhoannhanvien_m');
    }

    // ✅ Chỉ hiển thị tài khoản của người đang đăng nhập
    function Get_data() {
        $email = $_SESSION['user']['email']; // Lấy email của người đang đăng nhập
        $dulieu = $this->model->layTheoEmail($email); // Chỉ lấy dữ liệu 1 người
        
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoannhanvien_v',
            'dulieu' => $dulieu
        ]);
    }

    function sua($maNV) {
        $dulieu = $this->model->timkiem($maNV);
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoannhanviensua_v',
            'dulieu' => $dulieu
        ]);
    }

    function suadl() {
        if (isset($_POST['btnSua'])) {
            $data = [
                'maNhanvien' => $_POST['txtMaNhanvien'],
                'tenNhanvien' => $_POST['txtTenNhanvien'],
                'soDienthoai' => $_POST['txtSdt'],
                'diaChi' => $_POST['txtDiachi'],
                'Email' => $_POST['txtEmail'],
                'matKhau' => $_POST['txtMatkhau'],
                'maNhanvienCu' => $_POST['txtMaNhanvienCu']
            ];

            if (!$this->model->Checkdl($data)) return;

            if ($this->model->sua($data)) {
                echo "<script>alert('Cập nhật thành công!')</script>";
            } else {
                echo "<script>alert('Cập nhật thất bại!')</script>";
            }

            header('Location: http://localhost/rapphim/Qlitaikhoannhanvien');
        }
    }
}
?>
