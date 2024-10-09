<?php
$url = 'https://sd-lab.nl/';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

$data = curl_exec($ch);

echo $data;