<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new Calculator();
$calculated = $calculator->calculate(
  (int) $_POST['total_procedures'], // totalProcedures
  (int) $_POST['single_use_procedures'], // singleUseProcedures
  (int) $_POST['bflex_broncoscope_price'], // bflexBroncoscopePrice
  (int) $_POST['current_reusable_quantity'], // currentReusableQuantity
  (int) $_POST['current_annual_service_per'], // currentAnnualServicePer
  (string) $_POST['reprocessing_calc_method'], // reprocessingCalcMethod
  (int) $_POST['current_annual_oop_repair_all_factor'] //currentAnnualOopRepairAllFactor
);

$query = http_build_query($_POST);

?>

<!doctype html>
<html lang="en">
    <head>
        <title>The Hidden ROI of Single-Use Bronchoscopes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet" />
    </head>
    <body>

        <!-- NAV -->
        <div class="container-md">
            <nav>
                <a class="hidden-text" href="https://www.verathon.com/glidescope-bflex/">GlideScope BFlex</a>
            </nav>
        </div>

        <!-- HERO -->
        <div id="hero" class="background blue hero">
            <div class="container-md">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <h1>Headline about results</h1>
                        <p class="normal">Hidden costs, procedure delays, and cross-contamination are all linked to reusable bronchoscopes. Calculate the ROI of reducing reusables and adopting more single-use scopes for your hospital in four easy steps.</p>
                        <a class="button" href="bflex-savings.php?<?php echo $query; ?>">Download custom brochure</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- RESULTS HEADER -->
        <div class="background white receipt-header sticky-top">
            <div class="container-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Current Costs</h2>
                        <p>Using Re-Usable bronchoscopes only</p>
                    </div>
                    <div class="col-6">
                        <h2>With BFlex</h2>
                        <p>Combined with existing reusable bronchoscopy inventory</p>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $rows = [
                [
                    'type' => 'section',
                    'title' => 'Equipment Costs'
                ],
                [
                    'type' => 'result',
                    'title' => 'Single use BFlex scopes',
                    'value_current' => $calculated['current_costs']['equipment_costs']['single_use_scopes'],
                    'value_with' => $calculated['reducing_costs']['equipment_costs']['single_use_scopes']
                ],
                [
                    'type' => 'total',
                    'value_current' => '$' . $calculated['current_costs']['equipment_costs']['total_su_bflex_cost'],
                    'value_with' => '$' . number_format($calculated['reducing_costs']['equipment_costs']['total_su_bflex_cost'])
                ],
                [
                    'type' => 'section',
                    'title' => 'Repair / Maintenance'
                ],
                [
                    'type' => 'result',
                    'title' => 'Reusable Bronchoscopes (QTY)',
                    'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['reusable_scopes_quantity']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['reusable_scopes_quantity'])
                ],
                [
                    'type' => 'result',
                    'title' => 'Annual cost of service agreement per bronchoscope',
                    'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['service_agreement_per_bronchoscope']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['service_agreement_per_bronchoscope'])
                ],
                [
                    'type' => 'result',
                    'title' => 'Annual out-of-pocket repair costs for all bronchoscopes',
                    'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['annual_oop_repair_all']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['annual_oop_repair_all'])
                ],
                [
                    'type' => 'total',
                    'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['total_annual_maint_repair']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['total_annual_maint_repair'])
                ],
                [
                    'type' => 'section',
                    'title' => 'Reprocessing'
                ],
                [
                    'type' => 'result',
                    'title' => 'Reprocessing costs',
                    'value_current' => ucwords($calculated['reprocessing_costs']['method']),
                    'value_with' => ucwords($calculated['reprocessing_costs']['method'])
                ],
                [
                    'type' => 'reprocessing'
                ],
                [
                    'type' => 'total',
                    'value_current' => '$' . number_format($calculated['current_costs']['reprocessing']['total_annual_reprocessing_costs']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['reprocessing']['total_annual_reprocessing_costs'])
                ],
                [
                    'type' => 'section',
                    'title' => 'Treating infections'
                ],
                [
                    'type' => 'result',
                    'title' => 'Patient infections due to cross contamination',
                    'value_current' => $calculated['current_costs']['treating_infections']['patient_infections'],
                    'value_with' => $calculated['reducing_costs']['treating_infections']['patient_infections']
                ],
                [
                    'type' => 'result',
                    'title' => 'Cost per infection',
                    'value_current' => '$' . number_format($calculated['cost_per_infection']),
                    'value_with' => '$' . number_format($calculated['cost_per_infection'])
                ],
                [
                    'type' => 'total',
                    'value_current' => '$' . number_format($calculated['current_costs']['treating_infections']['annual_costs']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['treating_infections']['annual_costs'])
                ],
                [
                    'type' => 'grand-total',
                    'value_current' => '$' . number_format($calculated['current_costs']['total_costs']),
                    'value_with' => '$' . number_format($calculated['reducing_costs']['total_costs'])
                ]
            ]
        ?>
        
        <div class="container-md results">

            <?php foreach ($rows as $row) { ?>
                
                <?php if ($row['type'] == 'section') { ?>
                    <!-- SECTION -->
                    <div class="row result-section">
                        <div class="col-6">
                            <h3><?php echo $row['title']; ?></h3>
                        </div>
                        <div class="col-6 with-bscope"></div>
                    </div>
                <?php } ?>

                <?php if ($row['type'] == 'result') { ?>
                    <!-- RESULT -->
                    <div class="row result <?php if ($row['title'] == 'Reprocessing costs') {?>reprocessing-costs<?php } ?>">
                        
                        <!-- CURRENT -->
                        <div class="col-6 current">
                            <div class="row">
                                <div class="col-7">
                                    <p><?php echo $row['title']; ?></p>
                                </div>
                                <div class="col-5">
                                    <p class="value "><?php echo $row['value_current']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr />
                                </div>
                            </div>
                        </div>

                        <!-- WITH -->
                        <div class="col-6 ">
                            <div class="row">
                                <div class="col-7">
                                    <p><?php echo $row['title']; ?></p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_with']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                
                    </div>
                <?php } ?>

                <?php if ($row['type'] == 'total') { ?>
                    <!-- TOTAL -->
                    <div class="row result">
                        <div class="col-6 current total">
                            <div class="row">
                                <div class="col-7">
                                    <p>Total Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_current'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 with total">
                            <div class="row">
                                <div class="col-7">
                                    <p>Total Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_with'] ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>

                <?php if ($row['type'] == 'reprocessing') { ?>
                    <?php $counter = 0; ?>
                    <?php foreach ($calculated['reprocessing_costs']['details'] as $label => $value) { ?>
                        
                        <!-- RESULT -->
                        <div class="row result reprocessing">
                            
                            <!-- CURRENT -->
                            <div class="col-6 current">
                                <div class="row">
                                    <div class="col-7">
                                        <p><?php echo $label; ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="value "><?php echo $value; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr <?php if ($counter == count($calculated['reprocessing_costs']['details']) - 1) { ?>class="show"<?php } ?> />
                                    </div>
                                </div>
                            </div>

                            <!-- WITH -->
                            <div class="col-6 ">
                                <div class="row">
                                    <div class="col-7">
                                        <p><?php echo $label ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="value "><?php echo $value; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <hr <?php if ($counter == count($calculated['reprocessing_costs']['details']) - 1) { ?>class="show"<?php } ?> />
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        <?php $counter ++; ?>
                    <?php } ?>
                <?php } ?>

                <?php if ($row['type'] == 'grand-total') { ?>
                    <!-- TOTAL -->
                    <div class="row result">
                        <div class="col-6 current total grand">
                            <div class="row">
                                <div class="col-7">
                                    <p>Total Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_current'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 with total grand">
                            <div class="row">
                                <div class="col-7">
                                    <p>Total Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_with'] ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>

            <?php } ?>
        </div>

        <!-- FOOTER -->
        <div class="background blue download-footer">
            <div class="container-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Single-Use. Safer Investment. </h2>
                    </div>
                    <div class="col-6">
                    <a class="button" href="bflex-savings.php?<?php echo $query; ?>">Download custom brochure</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="background lightest-grey footer">
            <div class="container-md">
                <p>
                    <span><a href="https://www.verathon.com/contact-us/" target="new">CONTACT US</a></span>
                    <span><a href="tel:800-331-2313">800-331-2313</a> (US & Canada Only)</span>
                    <span>Dir: <a href="tel:+1-425-867-1348">+1-425-867-1348</a></span>
                </p>
                <p>
                    <span>Fax: +1-425-883-2896</span>
                    <span><a href="http://verathon.com" target="new">Verathon Inc.</a></span>
                    <span>20001 North Creek Parkway Bothell, WA 98011</span>
                </p>
            </div>
        </div>

        <!-- BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>