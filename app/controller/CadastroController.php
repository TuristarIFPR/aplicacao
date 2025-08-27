<?php 
#Classe controller para a auto cadasstro do sistema
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../service/UsuarioService.php");
require_once(__DIR__ . "/../model/Usuario.php");

class CadastroController extends Controller {

    private UsuarioService $usuarioService;
    private UsuarioDAO $usuarioDao;

    public function __construct() {
        $this->usuarioService = new UsuarioService();
        $this->usuarioDao = new UsuarioDAO();
        
        $this->handleAction();
    }

    protected function cadastro() {
        $this->loadView("cadastro/cadastro.php", []);
    }

    protected function save() {
        //Capturar os dados do formulário
        $nome = trim((string)($_POST['nome'] ?? '')) != "" ? trim((string)$_POST['nome']) : NULL;
        $email = trim((string)($_POST['email'] ?? '')) != "" ? trim((string)$_POST['email']) : NULL;
        $dataNasc = trim((string)($_POST['dataNasc'] ?? '')) != "" ? trim((string)$_POST['dataNasc']) : NULL;
        $telefone = trim((string)($_POST['telefone'] ?? '')) != "" ? trim((string)$_POST['telefone']) : NULL;
        $senha = trim((string)($_POST['senha'] ?? '')) != "" ? trim((string)$_POST['senha']) : NULL;

        //Criar o objeto Usuario
        $usuario = new Usuario();
        $usuario->setNomeCompleto($nome);
        $usuario->setEmail($email);
        $usuario->setDataNasc($dataNasc);
        $usuario->setTelefone($telefone);
        $usuario->setSenha($senha);
        $usuario->setTipo(UsuarioPapel::USUARIO);

        //Validar os dados (camada service)
        $erros = $this->usuarioService->validarAutoCadastro($usuario);
        if(! $erros) {
            //Inserir no Base de Dados
            try {
                $this->usuarioDao->insert($usuario);
                
                header("location: " . BASEURL . "/controller/LoginController.php?action=login");
                exit;
            } catch(PDOException $e) {
                //Iserir erro no array
                array_push($erros, "Erro ao gravar no banco de dados!");
                array_push($erros, $e->getMessage());
            }
        } 

        //Mostrar os erros
        $dados['id'] = $usuario->getId();
        $dados["usuario"] = $usuario;

        $msgErro = implode("<br>", $erros);

        $this->loadView("cadastro/cadastro.php", $dados, $msgErro);
    }

    

}


#Criar objeto da classe para assim executar o construtor
new CadastroController();
