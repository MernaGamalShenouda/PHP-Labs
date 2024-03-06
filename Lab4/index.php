<?php
require_once "vendor/autoload.php";
ini_set('memory_limit', '-1');
$weather = new Weather();
$egyption_cities = $weather->get_cities();
if (isset($_POST["submit"])) {
  $cityId = $_POST["city"];
  $data = $weather->get_weather($cityId);
  $currentTime = $weather->get_current_time();
  $currentDate = $weather->get_current_date();

  echo '<div>';
  echo '<h2> '.($data['name']) .' Weather Status</h2>';
  echo '<p>' .($currentTime) . '</p>';
  echo '<p>' .($currentDate) . '</p>';
  echo '<p>Description: ' .($data['weather'][0]['description']) . '</p>';
  echo '<img src="http://openweathermap.org/img/w/' . $data['weather'][0]['icon'] . '.png" alt="Weather Icon">';
  echo '<p>Min Temperature: ' .($data['main']['temp_min']) . ' °C</p>';
  echo '<p>Max Temperature: ' .($data['main']['temp_max']) . ' °C</p>';
  echo '<p>Humidity: ' .($data['main']['humidity']) . '%</p>';
  echo '<p>Wind Speed: ' .($data['wind']['speed']) . ' km/h</p>';
  echo '</div>';
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    <form method="post">
        <br>
        <h3>Weather Forcast</h3>
        <label for="city">Select a city:</label>
        <select name="city" id="city">
            <?php
            foreach ($egyption_cities as $cityId => $cityName) {
                echo "<option value=\"$cityId\">$cityName</option>";
            }
            ?>
        </select>
        <button type="submit" name="submit">Search</button>
    </form>

    </body>
</html>
