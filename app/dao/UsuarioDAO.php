<?php
#Nome do arquivo: UsuarioDAO.php
#Objetivo: classe DAO para o model de Usuario

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Usuario.php");

class UsuarioDAO {

    //Método para listar os usuários a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuarios u ORDER BY u.nome_completo";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapUsuarios($result);
    }

    //Método para buscar um usuário por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuarios u" .
               " WHERE u.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapUsuarios($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findById()" . 
            " - Erro: mais de um usuário encontrado.");
    }


    //Método para buscar um usuário por seu email e senha
    public function findByEmailSenha(string $email, string $senha) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuarios u" .
               " WHERE BINARY u.email = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$email]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapUsuarios($result);

        if(count($usuarios) == 1) {
            //Tratamento para senha criptografada
            if(password_verify($senha, $usuarios[0]->getSenha()))
                return $usuarios[0];
            else
                return null;
        } elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findByEmailSenha()" . 
            " - Erro: mais de um usuário encontrado.");
    }

    //Método para inserir um Usuario
    public function insert(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO usuarios (email, nome_completo, senha, data_nasc, telefone, tipo)" .
               " VALUES (:email, :nomeCompleto, :senha, :dataNasc, :telefone, :tipo)"; 
        
        $senhaCripto = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);

        $stm = $conn->prepare($sql); 
        $stm->bindValue("email", $usuario->getEmail());
        $stm->bindValue("nomeCompleto", $usuario->getNomeCompleto());
        $stm->bindValue("senha", $senhaCripto);
        $stm->bindValue("dataNasc", $usuario->getDataNasc());
        $stm->bindValue("telefone", $usuario->getTelefone());
        $stm->bindValue("tipo", $usuario->getTipo());
        $stm->execute();
    }

    //Método para atualizar um Usuario
    public function update(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "UPDATE usuarios SET nome_completo = :nome, email = :email," . 
               " senha = :senha, tipo = :tipo, data_nasc = :dataNasc, telefone = :telefone" .   
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $usuario->getNomeCompleto());
        $stm->bindValue("email", $usuario->getEmail());
        $stm->bindValue("senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stm->bindValue("tipo", $usuario->getTipo());
        $stm->bindValue("dataNasc", $usuario->getDataNasc());
        $stm->bindValue("telefone", $usuario->getTelefone());
        $stm->bindValue("id", $usuario->getId());
        $stm->execute();
    }

    //Método para excluir um Usuario pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM usuarios WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para retornar a quantidade de usuários salvos na base
    public function quantidadeUsuarios() {
        $conn = Connection::getConn();

        $sql = "SELECT COUNT(*) AS qtd_usuarios FROM usuarios";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $result[0]["qtd_usuarios"];
    }

    //Método para converter um registro da base de dados em um objeto Usuario
    private function mapUsuarios($result) {
        $usuarios = array();
        foreach ($result as $reg) {
            $usuario = new Usuario();
            $usuario->setId($reg['id']);
            $usuario->setNomeCompleto($reg['nome_completo']);
            $usuario->setEmail($reg['email']);
            $usuario->setSenha($reg['senha']);
            $usuario->setDataNasc($reg['data_nasc']);
            $usuario->setTelefone($reg['telefone']);
            $usuario->setTipo($reg['tipo']);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

}