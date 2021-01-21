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

    public function __construct($name, $image)
    {
        $this->name = $name;
        $this->description = self::lorem();
        $this->image = $image;
        $this->price = rand(5, 20);
        $this->stock = rand(0, 50);    
    }
    public static function lorem(){
        $endpoint = "https://loripsum.net/api/1";
        return file_get_contents($endpoint);
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