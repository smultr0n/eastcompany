<?php

class Data
{
    public static $ENDPOINT = "http://localhost/eastcompany/API/API.php";

    public static function main()
    {
        $array = self::getData();

        self::viewData($array);
    }

    public static function getData()
    {
        $json = @file_get_contents(self::$ENDPOINT);
        if (!$json)
            throw new Exception("<h1>Ett fel har inträffat</h1>");

        return json_decode($json, true);
    }

    public static function viewData($array)
    {
        $output = "";
        foreach ($array as $key => $value) {
            $output .= "<div class='row product'><img class='thumbnail' src='" . $value['image'] . "'>
            <p class='name'>" . $value['name'] . "</p>
            <p class='description'>" . $value['description'] . "</p>
            <p class='price'>$" . $value['price'] . "</p>";
            if($value['stock'] == 0){
                $output .= "<p class='stock' id='no-stock'>Finns ej i lager</p>";    
            } else{
                $output .= "<p class='stock'>" . $value['stock'] . "st finns i lager </p>";   
            }
            $output .= "</div>";
        }
        echo $output;
    }
}
