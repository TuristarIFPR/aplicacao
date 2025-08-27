<?php 
#Nome do arquivo: Usuario.php
#Objetivo: classe Model para Usuario

require_once(__DIR__ . "/enum/UsuarioTipo.php");

class Cidade {

    private ?int $id;
    private ?string $nome;  
    private ?string $estadoSigla;
    private ?string $estadoNome;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of estadoSigla
     */ 
    public function getEstadoSigla()
    {
        return $this->estadoSigla;
    }

    /**
     * Set the value of estadoSigla
     *
     * @return  self
     */ 
    public function setEstadoSigla($estadoSigla)
    {
        $this->estadoSigla = $estadoSigla;

        return $this;
    }

    /**
     * Get the value of estadoNome
     */ 
    public function getEstadoNome()
    {
        return $this->estadoNome;
    }

    /**
     * Set the value of estadoNome
     *
     * @return  self
     */ 
    public function setEstadoNome($estadoNome)
    {
        $this->estadoNome = $estadoNome;

        return $this;
    }
}