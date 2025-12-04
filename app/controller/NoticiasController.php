<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/NoticiasDAO.php");
require_once(__DIR__ . "/../service/NoticiasService.php");
require_once(__DIR__ . "/../model/Noticias.php");
require_once(__DIR__ . "/../dao/PontoDAO.php");
require_once(__DIR__ . "/../model/PontoTuristico.php");

class NoticiasController extends Controller {

    private NoticiasDAO $noticiasDAO;
    private NoticiasService $noticiasService;
    private PontoDAO $pontoDAO;

    public function __construct() {

        if (!$this->usuarioEstaLogado())
            return;

        $this->noticiasDAO = new NoticiasDAO();
        $this->noticiasService = new NoticiasService();
        $this->pontoDAO = new PontoDAO();

        $this->handleAction();
    }

    protected function list() {
        $dados['noticias'] = $this->noticiasDAO->list();
        $this->loadView("noticias/listar.php", $dados);
    }

    protected function create() {
        $dados['id'] = 0;
        $dados['pontos'] = $this->pontoDAO->list();
        $this->loadView("noticias/form.php", $dados);
    }

    protected function edit() {

        $id = $_GET["id"];
        $noticia = $this->noticiasDAO->findById($id);

        if ($noticia) {
            $dados['id'] = $noticia->getId();
            $dados["noticia"] = $noticia;
            $dados['pontos'] = $this->pontoDAO->list();

            $this->loadView("noticias/form.php", $dados);
        } else {
            $this->list("Notícia não encontrada!");
        }
    }

    protected function save() {

        $id = $_POST['id'] ?? 0;
        $titulo = $_POST['titulo'] ?? null;
        $texto = $_POST['texto'] ?? null;
        $data = $_POST['data'] ?? null;
        $pontoId = $_POST['pontoId'] ?? null;

        $noticia = new Noticias();
        $noticia->setId($id);
        $noticia->setTitulo($titulo);
        $noticia->setTexto($texto);
        $noticia->setData($data);
        $noticia->setPonto_turistico($this->pontoDAO->findById($pontoId));

        $erros = $this->noticiasService->validarDados($noticia);

        if (!$erros) {
            try {
                if ($id == 0)
                    $this->noticiasDAO->insert($noticia);
                else
                    $this->noticiasDAO->update($noticia);

                header("location: " . BASEURL . "/controller/NoticiasController.php?action=list");
                exit;
            } catch (PDOException $e) {
                $erros[] = "Erro ao gravar no banco!";
                $erros[] = $e->getMessage();
            }
        }

        $dados['id'] = $id;
        $dados["noticia"] = $noticia;
        $dados['pontos'] = $this->pontoDAO->list();

        $msgErro = implode("<br>", $erros);

        $this->loadView("noticias/form.php", $dados, $msgErro);
    }

    protected function delete() {

        $id = $_GET["id"];
        $noticia = $this->noticiasDAO->findById($id);

        if ($noticia) {
            $this->noticiasDAO->deleteById($id);
            header("location: " . BASEURL . "/controller/NoticiasController.php?action=list");
            exit;
        } else {
            $this->list("Notícia não encontrada!");
        }
    }
}

new NoticiasController();
