<?php
    
require_once(__DIR__ . "/../model/Noticias.php");

class NoticiasService {

    /* Método para validar os dados da noticia que vem do formulário */
    public function validarDados(Noticias $noticia) {
        $erros = array();

        //Validar campos vazios
        if(! $noticia->getTitulo())
            array_push($erros, "O campo [Titulo] é obrigatório.");

        if(! $noticia->getTexto())
            array_push($erros, "O campo [Texto] é obrigatório.");

        if(! $noticia->getData())
            array_push($erros, "O campo [Data] é obrigatório.");

    

        return $erros;
    }

    
}
