<?php
    
require_once(__DIR__ . "/../model/Cidade.php");

class CidadeService {

    /* Método para validar os dados da cidade que vem do formulário */
    public function validarDados(Cidade $cidade) {
        $erros = array();

        //Validar campos vazios
        if(! $cidade->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $cidade->getEstadoSigla())
            array_push($erros, "O campo [Sigla] é obrigatório.");

        if(! $cidade->getEstadoNome())
            array_push($erros, "O campo [Estado] é obrigatório.");

        return $erros;
    }

    
}
