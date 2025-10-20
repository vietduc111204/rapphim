<?php
class Thongke extends controller {
    private $model;

    function __construct() {
        $this->model = $this->model('Thongke_m');
    }

    function Get_data() {
        $dulieu = null;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btnTimkiem'])) {
                $dulieu = $this->model->timkiem($_POST);
            } elseif (isset($_POST['btnLamMoi'])) {
                $dulieu = [];
            }
        }
    
        $this->view('Masterlayout', [
            'page' => 'Thongke_v',
            'dulieu' => $dulieu
        ]);
    }
    
}
?>
