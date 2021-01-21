<?php
include("Product.php");
include("arrays.php");
header('Content-Type: application/json');
$products = array();

//gör 10 produktjävlar (tror det ska vara 10) och pushar in dom i en äcklig jävla array
//TODO: gör arrayer för name och description
for ($i=0; $i < 10 ; $i++) { 
    $product = new Product($names[$i], );
    array_push($products, $product->toArray());
}

echo json_encode($products);