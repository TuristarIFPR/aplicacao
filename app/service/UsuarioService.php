<?php
    
require_once(__DIR__ . "/../model/Usuario.php");

class UsuarioService {

    /* Método para validar os dados do usuário que vem do formulário */
    public function validarDados(Usuario $usuario, ?string $confSenha) {
        $erros = array();

        //Validar campos vazios
        if(! $usuario->getNomeCompleto())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $usuario->getEmail())
            array_push($erros, "O campo [E-mail] é obrigatório.");

        if(! $usuario->getDataNasc())
            array_push($erros, "O campo [Data de nascimento] é obrigatório.");

        if(! $usuario->getTelefone())
            array_push($erros, "O campo [Telefone] é obrigatório.");

        if(! $usuario->getSenha())
            array_push($erros, "O campo [Senha] é obrigatório.");

        if(! $confSenha)
            array_push($erros, "O campo [Confirmação da senha] é obrigatório.");

        if(! $usuario->getTipo()) 
            array_push($erros, "O campo [Papel] é obrigatório");

        //Validar se a senha é igual à confirmação de senha
        if($usuario->getSenha() && $confSenha && $usuario->getSenha() != $confSenha)
            array_push($erros, "O campo [Senha] deve ser igual ao [Confirmação da senha].");

        return $erros;
    }

    public function validarAutoCadastro(Usuario $usuario) {
        $erros = array();

        return $erros;
    }

    /* Método para validar se o usuário selecionou uma foto de perfil */
    public function validarFotoPerfil(array $foto) {
        $erros = array();
        
        if($foto['size'] <= 0)
            array_push($erros, "Informe a foto para o perfil!");

        return $erros;
    }

}
