<?php

    require __DIR__ . '/vendor/autoload.php';

    $query = http_build_query($_GET);

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Your Custom Brochure</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/pdf-load.css" rel="stylesheet" />
        <link rel="icon" href="https://www.verathon.com/favicon.ico" />
    </head>
    <body>

        <div class="hor-ver-center">
            <h1 data-url="compile-pdf.php?<?php echo $query; ?>">Generating Custom Report...</h1>
            <img src="img/ajax-loader.gif" />

            <!-- HIDDEN FORM TO SEND ALONG PDF BINARY TO PHP and render without Javascript -->
            <!-- This is to overcome a Chrome issue that prevents download / save of PDFs when displayed as a Javascript Blob. -->
            <form action="serve-pdf.php" method="post" style="display: none;">
                <input type="hidden" name="blob" value="" />
            </form>
        </div>

        <!-- BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="js/receipt.js"></script>

    </body>
</html>