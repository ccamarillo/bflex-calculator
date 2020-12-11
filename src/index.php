<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new Calculator();
$calculated = $calculator->calculate(
  1000, // totalProcedures
  750, // singleUseProcedures
  265, // bflexBroncoscopePrice
  30, // currentReusableQuantity
  2200, // currentAnnualServicePer
  'low', // reprocessingCalcMethod
  7.23, // currentInfections
  53 //currentAnnualOopRepairAllFactor
);

// echo '<pre>';
// var_dump($calculated);
// echo '</pre>';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <!-- APP CONTAINTER -->
    <div id="app"></div>

    <!-- AXIOS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- VUE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.2/vue-router.js"></script>
    <script type="module" src="js/main.js"></script>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
  </body>
</html>