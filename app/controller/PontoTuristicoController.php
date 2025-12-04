<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/PontoDAO.php");
require_once(__DIR__ . "/../service/PontoService.php");
require_once(__DIR__ . "/../model/PontoTuristico.php");
require_once(__DIR__ . "/../model/Cidade.php");
require_once(__DIR__ . "/../dao/CidadeDAO.php");
require_once(__DIR__ . "/../service/ImagemService.php");


class PontoTuristicoController extends Controller
{

    private PontoDAO $pontoDAO;
    private PontoService $pontoService;
    private CidadeDAO $cidadeDAO;

    public function __construct()
    {

        //Verificar se o usuário está logado (?)
        if (! $this->usuarioEstaLogado())
            return;


        $this->pontoDAO = new PontoDAO();
        $this->pontoService = new PontoService();
        $this->cidadeDAO = new CidadeDAO();

        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function list()
    {

        $dados['pontos'] = $this->pontoDAO->list();
        $this->loadView("ponto_turistico/listar.php", $dados);
    }

    protected function create()
    {
        $dados['id'] = 0;
        $dados['cidades'] = $this->cidadeDAO->list();

        $this->loadView("ponto_turistico/form.php", $dados);
    }

    protected function edit()
    {
        //Busca o ponto turistico na base pelo ID    
        $ponto = $this->findPontoById();

        if ($ponto) {
            $dados['id'] = $ponto->getId();
            $dados["ponto"] = $ponto;
            $dados['cidades'] = $this->cidadeDAO->list();


            $this->loadView("ponto_turistico/form.php", $dados);
        } else {
            $this->list("Ponto turistico não encontrado!");
        }
    }

    protected function save()
    {


        //Capturar os dados do formulário
        $id = $_POST['id'] ?? 0;

        $nome = trim((string)($_POST['nome'] ?? '')) != "" ? trim((string)$_POST['nome']) : NULL;

        $cidadeId = trim((int)($_POST['cidadeId'] ?? '')) != "" ? trim((int)$_POST['cidadeId']) : NULL;

        $endereco = trim((string)($_POST['endereco'] ?? '')) != "" ? trim((string)$_POST['endereco']) : NULL;

        $descricao = trim((string)($_POST['descricao'] ?? '')) != "" ? trim((string)$_POST['descricao']) : NULL;


        //Criar o objeto Ponto turistico
        $ponto = new PontoTuristico();
        $ponto->setId($id);
        $ponto->setNome($nome);
        $ponto->setCidade($this->cidadeDAO->findById($cidadeId));
        $ponto->setEndereco($endereco);
        $ponto->setDescricao($descricao);
        
        //imagem
        $imagem = ImagemService::salvar($_FILES);
        $ponto->setImagem($imagem);


        //Validar os dados (camada service)
        $erros = $this->pontoService->validarDados($ponto);
        if (! $erros) {
            //Inserir no Base de Dados
            try {
                if ($ponto->getId() == 0)
                    $this->pontoDAO->insert($ponto);
                else
                    $this->pontoDAO->update($ponto);

                header("location: " . BASEURL . "/controller/PontoTuristicoController.php?action=list");
                exit;
            } catch (PDOException $e) {
                //Iserir erro no array
                array_push($erros, "Erro ao gravar no banco de dados!");
                array_push($erros, $e->getMessage());
            }
        }

        //Mostrar os erros
        $dados['id'] = $ponto->getId();
        $dados['cidades'] = $this->cidadeDAO->list();
        $dados["ponto"] = $ponto;

        $msgErro = implode("<br>", $erros);

        $this->loadView("ponto_turistico/form.php", $dados, $msgErro);
    }

    protected function delete()
    {
        //Busca a cidade na base pelo ID    
        $ponto = $this->findPontoById();

        if ($ponto) {
            //Excluir
            $this->pontoDAO->deleteById($ponto->getId());

            header("location: " . BASEURL . "/controller/PontoTuristicoController.php?action=list");
            exit;
        } else {
            $this->list("Ponto turistico não encontrado!");
        }
    }

    private function findPontoById()
    {
        $id = 0;
        if (isset($_GET["id"]))
            $id = $_GET["id"];

        //Busca o usuário na base pelo ID    
        return $this->pontoDAO->findById($id);
    }
}

//Criar o objeto do controller
new PontoTuristicoController();
