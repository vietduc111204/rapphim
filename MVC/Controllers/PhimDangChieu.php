<?php
class PhimDangChieu extends Controller {
    public $phim;

    public function __construct() {
        $this->phim = $this->model('PhimDangChieu_m');
    }

    public function Get_data() {
        $dsPhim = $this->phim->getDanhSachPhim();
        $dsSuatChieu = [];

        foreach ($dsPhim as $phim) {
            $dsSuatChieu[$phim['maPhim']] = $this->phim->getSuatChieuTheoPhim($phim['maPhim']);
        }

        $this->view('Masterlayout', [
            'page' => 'PhimDangChieu_v',
            'dsPhim' => $dsPhim,
            'dsSuatChieu' => $dsSuatChieu
        ]);
    }
}
?>

