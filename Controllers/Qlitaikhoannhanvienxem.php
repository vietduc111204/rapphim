<?php
class Qlitaikhoannhanvienxem extends Controller {
    private $model;

    function __construct() {
        $this->model = $this->model('Qlitaikhoannhanvien_m');
    }

    // Hiển thị danh sách tài khoản nhân viên
    function Get_data() {
        $dulieu = $this->model->hienthi();
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoannhanvienxem_v',
            'dulieu' => $dulieu
        ]);
    }

    // Xóa tài khoản
    function xoa($maNV) {
        if ($this->model->xoa($maNV)) {
            echo "<script>alert('Xóa thành công!')</script>";
        } else {
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        header('Location: http://localhost/rapphim/Qlitaikhoannhanvienxem');
        exit;
    }

    // Sửa thông tin tài khoản nhân viên
    function sua($maNV) {
        $dulieu = $this->model->timkiem($maNV);
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoannhanviensua_v',
            'dulieu' => $dulieu
        ]);
    }

    // Cập nhật dữ liệu sau khi sửa
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

            header('Location: http://localhost/rapphim/Qlitaikhoannhanvienxem');
            exit;
        }
    }

    // ✅ Hiển thị form thêm nhân viên
    function them() {
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoannhanvienthem_v'
        ]);
    }

    // ✅ Xử lý dữ liệu thêm nhân viên
    function themdl() {
        if (isset($_POST['btnThem'])) {
            $data = [
                'maNhanvien' => trim($_POST['txtMaNhanvien']),
                'tenNhanvien' => trim($_POST['txtTenNhanvien']),
                'soDienthoai' => trim($_POST['txtSdt']),
                'diaChi' => trim($_POST['txtDiachi']),
                'Email' => trim($_POST['txtEmail']),
                'matKhau' => trim($_POST['txtMatkhau'])
            ];

            // ⚠️ Kiểm tra dữ liệu rỗng
            if (empty($data['maNhanvien']) || empty($data['tenNhanvien']) || empty($data['Email']) || empty($data['matKhau'])) {
                echo "<script>alert('Vui lòng nhập đầy đủ các trường bắt buộc!'); history.back();</script>";
                exit;
            }

            // ⚠️ Kiểm tra số điện thoại hợp lệ
            if (empty($data['soDienthoai']) || !is_numeric($data['soDienthoai'])) {
                echo "<script>alert('Số điện thoại không hợp lệ!'); history.back();</script>";
                exit;
            }

            // 🔍 Kiểm tra email trùng
            $email = mysqli_real_escape_string($this->model->con, $data['Email']);
            $check = "SELECT * FROM nhanvien WHERE Email = '$email'";
            $result = mysqli_query($this->model->con, $check);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Email này đã tồn tại! Vui lòng nhập email khác.'); history.back();</script>";
                exit;
            }

            // 🔐 Mã hóa mật khẩu
            $matKhauHash = password_hash($data['matKhau'], PASSWORD_DEFAULT);

            // ⚙️ Chuẩn bị dữ liệu an toàn
            $ma = mysqli_real_escape_string($this->model->con, $data['maNhanvien']);
            $ten = mysqli_real_escape_string($this->model->con, $data['tenNhanvien']);
            $sdt = (int)$data['soDienthoai']; 
            $diachi = mysqli_real_escape_string($this->model->con, $data['diaChi']);

            // ✅ Thực hiện INSERT
            $sql = "INSERT INTO nhanvien(maNhanvien, tenNhanvien, soDienthoai, diaChi, Email, matKhau)
                    VALUES ('$ma', '$ten', $sdt, '$diachi', '$email', '$matKhauHash')";

            if (mysqli_query($this->model->con, $sql)) {
                echo "<script>alert('Thêm nhân viên thành công!'); window.location.href='http://localhost/rapphim/Qlitaikhoannhanvienxem';</script>";
            } else {
                echo "<script>alert('Thêm thất bại!'); history.back();</script>";
            }
            exit;
        }
    }
}
?>
