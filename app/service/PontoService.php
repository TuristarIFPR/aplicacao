<?php
    
require_once(__DIR__ . "/../model/PontoTuristico.php");

class PontoService {

    /* Método para validar os dados do ponto turistico que vem do formulário */
    public function validarDados(PontoTuristico $ponto) {
        $erros = array();

        //Validar campos vazios
        if(! $ponto->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $ponto->getEndereco())
            array_push($erros, "O campo [Endereco] é obrigatório.");

        if(! $ponto->getDescricao())
            array_push($erros, "O campo [Descricao] é obrigatório.");

        //imagem

        return $erros;
    }

    
}
