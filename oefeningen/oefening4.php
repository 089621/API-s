<?php
$url = 'api.openweathermap.org/data/2.5/weather?q=London&appid=2097d2f4fd6c802c7a8c29af9af6b524';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

$data = curl_exec($ch);

echo $data;
