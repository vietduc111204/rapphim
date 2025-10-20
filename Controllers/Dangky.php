<?php
class Dangky extends Controller {

    public $dk;

    public function __construct() {
        $this->dk = $this->model("Dangky_m");
    }

    // Trang mặc định (hiển thị form đăng ký / đăng nhập)
    public function index() {
        $this->view("space", [
            "page" => "Dangnhap_v"
        ]);
    }

    // Xử lý đăng ký
    public function dangky() {
        if (isset($_POST['dangky'])) {
            $hoten = trim($_POST['Hoten']);
            $email = trim($_POST['Email']);
            $sdt = trim($_POST['Sdt']);
            $matkhau = trim($_POST['matKhau']);

            // Kiểm tra email đã tồn tại
            if ($this->dk->checkEmail($email)) {
                $this->view("space", [
                    "page" => "Dangnhap_v",
                    "status" => "Email này đã được đăng ký trước đó!"
                ]);
                return;
            }

            // Gọi model để lưu dữ liệu
            $result = $this->dk->insertTaiKhoan($hoten, $email, $sdt, $matkhau);

            // Xử lý kết quả
            if ($result) {
                $this->view("space", [
                    "page" => "Dangnhap_v",
                    "status" => "Đăng ký thành công! Hãy đăng nhập để tiếp tục.",
                    "showLogin" => true
                ]);
            } else {
                $this->view("space", [
                    "page" => "Dangnhap_v",
                    "status" => "Đăng ký thất bại! Vui lòng thử lại sau."
                ]);
            }
        }
    }
}
?>
