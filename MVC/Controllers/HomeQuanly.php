<?php 
class HomeQuanly extends controller{
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'HomeQuanly_v'
        ]);
    }
}
?>