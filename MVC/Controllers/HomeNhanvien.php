<?php 
class HomeNhanvien extends controller{
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'HomeNhanvien_v'
        ]);
    }
}
?>