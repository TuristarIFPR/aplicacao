<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/CidadeDAO.php");
require_once(__DIR__ . "/../service/CidadeService.php");
require_once(__DIR__ . "/../model/Cidade.php");

class CidadeController extends Controller {

    private CidadeDAO $cidadeDAO;
    private CidadeService $cidadeService;

    public function __construct() {
        
        //Verificar se o usuário está logado (?)
        if(! $this->usuarioEstaLogado())
            return;

        //TODO - Verificar se o usuário logado é ADMIN

        $this->cidadeDAO = new CidadeDAO();
        $this->cidadeService = new CidadeService();

        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function list(){

        $dados['cidades'] = $this->cidadeDAO->list();

        $this->loadView("cidade/list.php", $dados);
    }

    protected function create() {
        $dados['id'] = 0;

        $this->loadView("cidade/form.php", $dados);
    }

    protected function edit() {
        //Busca o usuário na base pelo ID    
        $cidade = $this->findCidadeById();

        if($cidade) {
            $dados['id'] = $cidade->getId();
            $dados["cidade"] = $cidade;

            $this->loadView("cidade/form.php", $dados);
        } else {
            $this->list("Cidade não encontrado!");
        }
    }

    protected function save() {
        //Capturar os dados do formulário
        $id = $_POST['id'] ?? 0;

        $nome = trim((string)($_POST['nome'] ?? '')) != "" ? trim((string)$_POST['nome']) : NULL;

        $estadoSigla = trim((string)($_POST['estadoSigla'] ?? '')) != "" ? trim((string)$_POST['estadoSigla']) : NULL;
        
        $estadoNome = trim((string)($_POST['estadoNome'] ?? '')) != "" ? trim((string)$_POST['estadoNome']) : NULL;
        
        //Criar o objeto Cidade
        $cidade = new Cidade();
        $cidade->setId($id);
        $cidade->setNome($nome);
        $cidade->setEstadoSigla($estadoSigla);
        $cidade->setEstadoNome($estadoNome);

        //Validar os dados (camada service)
        $erros = $this->cidadeService->validarDados($cidade);
        if(! $erros) {
            //Inserir no Base de Dados
            try {
                if($cidade->getId() == 0)
                    $this->cidadeDAO->insert($cidade);
                else
                    $this->cidadeDAO->update($cidade);
                
                header("location: " . BASEURL . "/controller/CidadeController.php?action=list");
                exit;
            } catch(PDOException $e) {
                //Iserir erro no array
                array_push($erros, "Erro ao gravar no banco de dados!");
                array_push($erros, $e->getMessage());
            }
        } 

        //Mostrar os erros
        $dados['id'] = $cidade->getId();
        $dados["cidade"] = $cidade;

        $msgErro = implode("<br>", $erros);

        $this->loadView("cidade/form.php", $dados, $msgErro);
    }

    protected function delete() {
        //Busca a cidade na base pelo ID    
        $cidade = $this->findCidadeById();
        
        if($cidade) {
            //Excluir
            $this->cidadeDAO->deleteById($cidade->getId());

            header("location: " . BASEURL . "/controller/CidadeController.php?action=list");
            exit;
        } else {
            $this->list("Cidade não encontrada!");
        }
    }

    private function findCidadeById() {
        $id = 0;
        if(isset($_GET["id"]))
            $id = $_GET["id"];

        //Busca o usuário na base pelo ID    
        return $this->cidadeDAO->findById($id);
    }

    
}

//Criar o objeto do controller
new CidadeController();