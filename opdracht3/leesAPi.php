<?php

$url = 'https://89621.stu.sd-lab.nl/OOP2/api/opdracht3/mijnAPi.php';

$ch = curl_init();
header("Content-Type: JSON");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);

echo $data;