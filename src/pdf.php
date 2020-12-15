<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new Calculator();
$calculated = $calculator->calculate(
  (string) $_GET['facility_name'], // facilityName
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
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/pdf.css" rel="stylesheet" />
    </head>
    <body>

        <div id="content">
            <div class="hero">
                <h2>Your Cost Comparison Results</h2>
                <p>
                    Here’s how your current costs for reusables stack up against sterile single-use bronchoscopes. By integrating BFlex™ with your inventory, you’re helping to reduce preventable infections from cross-contamination and save time on repairs and reprocessing*.
                </p>
            </div>
            <table>
                <tr>
                    <td>
                        <h3>Current Costs</h3>
                        <h4>Current Bronchoscope Usage</h4>
                        <table>
                            <tr>
                                <td>
                                    Single use BFlex scopes
                                </td>
                                <td>
                                    $<?php echo $calculated['current_costs']['equipment_costs']['single_use_scopes']; ?>
                                </td>
                            </tr>
                        </table>
                        <hr />
                        <table class="sum">
                            <tr>
                                <td>
                                    <h4>Annual Costs</h4>
                                </td>
                                <td>
                                    $<?php echo number_format($calculated['reducing_costs']['equipment_costs']['total_su_bflex_cost']) ?>
                                </td>
                            </tr>
                        </table>


                    </td>
                    <td class="with">
                        <h3>
                            With BFlex™
                        </h3>
                        <h4>
                            Current Bronchoscope Usage
                        </h4>
                    </td>
                </tr>
            </table>
        </div>

        <?php // include('results.php'); ?>

        <!-- BOOTSTRAP -->
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    </body>
</html>
