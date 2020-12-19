<!doctype html>
<html lang="en">
    <head>
        <title>Bronchoscope Cost-Comparison Calculator – Verathon Inc.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet" />
        <link rel="icon" href="https://www.verathon.com/favicon.ico" />
        <!-- OPT IN TO IE behaviors for conditional comments -->
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
    </head>
    <body>

        <?php require('nav.php'); ?>

        <!-- BROWSER ALERT FOR IE USERS -->
        <!--[if IE]>
            <div class="background red browser-alert">
                <div class="container-md">
                    This calculator tool is incompatible with Internet Explorer. <a href="https://www.microsoft.com/en-us/edge" target="browser">Follow this link</a> to update your browser and unlock the full experience.
                </div>
            </div>
        <![endif]-->
        
        <div id="hero" class="background blue">
            <div class="container-md">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <h1>Single-Use. Safer Investment.</h1>
                        <p class="eyebrow">Bronchoscope cost-comparison calculator</p>
                        <p>
                            Use this tool to compare the operating costs of single-use bronchoscopes to reusable bronchoscopes in four easy steps. Results are estimated based on annual procedure volume, quantity of reusable bronchoscopes, and common costs associated with reprocessing, repair and maintenance, and preventable infections. 
                        </p>
                        <h2>Advantages of single-use</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/reprocessing-icon.png" srcset="img/reprocessing-icon.png 1x, img/reprocessing-icon@2x.png 2x" />
                            <h3>
                                Eliminate reprocessing costs
                            </h3>
                            <p>
                                Single-use bronchoscopes don’t need reprocessing. Getting reusables patient-ready is extensive and time consuming: the cost for reprocessing one endoscope ranges from $50.14 to $152.66 (Ofstead, C.L., et al.).
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/repairs-icon.png" srcset="img/repairs-icon.png 1x, img/repairs-icon@2x.png 2x" />
                            <h3>
                                No expensive repairs 
                            </h3>
                            <p>
                                Damage to reusable bronchoscopes is possible during procedures, and repairs can be expensive. One study cites $148 for repairs per use (Sohrt, Anne, et al.). 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/service-icon.png" srcset="img/service-icon.png 1x, img/service-icon@2x.png 2x" />
                            <h3>
                                Avoid service contracts
                            </h3>
                            <p>
                                Annual contract fees per reusable bronchoscope add up and often exclude preventable damage. This damage can cost nearly the same in additional fees for out-of-pocket repairs and limit availability of bronchoscopes during off-site servicing. 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cost">
                            <img src="img/contamination-icon.png" srcset="img/contamination-icon.png 1x, img/contamination-icon@2x.png 2x" />
                            <h3>
                                Minimize the risk of cross contamination 
                            </h3>
                            <p>
                                Single-use bronchoscopes can protect against infection. Multiple studies show that costly infections occur even when reprocessing exceeds national guidelines. The cost of treatment for each infection due to cross contamination and subsequent infection is $28,383 (Ofstead, C.L., et al.; Terjesen, C.L., et al.). 
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    </body>
</html>