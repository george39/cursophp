<!--22 para google maps -->
<?php 
$mapa = htmlentities($_GET['mapa']);
$address = urlencode($mapa);
$url = "https://www.google.com/maps/api/geocode/json?sensor=false&address=".$address;
$response = file_get_contents($url);
$json = json_decode($response,true);
$lat = $json['results'][0]['geometry']['location']['lat'];
$lng = $json['results'][0]['geometry']['location']['lng'];

echo $lat;
echo "<br>";
echo $lng;
?>