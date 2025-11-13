<?php
#Nome do arquivo: PontoDAO.php
#Objetivo: classe DAO para o model de Ponto turistico

require_once(__DIR__ . "/../connection/Connection.php");
require_once(__DIR__ . "/../model/PontoTuristico.php");
require_once(__DIR__ . "/CidadeDAO.php");

class PontoDAO {

    private CidadeDAO $cidadeDAO;

    //Método para listar os pontos turisticos a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM pontos_turisticos u ORDER BY u.nome";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapPontos($result);
    }

    //Método para buscar um ponto turistico por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM pontos_turisticos pontos" .
               " WHERE pontos.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $pontos = $this->mapPontos($result);

        if(count($pontos) == 1)
            return $pontos[0];
        elseif(count($pontos) == 0)
            return null;

     }


    //Método para inserir um Ponto turistico
    public function insert(PontoTuristico $ponto) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO pontos_turisticos (nome, endereco, cidade_id, descricao, imagem)" .
               " VALUES (:nome, :endereco, :cidade_id, :descricao, :imagem)"; 
        
        $stm = $conn->prepare($sql); 
        $stm->bindValue("nome", $ponto->getNome());
        $stm->bindValue("cidade_id", $ponto->getCidade()->getId());
        $stm->bindValue("endereco", $ponto->getendereco());
        $stm->bindValue("descricao", $ponto->getdescricao());
        $stm->bindValue("imagem", $ponto->getImagem());

        $stm->execute();
    }

    //Método para atualizar um Ponto turistico
    public function update(PontoTuristico $ponto) {
        $conn = Connection::getConn();

        $sql = "UPDATE pontos_turisticos SET nome = :nome, endereco = :endereco," . 
               " descricao = :descricao" .   
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $ponto->getNome());
        $stm->bindValue("endereco", $ponto->getEndereco());
        $stm->bindValue("descricao", $ponto->getDescricao());
        $stm->bindValue("id", $ponto->getId());
        $stm->execute();
    }

    //Método para excluir um Ponto turistico pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM pontos_turisticos WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Ponto
    private function mapPontos($result) {

        $cidadeDAO = new CidadeDAO();

        $pontos = array();
        foreach ($result as $reg) {
            $ponto = new PontoTuristico();
            $ponto->setId($reg['id']);
            $ponto->setNome($reg['nome']);
            $ponto->setImagem($reg['imagem']);
            $ponto->setDescricao($reg['descricao']);
            $ponto->setEndereco($reg['endereco']);
            // imagem

            $ponto->setCidade($cidadeDAO->findById($reg['cidade_id']));

            array_push($pontos, $ponto);
        }

        return $pontos;
    }

}