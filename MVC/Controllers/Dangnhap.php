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
                $sql = "SELECT * FROM khachhang WHERE Email='$email'";
                $result = mysqli_query($this->dn->con, $sql);
                $row = mysqli_fetch_assoc($result);

                $_SESSION['user'] = [
                    'role' => 'khachhang',
                    'ten' => $row['tenThanhvien'], 
                    'email' => $row['Email']
                ];

                header("Location: http://localhost/rapphim/home");
                exit;
            }

            // ---- NHÂN VIÊN ----
            elseif ($this->dn->dangnhapNhanVien($email, $matkhau)) {
                $sql = "SELECT * FROM nhanvien WHERE Email='$email'";
                $result = mysqli_query($this->dn->con, $sql);
                $row = mysqli_fetch_assoc($result);

                $_SESSION['user'] = [
                    'role' => 'nhanvien',
                    'ten' => $row['tenNhanvien'], 
                    'email' => $row['Email']
                ];

                header("Location: http://localhost/rapphim/home");
                exit;
            }

            // ---- QUẢN LÝ ----
            elseif ($this->dn->dangnhapQuanly($email, $matkhau)) {
                $sql = "SELECT * FROM quanly WHERE Email='$email'";
                $result = mysqli_query($this->dn->con, $sql);
                $row = mysqli_fetch_assoc($result);

                $_SESSION['user'] = [
                    'role' => 'quanly',
                    'ten' => $row['tenQuanly'], 
                    'email' => $row['Email']
                ];

                header("Location: http://localhost/rapphim/home");
                exit;
            }

            // ---- SAI THÔNG TIN ----
            else {
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
