<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class SiteController  extends Controller {

    private UsuarioDAO $usuarioDAO;

    public function __construct() {
        
        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function home() {


        $this->loadView("area_visitante/index.php");
    }

     protected function sobre() {

        $this->loadView("area_visitante/sobre.php");
    }

         protected function pontosTuristicos() {

        $this->loadView("area_visitante/pontosTuristicos.php");
    }


         protected function noticias() {

        $this->loadView("area_visitante/noticias.php");
    }
    
}

//Criar o objeto do controller
new SiteController();