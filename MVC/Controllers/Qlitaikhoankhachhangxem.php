<?php
class Qlitaikhoankhachhangxem extends controller {
    private $model;

    function __construct() {
        $this->model = $this->model('Qlitaikhoankhachhang_m');
    }

    function Get_data() {
        $dulieu = $this->model->hienthi();
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoankhachhangxem_v',
            'dulieu' => $dulieu
        ]);
    }

    function xoa($maTV) {
        if ($this->model->xoa($maTV)) {
            echo "<script>alert('Xóa thành công!')</script>";
        } else {
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        header('Location: http://localhost/rapphim/Qlitaikhoanquanly');
    } 

    function sua($maTV) {
        $dulieu = $this->model->timkiem($maTV);
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoankhachhangxem+sua_v',
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

            header('Location: http://localhost/rapphim/Qlitaikhoanquanly');
        }
    }
}
?>
