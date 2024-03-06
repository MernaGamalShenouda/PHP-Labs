<?php
require_once "vendor/autoload.php";
session_start();
$visitorsCounter = new Counter();

// Check if the visit has not been counted
if (!isset($_SESSION['COUNTED']) || !$_SESSION['COUNTED']) {
    $visitorsCounter->incrementsCounter();
    $_SESSION['COUNTED'] = true;
}

$visitors = $visitorsCounter->getCounter();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"> 
     
</head>
<body>
<div> Counted Unique Visitors</div> 
<p> <?php echo $visitors ?>  </p>
</body>
</html>