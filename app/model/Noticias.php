<?php 

class Noticias {

    private ?int $id;
    private ?string $titulo;  
    private ?string $texto;
    private ?string $data;
    private PontoTuristico $ponto_turistico;

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
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of ponto_turistico
     */ 
    public function getPonto_turistico()
    {
        return $this->ponto_turistico;
    }

    /**
     * Set the value of ponto_turistico
     *
     * @return  self
     */ 
    public function setPonto_turistico($ponto_turistico)
    {
        $this->ponto_turistico = $ponto_turistico;

        return $this;
    }
}