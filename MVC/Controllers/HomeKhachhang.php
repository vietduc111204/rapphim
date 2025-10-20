<?php
class Homekhachhang extends Controller {
    private $pdc;

    function __construct() {
        $this->pdc = $this->model("QliPDC_m");
    }

    function Get_data() {
    // Lấy danh sách phim đang chiếu từ database
    $dsPhim = $this->pdc->getAll(); 

    // Lấy danh sách tin tức từ database
    $tintucModel = $this->model("QliTintuc_m");
    $dsTin = $tintucModel->hienthi();

    // Gọi view một lần duy nhất, truyền cả hai mảng
    $this->view("MasterLayout", [
        "page" => "home_v",
        "dsPhim" => $dsPhim,
        "dsTin" => $dsTin
    ]);
}
}
?>
