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

        <?php require('nav.php'); ?>
        
        <div id="hero" class="background blue">
            <div class="container-md">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <h1>Single-Use. Safer Investment.</h1>
                        <p class="eyebrow">See How Costs Compare: Single-Use vs. Reusable Bronchoscopes</p>
                        <p>There’s a misconception that single-use bronchoscopes are too expensive, yet hidden costs, procedure delays, and increased rates of infection are linked to reusables. Use this calculator to see where and how much your hospital might save by adopting more single-use bronchoscopes.</p>
                        <h2>Cost for reusables at a glance</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/reprocessing-icon.png" srcset="img/reprocessing-icon.png 1x, img/reprocessing-icon@2x.png 2x" />
                            <h3>
                                Reprocessing
                            </h3>
                            <p>
                                One endoscope can cost $50.14 to $152.66 on reprocessing alone, not including repairs or disposal of damaged parts. 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/repairs-icon.png" srcset="img/repairs-icon.png 1x, img/repairs-icon@2x.png 2x" />
                            <h3>
                                Repairs and service
                            </h3>
                            <p>
                                Preventable damage can cost over $2k per scope annually in out-of-pocket repairs, and scopes sent for repair affect availability. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/service-icon.png" srcset="img/service-icon.png 1x, img/service-icon@2x.png 2x" />
                            <h3>
                                Service contracts
                            </h3>
                            <p>
                                Cost $2200 annually per reusable yet they often exclude preventable damage, which can cost an additional $2000 per reusable annually in out-of-pocket repairs and limit availability during off-site servicing.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/contamination-icon.png" srcset="img/contamination-icon.png 1x, img/contamination-icon@2x.png 2x" />
                            <h3>
                                Cross-contamination
                            </h3>
                            <p>
                                Even when reprocessing exceeds national guidelines, pathogens are found. The average cost of treating infection due to cross-contamination and subsequent infection is $28,383 per case. 
                                <br />
                                (Ofstead, C.L et al; Terjesen, C.L. et al) 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <nav class="scroll">
                            <img src="img/scroll-icon.png" srcset="img/scroll-icon.png 1x, img/scroll-icon@2x.png 2x" /> Scroll to get started
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- APP CONTAINTER -->
        <div id="app"></div>

        <?php require('footer.php'); ?>

        <!-- VUE -->
        <script type="module" src="js/main.js"></script>

        <!-- BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </body>
</html>