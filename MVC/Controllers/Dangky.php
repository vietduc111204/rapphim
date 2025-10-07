<?php
class Dangky extends controller {

    public $dk;

    public function __construct() {
        $this->dk = $this->model("Dangky_m");
    }

    public function index() {
        $this->view("space", [
            "page" => "Dangnhap_v"
        ]);
    }

    public function dangky() {
        if (isset($_POST['dangky'])) {
            $hoten = trim($_POST['Hoten']);
            $email = trim($_POST['Email']);
            $sdt = trim($_POST['Sdt']);
            $matkhau = trim($_POST['matKhau']);

            if ($this->dk->checkEmail($email)) {
                $this->view("space", [
                    "page" => "Dangnhap_v",
                    "status" => "Email này đã được đăng ký trước đó!"
                ]);
                return;
            }

            $result = $this->dk->insertTaiKhoan($hoten, $email, $sdt, $matkhau);

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