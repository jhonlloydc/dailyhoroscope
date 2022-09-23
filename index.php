<?php
    
    
    //This function can be used in any PHP framework like laravel, wordpress, drupal, cakephp etc.

    function aztro($sign, $day) {
        $aztro = curl_init('https://aztro.sameerkumar.website/?sign='.$sign.'&day='.$day);
        curl_setopt_array($aztro, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            )
        ));
        $response = curl_exec($aztro);
        if($response === FALSE){
            die(curl_error($aztro));
        }
        $responseData = json_decode($response, TRUE);
        return $responseData;
    }
    $sign = $_GET['sign'];
    $ObjData = aztro($sign, 'today');
    //var_dump($ObjData);

    $current_date = $ObjData["current_date"];
    $description = $ObjData["description"];
    $mood = $ObjData["mood"];
    $color = $ObjData["color"];
    $lucky_number = $ObjData["lucky_number"];
    $lucky_time = $ObjData["lucky_time"];

    echo "Your daily horoscope for today, ".$current_date.". ".$description."Your mood is ".$mood.", lucky color ".$color.", lucky number ".$lucky_number.", lucky time ".$lucky_time

?>
