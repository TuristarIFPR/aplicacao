<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/PontoDAO.php");
require_once(__DIR__ . "/../service/PontoService.php");
require_once(__DIR__ . "/../model/PontoTuristico.php");

class PontoTuristicoController extends Controller {

    private PontoDAO $pontoDAO;
    private PontoService $pontoService;

    public function __construct() {
        
        //Verificar se o usuário está logado (?)
        if(! $this->usuarioEstaLogado())
            return;

        //TODO - Verificar se o usuário logado é ADMIN
        

        $this->pontoDAO = new PontoDAO();
        $this->pontoService = new PontoService();

        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function list(){

        $dados['pontos'] = $this->pontoDAO->list();
       
        // print "<pre>";
        // print_r( $dados['pontos']);
        // print "</pre>";
        // die;

        $this->loadView("ponto_turistico/listar.php", $dados);
    }

    protected function create() {
        $dados['id'] = 0;

        $this->loadView("ponto_turistico/form.php", $dados);
    }

    protected function edit() {
        //Busca o ponto turistico na base pelo ID    
        $ponto = $this->findCidadeById();

        if($ponto) {
            $dados['id'] = $ponto->getId();
            $dados["ponto"] = $ponto;

            $this->loadView("ponto_turistico/form.php", $dados);
        } else {
            $this->list("Ponto turistico não encontrado!");
        }
    }

    protected function save() {
        //Capturar os dados do formulário
        $id = $_POST['id'] ?? 0;
       // $id = $_POST['cidadeid'] ?? 0;

        $nome = trim((string)($_POST['nome'] ?? '')) != "" ? trim((string)$_POST['nome']) : NULL;

        $endereco = trim((string)($_POST['endereco'] ?? '')) != "" ? trim((string)$_POST['endereco']) : NULL;
        
        $descricao = trim((string)($_POST['descricao'] ?? '')) != "" ? trim((string)$_POST['descricao']) : NULL;

        //imagem
        
        //Criar o objeto Ponto turistico
        $ponto = new PontoTuristico();
        $ponto->setId($id);
        $ponto->setNome($nome);
        $ponto->setEndereco($endereco);
        $ponto->setDescricao($descricao);

        //Validar os dados (camada service)
        $erros = $this->pontoService->validarDados($ponto);
        if(! $erros) {
            //Inserir no Base de Dados
            try {
                if($ponto->getId() == 0)
                    $this->pontoDAO->insert($ponto);
                else
                    $this->pontoDAO->update($ponto);
                
                header("location: " . BASEURL . "/controller/PontoTuristicoController.php?action=list");
                exit;
            } catch(PDOException $e) {
                //Iserir erro no array
                array_push($erros, "Erro ao gravar no banco de dados!");
                array_push($erros, $e->getMessage());
            }
        } 

        //Mostrar os erros
        $dados['id'] = $ponto->getId();
        $dados["ponto"] = $ponto;

        $msgErro = implode("<br>", $erros);

        $this->loadView("ponto_turistico/form.php", $dados, $msgErro);
    }

    protected function delete() {
        //Busca a cidade na base pelo ID    
        $ponto = $this->findCidadeById();
        
        if($ponto) {
            //Excluir
            $this->pontoDAO->deleteById($ponto->getId());

            header("location: " . BASEURL . "/controller/PontoTuristicoController.php?action=list");
            exit;
        } else {
            $this->list("Ponto turistico não encontrado!");
        }
    }

    private function findCidadeById() {
        $id = 0;
        if(isset($_GET["id"]))
            $id = $_GET["id"];

        //Busca o usuário na base pelo ID    
        return $this->pontoDAO->findById($id);
    }

    
}

//Criar o objeto do controller
new PontoTuristicoController();