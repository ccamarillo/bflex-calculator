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

<html>
  <body>
    <h1>PDF</h1>
    <pre>
     <?php echo var_dump($calculated); ?>
    </pre>
  </body>
</html>