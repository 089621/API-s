<?php
$api_key = '2097d2f4fd6c802c7a8c29af9af6b524';
$stad = 'Rotterdam';
$land = 'NL';

// Haal de huidige weergegevens op
$url_current = "https://api.openweathermap.org/data/2.5/weather?q=$stad,$land&appid=$api_key&lang=nl&units=metric";
$response_current = file_get_contents($url_current);
$data_current = json_decode($response_current, true);

// Haal de weersverwachting voor de komende 3 dagen op
$url_forecast = "https://api.openweathermap.org/data/2.5/forecast?q=$stad,$land&appid=$api_key&lang=nl&units=metric";
$response_forecast = file_get_contents($url_forecast);
$data_forecast = json_decode($response_forecast, true);

if ($data_current && $data_forecast) {
$stad_naam = $data_current['name'];
$land_naam = $data_current['sys']['country'];
$gps = "Lat: {$data_current['coord']['lat']}, Lon: {$data_current['coord']['lon']}";
$temperatuur = round($data_current['main']['temp']);
$zonsopgang = date('H:i', $data_current['sys']['sunrise']);
$zonsondergang = date('H:i', $data_current['sys']['sunset']);
$windsnelheid = $data_current['wind']['speed'];
$windrichting = $data_current['wind']['deg'];
$icoon = "https://openweathermap.org/img/w/{$data_current['weather'][0]['icon']}.png";
$satellietfoto = "https://api.mapbox.com/styles/v1/mapbox/satellite-streets-v11/static/pin-s+FF0000($gps)/$gps,9/600x400?access_token=JOUW_MAPBOX_API_SLEUTEL";

echo "<h1>Weer in $stad_naam, $land_naam</h1>";
echo "<p>GPS locatie: $gps</p>";
echo "<p>Huidige temperatuur: $temperatuur &#8451;</p>";
echo "<p>Zonsopkomst: $zonsopgang | Zonsondergang: $zonsondergang</p>";
echo "<p>Huidige windsnelheid: $windsnelheid km/h</p>";
echo "<p>Windrichting: $windrichting &#176;</p>";
echo "<img src='$icoon' alt='Huidig weer icoon'>";
echo "<img src='$satellietfoto' alt='Satellietfoto'>";

echo "<h2>Weersverwachting voor de komende 3 dagen:</h2>";
echo "<ul>";
    foreach ($data_forecast['list'] as $forecast) {
    $datum = date('d-m-Y', $forecast['dt']);
    $temperatuur_min = round($forecast['main']['temp_min']);
    $temperatuur_max = round($forecast['main']['temp_max']);
    $icoon = "https://openweathermap.org/img/w/{$forecast['weather'][0]['icon']}.png";

    echo "<li><strong>$datum:</strong> Min: $temperatuur_min &#8451; | Max: $temperatuur_max &#8451; <img src='$icoon' alt='Weer icoon'></li>";
    }
    echo "</ul>";
} else {
echo "<p>Er is een probleem opgetreden bij het ophalen van de weerinformatie.</p>";
}

