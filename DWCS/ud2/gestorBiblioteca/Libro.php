<?php
class Libro
{
    private int $id;
    private string $isbn;
    private string $titulo;
    private string $autor;
    private int $ano;


    function __toString()
    {
        return "<br><br> id: $this->id, isbn: $this->isbn , titulo: $this->titulo, autor: $this->autor , ano: $this->ano";
    }
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getIsbn()
    {
        return $this->isbn;
    }


    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }


    public function getTitulo()
    {
        return $this->titulo;
    }


    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }


    public function getAutor()
    {
        return $this->autor;
    }


    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }


    public function getAno()
    {
        return $this->ano;
    }


    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }
}
