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

$columns = [
    'current', 'with'
];

require_once('./includes/calculator-results-language.php'); // brings in $rows

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

        <div id="content-pg-3">
            <div class="hero">
                <h2>Your Cost-Comparison Results</h2>
                <p>
                    Here’s how your current costs for reusables stack up against sterile single-use bronchoscopes. By integrating BFlex™ with your inventory, you can help to reduce preventable infections from cross contamination and save time on repairs and reprocessing. <strong>This comparison is conservative. It omits the capital acquisition costs and operational budgets associated with reusable bronchoscopes.</strong>
                </p>
            </div>
            <table>
                <tr>

                    <?php foreach ($columns as $column) { ?>
                    
                        <td <?php if ($column == 'with') { ?>class="with"<?php } ?>>
                            
                            <h3>
                                <?php if ($column == 'with') { ?>
                                    With BFlex
                                <?php } else { ?>
                                    Current operating costs
                                <?php } ?>
                            </h3>

                            <p class="eyebrow">
                                <?php if ($column == 'with') { ?>
                                    Combined with existing reusable bronchoscope inventory
                                <?php } else { ?>
                                    Using reusable bronchoscopes only
                                <?php } ?>
                                </p>

                            <?php foreach ($rows as $row) { ?>
                                
                                <?php if ($row['type'] == 'section') { ?>
                                    <table class="section">
                                        <tr>
                                            <td style="width: 80%;">
                                                <h4>
                                                    <?php echo $row['title']; ?>
                                                    <?php if ($column == 'current') { ?>
                                                        <?php if ($row['title'] == 'Repair and maintenance costs') { ?><sup>1</sup><?php } ?>
                                                        <?php if ($row['title'] == 'Reprocessing costs') { ?><sup>2</sup><?php } ?>
                                                        <?php if ($row['title'] == 'Preventable infections') { ?><sup>3</sup><?php } ?>
                                                    <?php } ?>
                                                </h4>
                                            </td>
                                            <td>
                                                <?php if (array_key_exists('value_current', $row)) { ?>
                                                    <p class="section-value">
                                                        <?php echo $row['value_' . $column]; ?>
                                                    </p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                <?php } ?>

                                <?php if ($row['type'] == 'result' && $row['title'] != 'Reprocessing costs') { ?>
                                    <table class="result">
                                        <tr>
                                            <td>
                                                <?php echo $row['title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['value_' . $column] ?>
                                            </td>
                                        </tr>
                                    </table>
                                <?php } ?>
                                
                                <?php if ($row['type'] == 'total') { ?>
                                    <hr />
                                    <table class="sum">
                                        <tr>
                                            <td>
                                                <h4>Annual cost</h4>
                                            </td>
                                            <td>
                                                <?php echo $row['value_' . $column]; ?>
                                            </td>
                                        </tr>
                                    </table>
                                <?php } ?>

                                <?php if ($row['type'] == 'reprocessing') { ?>
                                    <table class="reprocessing">
                                        <?php foreach ($calculated['reprocessing_costs']['details'] as $label => $value) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo getReprocessingTextFromName($label) ?>
                                                </td>
                                                <td>
                                                    <?php echo $value; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                <?php } ?>
                            <?php } ?>

                            <?php if ($row['type'] == 'grand-total') { ?>
                                <table class="grand-total">
                                    <tr>
                                        <td>Estimated costs</td>
                                        <td><?php echo $row['value_' . $column] ?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                            
                        </td>

                    <?php } ?>
                </tr>
            </table>

            <div class="footnotes">
                <p>
                    <sup>1</sup>Prepopulated repair costs based on published cost analyses: Gupta, D., et al. “Cost-effectiveness analysis of flexible optical scopes for tracheal intubation: a descriptive comparative study of reusable and single-use scopes.” J Clin Anesth. 2011; 23(8): 632-635. Liu, S., et al. “Cost Identification Analysis of Anesthesia Fiberscope Use for Tracheal Intubation.” J Anesth Clin Res 2012, 3:5.
                </p>
                <p>
                    <sup>2</sup>Ofstead, C.L., et al. “A Glimpse at the True Cost of Reprocessing Endoscopes: Results of a Pilot Project.” www.iahcsmm.org. 2017.
                </p>
                <p>
                    <sup>3</sup>Terjesen, C.L., et al. “Early Assessment of the Likely Cost Effectiveness of Single-Use Flexible Video Bronchoscopes.” PharmacoEconomics Open (2017). 1:133-141. Cost of treatment per infection is $28,383. Rate of cross contamination is 3.34 percent of total bronchoscopy procedures annually. Rate of subsequent infection is 21.25 percent of cross-contaminated bronchoscopy procedures annually.
                </p>
            </div>
        </div>

    </body>
</html>
