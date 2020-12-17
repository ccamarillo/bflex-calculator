<?php

require __DIR__ . '/vendor/autoload.php';

$facility_name = (string) $_GET['facility_name'];

?>

<!doctype html>
<html lang="en">
    <head>
        <title>The Hidden ROI of Single-Use Bronchoscopes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/pdf.css" rel="stylesheet" />
    </head>
    <body>

        <div id="content-pg-1">
            <img class="bflex-logo" src="img/pdf/bflex-logo.png" />
            <h1><strong>Your Cost-Comparison Snapshot</strong>:Single-use vs. reusable bronchoscopes</h1>
            <div class="variable-text-container">
                <h2>See how current costs for reusable bronchoscopes at <strong><?php echo $facility_name; ?></strong> compare to single-use.</h2>
            </div>
            <img class="verathon-logo" src="img/verathon-logo.png" />
        </div>

    </body>
</html>
