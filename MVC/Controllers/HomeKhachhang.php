<?php 
class HomeKhachhang extends controller{
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'HomeKhachhang_v'
        ]);
    }
}
?>