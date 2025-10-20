<?php
class QliPDC extends Controller {
    private $pdc;

    function __construct() {
        $this->pdc = $this->model("QliPDC_m");
    }

    function Get_data() {
        $data = $this->pdc->getAll();
        $maPhimMoi = $this->pdc->taoMaTuDong();
        $dsLoai = $this->pdc->getAllMaLoai();
        $dsXuat = $this->pdc->getAllMaXuatChieu();

        $this->view("Masterlayout", [
            "page" => "QliPDC_v",
            "dulieu" => $data,
            "maPhimMoi" => $maPhimMoi,
            "dsLoai" => $dsLoai,
            "dsXuat" => $dsXuat
        ]);
    }

    function them() {
        if (isset($_POST["btnThem"])) {
            $maphim = $_POST["txtMaphim"];
            $tenphim = $_POST["txtTenphim"];
            $maloai = $_POST["txtMaloai"];
            $maxuatchieu = $_POST["txtMaxuatchieu"];
            $ngaychieu = $_POST["txtNgaychieu"];

            $hinhanh = $_FILES["fileHinhanh"]["name"];
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/rapphim/Public/IMG/";
            $targetFile = $targetDir . basename($hinhanh);
            move_uploaded_file($_FILES["fileHinhanh"]["tmp_name"], $targetFile);

            $kq = $this->pdc->them($maphim, $tenphim, $hinhanh, $maloai, $maxuatchieu, $ngaychieu);

            if ($kq) {
                echo "<script>alert('Thêm phim thành công!'); window.location='/rapphim/QliPDC';</script>";
            } else {
                echo "<script>alert('Thêm phim thất bại!'); window.location='/rapphim/QliPDC';</script>";
            }
        }
    }

    function xoa($maphim) {
        $kq = $this->pdc->xoa($maphim);
        if ($kq) {
            echo "<script>alert('Xóa phim thành công!'); window.location='/rapphim/QliPDC';</script>";
        } else {
            echo "<script>alert('Xóa thất bại!'); window.location='/rapphim/QliPDC';</script>";
        }
    }

    function sua() {
        if (isset($_POST["btnSua"])) {
            $maphim = $_POST["txtMaphim"];
            $tenphim = $_POST["txtTenphim"];
            $maloai = $_POST["txtMaloai"];
            $maxuatchieu = $_POST["txtMaxuatchieu"];
            $ngaychieu = $_POST["txtNgaychieu"];

            $hinhanh = $_FILES["fileHinhanh"]["name"];
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/rapphim/Public/IMG/";
            $targetFile = $targetDir . basename($hinhanh);

            if ($hinhanh != "") {
                move_uploaded_file($_FILES["fileHinhanh"]["tmp_name"], $targetFile);
            }

            $kq = $this->pdc->sua($maphim, $tenphim, $hinhanh, $maloai, $maxuatchieu, $ngaychieu);

            if ($kq) {
                echo "<script>alert('Cập nhật phim thành công!'); window.location='/rapphim/QliPDC';</script>";
            } else {
                echo "<script>alert('Cập nhật thất bại!'); window.location='/rapphim/QliPDC';</script>";
            }
        }
    }
    function getNgayChieuTheoMaXuatChieu() {
        if (isset($_POST['maXuatchieu'])) {
            $maXuatchieu = $_POST['maXuatchieu'];
            $sql = "SELECT ngayChieu FROM xuatchieu WHERE maXuatchieu = '$maXuatchieu'";
            $result = mysqli_query($this->pdc->con, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                echo $row['ngayChieu'];
            } else {
                echo "";
            }
        }
    }
}
?>
