<?php
class Qlitaikhoanquanly extends controller {
    private $model;

    function __construct() {
        $this->model = $this->model('Qlitaikhoanquanly_m');
    }

    function Get_data() {
        $dulieu = $this->model->hienthi();
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoanquanly_v',
            'dulieu' => $dulieu
        ]);
    }

    function sua($maQL) {
        $dulieu = $this->model->timkiem($maQL);
        $this->view('Masterlayout', [
            'page' => 'Qlitaikhoanquanlysua_v',
            'dulieu' => $dulieu
        ]);
    }

    function suadl() {
        if (isset($_POST['btnSua'])) {
            $data = [
                'maQuanly' => $_POST['txtMaQuanly'],
                'tenQuanly' => $_POST['txtTenQuanly'],
                'soDienthoai' => $_POST['txtSdt'],
                'diaChi' => $_POST['txtDiachi'],
                'Email' => $_POST['txtEmail'],
                'matKhau' => $_POST['txtMatkhau'],
                'maQuanlyCu' => $_POST['txtMaQuanlyCu']
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
