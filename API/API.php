<?php
include("Product.php");
include("arrays.php");
header('Content-Type: application/json');
$products = array();

//gör 10 produktobjekt och stoppar dom i en array
for ($i = 0; $i < 10; $i++) {
    $name = $productNames[$i];
    $price = $productPrices[$i];
    $image = "http://localhost/eastcompany/API/images/$i.jpg";
    $product = new Product($name, $image, $price);
    array_push($products, $product->toArray());
}

echo json_encode($products);
