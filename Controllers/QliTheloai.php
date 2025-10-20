<?php 
class QliTheloai extends controller {
    private $theloai;

    function __construct() {
        $this->theloai = $this->model('QliTheloai_m');
    }

    // Hiển thị danh sách thể loại
    function Get_data() {
        $dulieu = $this->theloai->hienthi();
        $this->view('Masterlayout', [
            'page' => 'QliTheloai_v',
            'data' => $dulieu
        ]);
    }

    // API trả về JSON
    function api_get_all() {
        header('Content-Type: application/json');
        $dulieu = $this->theloai->hienthi();
        echo json_encode($dulieu, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // Thêm thể loại
    function add() {
        if (isset($_POST["submit"])) {
            $tenLoai = $_POST["tenLoai"];
            $this->theloai->them($tenLoai);
            header("Location: /rapphim/QliTheloai/Get_data");
        }
    }

    // Sửa thể loại
    function edit($maLoai) {
        if (isset($_POST["submit"])) {
            $tenLoai = $_POST["tenLoai"];
            $this->theloai->sua($maLoai, $tenLoai);
            header("Location: /rapphim/QliTheloai/Get_data");
        } else {
            $row = $this->theloai->layTheoMa($maLoai);
            $this->view("Masterlayout", [
                "page" => "QliTheloai_v",
                "edit" => $row,
                "data" => $this->theloai->hienthi()
            ]);
        }
    }

    // Xóa thể loại
    function delete($maLoai) {
        try {
            $kq = $this->theloai->xoa($maLoai); // gọi model xóa

            if ($kq) {
                echo "<script>alert('Xóa thể loại thành công!'); window.location='/rapphim/QliTheloai/Get_data';</script>";
            } else {
                echo "<script>alert('Xóa thất bại!'); window.location='/rapphim/QliTheloai/Get_data';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            // Lỗi foreign key (1451)
            if ($e->getCode() == 1451) {
                echo "<script>alert('Không thể xóa! Có phim đang sử dụng thể loại này.'); window.location='/rapphim/QliTheloai/Get_data';</script>";
            } else {
                echo "<script>alert('Lỗi: " . $e->getMessage() . "'); window.location='/rapphim/QliTheloai/Get_data';</script>";
            }
        }
    }

}
?>
