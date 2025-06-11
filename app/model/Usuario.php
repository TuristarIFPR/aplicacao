<?php 
#Nome do arquivo: Usuario.php
#Objetivo: classe Model para Usuario

require_once(__DIR__ . "/enum/UsuarioPapel.php");

class Usuario {

    private ?int $id;
    private ?string $email;  
    private ?string $nomeCompleto;
    private ?string $senha;
    private ?string $dataNasc;
    private ?string $telefone;
    private ?string $tipo;
    

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nomeCompleto
     */
    public function getNomeCompleto(): ?string
    {
        return $this->nomeCompleto;
    }

    /**
     * Set the value of nomeCompleto
     */
    public function setNomeCompleto(?string $nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha(): ?string
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha(?string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of dataNasc
     */
    public function getDataNasc(): ?string
    {
        return $this->dataNasc;
    }

    /**
     * Set the value of dataNasc
     */
    public function setDataNasc(?string $dataNasc): self
    {
        $this->dataNasc = $dataNasc;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}