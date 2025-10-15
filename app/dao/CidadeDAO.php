<?php
#Nome do arquivo: CidadeDAO.php
#Objetivo: classe DAO para o model de Cidade

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Usuario.php");
include_once(__DIR__ . "/../model/Cidade.php");


class CidadeDAO {

    //Método para listar as cidades a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM cidades u ORDER BY u.nome";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapCidades($result);
    }

    //Método para buscar uma cidade por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM cidades u" .
               " WHERE u.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $cidades = $this->mapCidades($result);

        if(count($cidades) == 1)
            return $cidades[0];
        elseif(count($cidades) == 0)
            return null;

        die("UsuarioDAO.findById()" . 
            " - Erro: mais de uma cidade encontrada.");
    }


    //Método para inserir uma cidade
    public function insert(Cidade $cidade) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO cidades (nome, estado_sigla, estado_nome)" .
               " VALUES (:nome, :estadoSigla, :estadoNome)"; 
        
        $stm = $conn->prepare($sql); 
        $stm->bindValue("nome", $cidade->getNome());
        $stm->bindValue("estadoSigla", $cidade->getEstadoSigla());
        $stm->bindValue("estadoNome", $cidade->getEstadoNome());
        $stm->execute();
    }

    //Método para atualizar um Cidade
    public function update(Cidade $cidade) {
        $conn = Connection::getConn();

        $sql = "UPDATE cidades SET nome = :nome, estado_sigla = :sigla," . 
               " estado_nome = :estado" .   
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $cidade->getNome());
        $stm->bindValue("sigla", $cidade->getEstadoSigla());
        $stm->bindValue("estado", $cidade->getEstadoNome());
        $stm->bindValue("id", $cidade->getId());
        $stm->execute();
    }

    //Método para excluir uma cidade pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM cidades WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Usuario
    private function mapCidades($result) {
        $cidades = array();
        foreach ($result as $reg) {
            $cidade = new Cidade();
            $cidade->setId($reg['id']);
            $cidade->setNome($reg['nome']);
            $cidade->setEstadoSigla($reg['estado_sigla']);
            $cidade->setEstadoNome($reg['estado_nome']);
            array_push($cidades, $cidade);
        }

        return $cidades;
    }

}