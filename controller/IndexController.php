<?php
class IndexController {  
    public function index(){
        if(!empty($_GET['p'])){
            $page =  $_GET['p'];
            require_once 'view/estaticas/'.$page.'.php';
           
        }else{
          require_once 'view/homeView.php'; 
        }
    }  
}
//
?>