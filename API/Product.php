<?php
//cool produkt :)
//klura ut vad fan vi ska sälja
class Product {
    //skrivs in manuellt
    private  $name;
    private $description;
    //slumpgeneras
    private $price;
    private $stock;
    //lös vart bilderna skall komma infrån
    private $image;

    public function __construct($name, $description, $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->price = rand(5, 20);
        $this->stock = rand(0, 50);    
    }

    //gör objekt till en associative array
    public function toArray(){
        $array = array(
            "name" => $this->name,
            "description" => $this->description,
            "image" => $this->image,
            "price" => $this->price,
            "stock" => $this->stock
        );
        return $array;
    }
}