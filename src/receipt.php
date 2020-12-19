<?php

    require __DIR__ . '/vendor/autoload.php';

    $calculator = new Calculator();
    $calculated = $calculator->calculate(
    (string) strip_tags($_POST['facility_name']), // facilityName
    (int) $_POST['total_procedures'], // totalProcedures
    (int) $_POST['single_use_procedures'], // singleUseProcedures
    (int) $_POST['bflex_broncoscope_price'], // bflexBroncoscopePrice
    (int) $_POST['current_reusable_quantity'], // currentReusableQuantity
    (int) $_POST['current_annual_service_per'], // currentAnnualServicePer
    (string) strip_tags($_POST['reprocessing_calc_method']), // reprocessingCalcMethod
    (int) $_POST['current_annual_oop_repair_all_factor'] //currentAnnualOopRepairAllFactor
    );

    $query = http_build_query($_POST);

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Your Cost-Comparison Results</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet" />
    </head>
    <body>

        <?php require('nav.php'); ?>

        <!-- HERO -->
        <div id="hero" class="background blue hero">
            <div class="container-md">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <h1>Your Cost-Comparison Results</h1>
                        <p class="normal">
                            Here’s how your current costs for reusables stack up against sterile single-use bronchoscopes. By integrating BFlex™ with your inventory, you can help to reduce preventable infections from cross contamination and save time on repairs and reprocessing. <strong>This comparison is conservative. It omits the capital acquisition costs and operational budgets associated with reusable bronchoscopes.</strong>
                        </p>
                        <a class="button" href="pdf.php?<?php echo $query; ?>" target="brochure">Generate Custom Brochure</a>
                    </div>
                </div>
            </div>
        </div>

        <?php require('results.php'); ?>

        <?php require('footer.php'); ?>

        <!-- BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>