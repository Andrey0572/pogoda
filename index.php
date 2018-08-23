<?php
$weather = file_get_contents ('http://api.openweathermap.org/data/2.5/weather?id=5601538&units=metric&appid=6d667e50e2a3f32a9097f0dc8991b5a2');
$objWeather = json_decode ($weather);
 //print_r ($objWeather);
$temp = $objWeather -> main -> temp ;
$cloud = $objWeather -> weather[0] -> description;
$pressure = $objWeather -> main -> pressure;
$humidity = $objWeather -> main -> humidity;
$temp_min = $objWeather -> main -> temp_min;
$temp_max = $objWeather -> main -> temp_max;
$wind_speed = $objWeather -> wind -> speed;
$wind_deg = $objWeather -> wind -> deg ;
$name = $objWeather -> name;
// Определяем направление ветра
if (0 < $wind_deg && $wind_deg < 90) {
    $wind_deg  = "С-В";
} elseif (90 < $wind_deg && $wind_deg < 180) {
    $wind_deg  = "Ю-В";
} elseif (180 < $wind_deg && $wind_deg < 270) {
    $wind_deg  = "Ю-З";
} elseif ( 270 < $wind_deg && $wind_deg < 360 ) {
    $wind_deg = "С-З";
} elseif ( $wind_deg = 0) {
    $wind_deg = "С";
} elseif ( $wind_deg = 90) {
    $wind_deg = "В";
} elseif ( $wind_deg = 180) {
    $wind_deg = "Ю";
} elseif ( $wind_deg = 270) {
    $wind_deg = "З";
}
?>

<!DOCTYPE  html>
<html  lang = "ru">
<head>
    <meta  charset = "UTF-8">
    <title> Сложные погодные условия </title>
</head>
<body>
<h1> Погода: </h1>
<table  border ="1px solid #FFFFFF"  cellspacing = 0>
    <tr>
        <td> Название города </td>
        <td> <?php echo $name; ?> &deg; C </td >   
    </tr>
    <tr>
        <td> Температура </td>
        <td> <?php echo $temp; ?> &deg; C </td >   
    </tr>
    <tr>
        <td> Температура мин </td>
        <td> <?php echo $temp_min; ?> &deg; C </td >   
    </tr>
    <tr>
        <td> Температура мах </td>
        <td> <?php echo $temp_max; ?> &deg; C </td >   
    </tr>
    <tr>
        <td> Облачность </td>
        <td> <?php echo $cloud; ?> </td>  
    </tr>
    <tr>
        <td> Атмосферное давление </td>
        <td> <?php echo $pressure; ?> мм рт.ст </td>  
    </tr>
    <tr>
        <td> Влажность </td>
        <td> <?php echo $humidity; ?> % </td>  
    </tr>
    <tr>
        <td> Ветер </td>
        <td> <?php echo $wind_speed; ?> m/s <?php echo $wind_deg; ?> </td>    
    </tr>
</table>
</body>
</html>