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
                    <div class="col-md-6">
                        <h2>Current Costs</h2>
                        <p>Using Re-Usable bronchoscopes only</p>
                    </div>
                    <div class="col-md-6">
                        <h2>With BFlex</h2>
                        <p>Combined with existing reusable bronchoscopy inventory</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RESULTS -->
        <div class="container-md results">
            <div class="row result-section">
                <div class="col-6">
                    <h3>Equipment Costs</h3>
                </div>
                <div class="col-6 with-bscope"></div>
            </div>

            <div class="row result">

                <div class="col-6 current">
                    <div class="row">
                        <div class="col-8">
                            <p>Single use BFlex scopes</p>
                        </div>
                        <div class="col-4">
                            <p class="value">0</p>
                        </div>
                    </div>
                </div>

                <div class="col-6 with">
                    <div class="row">
                        <div class="col-8 d-sm-none d-xs-none d-md-block">
                            <p>Single use BFlex scopes</p>
                        </div>
                        <div class="col-4">
                            <p class="value">300</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <pre>
            <?php var_dump($_POST); ?>
            <hr />
            <?php var_dump($calculated); ?>
        </pre>
    </body>
</html>