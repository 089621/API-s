<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$db_hostname = 'localhost';
$db_user = 'mihai';
$db_password = 'rf2wM5!60';
$db_name = 'db089621';

$mysqli = mysqli_connect($db_hostname, $db_user, $db_password, $db_name);

if (!$mysqli) {
    echo 'Geen verbinding met de database';
} else {
    //  echo "Verbonden met de database";

    $sql = "select * from cars";
    $result = mysqli_query($mysqli, $sql);
    if ($result){
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)){
            $response[$i] ['Make'] = $row ['Make'] ;
            $response[$i] ['Model'] = $row ['Model'] ;
            $response[$i] ['Year'] = $row ['Year'] ;
            $response[$i] ['Color'] = $row ['Color'] ;
            $response[$i] ['Price'] = $row ['Price'] ;
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);

    }
}

