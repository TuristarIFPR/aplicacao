<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/PontoDAO.php");
require_once(__DIR__ . "/../dao/NoticiasDAO.php");

class SiteController extends Controller
{
    private UsuarioDAO $usuarioDAO;

    public function __construct()
    {
        // Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function home()
    {
        $this->loadView("area_visitante/index.php");
    }

    protected function sobre()
    {
        $this->loadView("area_visitante/sobre.php");
    }

    protected function pontosTuristicos()
    {
        $dao = new PontoDAO();
        $lista = $dao->list();

        $dados = [
            "pontos" => $lista
        ];

        $this->loadView("area_visitante/pontosTuristicos.php", $dados);
    }

    // LISTAGEM DE NOTÍCIAS (TELA PRINCIPAL)
    public function noticias()
    {
        $dao = new NoticiasDAO();
        $noticias = $dao->list();

        $dados = [
            "noticias" => $noticias
        ];

        $this->loadView("area_visitante/noticias.php", $dados);
    }

    protected function pontosTuristicos_detalhes()
    {
        $id = $_GET["id"] ?? null;

        if (!$id) {
            die("Ponto turístico não encontrado.");
        }

        $dao = new PontoDAO();
        $ponto = $dao->findById($id);

        $dados = [
            "ponto" => $ponto
        ];

        $this->loadView("area_visitante/pontosTuristicos_detalhes.php", $dados);
    }

    // DETALHES DA NOTÍCIA
    public function noticias_detalhes()
    {
        if (!isset($_GET['id'])) {
            echo "Notícia não encontrada!";
            exit;
        }

        $id = $_GET['id'];

        $dao = new NoticiasDAO();
        $noticia = $dao->findById($id);

        if (!$noticia) {
            echo "Notícia não encontrada!";
            exit;
        }

        $dados = [
            "noticia" => $noticia
        ];

        $this->loadView("area_visitante/noticias_detalhes.php", $dados);
    }
}

// Criar o objeto do controller
new SiteController();
