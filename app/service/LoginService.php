<?php
#Nome do arquivo: LoginService.php
#Objetivo: classe service para Login

require_once(__DIR__ . "/../model/Usuario.php");

class LoginService {

    public function validarCampos(?string $email, ?string $senha) {
        $arrayMsg = array();

        //Valida o campo nome
        if(! $email)
            array_push($arrayMsg, "O campo [Email] é obrigatório.");

        //Valida o campo login
        if(! $senha)
            array_push($arrayMsg, "O campo [Senha] é obrigatório.");

        return $arrayMsg;
    }

    public function salvarUsuarioSessao(Usuario $usuario) {
        //Habilitar o recurso de sessão no PHP nesta página
        session_start();

        //Setar usuário na sessão do PHP
        $_SESSION[SESSAO_USUARIO_ID]   = $usuario->getId();
        $_SESSION[SESSAO_USUARIO_PAPEL] = $usuario->getEmail();
        $_SESSION[SESSAO_USUARIO_NOME] = $usuario->getNomeCompleto();
        $_SESSION[SESSAO_USUARIO_PAPEL] = $usuario->getSenha();
        $_SESSION[SESSAO_USUARIO_PAPEL] = $usuario->getDataNasc();
        $_SESSION[SESSAO_USUARIO_PAPEL] = $usuario->getTelefone();
        $_SESSION[SESSAO_USUARIO_PAPEL] = $usuario->getTipo();



    }

    public function removerUsuarioSessao() {
        //Habilitar o recurso de sessão no PHP nesta página
        session_start();

        //Destroi a sessão 
        session_destroy();
    }

}