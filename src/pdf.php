<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new Calculator();
$calculated = $calculator->calculate(
  (int) $_GET['total_procedures'], // totalProcedures
  (int) $_GET['single_use_procedures'], // singleUseProcedures
  (int) $_GET['bflex_broncoscope_price'], // bflexBroncoscopePrice
  (int) $_GET['current_reusable_quantity'], // currentReusableQuantity
  (int) $_GET['current_annual_service_per'], // currentAnnualServicePer
  (string) $_GET['reprocessing_calc_method'], // reprocessingCalcMethod
  (int) $_GET['current_infections'], // currentInfections
  (int) $_GET['current_annual_oop_repair_all_factor'] //currentAnnualOopRepairAllFactor
);

?>


<!doctype html>
<html lang="en">
    <head>
        <title>The Hidden ROI of Single-Use Bronchoscopes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!--<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="print" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    </head>
    <body class="pdf">

        <?php include('results.php'); ?>

        <!-- BOOTSTRAP -->
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    </body>
</html>
