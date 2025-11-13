<?php
#Nome do arquivo: PontoDAO.php
#Objetivo: classe DAO para o model de Noticias

require_once(__DIR__ . "/../connection/Connection.php");
require_once(__DIR__ . "/../model/Noticias.php");
require_once(__DIR__ . "/NoticiasDAO.php");

class NoticiasDAO {

  private PontoDAO $pontoDAO;

    //Método para listar as noticias a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM noticias u ORDER BY u.titulo";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapNoticias($result);
    }

    //Método para buscar uma noticia por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM noticias n WHERE n.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $noticias = $this->mapNoticias($result);

        if(count($noticias) == 1)
            return $noticias[0];
        elseif(count($noticias) == 0)
            return null;

     }


    //Método para inserir uma notica
    public function insert(Noticias $noticia) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO noticias (titulo, texto, data, pontos_turisticos_id)" .
               " VALUES (:titulo, :texto, :data, :pontos_turisticos_id)"; 
        
        $stm = $conn->prepare($sql); 
        $stm->bindValue("titulo", $noticia->getTitulo());
        $stm->bindValue("texto", $noticia->getTexto());
        $stm->bindValue("data", $noticia->getData());
        $stm->bindValue("pontos_turisticos_id", $noticia->getPonto_turistico()->getId());
        $stm->execute();
    }

    //Método para atualizar uma noticia
    public function update(Noticias $noticia) {
        $conn = Connection::getConn();

        $sql = "UPDATE noticias SET titulo = :titulo, texto = :texto," . 
               " data = :data" .   
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("titulo", $noticia->getTitulo());
        $stm->bindValue("texto", $noticia->getTexto());
        $stm->bindValue("data", $noticia->getData());
        $stm->bindValue("id", $noticia->getId());
        $stm->execute();
    }

    //Método para excluir uma noticia pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM noticias WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Noticias
    private function mapNoticias($result) {

        $pontoDAO = new PontoDAO();

        $noticias = array();
        foreach ($result as $reg) {
            $noticia = new Noticias();
            $noticia->setId($reg['id']);
            $noticia->setTitulo($reg['titulo']);
            $noticia->setTexto($reg['texto']);
            $noticia->setData($reg['data']);
         
            $noticia->setPonto_turistico($pontoDAO->findById($reg['pontos_turisticos_id']));

            array_push($noticias, $noticia);
        }

        return $noticias;
    }

}