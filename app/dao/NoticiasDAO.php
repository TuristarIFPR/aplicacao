<?php
#Nome do arquivo: NoticiasDAO.php
#Objetivo: classe DAO para o model de Noticias

require_once(__DIR__ . "/../connection/Connection.php");
require_once(__DIR__ . "/../model/Noticias.php");
require_once(__DIR__ . "/PontoDAO.php");

class NoticiasDAO {

    // LISTAR TODAS AS NOTÍCIAS
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM noticias ORDER BY data DESC";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapNoticias($result);
    }

    // BUSCAR NOTÍCIA POR ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM noticias WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $noticias = $this->mapNoticias($result);

        return count($noticias) == 1 ? $noticias[0] : null;
    }

    // INSERIR NOTÍCIA
    public function insert(Noticias $noticia) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO noticias (titulo, texto, data, pontos_turisticos_id)
                VALUES (:titulo, :texto, :data, :pontos_turisticos_id)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("titulo", $noticia->getTitulo());
        $stm->bindValue("texto", $noticia->getTexto());
        $stm->bindValue("data", $noticia->getData());
        $stm->bindValue("pontos_turisticos_id", $noticia->getPonto_turistico()->getId());
        $stm->execute();
    }

    // ATUALIZAR NOTÍCIA
    public function update(Noticias $noticia) {
        $conn = Connection::getConn();

        $sql = "UPDATE noticias 
                SET titulo = :titulo, texto = :texto, data = :data, pontos_turisticos_id = :pontos_turisticos_id
                WHERE id = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("titulo", $noticia->getTitulo());
        $stm->bindValue("texto", $noticia->getTexto());
        $stm->bindValue("data", $noticia->getData());
        $stm->bindValue("pontos_turisticos_id", $noticia->getPonto_turistico()->getId());
        $stm->bindValue("id", $noticia->getId());
        $stm->execute();
    }

    // EXCLUIR NOTÍCIA
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM noticias WHERE id = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    // MAPEAR RESULTADO DO BANCO PARA OBJETO
    private function mapNoticias($result) {

        $pontoDAO = new PontoDAO();

        $noticias = [];
        foreach ($result as $reg) {
            $noticia = new Noticias();
            $noticia->setId($reg['id']);
            $noticia->setTitulo($reg['titulo']);
            $noticia->setTexto($reg['texto']);
            $noticia->setData($reg['data']);

            $noticia->setPonto_turistico(
                $pontoDAO->findById($reg['pontos_turisticos_id'])
            );

            $noticias[] = $noticia;
        }

        return $noticias;
    }
}
