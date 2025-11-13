<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/NoticiasDAO.php");
require_once(__DIR__ . "/../service/NoticiasService.php");
require_once(__DIR__ . "/../model/Noticias.php");

class NoticiasController extends Controller {

    private NoticiasDAO $noticiasDAO;
    private NoticiasService $noticiasService;

    public function __construct() {
        
        //Verificar se o usuário está logado (?)
        if(! $this->usuarioEstaLogado())
            return;

        //TODO - Verificar se o usuário logado é ADMIN
        

        $this->noticiasDAO = new NoticiasDAO();
        $this->noticiasService = new NoticiasService();

        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function list(){

        $dados['noticias'] = $this->noticiasDAO->list();
       
        // print "<pre>";
        // print_r( $dados['pontos']);
        // print "</pre>";
        // die;

        $this->loadView("noticias/listar.php", $dados);
    }

    protected function create() {
        $dados['id'] = 0;

        $this->loadView("noticias/form.php", $dados);
    }

    protected function edit() {
        //Busca a noticia na base pelo ID    
        $noticias = $this->findCidadeById();

        if($noticias) {
            $dados['id'] = $noticias->getId();
            $dados["noticias"] = $noticias;

            $this->loadView("noticias/form.php", $dados);
        } else {
            $this->list("Noticias não encontrada!");
        }
    }

    protected function save() {
        //Capturar os dados do formulário
        $id = $_POST['id'] ?? 0;
       // $id = $_POST['cidadeid'] ?? 0;

        $titulo = trim((string)($_POST['titulo'] ?? '')) != "" ? trim((string)$_POST['titulo']) : NULL;

        $texto = trim((string)($_POST['texto'] ?? '')) != "" ? trim((string)$_POST['texto']) : NULL;
        
        $data = trim((string)($_POST['data'] ?? '')) != "" ? trim((string)$_POST['data']) : NULL;

        
        //Criar o objeto Ponto turistico
        $noticias = new Noticias();
        $noticias->setId($id);
        $noticias->setTitulo($titulo);
        $noticias->setTexto($texto);
        $noticias->setData($data);


        //Validar os dados (camada service)
        $erros = $this->noticiasService->validarDados($noticias);
        if(! $erros) {
            //Inserir no Base de Dados
            try {
                if($noticias->getId() == 0)
                    $this->noticiasDAO->insert($noticias);
                else
                    $this->noticiasDAO->update($noticias);
                
                header("location: " . BASEURL . "/controller/NoticiasController.php?action=list");
                exit;
            } catch(PDOException $e) {
                //Iserir erro no array
                array_push($erros, "Erro ao gravar no banco de dados!");
                array_push($erros, $e->getMessage());
            }
        } 

        //Mostrar os erros
        $dados['id'] = $noticias->getId();
        $dados["noticias"] = $noticias;

        $msgErro = implode("<br>", $erros);

        $this->loadView("noticias/form.php", $dados, $msgErro);
    }

    protected function delete() {
        //Busca a noticia na base pelo ID    
        $noticias = $this->findCidadeById();
        
        if($noticias) {
            //Excluir
            $this->noticiasDAO->deleteById($noticias->getId());

            header("location: " . BASEURL . "/controller/NoticiasController.php?action=list");
            exit;
        } else {
            $this->list("Noticia não encontrada!");
        }
    }

    private function findCidadeById() {
        $id = 0;
        if(isset($_GET["id"]))
            $id = $_GET["id"];

        //Busca o usuário na base pelo ID    
        return $this->noticiasDAO->findById($id);
    }

    
}

//Criar o objeto do controller
new NoticiasController();