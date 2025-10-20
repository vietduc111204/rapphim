<?php
class Tintuc extends controller {
    private $tintuc;

    public function __construct() {
        $this->tintuc = $this->model("QliTintuc_m");
    }

    // Hiển thị danh sách tin tức
    public function Get_data(){
        $data = $this->tintuc->hienthi();
        $this->view("Masterlayout", [
            "page" => "Tintuc_v",
            "data" => $data
        ]);
    }

    // Hiển thị chi tiết tin tức
    public function chitiet($maTin) {
        $row = $this->tintuc->layTheoMa($maTin);
        $this->view("Masterlayout", [
            "page" => "Tintuc_chitiet_v",
            "tin" => $row
        ]);
    }
}
?>
