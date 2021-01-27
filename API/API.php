<?php
include("Product.php");
include("arrays.php");
header('Content-Type: application/json');
$products = array();


$show = isset($_GET["show"]) ? $_GET["show"] : 10;

if ($show == 0 || $show > 10) {
    $error = array("error" => "Enbart 1-10 varor kan visas.");
    echo json_encode($error);
} else {

    for ($i = 0; $i < $show; $i++) {
        $name = $productNames[$i];
        $price = $productPrices[$i];
        $image = "$i.jpg";
        $product = new Product($name, $image, $price);
        array_push($products, $product->toArray());
    }
    echo json_encode($products);
}
