<?php

require __DIR__ . '/vendor/autoload.php';


var_dump($_POST);

$calculator = new Calculator();
$calculated = $calculator->calculate(
  (int) $_POST['total_procedures'], // totalProcedures
  (int) $_POST['single_use_procedures'], // singleUseProcedures
  (int) $_POST['bflex_broncoscope_price'], // bflexBroncoscopePrice
  (int) $_POST['current_reusable_quantity'], // currentReusableQuantity
  (int) $_POST['current_annual_service_per'], // currentAnnualServicePer
  (string) $_POST['reprocessing_calc_method'], // reprocessingCalcMethod
  (int) $_POST['current_infections'], // currentInfections
  (int) $_POST['current_annual_oop_repair_all_factor'] //currentAnnualOopRepairAllFactor
);

echo '<pre>';
var_dump($calculated);
echo '</pre>';