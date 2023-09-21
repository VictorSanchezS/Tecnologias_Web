<?php 

class  CpanelController{


    public function __construct()
    {
        
    }

    public function index(){
        $data = array(
            "contenido" =>"views/dashboard/content.php",
            "titulo" =>"Panel de administración"
        );
        
        require_once TEMPLATE;
    }


}
