<?php
class Vehicle
{
    private int $id;
    private string $plate;
    private string $brand;
    private string $model;
    private int $year;


    public function __toString()
    {
        echo $this->getId() . " " . $this->getPlate() . " " . $this->getBrand() . " " . $this->getModel() . " " . $this->getYear();
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


    public function getPlate()
    {
        return $this->plate;
    }

    public function setPlate($plate)
    {
        $this->plate = $plate;

        return $this;
    }


    public function getBrand()
    {
        return $this->brand;
    }


    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }


    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }
}
