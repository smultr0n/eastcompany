<?php

class Data
{
    public static $ENDPOINT = "http://localhost/eastcompany/API/API.php";

    public static function main()
    {
        try {
            $array = self::getData();
            self::viewData($array);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getData()
    {
        //get request som skickar get request till apin
        $show = isset($_GET["show"]) ? $_GET["show"] : 10;
        $json = @file_get_contents(self::$ENDPOINT . "?show=$show");
        if (!$json)
            throw new Exception("<h1>Ett fel har inträffat</h1>");

        return json_decode($json, true);
    }

    public static function viewData($array)
    {
        $output = "";
        if (array_key_exists("error", $array)) {
            $output .= "<p class='error'>" . $array["error"] . "</p>";
        } else {
            foreach ($array as $key => $value) {
                $output .= "<div class='row product'><img class='thumbnail col' src='http://localhost/eastcompany/API/images/" . $value['image'] . "'>
                <div class='product-info col'>
                <p class='name'>" . $value['name'] . "</p>
                <p class='description'>" . $value['description'] . "</p>
                <p class='price'>" . $value['price'] . "kr</p>";
                if ($value['stock'] == 0) {
                    $output .= "<p class='stock' id='no-stock'>Finns ej i lager</p>";
                } else {
                    $output .= "<p class='stock'>" . $value['stock'] . "st finns i lager </p>";
                }
                $output .= "</div></div>";
            }
        }

        echo $output;
    }
}
