<?php
class QliTintuc extends controller {
    private $tintuc;

    public function __construct() {
        $this->tintuc = $this->model("QliTintuc_m");
    }

    // Hiển thị danh sách tin tức
    public function Get_data() {
        $data = $this->tintuc->hienthi();
        $this->view("Masterlayout", [
            "page" => "QliTintuc_v",
            "data" => $data
        ]);
    }

    // Thêm tin tức
    public function add() {
        if (isset($_POST["submit"])) {
            $tenTin = $_POST["tenTin"];
            $noiDung = $_POST["noiDung"];
            $ngayDang = $_POST["ngayDang"];

            // Xử lý upload ảnh
            $fileName = "";
            if (isset($_FILES["hinhAnh"]) && $_FILES["hinhAnh"]["error"] == 0) {
                $fileName = time() . "_" . basename($_FILES["hinhAnh"]["name"]);
                $targetPath = "Public/img/" . $fileName;
                move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $targetPath);
            }

            $this->tintuc->them($tenTin, $noiDung, $ngayDang, $fileName);
            header("Location: /rapphim/QliTintuc/Get_data");
        }
    }

    // Sửa tin tức
    public function edit($maTin) {
        if (isset($_POST["submit"])) {
            $tenTin = $_POST["tenTin"];
            $noiDung = $_POST["noiDung"];
            $ngayDang = $_POST["ngayDang"];

            // Giữ ảnh cũ nếu không upload mới
            $fileName = $_POST["hinhAnhCu"] ?? "";

            if (isset($_FILES["hinhAnh"]) && $_FILES["hinhAnh"]["error"] == 0) {
                $fileName = time() . "_" . basename($_FILES["hinhAnh"]["name"]);
                $targetPath = "Public/img/" . $fileName;
                move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $targetPath);
            }

            $this->tintuc->sua($maTin, $tenTin, $noiDung, $ngayDang, $fileName);
            header("Location: /rapphim/QliTintuc/Get_data");
        } else {
            $row = $this->tintuc->layTheoMa($maTin);
            $this->view("Masterlayout", [
                "page" => "QliTintuc_v",
                "edit" => $row,
                "data" => $this->tintuc->hienthi()
            ]);
        }
    }

    // Xóa tin tức
    public function delete($maTin) {
        $this->tintuc->xoa($maTin);
        header("Location: /rapphim/QliTintuc/Get_data");
    }
}
?>
