<?php
class VeDaDat extends Controller {
    public function Get_data() {
        $veModel = $this->model("Ve_m");
        $data = $veModel->getDanhSachVe();

        $this->view("MasterLayout", [
            "page" => "VeDaDat_v",
            "data" => $data
        ]);
    }
}
?>
