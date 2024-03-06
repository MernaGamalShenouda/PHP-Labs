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
    <style>
       body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Add a background color */
        }

        div {
            text-align: center;
            background-color: #fff; /* White background color */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }

        h2 {
            font-weight: bold; /* Make the heading bold */
        }

        p {
            font-size: 24px;
            margin: 10px 0;
            color: #333; /* Dark text color */
        }
    </style>
</head>
<body>
<div> Counted Unique Visitors</div> 
<p> <?php echo $visitors ?>  </p>
</body>
</html>