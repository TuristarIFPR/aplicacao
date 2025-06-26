<?php 
#Classe controller para a auto cadasstro do sistema
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
#require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../model/Usuario.php");

class CadastroController extends Controller {

    #private LoginService $loginService;
    private UsuarioDAO $usuarioDao;

    public function __construct() {
       # $this->loginService = new LoginService();
        $this->usuarioDao = new UsuarioDAO();
        
        $this->handleAction();
    }

    protected function cadastro() {
        $this->loadView("cadastro/cadastro", []);
    }

    

}


#Criar objeto da classe para assim executar o construtor
new CadastroController();
